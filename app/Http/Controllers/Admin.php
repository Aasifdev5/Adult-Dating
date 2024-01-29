<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Http\helper;
use App\Mail\SendMailreset;
use App\Models\Ad;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CreditReload;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\PasswordReset;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\PostingAds;
use App\Models\Settings;
use App\Models\Task;
use App\Models\Transactions;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Dotenv\Dotenv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

function generateTimezoneList()
{
    $regions = [
        DateTimeZone::AFRICA,
        DateTimeZone::AMERICA,
        DateTimeZone::ANTARCTICA,
        DateTimeZone::ASIA,
        DateTimeZone::ATLANTIC,
        DateTimeZone::AUSTRALIA,
        DateTimeZone::EUROPE,
        DateTimeZone::INDIAN,
        DateTimeZone::PACIFIC,
    ];

    $timezones = [];

    foreach ($regions as $region) {
        $timezones = array_merge($timezones, DateTimeZone::listIdentifiers($region));
    }

    $timezoneOffsets = [];

    foreach ($timezones as $timezone) {
        $tz = new DateTimeZone($timezone);
        $timezoneOffsets[$timezone] = $tz->getOffset(new DateTime);
    }

    // Sort timezones by offset
    asort($timezoneOffsets);

    $timezoneList = [];

    foreach ($timezoneOffsets as $timezone => $offset) {
        $offsetPrefix = ($offset < 0) ? '-' : '+';
        $offsetFormatted = gmdate('H:i', abs($offset));

        $prettyOffset = "UTC${offsetPrefix}${offsetFormatted}";

        $timezoneList[$timezone] = "(${prettyOffset}) $timezone";
    }

    return $timezoneList;
}

function getCurrencySymbols($code)
{
    $currency_symbols = array(
        'AED' => '&#1583;.&#1573;', // ?
        'AFN' => '&#65;&#102;',
        'ALL' => '&#76;&#101;&#107;',
        'AMD' => '',
        'ANG' => '&#402;',
        'AOA' => '&#75;&#122;', // ?
        'ARS' => '&#36;',
        'AUD' => '&#36;',
        'AWG' => '&#402;',
        'AZN' => '&#1084;&#1072;&#1085;',
        'BAM' => '&#75;&#77;',
        'BBD' => '&#36;',
        'BDT' => '&#2547;', // ?
        'BGN' => '&#1083;&#1074;',
        'BHD' => '.&#1583;.&#1576;', // ?
        'BIF' => '&#70;&#66;&#117;', // ?
        'BMD' => '&#36;',
        'BND' => '&#36;',
        'BOB' => '&#36;&#98;',
        'BRL' => '&#82;&#36;',
        'BSD' => '&#36;',
        'BTN' => '&#78;&#117;&#46;', // ?
        'BWP' => '&#80;',
        'BYR' => '&#112;&#46;',
        'BZD' => '&#66;&#90;&#36;',
        'CAD' => '&#36;',
        'CDF' => '&#70;&#67;',
        'CHF' => '&#67;&#72;&#70;',
        'CLF' => '', // ?
        'CLP' => '&#36;',
        'CNY' => '&#165;',
        'COP' => '&#36;',
        'CRC' => '&#8353;',
        'CUP' => '&#8396;',
        'CVE' => '&#36;', // ?
        'CZK' => '&#75;&#269;',
        'DJF' => '&#70;&#100;&#106;', // ?
        'DKK' => '&#107;&#114;',
        'DOP' => '&#82;&#68;&#36;',
        'DZD' => '&#1583;&#1580;', // ?
        'EGP' => '&#163;',
        'ETB' => '&#66;&#114;',
        'EUR' => '&#8364;',
        'FJD' => '&#36;',
        'FKP' => '&#163;',
        'GBP' => '&#163;',
        'GEL' => '&#4314;', // ?
        'GHS' => '&#162;',
        'GIP' => '&#163;',
        'GMD' => '&#68;', // ?
        'GNF' => '&#70;&#71;', // ?
        'GTQ' => '&#81;',
        'GYD' => '&#36;',
        'HKD' => '&#36;',
        'HNL' => '&#76;',
        'HRK' => '&#107;&#110;',
        'HTG' => '&#71;', // ?
        'HUF' => '&#70;&#116;',
        'IDR' => '&#82;&#112;',
        'ILS' => '&#8362;',
        'INR' => '&#8377;',
        'IQD' => '&#1593;.&#1583;', // ?
        'IRR' => '&#65020;',
        'ISK' => '&#107;&#114;',
        'JEP' => '&#163;',
        'JMD' => '&#74;&#36;',
        'JOD' => '&#74;&#68;', // ?
        'JPY' => '&#165;',
        'KES' => '&#75;&#83;&#104;', // ?
        'KGS' => '&#1083;&#1074;',
        'KHR' => '&#6107;',
        'KMF' => '&#67;&#70;', // ?
        'KPW' => '&#8361;',
        'KRW' => '&#8361;',
        'KWD' => '&#1583;.&#1603;', // ?
        'KYD' => '&#36;',
        'KZT' => '&#1083;&#1074;',
        'LAK' => '&#8365;',
        'LBP' => '&#163;',
        'LKR' => '&#8360;',
        'LRD' => '&#36;',
        'LSL' => '&#76;', // ?
        'LTL' => '&#76;&#116;',
        'LVL' => '&#76;&#115;',
        'LYD' => '&#1604;.&#1583;', // ?
        'MAD' => '&#1583;.&#1605;.', //?
        'MDL' => '&#76;',
        'MGA' => '&#65;&#114;', // ?
        'MKD' => '&#1076;&#1077;&#1085;',
        'MMK' => '&#75;',
        'MNT' => '&#8366;',
        'MOP' => '&#77;&#79;&#80;&#36;', // ?
        'MRO' => '&#85;&#77;', // ?
        'MUR' => '&#8360;', // ?
        'MVR' => '.&#1923;', // ?
        'MWK' => '&#77;&#75;',
        'MXN' => '&#36;',
        'MYR' => '&#82;&#77;',
        'MZN' => '&#77;&#84;',
        'NAD' => '&#36;',
        'NGN' => '&#8358;',
        'NIO' => '&#67;&#36;',
        'NOK' => '&#107;&#114;',
        'NPR' => '&#8360;',
        'NZD' => '&#36;',
        'OMR' => '&#65020;',
        'PAB' => '&#66;&#47;&#46;',
        'PEN' => '&#83;&#47;&#46;',
        'PGK' => '&#75;', // ?
        'PHP' => '&#8369;',
        'PKR' => '&#8360;',
        'PLN' => '&#122;&#322;',
        'PYG' => '&#71;&#115;',
        'QAR' => '&#65020;',
        'RON' => '&#108;&#101;&#105;',
        'RSD' => '&#1044;&#1080;&#1085;&#46;',
        'RUB' => '&#1088;&#1091;&#1073;',
        'RWF' => '&#1585;.&#1587;',
        'SAR' => '&#65020;',
        'SBD' => '&#36;',
        'SCR' => '&#8360;',
        'SDG' => '&#163;', // ?
        'SEK' => '&#107;&#114;',
        'SGD' => '&#36;',
        'SHP' => '&#163;',
        'SLL' => '&#76;&#101;', // ?
        'SOS' => '&#83;',
        'SRD' => '&#36;',
        'STD' => '&#68;&#98;', // ?
        'SVC' => '&#36;',
        'SYP' => '&#163;',
        'SZL' => '&#76;', // ?
        'THB' => '&#3647;',
        'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
        'TMT' => '&#109;',
        'TND' => '&#1583;.&#1578;',
        'TOP' => '&#84;&#36;',
        'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
        'TTD' => '&#36;',
        'TWD' => '&#78;&#84;&#36;',
        'TZS' => '',
        'UAH' => '&#8372;',
        'UGX' => '&#85;&#83;&#104;',
        'USD' => '&#36;',
        'UYU' => '&#36;&#85;',
        'UZS' => '&#1083;&#1074;',
        'VEF' => '&#66;&#115;',
        'VND' => '&#8363;',
        'VUV' => '&#86;&#84;',
        'WST' => '&#87;&#83;&#36;',
        'XAF' => '&#70;&#67;&#70;&#65;',
        'XCD' => '&#36;',
        'XDR' => '',
        'XOF' => '',
        'XPF' => '&#70;',
        'YER' => '&#65020;',
        'ZAR' => '&#82;',
        'ZMK' => '&#90;&#75;', // ?
        'ZWL' => '&#90;&#36;',
    );

    $currency_html_code = $currency_symbols[$code];

    return $currency_html_code;
}
function getCurrencyList()
{
    // count 164
    $currency_list = array(
        "AFA" => "Afghan Afghani",
        "ALL" => "Albanian Lek",
        "DZD" => "Algerian Dinar",
        "AOA" => "Angolan Kwanza",
        "ARS" => "Argentine Peso",
        "AMD" => "Armenian Dram",
        "AWG" => "Aruban Florin",
        "AUD" => "Australian Dollar",
        "AZN" => "Azerbaijani Manat",
        "BSD" => "Bahamian Dollar",
        "BHD" => "Bahraini Dinar",
        "BDT" => "Bangladeshi Taka",
        "BBD" => "Barbadian Dollar",
        "BYR" => "Belarusian Ruble",
        "BEF" => "Belgian Franc",
        "BZD" => "Belize Dollar",
        "BMD" => "Bermudan Dollar",
        "BTN" => "Bhutanese Ngultrum",
        "BTC" => "Bitcoin",
        "BOB" => "Bolivian Boliviano",
        "BAM" => "Bosnia",
        "BWP" => "Botswanan Pula",
        "BRL" => "Brazilian Real",
        "GBP" => "British Pound Sterling",
        "BND" => "Brunei Dollar",
        "BGN" => "Bulgarian Lev",
        "BIF" => "Burundian Franc",
        "KHR" => "Cambodian Riel",
        "CAD" => "Canadian Dollar",
        "CVE" => "Cape Verdean Escudo",
        "KYD" => "Cayman Islands Dollar",
        "XOF" => "CFA Franc BCEAO",
        "XAF" => "CFA Franc BEAC",
        "XPF" => "CFP Franc",
        "CLP" => "Chilean Peso",
        "CNY" => "Chinese Yuan",
        "COP" => "Colombian Peso",
        "KMF" => "Comorian Franc",
        "CDF" => "Congolese Franc",
        "CRC" => "Costa Rican ColÃ³n",
        "HRK" => "Croatian Kuna",
        "CUC" => "Cuban Convertible Peso",
        "CZK" => "Czech Republic Koruna",
        "DKK" => "Danish Krone",
        "DJF" => "Djiboutian Franc",
        "DOP" => "Dominican Peso",
        "XCD" => "East Caribbean Dollar",
        "EGP" => "Egyptian Pound",
        "ERN" => "Eritrean Nakfa",
        "EEK" => "Estonian Kroon",
        "ETB" => "Ethiopian Birr",
        "EUR" => "Euro",
        "FKP" => "Falkland Islands Pound",
        "FJD" => "Fijian Dollar",
        "GMD" => "Gambian Dalasi",
        "GEL" => "Georgian Lari",
        "DEM" => "German Mark",
        "GHS" => "Ghanaian Cedi",
        "GIP" => "Gibraltar Pound",
        "GRD" => "Greek Drachma",
        "GTQ" => "Guatemalan Quetzal",
        "GNF" => "Guinean Franc",
        "GYD" => "Guyanaese Dollar",
        "HTG" => "Haitian Gourde",
        "HNL" => "Honduran Lempira",
        "HKD" => "Hong Kong Dollar",
        "HUF" => "Hungarian Forint",
        "ISK" => "Icelandic KrÃ³na",
        "INR" => "Indian Rupee",
        "IDR" => "Indonesian Rupiah",
        "IRR" => "Iranian Rial",
        "IQD" => "Iraqi Dinar",
        "ILS" => "Israeli New Sheqel",
        "ITL" => "Italian Lira",
        "JMD" => "Jamaican Dollar",
        "JPY" => "Japanese Yen",
        "JOD" => "Jordanian Dinar",
        "KZT" => "Kazakhstani Tenge",
        "KES" => "Kenyan Shilling",
        "KWD" => "Kuwaiti Dinar",
        "KGS" => "Kyrgystani Som",
        "LAK" => "Laotian Kip",
        "LVL" => "Latvian Lats",
        "LBP" => "Lebanese Pound",
        "LSL" => "Lesotho Loti",
        "LRD" => "Liberian Dollar",
        "LYD" => "Libyan Dinar",
        "LTL" => "Lithuanian Litas",
        "MOP" => "Macanese Pataca",
        "MKD" => "Macedonian Denar",
        "MGA" => "Malagasy Ariary",
        "MWK" => "Malawian Kwacha",
        "MYR" => "Malaysian Ringgit",
        "MVR" => "Maldivian Rufiyaa",
        "MRO" => "Mauritanian Ouguiya",
        "MUR" => "Mauritian Rupee",
        "MXN" => "Mexican Peso",
        "MDL" => "Moldovan Leu",
        "MNT" => "Mongolian Tugrik",
        "MAD" => "Moroccan Dirham",
        "MZM" => "Mozambican Metical",
        "MMK" => "Myanmar Kyat",
        "NAD" => "Namibian Dollar",
        "NPR" => "Nepalese Rupee",
        "ANG" => "Netherlands Antillean Guilder",
        "TWD" => "New Taiwan Dollar",
        "NZD" => "New Zealand Dollar",
        "NIO" => "Nicaraguan CÃ³rdoba",
        "NGN" => "Nigerian Naira",
        "KPW" => "North Korean Won",
        "NOK" => "Norwegian Krone",
        "OMR" => "Omani Rial",
        "PKR" => "Pakistani Rupee",
        "PAB" => "Panamanian Balboa",
        "PGK" => "Papua New Guinean Kina",
        "PYG" => "Paraguayan Guarani",
        "PEN" => "Peruvian Nuevo Sol",
        "PHP" => "Philippine Peso",
        "PLN" => "Polish Zloty",
        "QAR" => "Qatari Rial",
        "RON" => "Romanian Leu",
        "RUB" => "Russian Ruble",
        "RWF" => "Rwandan Franc",
        "SVC" => "Salvadoran ColÃ³n",
        "WST" => "Samoan Tala",
        "SAR" => "Saudi Riyal",
        "RSD" => "Serbian Dinar",
        "SCR" => "Seychellois Rupee",
        "SLL" => "Sierra Leonean Leone",
        "SGD" => "Singapore Dollar",
        "SKK" => "Slovak Koruna",
        "SBD" => "Solomon Islands Dollar",
        "SOS" => "Somali Shilling",
        "ZAR" => "South African Rand",
        "KRW" => "South Korean Won",
        "XDR" => "Special Drawing Rights",
        "LKR" => "Sri Lankan Rupee",
        "SHP" => "St. Helena Pound",
        "SDG" => "Sudanese Pound",
        "SRD" => "Surinamese Dollar",
        "SZL" => "Swazi Lilangeni",
        "SEK" => "Swedish Krona",
        "CHF" => "Swiss Franc",
        "SYP" => "Syrian Pound",
        "STD" => "São Tomé and Príncipe Dobra",
        "TJS" => "Tajikistani Somoni",
        "TZS" => "Tanzanian Shilling",
        "THB" => "Thai Baht",
        "TOP" => "Tongan pa'anga",
        "TTD" => "Trinidad & Tobago Dollar",
        "TND" => "Tunisian Dinar",
        "TRY" => "Turkish Lira",
        "TMT" => "Turkmenistani Manat",
        "UGX" => "Ugandan Shilling",
        "UAH" => "Ukrainian Hryvnia",
        "AED" => "United Arab Emirates Dirham",
        "UYU" => "Uruguayan Peso",
        "USD" => "US Dollar",
        "UZS" => "Uzbekistan Som",
        "VUV" => "Vanuatu Vatu",
        "VEF" => "Venezuelan BolÃvar",
        "VND" => "Vietnamese Dong",
        "YER" => "Yemeni Rial",
        "ZMK" => "Zambian Kwacha"
    );


    return $currency_list;
}
// Define the helper function outside of any class
function putPermanentEnv($key, $value)
{
    $path = app()->environmentFilePath();
    $escaped = preg_quote(env($key), '/');

    file_put_contents($path, preg_replace(
        "/^{$key}={$escaped}/m",
        "{$key}={$value}",
        file_get_contents($path)
    ));
}


class Admin extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }

    public function Delete_course(Request $request)
    {
        $category = Course::find($request->id);
        $category->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
    public function registration(Request $request)
    {
        $user = new User();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'pass' => 'required'
        ]);
        $user->name = $request->first_name;
        $user->lastname = $request->last_name;
        $user->email = $request->email;
        $user->password = FacadesHash::make($request->pass);
        $data = $user->save();
        if ($data) {
            return back()->with('success', 'Registered');
        } else {
            return back()->with('fail', 'failed');
        }
    }



    public function login(Request $request)
    {
        $user = new user();
        $request->validate([
            'email' => 'required',
            'pass' => 'required'

        ]);

        $data = user::where('email', $request->email)->where('is_super_admin', '1')->first();
        // print_r($data->password);

        // die;
        if ($data) {
            if (FacadesHash::check($request->pass, $data->password)) {

                $session = $request->session()->all();
                $data->update(['is_online' => 1, 'last_seen' => Carbon::now()]);
                session()->put('LoggedIn', $data->id);

                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not register');
        }
    }

    public function dashboard(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $total_sale = Payment::all();
            $total_earning = CreditReload::sum('amount');
            $ads =PostingAds::all();
            $usersData = DB::table("users")->where('is_super_admin', '0')->orderby('id', 'desc')->get();
            $total_users = User::where('is_super_admin', 0)
            ->whereNot('account_type', 'admin')
            ->get();

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $top_ad=Ad::all();
            return view('admin/dashboard', compact('user_session', 'total_users','top_ad','ads','usersData', 'total_sale', 'total_earning'));
        }
    }
    public function users(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $usersData = DB::table("users")->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/users', compact('user_session', 'usersData'));
        }
    }
    public function ads_list(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $ads =PostingAds::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/ads_list', compact('user_session', 'ads'));
        }
    }
    public function ads_destroy($id)
    {
        $promotion = PostingAds::find($id);
        $promotion->delete();


        // Optionally, you may want to return a response or redirect after the delete
        return redirect('admin/ads_list')->with('success', 'Deleted successfully');
    }
    public function country(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $countries = Country::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.country', compact('user_session', 'countries'));
        }
    }
    public function city(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $countries = City::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.city', compact('user_session', 'countries'));
        }
    }
    public function edit_user(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $userData = DB::table("users")->where('id', $id)->where('is_super_admin', '0')->first();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/edit_user', compact('user_session', 'userData'));
        }
    }
    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.change_password', compact('user_session'));
    }

    public function update_password(Request $request)
    {


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);


        $data = User::find(Session::get('LoggedIn'));
        // $data = User::where('id', '=', Session::get('LoggedIn'))->first();
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
        return redirect('admin/dashboard')->with('success', 'Successfully Updated');
    }
    public function lang_change(Request $request)
    {
        $data = array();

        if (Session::has('LoggedIn')) {
            $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        // Check if lang parameter is present and is a valid language code
        $availableLocales = config('app.locale');

        if ($request->has('lang')) {
            App::setLocale($request->lang);
            session()->put('lang_code', $request->lang);
        }

        return redirect()->back();
    }


    public function profile(Request $request)
    {
        $data = array();
        if (Session::has('LoggedIn')) {
            $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.profile', compact('data'));
    }

    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {

            $check = User::where('id', Session::get('LoggedIn'))->first();
            if($check->is_super_admin==0){
                Session::forget('LoggedIn');
                $request->session()->invalidate();
                return redirect('/');
            }
            Session::forget('LoggedIn');
            $request->session()->invalidate();
            return redirect('admin/login');
        }
    }
    public function add_user()
    {
        if (Session::has('LoggedIn')) {


            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_user', compact('user_session'));
        }
    }
    public function save_user(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        }



        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'country' => ($request->country),
            'profile_photo' => $_FILES['profile_photo']['name'],
            'status' => $request->status,
            'ip_address' => request()->ip(),
        ]);

        // Send email verification notification
        $user->notify(new VerifyEmailNotification($user));


        if ($user) {
            return redirect('users')->with('success', 'User Add Successfully');
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function delete_user($id)
    {

        $user = User::where('id', '=', $id)->first();

        if ($user) {
            $user->delete();
            return back()->with('success', 'Deleted Successfully');
        } else {
            return back()->with('error', 'User not found');
        }
    }
    public function add_transaction()
    {
        if (Session::has('LoggedIn')) {
            $course = Course::all();
            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_transaction', compact('user_session', 'course', 'users'));
        }
    }
    public function save_transaction(Request $request)
    {
        $Transaction = new Transactions();
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        $Transaction->user_id = $request->user_id;
        $Transaction->product_id = $request->product_id;
        $Transaction->payment_amount = $request->amount;
        $Transaction->date = Date($request->date);
        $Transaction->status = $request->status;
        $data = $Transaction->save();
        if ($data) {
            return back()->with('success', 'Transaction Add Successfully');
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function edit_transaction($id)
    {
        if (Session::has('LoggedIn')) {
            $course = Course::all();
            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $transaction = Transactions::find($id);
            return view('admin.edit_transaction', compact('user_session', 'course', 'users', 'transaction'));
        }
    }
    public function update_transaction(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',

        ]);


        $Transaction = Transactions::where('id', '=', $request->id)->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'payment_amount' => $request->amount,
            'date' => Date($request->date),
            'status' => $request->status,
        ]);
        if ($Transaction) {
            return redirect('admin/transactions')->with('success', 'Transaction Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function delete_transaction($id)
    {
        $transaction = Transactions::find($id);
        $transaction->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
    public function orders()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $orders = Order::all();


            return view('admin.orders', compact('user_session', 'orders'));
        }
    }

    public function add_order()
    {
        if (Session::has('LoggedIn')) {
            $course = Course::all();
            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_order', compact('user_session', 'course', 'users'));
        }
    }
    public function save_order(Request $request)
    {
        $Order = new Order();
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
            'due_on' => 'required',
            'order_date' => 'required',
            'duration' => 'required',
            'status' => 'required'
        ]);
        $Order->user_id = $request->user_id;
        $Order->product_id = $request->product_id;
        $Order->payment_amount = $request->amount;
        $Order->order_date = Date($request->order_date);
        $Order->due_on = Date($request->due_on);
        $Order->duration = $request->duration;
        $Order->status = $request->status;
        $data = $Order->save();
        if ($data) {
            return back()->with('success', 'Order Add Successfully');
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function edit_order($id)
    {
        if (Session::has('LoggedIn')) {
            $course = Course::all();
            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $order = Order::find($id);
            return view('admin.edit_order', compact('user_session', 'course', 'users', 'order'));
        }
    }
    public function update_order(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',

        ]);

        if ($request->status == "completed") {
            $task = Task::where('order_id', '=', $request->id)->update([

                'status' => $request->status,
                'progress' => 0
            ]);
        }
        $Order = Order::where('id', '=', $request->id)->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'payment_amount' => $request->amount,
            'order_date' => Date($request->order_date),
            'due_on' => Date($request->due_on),
            'duration' => $request->duration,
            'status' => $request->status,

        ]);
        if ($Order) {
            return redirect('admin/orders')->with('success', 'Order Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function delete_order($id)
    {
        $Order = Order::find($id);
        $Order->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
    public function tasks()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $task = Task::where('status', 'progress')->get();


            return view('admin.tasks', compact('user_session', 'task'));
        }
    }

    public function add_task()
    {
        if (Session::has('LoggedIn')) {
            $order = Order::where('status', 'progress')->get();
            $users = User::where('status', '1')->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_task', compact('user_session', 'order', 'users'));
        }
    }
    public function save_task(Request $request)
    {
        $Task = new Task();
        $request->validate([

            'order_id' => 'required',
            'progress' => 'required'
        ]);
        $Order_detais = Order::find($request->order_id);
        $Task->user_id = $Order_detais->user_id;
        $Task->product_id = $Order_detais->product_id;
        $Task->payment_amount = $Order_detais->payment_amount;
        $Task->order_date = Date($Order_detais->order_date);
        $Task->due_on = Date($Order_detais->due_on);
        $Task->status = $Order_detais->status;
        $Task->progress = $request->progress;
        $Task->order_id = $request->order_id;
        $data = $Task->save();
        if ($data) {
            return back()->with('success', 'Task Add Successfully');
        } else {
            return back()->with('fail', 'failed');
        }
    }
    public function edit_task($id)
    {
        if (Session::has('LoggedIn')) {

            $order = Order::where('status', 'progress')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $task = Task::find($id);
            return view('admin.edit_task', compact('user_session', 'order', 'task'));
        }
    }
    public function update_task(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'progress' => 'required',

        ]);


        $Task = Task::where('id', '=', $request->id)->update([

            'progress' => $request->progress,
            'order_id' => $request->order_id
        ]);
        if ($Task) {
            return redirect('admin/tasks')->with('success', 'Task Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function delete_task($id)
    {
        $Task = Task::find($id);
        $Task->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }

    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.edit_profile', compact('user_session'));
        }
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required',

            'country' => 'required',

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
        $data = User::find(Session::get('LoggedIn'));
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),
            'country' => ($request->country),
            'email' => ($request->email),
            'profile_photo' => $profile,

        ]);
        if ($data) {
            return redirect('admin/dashboard')->with('success', 'Profile Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function update_user(Request $request)
    {
        $request->validate([

            'country' => 'required',

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
        $data = User::find(Session::get('LoggedIn'));
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),
            'country' => ($request->country),
            'email' => ($request->email),
            'profile_photo' => $profile,
            'status' => $request->status

        ]);
        if ($data) {
            return redirect('admin/users')->with('success', 'User Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }
    public function forget_password()
    {

        return view('admin.forget_password');
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
                $data['auth'] = "Endless";

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
                return redirect('admin/forget_password')->with('success', 'Please check your mail to reset your password');
                // return response()->json(['success' => true, 'msg' => 'Please check your mail to reset your password.']);
            } else {
                return redirect('admin/forget_password')->with('fail', 'User not found');
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

            return view('admin.ResetPasswordLoad', ['customer' => $customer]);
        }
    }



    public function ResetPassword(Request $request)
    {

        $request->validate([

            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);

        $data = User::find($request->user_id);
        if (FacadesHash::check($request->new_password, $data->password)) {
            return back()->with("fail", "Please enter a password which is not similar then current password!!");
        }
        $data->password = FacadesHash::make($request->new_password);
        $data->update();

        PasswordReset::where('email', $data->email)->delete();

        echo "<h1>Successfully Reset Password</h1>";
        return redirect('index');
    }

    public function add_category()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_category', compact('user_session'));
        }
    }
    public function save_category(Request $request)
    {
        $category = new CourseCategory();
        $request->validate([
            'category_name' => 'required'
        ]);
        $category->category_name = $request->category_name;
        $data = $category->save();
        if ($data) {
            return back()->with('success', 'Category Added Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function add_course()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_course', compact('user_session'));
        }
    }
    public function Delete_Category(Request $request)
    {
        $category = CourseCategory::find($request->id);
        $category->delete();

        return back()->with('success', 'Deleted Succesuufully');
    }
    public function categories()
    {
        if (Session::has('LoggedIn')) {
            $categories = CourseCategory::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.categories', compact('user_session', 'categories'));
        }
    }

    public function edit_category(Request $request)
    {

        if (Session::has('LoggedIn')) {

            $categories = CourseCategory::where('id', $request->id)->first();
            // print_r($categories);
            // die;
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }
        return view('admin.edit_category', compact('user_session', 'categories'));
    }

    public function update_catagory(Request $request)
    {
        echo $request->id;
        $request->validate([
            'category_name' => 'required',
        ]);
        $data = CourseCategory::find($request->id);
        $data->category_name = $request->category_name;
        $update = $data->update();
        if ($update) {
            return back()->with('success', 'Category Updated Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
        return redirect('categories');
    }
    public function Add_Course_list()
    {
        if (Session::has('LoggedIn')) {
            $category = CourseCategory::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.Add_Course_list', compact('user_session', 'category'));
        }
    }


    public function Course_list() //dispaly course list
    {
        if (Session::has('LoggedIn')) {
            $courses = Course::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.Course_list', compact('user_session', 'courses'));
        }
    }
    public function save_course(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'category_icon' => 'required',
            'product_photo' => 'required',

            'description' => 'required',

        ]);
        $course = new Course();

        if (!empty($request->product_photo)) {

            $image = $request->file('product_photo')->getClientOriginalName();
            $request->product_photo->move(public_path('product_photo'), $image);
        }


        $course->category_id = $request->category_id;
        $course->category_icon = $request->category_icon;
        $course->course_photo = $_FILES['product_photo']['name'];

        $course->description = $request->description;

        $data = $course->save();
        if ($data) {
            return redirect('admin/Course_list')->with('success', 'Category Added Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit_courses(Request $request)
    {

        if (Session::has('LoggedIn')) {

            $course_detail = Course::where('id', $request->id)->first();
            $category = CourseCategory::all();

            $user_session = User::where('id', Session::get('LoggedIn'))->first();
        }
        return view('admin.edit_courses', compact('user_session', 'course_detail', 'category'));
    }

    public function update_course(Request $request)
    {

        $request->validate([
            'category_id' => 'required',

        ]);
        $data = Course::find($request->id);
        if (!empty($request->product_photo)) {

            $image = $request->file('product_photo')->getClientOriginalName();
            $final =  $request->product_photo->move(public_path('product_photo'), $image);
        }

        $check = Course::find($request->id);

        if (empty($request->product_photo)) {

            $profile = $check->course_photo;
        } else {
            $profile = $_FILES['product_photo']['name'];
        }
        $data->category_id = $request->category_id;
        $data->category_icon = $request->category_icon;
        $data->course_photo = $profile;

        $data->description = $request->description;

        $update = $data->update();
        if ($update) {
            return redirect('admin/Course_list')->with('success', 'Category Updated Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function smtp_setting()
    {

        if (Session::has('LoggedIn')) {
            $settings = GeneralSetting::findOrFail('1');
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.smtp_setting', compact('user_session', 'settings'));
    }



    public function update_smtp_setting(Request $request)
    {
        $settings = GeneralSetting::findOrFail('1');
        $inputs = $request->all();

        // Load the existing .env file
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();

        // Update the environment variables
        putPermanentEnv('MAIL_HOST', $inputs['smtp_host']);
        putPermanentEnv('MAIL_PORT', $inputs['smtp_port']);
        putPermanentEnv('MAIL_USERNAME', $inputs['smtp_email']);
        putPermanentEnv('MAIL_PASSWORD', $inputs['smtp_password']);
        putPermanentEnv('MAIL_ENCRYPTION', $inputs['smtp_encryption']);
        putPermanentEnv('MAIL_FROM_ADDRESS', $inputs['smtp_email']);



        // Update the settings in the database
        $settings->smtp_host = $inputs['smtp_host'];
        $settings->smtp_port = $inputs['smtp_port'];
        $settings->smtp_email = $inputs['smtp_email'];
        $settings->smtp_password = $inputs['smtp_password'];
        $settings->smtp_encryption = $inputs['smtp_encryption'];

        $data = $settings->save();

        return back()->with('success', 'Updated Successfully');
    }




    public function webSite_setting()
    {
        if (Session::has('LoggedIn')) {
            $time = generateTimezoneList();
            $currency = getCurrencyList();

            $settings = GeneralSetting::findOrFail('1');


            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.website_setting', compact('user_session', 'settings', 'time', 'currency'));
    }
    public function update_general_settings(Request $request)
    {
        $settings = GeneralSetting::findOrFail(1);

        // Load the existing .env file
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();

        $inputs = $request->all();

        putPermanentEnv('APP_TIMEZONE', $inputs['time_zone']);
        putPermanentEnv('APP_LANG', $inputs['default_language']);

        $settings->time_zone = $inputs['time_zone'];
        $settings->default_language = $inputs['default_language'];
        $settings->styling = $inputs['styling'];
        $settings->currency_code = $inputs['currency_code'];

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo')->getClientOriginalName();
            $request->file('site_logo')->move(public_path('site_logo'), $image);
            $settings->site_logo = $image;
        }

        if ($request->hasFile('site_favicon')) {
            $image = $request->file('site_favicon')->getClientOriginalName();
            $request->file('site_favicon')->move(public_path('site_favicon'), $image);
            $settings->site_favicon = $image;
        }

        $settings->site_name = addslashes($inputs['site_name']);
        $settings->site_email = $inputs['site_email'];
        $settings->site_description = addslashes($inputs['site_description']);
        $settings->site_keywords = addslashes($inputs['site_keywords']);
        $settings->site_copyright = addslashes($inputs['site_copyright']);

        $settings->footer_fb_link = addslashes($inputs['footer_fb_link']);
        $settings->footer_twitter_link = addslashes($inputs['footer_twitter_link']);
        $settings->footer_instagram_link = addslashes($inputs['footer_instagram_link']);

        $data = $settings->save();

        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function social_lite_login()
    {
        if (Session::has('LoggedIn')) {
            $settings = GeneralSetting::findOrFail('1');

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.social_lite_login', compact('user_session', 'settings'));
        }
    }
    public function update_social_login_settings(Request $request)
    {

        $settings = GeneralSetting::findOrFail('1');
        $inputs = $request->all();
        // Load the existing .env file
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();
        $google_redirect = URL::to('auth/google/callback');
        $facebook_redirect = URL::to('auth/facebook/callback');
        $git_redirect = URL::to('auth/git/callback');
        $insta_redirect = URL::to('auth/instagram/callback');
        $lindin_redirect = URL::to('auth/lindin/callback');
        $twitter_redirect = URL::to('auth/twitter/callback');

        putPermanentEnv('GOOGLE_CLIENT_DI', $inputs['google_client_id']);
        putPermanentEnv('GOOGLE_SECRET', $inputs['google_secret_id']);
        putPermanentEnv('GOOGLE_REDIRECT', $google_redirect);

        putPermanentEnv('FB_APP_ID', $inputs['Facebook_app_id']);
        putPermanentEnv('FB_SECRET', $inputs['Facebook_client_id']);
        putPermanentEnv('FB_REDIRECT', $facebook_redirect);

        putPermanentEnv('GIT_CLIENT_DI', $inputs['git_app_id']);
        putPermanentEnv('GIT_SECRET', $inputs['git_client_id']);
        putPermanentEnv('GIT_REDIRECT', $google_redirect);

        putPermanentEnv('INSTAGRAM_APP_ID', $inputs['instagram_app_id']);
        putPermanentEnv('INSTAGRAM_SECRET', $inputs['Instagram_client_id']);
        putPermanentEnv('INSTAGRAM_REDIRECT', $facebook_redirect);

        putPermanentEnv('LINKEDIN_CLIENT_DI', $inputs['linkedin_app_id']);
        putPermanentEnv('LINKEDIN_SECRET', $inputs['linkedin_client_id']);
        putPermanentEnv('LINKEDIN_REDIRECT', $facebook_redirect);

        putPermanentEnv('TWITTER_APP_ID', $inputs['twitter_app_id']);
        putPermanentEnv('TWITTER_SECRET', $inputs['twitter_client_id']);
        putPermanentEnv('TWITTER_REDIRECT', $facebook_redirect);


        $settings->google_login = $inputs['google_login'];
        $settings->google_client_id = $inputs['google_client_id'];
        $settings->google_client_secret = $inputs['google_secret_id'];
        $settings->google_redirect = $google_redirect;

        $settings->facebook_login = $inputs['Facebook_login'];
        $settings->facebook_app_id = $inputs['Facebook_app_id'];
        $settings->facebook_client_secret = $inputs['Facebook_client_id'];
        $settings->facebook_redirect = $facebook_redirect;


        $settings->git_login = $inputs['git_login'];
        $settings->git_app_id = $inputs['git_app_id'];
        $settings->git_client_id = $inputs['git_client_id'];
        $settings->google_redirect = $git_redirect;

        $settings->Instagram_login = $inputs['Instagram_login'];
        $settings->instagram_app_id = $inputs['instagram_app_id'];
        $settings->Instagram_client_id = $inputs['Instagram_client_id'];
        $settings->facebook_redirect = $insta_redirect;

        $settings->linkedin_login = $inputs['linkedin_login'];
        $settings->linkedin_app_id = $inputs['linkedin_app_id'];
        $settings->linkedin_client_id = $inputs['linkedin_client_id'];
        $settings->facebook_redirect = $lindin_redirect;


        $settings->twitter_login = $inputs['twitter_login'];
        $settings->twitter_app_id = $inputs['twitter_app_id'];
        $settings->twitter_client_id  = $inputs['twitter_client_id'];
        $settings->facebook_redirect = $twitter_redirect;

        $data = $settings->save();

        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function list()
    {
        if (Session::has('LoggedIn')) {
            $page_title = trans('payment_gateway');

            $list = PaymentGateway::orderBy('id')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.payment_gateway_list', compact('user_session', 'page_title', 'list'));
        }
    }

    public function edit(Request $request, $id)
    {

        if (Session::has('LoggedIn')) {
            $post_info = PaymentGateway::findOrFail($id);

            $gateway_info = json_decode($post_info->gateway_info);
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            //echo $gateway_info->mode;
            // exit;

            if ($id == 1) {
                $page_title = 'PayPal';

                return view('admin.pages.gateway.paypal', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 2) {
                $page_title = 'Stripe';

                return view('admin.pages.gateway.stripe', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 3) {
                $page_title = 'Razorpay';

                return view('admin.pages.gateway.razorpay', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 4) {
                $page_title = 'Paystack';

                return view('admin.pages.gateway.paystack', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 5) {
                $page_title = 'Instamojo';

                return view('admin.pages.gateway.instamojo', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 6) {
                $page_title = 'PayUMoney';

                return view('admin.pages.gateway.payu', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 7) {
                $page_title = 'mollie';

                return view('admin.pages.gateway.mollie', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 8) {
                $page_title = 'Flutterwave';

                return view('admin.pages.gateway.flutterwave', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 9) {
                $page_title = 'Paytm';

                return view('admin.pages.gateway.paytm', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            } else if ($id == 10) {
                $page_title = 'Cashfree';

                return view('admin.pages.gateway.cashfree', compact('page_title', 'post_info', 'gateway_info', 'user_session'));
            }
        }
    }

    public function paypal(Request $request)
    {



        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        putPermanentEnv('PAYPAL_MODE', $inputs['mode']);

        if ($inputs['mode'] == "sandbox") {
            putPermanentEnv('PAYPAL_SANDBOX_CLIENT_ID', $inputs['paypal_client_id']);
            putPermanentEnv('PAYPAL_SANDBOX_CLIENT_SECRET', $inputs['paypal_secret']);
        } else {
            putPermanentEnv('PAYPAL_LIVE_CLIENT_ID', $inputs['paypal_client_id']);
            putPermanentEnv('PAYPAL_LIVE_CLIENT_SECRET', $inputs['paypal_secret']);
        }

        $mode = $inputs['mode'];
        $paypal_client_id = $inputs['paypal_client_id'];
        $paypal_secret = $inputs['paypal_secret'];

        $braintree_merchant_id = $inputs['braintree_merchant_id'];
        $braintree_public_key = $inputs['braintree_public_key'];
        $braintree_private_key = $inputs['braintree_private_key'];
        $braintree_merchant_account_id = $inputs['braintree_merchant_account_id'];

        $gateway_data = json_encode(['mode' => $mode, 'paypal_client_id' => $paypal_client_id, 'paypal_secret' => $paypal_secret, 'braintree_merchant_id' => $braintree_merchant_id, 'braintree_public_key' => $braintree_public_key, 'braintree_private_key' => $braintree_private_key, 'braintree_merchant_account_id' => $braintree_merchant_account_id]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();

        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function stripe(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        putPermanentEnv('STRIPE_PUBLISHABLE_KEY', $inputs['stripe_publishable_key']);
        putPermanentEnv('STRIPE_SECRET_KEY', $inputs['stripe_secret_key']);

        $stripe_secret_key = $inputs['stripe_secret_key'];
        $stripe_publishable_key = $inputs['stripe_publishable_key'];

        $gateway_data = json_encode(['stripe_secret_key' => $stripe_secret_key, 'stripe_publishable_key' => $stripe_publishable_key]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function razorpay(Request $request)
    {


        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $razorpay_key = $inputs['razorpay_key'];
        $razorpay_secret = $inputs['razorpay_secret'];

        putPermanentEnv('RAZORPAY_KEY', $inputs['razorpay_key']);
        putPermanentEnv('RAZORPAY_SECRET', $inputs['razorpay_secret']);


        $gateway_data = json_encode(['razorpay_key' => $razorpay_key, 'razorpay_secret' => $razorpay_secret]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];;

        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function paystack(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $paystack_secret_key = $inputs['paystack_secret_key'];
        $paystack_public_key = $inputs['paystack_public_key'];

        putPermanentEnv('PAYSTACK_PUBLIC_KEY', $inputs['paystack_public_key']);
        putPermanentEnv('PAYSTACK_SECRET_KEY', $inputs['paystack_secret_key']);


        $gateway_data = json_encode(['paystack_secret_key' => $paystack_secret_key, 'paystack_public_key' => $paystack_public_key]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function instamojo(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $mode = $inputs['mode'];
        $instamojo_client_id = $inputs['instamojo_client_id'];
        $instamojo_client_secret = $inputs['instamojo_client_secret'];

        putPermanentEnv('MODE', $inputs['mode']);

        if ($inputs['mode'] == "sandbox") {
            putPermanentEnv('INSTAMOJO_CLIENT_ID', $inputs['instamojo_client_id']);
            putPermanentEnv('INSTAMOJO_CLIENT_SECRET', $inputs['instamojo_client_secret']);
        } else {
            putPermanentEnv('INSTAMOJO_CLIENT_ID', $inputs['instamojo_client_id']);
            putPermanentEnv('INSTAMOJO_CLIENT_SECRET', $inputs['instamojo_client_secret']);
        }

        $gateway_data = json_encode(['mode' => $mode, 'instamojo_client_id' => $instamojo_client_id, 'instamojo_client_secret' => $instamojo_client_secret]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function payu(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $mode = $inputs['mode'];
        $payu_merchant_id = $inputs['payu_merchant_id'];
        $payu_key = $inputs['payu_key'];
        $payu_salt = $inputs['payu_salt'];


        putPermanentEnv('MODE', $inputs['mode']);

        if ($inputs['mode'] == "sandbox") {
            putPermanentEnv('PAYU_MERCHANT_ID', $inputs['payu_merchant_id']);
            putPermanentEnv('PAYU_KEY', $inputs['payu_key']);
            putPermanentEnv('PAYU_SALT', $inputs['payu_salt']);
        } else {
            putPermanentEnv('PAYU_MERCHANT_ID', $inputs['payu_merchant_id']);
            putPermanentEnv('PAYU_KEY', $inputs['payu_key']);
            putPermanentEnv('PAYU_SALT', $inputs['payu_salt']);
        }

        $gateway_data = json_encode(['mode' => $mode, 'payu_merchant_id' => $payu_merchant_id, 'payu_key' => $payu_key, 'payu_salt' => $payu_salt]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function mollie(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $mollie_api_key = $inputs['mollie_api_key'];

        $gateway_data = json_encode(['mollie_api_key' => $mollie_api_key]);



        putPermanentEnv('MOLLIE_API_KEY', $inputs['mollie_api_key']);
        putPermanentEnv('GATEWAY_DATA', $gateway_data);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function flutterwave(Request $request)
    {


        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $flutterwave_public_key = $inputs['flutterwave_public_key'];
        $flutterwave_secret_key = $inputs['flutterwave_secret_key'];
        $flutterwave_encryption_key = $inputs['flutterwave_encryption_key'];

        putPermanentEnv('FLUTTERWAVE_PUBLIC_KEY', $inputs['flutterwave_public_key']);
        putPermanentEnv('FLUTTERWAVE_SECRET_KEY', $inputs['flutterwave_secret_key']);
        putPermanentEnv('FLUTTERWAVE_ENCRYPTION_KEY', $inputs['flutterwave_encryption_key']);


        $gateway_data = json_encode(['flutterwave_public_key' => $flutterwave_public_key, 'flutterwave_secret_key' => $flutterwave_secret_key, 'flutterwave_encryption_key' => $flutterwave_encryption_key]);

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $ad_obj->save();


        return redirect('payment_gateway');
    }

    public function paytm(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

        $mode = $inputs['mode'];
        $paytm_merchant_id = $inputs['paytm_merchant_id'];
        $paytm_merchant_key = $inputs['paytm_merchant_key'];

        $gateway_data = json_encode(['mode' => $mode, 'paytm_merchant_id' => $paytm_merchant_id, 'paytm_merchant_key' => $paytm_merchant_key]);
        putPermanentEnv('MODE', $inputs['mode']);

        if ($inputs['mode'] == "sandbox") {
            putPermanentEnv('PAYTM_MERCHANT_ID', $inputs['paytm_merchant_id']);
            putPermanentEnv('PAYTM_MERCHANT_KEY', $inputs['paytm_merchant_key']);
        } else {
            putPermanentEnv('PAYTM_MERCHANT_ID', $inputs['paytm_merchant_id']);
            putPermanentEnv('PAYTM_MERCHANT_KEY', $inputs['paytm_merchant_key']);
        }
        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function cashfree(Request $request)
    {

        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);


        $mode = $inputs['mode'];
        $cashfree_appid = $inputs['cashfree_appid'];
        $cashfree_secret_key = $inputs['cashfree_secret_key'];

        $gateway_data = json_encode(['mode' => $mode, 'cashfree_appid' => $cashfree_appid, 'cashfree_secret_key' => $cashfree_secret_key]);
        putPermanentEnv('MODE', $inputs['mode']);

        if ($inputs['mode'] == "sandbox") {
            putPermanentEnv('CASHFREE_APPID', $inputs['cashfree_appid']);
            putPermanentEnv('CASHFREE_SECRET_KEY', $inputs['cashfree_secret_key']);
        } else {
            putPermanentEnv('CASHFREE_APPID', $inputs['cashfree_appid']);
            putPermanentEnv('CASHFREE_SECRET_KEY', $inputs['cashfree_secret_key']);
        }

        $ad_obj->gateway_name = addslashes($inputs['gateway_name']);
        $ad_obj->gateway_info = $gateway_data;

        $ad_obj->status = $inputs['status'];
        $data =  $ad_obj->save();
        if ($data) {
            return back()->with('success', 'Updated Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }


    public function transactions_list()
    {

        if (Session::has('LoggedIn')) {

            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            $page_title = trans('transactions');

            if (isset($_GET['s'])) {
                $keyword = $_GET['s'];
                $transactions_list = Transactions::where("payment_id", "LIKE", "%$keyword%")->orwhere("email", "LIKE", "%$keyword%")->orderBy('id', 'DESC')->paginate(10);

                $transactions_list->appends(Request::only('s'))->links();
            } else if (isset($_GET['gateway'])) {
                $gateway = $_GET['gateway'];
                $transactions_list = Transactions::where("gateway", "=", $gateway)->orderBy('id', 'DESC')->paginate(10);

                $transactions_list->appends(Request::only('gateway'))->links();
            } else if (isset($_GET['date'])) {
                $date_1 = date($_GET['date'] . ' 00:00:00');
                $date_com1 = strtotime($date_1);

                $date_2 = date($_GET['date'] . ' 23:59:59');
                $date_com2 = strtotime($date_2);

                $transactions_list = Transactions::whereBetween('date', [$date_com1, $date_com2])->orderBy('id', 'DESC')->paginate(10);

                $transactions_list->appends(Request::only('date'))->links();
            } else {
                $transactions_list = Transactions::orderBy('id', 'DESC')->paginate(10);
            }

            $gateway_list = PaymentGateway::orderBy('id')->get();

            return view('admin.pages.transactions_list', compact('page_title', 'user_session', 'transactions_list', 'gateway_list'));
        }
    }

    public function transactions_report(Request $request)
    {

        if (Session::has('LoggedIn')) {

            $transaction = Payment::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.transaction_report', compact('user_session', 'transaction'));
        }
    }
}
