<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Queries\UserDataTable;
use Illuminate\Support\Facades\DB;
use App\Models\Balance;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use App\Models\Ad;
use Exception;
use App\Models\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Response;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\City;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\ServiceSchedule;
use App\Models\Settings;
use App\Models\CreditReloadPromotion;
use App\Mail\SendMailreset;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentGateway;
use App\Notifications\WelcomeNotification;
use App\Models\Transactions;
use Illuminate\Support\Str;
use App\Events\Registered;
use App\Models\Appointment;
use App\Models\Order;
use Illuminate\Support\Facades\URL;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Password;
use App\Models\PaidTopAd;
use App\Models\PasswordReset;
use App\Models\PostingAds;
use App\Models\States;
use App\Models\Task;
use App\Models\VerificationDocument;
use Illuminate\Support\Facades\Mail;
use App\Models\ScheduledAd;
use App\Notifications\VerifyEmailNotification;

function getIp()
{
    $ip = null;
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
    } else {
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
    }
    return $ip;
}

class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @return Factory|View
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Display a listing of the User.
     *
     * @param  Request  $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     *
     * @throws Exception
     */
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         return Datatables::of((new UserDataTable())->get($request->only(['filter_user', 'privacy_filter'])))->make(true);
    //     }
    //     $roles = Role::pluck('name', 'id')->toArray();

    //     return view('users.index')->with([
    //         'roles' => $roles,
    //     ]);
    // }

    /**
     * Show the form for creating a new User.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();

        return view('users.create')->with(['roles' => $roles]);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  CreateUserRequest  $request
     * @return JsonResponse
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        $input = $this->validateInput($request->all());

        $this->userRepository->store($input);

        return $this->sendSuccess('User saved successfully.');
    }

    /**
     * Display the specified User.
     *
     * @param  User  $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $user->roles;
        $user = $user->apiObj();

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function edit(User $user): JsonResponse
    {
        $user->roles;
        $user = $user->apiObj();

        return $this->sendResponse(['user' => $user], 'User retrieved successfully.');
    }

    /**
     * Update the specified User in storage.
     *
     * @param  User  $user
     * @param  UpdateUserRequest  $request
     * @return JsonResponse
     */
    public function update(User $user, UpdateUserRequest $request): JsonResponse
    {
        if (!empty($user->is_system)) {
            return $this->sendError('You can not update system generated user.');
        }

        $input = $this->validateInput($request->all());
        $this->userRepository->update($input, $user->id);

        return $this->sendSuccess('User updated successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function updateLanguage(Request $request): JsonResponse
    {
        $language = $request->get('languageName');

        $user = getLoggedInUser();
        $user->update(['language' => $language]);

        return $this->sendSuccess('Language updated successfully.');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function archiveUser(User $user): JsonResponse
    {
        if (!empty($user->is_system)) {
            return $this->sendError('You can not archive system generated user.');
        }

        $this->userRepository->delete($user->id);

        return $this->sendSuccess('User archived successfully.');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function restoreUser(Request $request): JsonResponse
    {
        $id = $request->get('id');
        $this->userRepository->restore($id);

        return $this->sendSuccess('User restored successfully.');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $user = User::withTrashed()->whereId($id)->first();

        if (empty($user)) {
            return $this->sendError('User not found.');
        }

        if (!empty($user->is_system)) {
            return $this->sendError('You can not delete system generated user.');
        }

        $this->userRepository->deleteUser($user->id);

        return $this->sendSuccess('User deleted successfully.');
    }

    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function activeDeActiveUser(User $user): JsonResponse
    {
        $this->userRepository->checkUserItSelf($user->id);
        $this->userRepository->activeDeActiveUser($user->id);

        return $this->sendSuccess('User status updated successfully.');
    }

    /**
     * @param $input
     * @return mixed
     */
    public function validateInput($input)
    {
        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $input['is_active'] = (!empty($input['is_active'])) ? 1 : 0;

        return $input;
    }

    /**
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function userImpersonateLogin(User $user)
    {
        Auth::user()->impersonate($user);

        if (\Auth::check() && \Auth::user()->hasPermissionTo('manage_conversations')) {
            return redirect(url('/conversations'));
        } elseif (\Auth::check()) {
            if (\Auth::user()->getAllPermissions()->count() > 0) {
                $url = getPermissionWiseRedirectTo(\Auth::user()->getAllPermissions()->first());

                return redirect(url($url));
            } else {
                return redirect(url('/conversations'));
            }
        }
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function userImpersonateLogout()
    {
        Auth::user()->leaveImpersonation();

        return redirect(url('/conversations'));
    }

    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function isEmailVerified(User $user): JsonResponse
    {
        $emailVerified = $user->email_verified_at == null ? Carbon::now() : null;
        $user->update(['email_verified_at' => $emailVerified]);

        return $this->sendSuccess('Email Verified successfully.');
    }



    public function index()
    {
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $category = Course::all();
        $services = CourseCategory::all();
        return view('index', compact('category', 'user_session'));
    }
    public function ads_list($id)
    {

        $ads = PostingAds::where('category', $id)->paginate(10);
        $category = Course::all();
        $countries = Country::all();
        $states = States::all();
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $cities = City::all();
        $story=ScheduledAd::all();

        return view('ads_list', compact('ads', 'category', 'id', 'countries', 'cities', 'states','story', 'user_session'));
    }
    public function Userlogin()
    {
        return view('login');
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function signup()
    {
        return view('register');
    }


    public function registration(Request $request)
    {
        $user = new User();
        $request->validate([

            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'account_type' => 'required',
            'mobile_number' => 'required'
        ]);
        // Create a new user instance
        $user = User::create([

            'email' => $request->email,
            'password' => $request->password,
            'account_type' => $request->account_type,
            'mobile_number' => $request->mobile_number,
            'ip_address' => getIp(),
        ]);

        // Send email verification notification
        $user->notify(new VerifyEmailNotification($user));


        if ($user) {
            return view('feedback', compact('user'));
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('is_super_admin', '0')->first();

        if ($user) {
            if ($request->password == $user->password) {
                if ($user->email_verified_at === null) {
                    return back()->with('fail', 'Your account is not verified. Please verify your email.');
                }
                if ($user->account_type == "user" || $user->account_type == "advertiser" || $user->account_type == "manager") {
                    $user->update(['is_online' => 1, 'last_seen' => Carbon::now()]);
                    $request->session()->put('LoggedIn', $user->id);
                    return redirect('dashboard');
                }

                if ($user->account_type == "partner") {
                    $user->update(['is_online' => 1, 'last_seen' => Carbon::now()]);
                    $request->session()->put('LoggedIn', $user->id);
                    $appointment = Appointment::where('profile_id', $user->id)->get();

                    return redirect('admin/dashboard')->with(['appointment' => $appointment]);
                }
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not registered');
        }
    }
    public function appointment()
    {
        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $appointments = Appointment::where('profile_id', Session::get('LoggedIn'))->get();
            $user_appoinment=Appointment::where('user_id', Session::get('LoggedIn'))->get();
            return view('appointment', compact('appointments', 'user_session','user_appoinment'));
        }
    }
    public function sendResetPasswordLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'Email address not found.');
        }
        $token = Str::random(40);


        $datetime = Carbon::now()->format('Y-m-d H:i:s');

        $token = PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => $datetime
            ]
        );

        // Send the password reset notification
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('success', 'Password reset link sent successfully.');
    }
    public function Overview()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('Overview', compact('user_session'));
        }
    }
    public function overview_post(Request $request)
    {
        $request->validate([

            'mobile_number' => 'required',
            'country' => 'required',
        ]);

        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),
            'mobile_number' => ($request->mobile_number),
            'email' => ($request->email),
            'country' => $request->country,

        ]);
        if ($data) {
            return back()->with('success', 'Profile Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function setting(Request $request)
    {
        $request->validate([

            'mobile_number' => 'required',
            'country' => 'required',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        }
        $check = User::find($request->user_id);

        if (empty($request->profile_photo)) {

            $profile = $check->profile_photo;
        }
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),
            'mobile_number' => ($request->mobile_number),
            'email' => ($request->email),
            'country' => $request->country,
            'profile_photo' => $profile,

        ]);
        if ($data) {
            return back()->with('success', 'Profile Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function Billing()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $transaction = Transactions::where('user_id', Session::get('LoggedIn'))->get();
            return view('Billing', compact('user_session', 'transaction'));
        }
    }
    public function Settings()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('Settings', compact('user_session'));
        }
    }
    public function Statements()
    {

        return view('Statements');
    }
    public function Payment()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('Payment', compact('user_session'));
        }
    }
    public function Deep()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $deep = Course::where('category_id', '2')->orderBy('id', 'DESC')->paginate(5);
            return view('Deep', compact('user_session', 'deep'));
        }
    }
    public function Machine()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $machines = Course::where('category_id', '1')->orderBy('id', 'DESC')->paginate(5);
            return view('Machine', compact('user_session', 'machines'));
        }
    }
    public function PurchaseTime($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $PurchaseProject = Course::where('id', $id)->where('category_id', '3')->first();
            return view('PurchaseTime', compact('user_session', 'PurchaseProject'));
        }
    }
    public function Hybrid()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $hybrid = Course::where('category_id', '4')->orderBy('id', 'DESC')->paginate(5);
            return view('Hybrid', compact('user_session', 'hybrid'));
        }
    }
    public function TimeSeries()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $timeseries = Course::where('category_id', '3')->orderBy('id', 'DESC')->paginate(5);
            return view('TimeSeries', compact('user_session', 'timeseries'));
        }
    }
    public function PurchaseHybrid($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $PurchaseProject = Course::where('id', $id)->where('category_id', '4')->first();
            return view('PurchaseHybrid', compact('user_session', 'PurchaseProject'));
        }
    }
    public function PurchaseDeep($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $PurchaseProject = Course::where('id', $id)->where('category_id', '2')->first();
            return view('PurchaseDeep', compact('user_session', 'PurchaseProject'));
        }
    }
    public function PurchaseMachine($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $PurchaseProject = Course::where('id', $id)->where('category_id', '1')->first();
            return view('PurchaseMachine', compact('user_session', 'PurchaseProject'));
        }
    }
    public function ContinuePremium()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('ContinuePremium', compact('user_session'));
        }
    }
    public function ContinueStandard()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('ContinueStandard', compact('user_session'));
        }
    }
    public function dashboard()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $task = Task::where('user_id', Session::get('LoggedIn'))->first();
            $ads = PostingAds::where('user_id', Session::get('LoggedIn'))->get();
            $isverified = VerificationDocument::where('user_id', Session::get('LoggedIn'))->first();

            $completed = Order::where('status', 'Completed')->where('user_id', Session::get('LoggedIn'))->get();
            return view('dashboard', compact('user_session', 'ads', 'completed', 'isverified', 'task'));
        }
    }
    public function DataAnalysis()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $data_analysis = Course::where('category_id', '5')->orderBy('id', 'DESC')->paginate(5);
            return view('DataAnalysis', compact('user_session', 'data_analysis'));
        }
    }
    public function DataVisualization()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $data_visualization = Course::where('category_id', '6')->orderBy('id', 'DESC')->paginate(5);
            return view('DataVisualization', compact('user_session', 'data_visualization'));
        }
    }
    public function DiseasesPrediction()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $diseases_prediction = Course::where('category_id', '9')->orderBy('id', 'DESC')->paginate(5);
            return view('DiseasesPrediction', compact('user_session', 'diseases_prediction'));
        }
    }
    public function ExcelVisualization()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $excel_visualization = Course::where('category_id', '7')->orderBy('id', 'DESC')->paginate(5);
            return view('ExcelVisualization', compact('user_session', 'excel_visualization'));
        }
    }
    public function PowerBi()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $power = Course::where('category_id', '8')->orderBy('id', 'DESC')->paginate(5);
            return view('PowerBi', compact('user_session', 'power'));
        }
    }
    public function Data_science_ai()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $data_science = Course::where('category_id', '10')->orderBy('id', 'DESC')->paginate(5);
            return view('Data_science_ai', compact('user_session', 'data_science'));
        }
    }
    public function ads()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $ads = PostingAds::where('user_id', Session::get('LoggedIn'))->get();
            return view('ads', compact('user_session', 'ads'));
        }
    }
    public function post_ad()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $category = Course::all();
            $countries = Country::all();
            $states = States::all();

            $cities = City::all();
            $services = CourseCategory::all();
            return view('Post_add', compact('user_session', 'category', 'services', 'countries', 'states', 'cities'));
        }
    }
    public function getStates(Request $request)
    {
        $country = $request->input('code');

        $states = States::where('country_code', $country)->pluck('name', 'code');

        $options = [];

        foreach ($states as $key => $state) {

            $stateData = json_decode($state, true);
            $englishValue = isset($stateData['en']) ? $stateData['en'] : '';

            $options[] = ['value' => $key, 'text' => $englishValue];
        }

        // Use dd for debugging if needed


        return response()->json($options);
    }

    public function getCities(Request $request)
    {
        $code = $request->input('code');
        $cities = City::where('subadmin1_code', $code)->pluck('name');
        // dd($cities);
        $options = [];

        foreach ($cities as $key => $city) {

            $cityData = json_decode($city, true);
            $englishValue = isset($cityData['en']) ? $cityData['en'] : '';

            $options[] = ['value' => $englishValue, 'text' => $englishValue];
        }
        return response()->json($options);
    }
    public function ad_photo()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('ad_photo', compact('user_session'));
        }
    }
    public function visibity()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $top_ad = Ad::all();
            return view('visibity', compact('user_session', 'top_ad'));
        }
    }
    public function finish()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('finish', compact('user_session'));
        }
    }
    public function ad_details($id)
    {
        $ads_details = PostingAds::where('id', $id)->first();
        $id = $ads_details->category;
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        $service_time = ServiceSchedule::where('user_id', $ads_details->user_id)->get();

        return view('ad_details', compact('ads_details', 'id', 'user_session', 'service_time'));
    }
    public function post_list()
    {
        $ads = PostingAds::orderBy('id', 'DESC')->paginate(2);
        $category = Course::all();
        return view('post', compact('ads', 'category'));
    }
    public function search(Request $request)
    {
        $query = PostingAds::query();
        $category = Course::all();
        $countries = Country::all();
        $states = States::all();
        $story=ScheduledAd::all();
        $cities = City::all();
        if ($request->filled('keyword')) {
            $query->where('title', 'LIKE', '%' . $request->input('keyword') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }
        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }
        if ($request->filled('state')) {
            $query->where('state', $request->input('city'));
        }
        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }
        // Add more conditions for other parameters (state, city, service, nationality)

        $results = $query->paginate(10);
        // dd($results);
        $id = $request->input('category');
        return view('search_results', compact('results', 'id','story', 'category', 'countries', 'states', 'cities'));
    }
    public function Ad_insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'availability_hours' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        // dd($request->all());
        if (!empty($request->country)) {
            $country = Country::where('code', $request->country)->first();
            // Decode JSON string into a PHP associative array
            $data = json_decode($country->name, true);

            // Access the value of 'en'
            $englishValue = isset($data['en']) ? $data['en'] : null;
            $country = $englishValue;
        }
        if (!empty($request->state)) {
            $state = States::where('code', $request->state)->first();
            // Decode JSON string into a PHP associative array
            $data = json_decode($state->name, true);

            // Access the value of 'en'
            $englishValue = isset($data['en']) ? $data['en'] : null;
            $state = $englishValue;
        }
        if (empty($request->city)) {
            $city = $state;
        } else {
            $city =  $request->city;
        }
        session()->put('category', $request->category);
        session()->put('user_id', $request->user_id);
        session()->put('country', $country);
        session()->put('state', $state);
        session()->put('city', $city);
        session()->put('name', $request->name);
        session()->put('address', $request->address);
        session()->put('postal_code', $request->postal_code);
        session()->put('place', $request->place);
        session()->put('age', $request->age);
        session()->put('title', $request->title);
        session()->put('description', $request->description);

        if (!empty($request->search_tag__ethnicity)) {
            $search_tag__ethnicity = implode(',', $request->search_tag__ethnicity);
            session()->put('search_tag__ethnicity', $search_tag__ethnicity);
        }



        session()->put('search_tag__nationality', $request->search_tag__nationality);

        if (!empty($request->search_tag__breast)) {
            $search_tag__breast = implode(',', $request->search_tag__breast);
            session()->put('search_tag__ethnicity', $search_tag__breast);
        }
        if (!empty($request->search_tag__hair)) {
            $search_tag__hair = implode(',', $request->search_tag__hair);
            session()->put('search_tag__hair', $search_tag__hair);
        }
        if (!empty($request->search_tag__body_type)) {
            $search_tag__body_type = implode(',', $request->search_tag__body_type);
            session()->put('search_tag__body_type', $search_tag__body_type);
        }
        if (!empty($request->search_tag__services)) {
            $search_tag__services = implode(',', $request->search_tag__services);
            session()->put('search_tag__services', $search_tag__services);
        }

        if (!empty($request->search_tag__attention_to)) {
            $search_tag__attention_to = implode(',', $request->search_tag__attention_to);
            session()->put('search_tag__attention_to', $search_tag__attention_to);
        }
        if (!empty($request->search_tag__place_of_service)) {
            $search_tag__place_of_service = implode(',', $request->search_tag__place_of_service);
            session()->put('search_tag__place_of_service', $search_tag__place_of_service);
        }
        if (!empty($request->search_tag__payment_methods)) {
            $search_tag__payment_methods = implode(',', $request->search_tag__payment_methods);
            session()->put('search_tag__payment_methods', $search_tag__payment_methods);
        }
        if (!empty($request->contact_method)) {
            $contact_method = implode(',', $request->contact_method);
            session()->put('contact_method', $contact_method);
        }

        session()->put('hourly_price', $request->hourly_price);
        session()->put('availability_hours', $request->availability_hours);
        session()->put('email', $request->email);
        session()->put('telephone', $request->telephone);
        // dd($request->all());
        return redirect()->route('ad_photo');
    }
    public function ads_photos_upload(Request $request)
    {

        $images = $request->file('ads_photos');

        if ($images) {
            $ads = new PostingAds();
            $ads->country = session()->get('country');
            $ads->state = session()->get('state');
            $ads->city = session()->get('city');
            $ads->availability = session()->get('availability_hours');
            $ads->name = session()->get('name');
            $ads->category = session()->get('category');
            $ads->user_id = $request->user_id;
            $ads->address = session()->get('address');
            $ads->postal_code = session()->get('postal_code');
            $ads->place = session()->get('place');
            $ads->age = session()->get('age');
            $ads->title = session()->get('title');
            $ads->description = session()->get('description');
            $ads->search_tag__ethnicity = session()->get('search_tag__ethnicity');
            $ads->search_tag__nationality = session()->get('search_tag__nationality');
            $ads->search_tag__breast = session()->get('search_tag__breast');
            $ads->search_tag__hair = session()->get('search_tag__hair');
            $ads->third_model_name = session()->get('third_model_name');
            $ads->search_tag__body_type = session()->get('search_tag__body_type');
            $ads->search_tag__services = session()->get('search_tag__services');
            $ads->search_tag__attention_to = session()->get('search_tag__attention_to');
            $ads->search_tag__place_of_service = session()->get('search_tag__place_of_service');
            $ads->hourly_price = session()->get('hourly_price');
            $ads->search_tag__payment_methods = session()->get('search_tag__payment_methods');
            $ads->contact_method = session()->get('contact_method');
            $ads->email = session()->get('email');
            $ads->telephone = session()->get('telephone');
            $ads->save();

            session()->put('ad_id', $ads->id);
            // dd($ads->id);
            // Check if 'ads_photos' is present in the request
            if ($request->hasFile('ads_photos')) {
                // Move each file in the 'ads_photos' array to the 'ads_photos' directory
                foreach ($request->file('ads_photos') as $adsPhoto) {
                    $adsPhotoPath = $adsPhoto->store('ads_photos', 'public');

                    // Save the ads_photos path in the database
                    Image::create(['path' => $adsPhotoPath, 'user_id' => $request->user_id, 'ad_id' => $ads->id]);
                }
            }
        }

        return redirect()->route('visibity');
    }
    public function ScheduleAppointment(Request $request)
    {
        // dd($request->all());
        $profile_id = PostingAds::where('id', $request->ad_id)->first();
        $profile_id = $profile_id->user_id;
        $appointment = new Appointment();
        $appointment->date = $request->input("date");
        $appointment->start_time = $request->input("start_time");
        $appointment->end_time = $request->input("end_time");
        $appointment->user_id = $request->user_id;
        $appointment->profile_id = $profile_id;
        $appointment->ad_id = $request->ad_id;
        $data = $appointment->save();
        if ($data) {
            return back()->with('success', 'Appointment Scheduled Successfully');
        } else {
            return back()->with('fail', 'Error In scheduling appointment. Please try again later!');
        }
    }
    public function edit_appointment($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $Appointment = Appointment::where('id', $id)->first();
            return view('edit_appointment', compact('user_session', 'Appointment'));
        }
    }
    public function UpdateAppointment(Request $request)
    {
        $appointment = Appointment::where('id', $request->id)->update([
            "status" => $request->status,
        ]);


        if ($appointment) {
            return redirect('appointment')->with('success', 'Appointment Status Update Successfully');
        } else {
            return back()->with('fail', 'Error In scheduling appointment. Please try again later!');
        }
    }
    public function pay_credit(Request $request, $id)
    {
        // dd($request->all());
        $top_ad_details = Ad::find($id);
        $price = str_replace(array("(", ")", "credits"), "", $top_ad_details->price);

        $user = User::findOrFail(Session::get('LoggedIn'));
        if ($user->balance <= $price) {
            return back()->with('fail', 'Your selected package credits more than your Credits balance');
        }
        $user_balance = $user->balance - $price;
        if ($request->schedule == "9 a.m. - 12 p.m.") {
            $start_time = "9:00";
            $end_time = "12:00";
        }
        if ($request->schedule == "12 p.m. - 3 p.m.") {
            $start_time = "12:00";
            $end_time = "15:00";
        }
        if ($request->schedule == "3 p.m. - 6 p.m.") {
            $start_time = "15:00";
            $end_time = "18:00";
        }
        if ($request->schedule == "6 p.m. - 8 p.m.") {
            $start_time = "18:00";
            $end_time = "20:00";
        }
        if ($request->schedule == "8 p.m. - 10 p.m.") {
            $start_time = "20:00";
            $end_time = "22:00";
        }
        if ($request->schedule == "10 p.m. - 12 a.m.") {
            $start_time = "22:00";
            $end_time = "00:00";
        }
        $user_balance_update = User::where('id', '=', Session::get('LoggedIn'))->update([

            'balance' => $user_balance,
        ]);
        $balance = Balance::where('user_id', '=', Session::get('LoggedIn'))->first();
        $user_balances = $balance->amount - $price;
        $admin_balance_update = Balance::where('user_id', '=', Session::get('LoggedIn'))->update([

            'amount' => $user_balances,
        ]);
        // Create a new instance of the TopAdBalance model
        $topAdBalance = new PaidTopAd([
            'top_ad_id' => $top_ad_details->id,
            'user_id' => Session::get('LoggedIn'),
            'amount' => $price,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'ad_id' => $request->ad_id,
        ]);

        // Save the new record to the database
        $topAdBalance->save();
        return redirect('finish');
    }
    public function PurchaseAnalysis($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $PurchaseProject = Course::where('id', $id)->where('category_id', '5')->first();
            return view('PurchaseAnalysis', compact('user_session', 'PurchaseProject'));
        }
    }
    public function credits()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $credits =  CreditReloadPromotion::all();
            return view('credit', compact('user_session', 'credits'));
        }
    }
    public function credit_buy_post()
    {
    }
    public function credit_buy_details($id)
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $credit =  CreditReloadPromotion::find($id);
            return view('credit_buy', compact('user_session', 'credit'));
        }
    }
    public function ActivityOrder()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $progress = Order::where('status', 'progress')->where('user_id', Session::get('LoggedIn'))->orderby('id', 'desc')->first();
            return view('ActivityOrder', compact('user_session', 'progress'));
        }
    }
    public function CompletedOrders()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $completed = Order::where('status', 'Completed')->where('user_id', Session::get('LoggedIn'))->get();
            return view('CompletedOrders', compact('user_session', 'completed'));
        }
    }
    public function CancelledOrders()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $cancel = Order::where('status', 'cancel')->where('user_id', Session::get('LoggedIn'))->get();
            return view('CancelledOrders', compact('user_session', 'cancel'));
        }
    }
    public function Activity()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('Activity', compact('user_session'));
        }
    }
    public function Delivery()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $check = Order::where('user_id', Session::get('LoggedIn'))->orderby('id', 'desc')->first();
            return view('Delivery', compact('user_session', 'check'));
        }
    }
    public function Details()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $progress = Order::where('status', 'progress')->where('user_id', Session::get('LoggedIn'))->orderby('id', 'desc')->first();
            return view('Details', compact('user_session', 'progress'));
        }
    }
    public function AddFunds()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('AddFunds', compact('user_session'));
        }
    }
    public function ActiveOrders()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $progress = Order::where('status', 'progress')->where('user_id', Session::get('LoggedIn'))->get();
            return view('ActiveOrders', compact('user_session', 'progress'));
        }
    }
    public function WithdrawFunds()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('WithdrawFunds', compact('user_session'));
        }
    }


    public function update_password(Request $request)
    {


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);


        $data = User::find($request->user_id);

        if (!FacadesHash::check($request->old_password, $data->password)) {
            return back()->with("fail", "Old Password Doesn't match!");
        }
        if (FacadesHash::check($request->new_password, $data->password)) {
            return back()->with("fail", "Please enter a password which is not similar then current password!!");
        }
        #Update the new Password
        $data = User::where('id', '=', $data->id)->update([
            'password' => FacadesHash::make($request->new_password)

        ]);
        return back()->with('success', 'Successfully Updated');
    }



    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {


            Session::forget('LoggedIn');
            $request->session()->invalidate();
            return redirect('/');
        }
    }
    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('edit_profile', compact('user_session'));
        }
    }
    public function update_profile(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if a new profile photo is provided
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $imageName = $profilePhoto->getClientOriginalName();

            // Move the uploaded file to the 'profile_photo' directory in the public path
            $profilePhoto->move(public_path('profile_photo'), $imageName);

            // Update the profile photo variable
            $profile = $imageName;
        } else {
            // If no new photo is provided, use the existing one
            $user = User::find($request->user_id);
            $profile = $user->profile_photo;
        }

        // Update user data in the database
        $userUpdate = User::where('id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_photo' => $profile,
        ]);

        if ($userUpdate) {
            return redirect('dashboard')->with('success', 'Profile Updated Successfully');
        } else {
            return back()->with('fail', 'Failed to update profile');
        }
    }

    public function forget_password()
    {

        return view('forget_password');
    }
    public function forget_mail(Request $request)
    {
        try {
            $customer = User::where('email', $request->email)->get();

            if (count($customer) > 0) {

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/ResetPasswordLoad?token=' . $token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = "Password Reset";
                $data['body'] = "Please click on below link to reset your password.";
                $data['auth'] = "SkyForecastingTeam";

                Mail::to($request->email)->send(
                    new SendMailreset(
                        $token,
                        $request->email,
                        $data
                    )
                );


                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime
                    ]
                );
                return redirect('forget_password')->with('success', 'Please check your mail to reset your password');
                // return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return redirect('forget_password')->with('fail', 'User not found');
                // return response()->json(['fail' => false, 'msg' => 'User not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    public function ResetPasswordLoad(Request $request)
    {

        $resetData =  PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetData) > 0) {
            $customer = User::where('email', $resetData[0]['email'])->get();

            return view('ResetPasswordLoad', ['customer' => $customer]);
        }
    }



    public function ResetPassword(Request $request)
    {

        $request->validate([

            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ]);

        $data = User::where('email', $request->email)->first();

        $data->password = $request->password;
        $data->custom_password = $request->password;
        $data->update();

        PasswordReset::where('email', $data->email)->delete();

        echo "<h1>Successfully Reset Password</h1>";
        return redirect('Userlogin');
    }
}
