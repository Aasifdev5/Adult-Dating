<?php

use App\Http\Controllers\API;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontCMSController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\EmailAppController;
use App\Http\Controllers\MailTemplateController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Languages;
use App\Http\Controllers\LanguageTranslationController;
use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\PaypalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/forget_password', [UserController::class, 'forget_password'])->name('forget_password');

Route::post('/forget_mail', [UserController::class, 'forget_mail'])->name('forget_mail');
Route::post('/sendResetPasswordLink', [UserController::class, 'sendResetPasswordLink'])->name('sendResetPasswordLink');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/ResetPasswordLoad', [UserController::class, 'ResetPasswordLoad'])->name('ResetPasswordLoad');
Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->name('ResetPassword');



Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/index', [UserController::class, 'index'])->name('index')->middleware('alreadyLoggedIn');
    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('alreadyLoggedIn');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');

    Route::get('/ad_photo', [UserController::class, 'ad_photo'])->name('ad_photo')->middleware('isLoggedIn');
    Route::post('/post-insert', [UserController::class, 'Ad_insert'])->name('Ad_insert')->middleware('isLoggedIn');
    Route::get('/Billing', [UserController::class, 'Billing'])->name('Billing')->middleware('isLoggedIn');
    Route::get('/visibity', [UserController::class, 'visibity'])->name('visibity')->middleware('isLoggedIn');
    Route::post('/post-insert-images', [UserController::class, 'ads_photos_upload'])->name('ads_photos_upload')->middleware('isLoggedIn');
    Route::post('/update_password', [UserController::class, 'update_password'])->name('update_password')->middleware('isLoggedIn');
    Route::post('/deactivateAccount', [UserController::class, 'deactivateAccount'])->name('deactivateAccount')->middleware('isLoggedIn');

    Route::get('/Payment', [UserController::class, 'Payment'])->name('Payment')->middleware('isLoggedIn');
    Route::get('/finish', [UserController::class, 'finish'])->name('finish')->middleware('isLoggedIn');
    Route::get('/Machine', [UserController::class, 'Machine'])->name('Machine')->middleware('isLoggedIn');
    Route::get('/PurchaseTime/{id}', [UserController::class, 'PurchaseTime'])->name('PurchaseTime')->middleware('isLoggedIn');
    Route::get('/Hybrid', [UserController::class, 'Hybrid'])->name('Hybrid')->middleware('isLoggedIn');
    Route::get('/TimeSeries', [UserController::class, 'TimeSeries'])->name('TimeSeries')->middleware('isLoggedIn');
    Route::get('/PurchaseHybrid/{id}', [UserController::class, 'PurchaseHybrid'])->name('PurchaseHybrid')->middleware('isLoggedIn');
    Route::get('/PurchaseDeep/{id}', [UserController::class, 'PurchaseDeep'])->name('PurchaseDeep')->middleware('isLoggedIn');
    Route::get('/PurchaseMachine/{id}', [UserController::class, 'PurchaseMachine'])->name('PurchaseMachine')->middleware('isLoggedIn');
    Route::get('/ContinuePremium', [UserController::class, 'ContinuePremium'])->name('ContinuePremium')->middleware('isLoggedIn');
    Route::get('/ContinueStandard', [UserController::class, 'ContinueStandard'])->name('ContinueStandard')->middleware('isLoggedIn');
    Route::get('/ContinueBasic', [UserController::class, 'ContinueBasic'])->name('ContinueBasic')->middleware('isLoggedIn');
    Route::get('/DataAnalysis', [UserController::class, 'DataAnalysis'])->name('DataAnalysis')->middleware('isLoggedIn');
    Route::get('/DataVisualization', [UserController::class, 'DataVisualization'])->name('DataVisualization')->middleware('isLoggedIn');
    Route::get('/DiseasesPrediction', [UserController::class, 'DiseasesPrediction'])->name('DiseasesPrediction')->middleware('isLoggedIn');
    Route::get('/ExcelVisualization', [UserController::class, 'ExcelVisualization'])->name('ExcelVisualization')->middleware('isLoggedIn');
    Route::get('/PowerBi', [UserController::class, 'PowerBi'])->name('PowerBi')->middleware('isLoggedIn');
    Route::get('/Data_science_ai', [UserController::class, 'Data_science_ai'])->name('Data_science_ai')->middleware('isLoggedIn');

    Route::get('/PurchaseDiseases/{id}', [UserController::class, 'PurchaseDiseases'])->name('PurchaseDiseases')->middleware('isLoggedIn');
    Route::get('/PurchaseDeepProject', [UserController::class, 'PurchaseDeepProject'])->name('PurchaseDeepProject')->middleware('isLoggedIn');
    Route::get('/PurchasePowerbi/{id}', [UserController::class, 'PurchasePowerbi'])->name('PurchasePowerbi')->middleware('isLoggedIn');
    Route::get('/PurchaseProject/{id}', [UserController::class, 'PurchaseProject'])->name('PurchaseProject')->middleware('isLoggedIn');
    Route::get('/PurchaseExcel/{id}', [UserController::class, 'PurchaseExcel'])->name('PurchaseExcel')->middleware('isLoggedIn');
    Route::get('/PurchaseAnalysis/{id}', [UserController::class, 'PurchaseAnalysis'])->name('PurchaseAnalysis')->middleware('isLoggedIn');
    Route::get('/Orders', [UserController::class, 'Orders'])->name('Orders')->middleware('isLoggedIn');
    Route::get('/ActivityOrder', [UserController::class, 'ActivityOrder'])->name('ActivityOrder')->middleware('isLoggedIn');
    Route::get('/CompletedOrders', [UserController::class, 'CompletedOrders'])->name('CompletedOrders')->middleware('isLoggedIn');
    Route::get('/CancelledOrders', [UserController::class, 'CancelledOrders'])->name('CancelledOrders')->middleware('isLoggedIn');
    Route::get('/Activity', [UserController::class, 'Activity'])->name('Activity')->middleware('isLoggedIn');
    Route::get('/ads', [UserController::class, 'ads'])->name('ads')->middleware('isLoggedIn');
    Route::get('/Details', [UserController::class, 'Details'])->name('Details')->middleware('isLoggedIn');
    Route::get('/AddFunds', [UserController::class, 'AddFunds'])->name('AddFunds')->middleware('isLoggedIn');
    Route::get('/ActiveOrders', [UserController::class, 'ActiveOrders'])->name('ActiveOrders')->middleware('isLoggedIn');
    Route::get('/WithdrawFunds', [UserController::class, 'WithdrawFunds'])->name('WithdrawFunds')->middleware('isLoggedIn');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup')->middleware('alreadyLoggedIn');
    Route::post('purchase', [PaypalController::class, 'purchase'])->name('purchase');
    Route::post('save_withdraw', [PaypalController::class, 'save_withdraw'])->name('save_withdraw');
    Route::get('payment_option', [PaypalController::class, 'payment_option'])->name('payment_option')->middleware('alreadyLoggedIn');
    Route::post('paypal', [PaypalController::class, 'paypal'])->name('paypal');
    Route::get('success', [PaypalController::class, 'success'])->name('success');

    Route::get('cancel', [PaypalController::class, 'cancel'])->name('cancel');
});

Route::post('/reg', [UserController::class, 'registration']);
Route::get('/Statements', [UserController::class, 'Statements'])->name('Statements');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::post('/log', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/post_ad', [UserController::class, 'post_ad'])->name('post_ad');
Route::get('/ad_details/{id}', [UserController::class, 'ad_details'])->name('ad_details');
Route::get('/post_list', [UserController::class, 'post_list'])->name('post_list');
Route::get('/Userlogin', [UserController::class, 'Userlogin'])->name('Userlogin');
Route::get('/ads_list/{category}', [UserController::class, 'ads_list'])->name('ads_list');
Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->name('verification.verify');





Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin-prevent-back-history'], function () {

        Route::get('login', [Admin::class, 'admin'])->name('admin')->middleware('AdminAlreadyLoggedIn');
        Route::get('country', [Admin::class, 'country'])->name('country')->middleware('alreadyLoggedIn');
        Route::get('city', [Admin::class, 'city'])->name('city')->middleware('alreadyLoggedIn');
        Route::get('dashboard', [Admin::class, 'dashboard'])->name('dashboard')->middleware('AdminIsLoggedIn');
        Route::get('/add_category', [Admin::class, 'add_category'])->name('add_category')->middleware('AdminIsLoggedIn');
        Route::post('/save_category', [Admin::class, 'save_category'])->name('save_category')->middleware('AdminIsLoggedIn');
        Route::get('/edit_profile', [Admin::class, 'edit_profile'])->name('edit_profile')->middleware('AdminIsLoggedIn');
        Route::post('update_profile', [Admin::class, 'update_profile'])->name('update_profile')->middleware('AdminIsLoggedIn');
        Route::get('/smtp_setting', [Admin::class, 'smtp_setting'])->name('smtp_setting')->middleware('AdminIsLoggedIn');
        Route::post('/update_smtp_setting', [Admin::class, 'update_smtp_setting'])->name('update_smtp_setting')->middleware('AdminIsLoggedIn');
        Route::get('/website_setting', [Admin::class, 'website_setting'])->name('website_setting')->middleware('AdminIsLoggedIn');
        Route::post('/update_general_settings', [Admin::class, 'update_general_settings'])->name('update_general_settings')->middleware('AdminIsLoggedIn');
        Route::get('/categories', [Admin::class, 'categories'])->name('categories')->middleware('AdminIsLoggedIn');
        Route::get('/edit_category', [Admin::class, 'edit_category'])->name('edit_category')->middleware('AdminIsLoggedIn');
        Route::post('/update_catagory', [Admin::class, 'update_catagory'])->name('update_catagory')->middleware('AdminIsLoggedIn');
        Route::get('/Delete_Category', [Admin::class, 'Delete_Category'])->name('Delete_Category')->middleware('AdminIsLoggedIn');
        Route::get('/Add_Course_list', [Admin::class, 'Add_Course_list'])->name('Add_Course_list')->middleware('AdminIsLoggedIn');
        Route::post('/update_course', [Admin::class, 'update_course'])->name('update_course')->middleware('AdminIsLoggedIn');
        Route::get('/Course_list', [Admin::class, 'Course_list'])->name('Course_list')->middleware('AdminIsLoggedIn');
        Route::post('/save_course', [Admin::class, 'save_course'])->name('save_course')->middleware('AdminIsLoggedIn');
        Route::get('/Delete_course', [Admin::class, 'Delete_course'])->name('Delete_course')->middleware('AdminIsLoggedIn');
        Route::get('/edit_courses', [Admin::class, 'edit_courses'])->name('edit_courses')->middleware('AdminIsLoggedIn');
        Route::get('/change_password', [Admin::class, 'change_password'])->name('change_password')->middleware('AdminIsLoggedIn');
        Route::post('/update_password', [Admin::class, 'update_password'])->name('update_password')->middleware('AdminIsLoggedIn');
        Route::get('/social_lite_login', [Admin::class, 'social_lite_login'])->name('social_lite_login');
        Route::post('/update_social_login_settings', [Admin::class, 'update_social_login_settings'])->name('update_social_login_settings')->middleware('AdminIsLoggedIn');
        Route::get('payment_gateway', [Admin::class, 'list'])->middleware('AdminIsLoggedIn');
        Route::get('payment_gateway/edit/{id}', [Admin::class, 'edit'])->middleware('AdminIsLoggedIn');
        Route::post('paypal', [Admin::class, 'paypal'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/stripe', [Admin::class, 'stripe'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/razorpay', [Admin::class, 'razorpay'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/paystack', [Admin::class, 'paystack'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/instamojo', [Admin::class, 'instamojo'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/payu', [Admin::class, 'payu'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/mollie', [Admin::class, 'mollie'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/flutterwave', [Admin::class, 'flutterwave'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/paytm', [Admin::class, 'paytm'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/cashfree', [Admin::class, 'cashfree'])->middleware('AdminIsLoggedIn');
        Route::get('pages', [Pages::class, 'pages_list'])->middleware('AdminIsLoggedIn');
        Route::get('add', [Pages::class, 'add'])->middleware('AdminIsLoggedIn');
        Route::get('edit/{id}', [Pages::class, 'edit'])->middleware('AdminIsLoggedIn');
        Route::post('pages/add_edit', [Pages::class, 'addnew'])->middleware('AdminIsLoggedIn');
        Route::get('pages/delete/{id}', [Pages::class, 'delete'])->middleware('AdminIsLoggedIn');
        Route::get('page/{slug}', [Pages::class, 'get_page'])->middleware('AdminIsLoggedIn');
        Route::post('contact_send', [Pages::class, 'contact_send'])->middleware('AdminIsLoggedIn');
        Route::get('languages', [LanguageTranslationController::class, 'index'])->name('languages')->middleware('AdminIsLoggedIn');
        Route::post('translations/update', [LanguageTranslationController::class, 'transUpdate'])->name('translation.update.json');
        Route::post('translations/updateKey', [LanguageTranslationController::class, 'transUpdateKey'])->name('translation.update.json.key');
        Route::delete('translations/destroy/{key}', [LanguageTranslationController::class, 'destroy'])->name('translations.destroy');
        Route::post('translations/create', [LanguageTranslationController::class, 'store'])->name('translations.create');
        Route::get('/language', [Languages::class, 'language'])->name('language')->middleware('AdminIsLoggedIn');
        Route::get('/add_language', [Languages::class, 'add_language'])->name('add_language')->middleware('AdminIsLoggedIn');
        Route::post('/save_language', [Languages::class, 'save_language'])->name('save_language');
        Route::get('/edit_language', [Languages::class, 'edit_language'])->name('edit_language')->middleware('AdminIsLoggedIn');
        Route::get('/delete_language', [Languages::class, 'delete_language'])->name('delete_language');
        Route::post('/update_language', [Languages::class, 'update_language'])->name('update_language');
        Route::get('lang/change', [Admin::class, 'lang_change'])->name('lang_change')->middleware('AdminIsLoggedIn');
        Route::get('users', [Admin::class, 'users'])->name('users')->middleware('AdminIsLoggedIn');
        Route::get('user/edit/{id}', [Admin::class, 'edit_user'])->name('edit_user')->middleware('AdminIsLoggedIn');
        Route::post('update_user', [Admin::class, 'update_user'])->name('update_user')->middleware('AdminIsLoggedIn');
        Route::get('transactions', [Admin::class, 'transactions_list'])->middleware('AdminIsLoggedIn');
        Route::get('add_transaction', [Admin::class, 'add_transaction'])->middleware('AdminIsLoggedIn');
        Route::get('edit_transaction/{id}', [Admin::class, 'edit_transaction'])->middleware('AdminIsLoggedIn');
        Route::post('save_transaction', [Admin::class, 'save_transaction'])->middleware('AdminIsLoggedIn');
        Route::post('update_transaction', [Admin::class, 'update_transaction'])->middleware('AdminIsLoggedIn');
        Route::get('delete_transaction/{id}', [Admin::class, 'delete_transaction'])->middleware('AdminIsLoggedIn');
        Route::get('orders', [Admin::class, 'orders'])->middleware('AdminIsLoggedIn');
        Route::get('add_order', [Admin::class, 'add_order'])->middleware('AdminIsLoggedIn');
        Route::get('edit_order/{id}', [Admin::class, 'edit_order'])->middleware('AdminIsLoggedIn');
        Route::post('save_order', [Admin::class, 'save_order'])->middleware('AdminIsLoggedIn');
        Route::post('update_order', [Admin::class, 'update_order'])->middleware('AdminIsLoggedIn');
        Route::get('delete_order/{id}', [Admin::class, 'delete_order'])->middleware('AdminIsLoggedIn');
        Route::get('tasks', [Admin::class, 'tasks'])->middleware('AdminIsLoggedIn');
        Route::get('add_task', [Admin::class, 'add_task'])->middleware('AdminIsLoggedIn');
        Route::get('edit_task/{id}', [Admin::class, 'edit_task'])->middleware('AdminIsLoggedIn');
        Route::post('save_task', [Admin::class, 'save_task'])->middleware('AdminIsLoggedIn');
        Route::post('update_task', [Admin::class, 'update_task'])->middleware('AdminIsLoggedIn');
        Route::get('delete_task/{id}', [Admin::class, 'delete_task'])->middleware('AdminIsLoggedIn');
        Route::get('add_user', [Admin::class, 'add_user'])->middleware('AdminIsLoggedIn');
        Route::post('save_user', [Admin::class, 'save_user'])->middleware('AdminIsLoggedIn');

        Route::get('user/delete_user/{id}', [Admin::class, 'delete_user'])->middleware('AdminIsLoggedIn');

        Route::get('subscription_plan', [SubscriptionPlanController::class, 'subscription_plan_list'])->middleware('AdminIsLoggedIn');
        Route::get('subscription_plan/add_plan', [SubscriptionPlanController::class, 'addSubscriptionPlan'])->middleware('AdminIsLoggedIn');
        Route::get('subscription_plan/edit_plan/{id}', [SubscriptionPlanController::class, 'editSubscriptionPlan'])->middleware('AdminIsLoggedIn');
        Route::post('subscription_plan/add_edit_plan', [SubscriptionPlanController::class, 'addnew']);
        Route::get('subscription_plan/delete/{id}', [SubscriptionPlanController::class, 'delete'])->middleware('AdminIsLoggedIn');
        Route::name('mail-templates.')->prefix('mail-templates')->group(function () {
            Route::get('/', [MailTemplateController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
            Route::get('add', [MailTemplateController::class, 'add'])->name('add')->middleware('AdminIsLoggedIn');
            Route::post('save', [MailTemplateController::class, 'save'])->name('save');
            Route::get('edit/{id}', [MailTemplateController::class, 'edit'])->name('edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{id}', [MailTemplateController::class, 'update'])->name('update');
        });
        Route::get('email-application', [EmailAppController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
        Route::post('sendMessage', [EmailAppController::class, 'sendMessage'])->name('sendMessage');
        Route::post('sendMail/{id}', [EmailAppController::class, 'sendMail'])->name('sendMail');
        Route::get('email-compose', [EmailAppController::class, 'compose'])->name('compose')->middleware('AdminIsLoggedIn');
        Route::get('/balance', [FundController::class, 'balance'])->name('balance')->middleware('AdminIsLoggedIn');
        Route::get('/withdraws', [FundController::class, 'withdraws'])->name('withdraws')->middleware('AdminIsLoggedIn');
        Route::get('add_balance', [FundController::class, 'add_balance'])->middleware('AdminIsLoggedIn');
        Route::get('edit_balance/{id}', [FundController::class, 'edit_balance'])->middleware('AdminIsLoggedIn');
        Route::post('save_balance', [FundController::class, 'save_balance'])->middleware('AdminIsLoggedIn');
        Route::post('update_balance', [FundController::class, 'update_balance'])->middleware('AdminIsLoggedIn');
        Route::get('delete_balance/{id}', [FundController::class, 'delete_balance'])->middleware('AdminIsLoggedIn');
        Route::post('/deposit', [FundController::class, 'deposit']);
        Route::post('/withdraw', [FundController::class, 'withdraw']);
        Route::get('/transactions_report', [Admin::class, 'transactions_report'])->name('transactions_report')->middleware('AdminIsLoggedIn');
    });
Route::get('/forget_password', [Admin::class, 'forget_password'])->name('forget_password');
    Route::post('/log', [Admin::class, 'login'])->name('login');
    Route::get('/logout', [Admin::class, 'logout'])->name('logout');
});
Route::get('facebook', [FacebookSocialiteController::class, 'facebookRedirect']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'loginWithFacebook']);
Route::get('google', [GoogleController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleController::class, 'handleGoogleCallback']);





// Route::get('/', function () {
//     return view('home.index');
// });

Auth::routes();
Route::get('activate', [AuthController::class, 'verifyAccount']);

Route::get('/home', [HomeController::class, 'index']);
Route::post('update-language', [UserController::class, 'updateLanguage'])->middleware('auth')->name('update-language');

// Impersonate Logout
Route::get('/users/impersonate-logout',
    [UserController::class, 'userImpersonateLogout'])->name('impersonate.userLogout');


    //view routes
    Route::get('/conversations',
        [ChatController::class, 'index'])->name('conversations');
    Route::get('profile', [UserController::class, 'getProfile']);
    Route::get('logout', [LoginController::class, 'logout']);

    //get all user list for chat
    Route::get('users-list', [API\UserAPIController::class, 'getUsersList']);
    Route::get('get-users', [API\UserAPIController::class, 'getUsers'])->name('get-users')->name('get-users');
    Route::delete('remove-profile-image',
        [API\UserAPIController::class, 'removeProfileImage'])->name('remove-profile-image');
    /** Change password */
    Route::post('change-password', [API\UserAPIController::class, 'changePassword'])->name('change-password');
    Route::get('conversations/{ownerId}/archive-chat', [API\UserAPIController::class, 'archiveChat'])->name('conversations.archive-chat');
    Route::get('conversations/{ownerId}/un-archive-chat', [API\UserAPIController::class, 'unArchiveChat'])->name('conversations.un-archive-chat');

    Route::get('get-profile', [API\UserAPIController::class, 'getProfile']);
    Route::post('profile', [API\UserAPIController::class, 'updateProfile'])->name('update.profile');
    Route::post('update-last-seen', [API\UserAPIController::class, 'updateLastSeen'])->name('update-last-seen');

    Route::post('send-message',
        [API\ChatAPIController::class, 'sendMessage'])->name('conversations.store')->middleware('sendMessage');
    Route::get('users/{id}/conversation', [API\UserAPIController::class, 'getConversation'])->name('users.conversation');
    Route::get('conversations-list', [API\ChatAPIController::class, 'getLatestConversations'])->name('conversations-list');
    Route::get('archive-conversations', [API\ChatAPIController::class, 'getArchiveConversations'])->name('archive-conversations');
    Route::post('read-message', [API\ChatAPIController::class, 'updateConversationStatus'])->name('read-message');
    Route::post('file-upload', [API\ChatAPIController::class, 'addAttachment'])->name('file-upload');
    Route::post('image-upload', [API\ChatAPIController::class, 'imageUpload'])->name('image-upload');
    Route::get('conversations/{userId}/delete', [API\ChatAPIController::class, 'deleteConversation'])->name('conversations.destroy');
    Route::post('conversations/message/{conversation}/delete', [API\ChatAPIController::class, 'deleteMessage'])->name('conversations.message-conversation.delete');
    Route::post('conversations/{conversation}/delete', [API\ChatAPIController::class, 'deleteMessageForEveryone']);
    Route::get('/conversations/{conversation}', [API\ChatAPIController::class, 'show']);
    Route::post('send-chat-request', [API\ChatAPIController::class, 'sendChatRequest'])->name('send-chat-request');
    Route::post('accept-chat-request',
        [API\ChatAPIController::class, 'acceptChatRequest'])->name('accept-chat-request');
    Route::post('decline-chat-request',
        [API\ChatAPIController::class, 'declineChatRequest'])->name('decline-chat-request');

    /** Web Notifications */
    Route::put('update-web-notifications', [API\UserAPIController::class, 'updateNotification'])->name('update-web-notifications');

    /** BLock-Unblock User */
    Route::put('users/{user}/block-unblock', [API\BlockUserAPIController::class, 'blockUnblockUser'])->name('users.block-unblock');
    Route::get('blocked-users', [API\BlockUserAPIController::class, 'blockedUsers']);

    /** My Contacts */
    Route::get('my-contacts', [API\UserAPIController::class, 'myContacts'])->name('my-contacts');

    /** Groups API */
    Route::post('groups', [API\GroupAPIController::class, 'create'])->name('groups.create');
    Route::post('groups/{group}', [API\GroupAPIController::class, 'update'])->name('groups.update');
    Route::get('groups', [API\GroupAPIController::class, 'index'])->name('groups.index');
    Route::get('groups/{group}', [API\GroupAPIController::class, 'show'])->name('group.show');
    Route::put('groups/{group}/add-members', [API\GroupAPIController::class, 'addMembers'])->name('groups-group.add-members');
    Route::delete('groups/{group}/members/{user}', [API\GroupAPIController::class, 'removeMemberFromGroup'])->name('group-from-member-remove');
    Route::delete('groups/{group}/leave', [API\GroupAPIController::class, 'leaveGroup'])->name('groups.leave');
    Route::delete('groups/{group}/remove', [API\GroupAPIController::class, 'removeGroup'])->name('group-remove');
    Route::put('groups/{group}/members/{user}/make-admin', [API\GroupAPIController::class, 'makeAdmin'])->name('groups.members.make-admin');
    Route::put('groups/{group}/members/{user}/dismiss-as-admin', [API\GroupAPIController::class, 'dismissAsAdmin'])->name('groups.members.dismiss-as-admin');
    Route::get('users-blocked-by-me', [API\BlockUserAPIController::class, 'blockUsersByMe']);

    Route::get('notification/{notification}/read', [API\NotificationController::class, 'readNotification'])->name('notification.read-notification');
    Route::get('notification/read-all', [API\NotificationController::class, 'readAllNotification'])->name('read-all-notification');

    Route::put('update-player-id', [API\UserAPIController::class, 'updatePlayerId'])->name('update-player-id');
    //set user custom status route
    Route::post('set-user-status', [API\UserAPIController::class, 'setUserCustomStatus'])->name('set-user-status');
    Route::get('clear-user-status', [API\UserAPIController::class, 'clearUserCustomStatus'])->name('clear-user-status');

    //report user
    Route::post('report-user', [API\ReportUserController::class, 'store'])->name('report-user.store');


// users
Route::middleware(['permission:manage_users', 'auth', 'user.activated'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('users/{user}/active-de-active', [UserController::class, 'activeDeActiveUser'])
        ->name('active-de-active-user');
    Route::post('users/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/{user}/archive', [UserController::class, 'archiveUser'])->name('archive-user');
    Route::post('users/restore', [UserController::class, 'restoreUser'])->name('user.restore-user');
    Route::get('users/{user}/login', [UserController::class, 'userImpersonateLogin'])->name('user-impersonate-login');
    Route::post('users/{user}/email-verified', [UserController::class, 'isEmailVerified'])->name('user.email-verified');
});

// roles
Route::middleware(['permission:manage_roles', 'auth', 'user.activated'])->group(function () {
    Route::resource('roles', RoleController::class)->except('update');
    Route::post('roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
});

// settings
Route::middleware(['permission:manage_settings', 'auth', 'user.activated'])->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
});

// reported-users
Route::middleware(['permission:manage_reported_users', 'auth', 'user.activated'])->group(function () {
    Route::resource('reported-users', ReportUserController::class);
});

// meetings
Route::middleware(['permission:manage_meetings', 'auth', 'user.activated'])->group(function () {
    Route::resource('meetings', MeetingController::class);
    Route::get('meetings/{meeting}/change-status/{status}',
        [MeetingController::class, 'changeMeetingStatus'])->name('meeting.change-meeting-status');
    Route::get('member/meetings', [MeetingController::class, 'showMemberMeetings'])->name('meetings.member_index');
});

Route::middleware('web')->group(function () {
    Route::get('login/{provider}', [SocialAuthController::class, 'redirect']);
    Route::get('login/{provider}/callback', [SocialAuthController::class, 'callback']);
});

Route::middleware(['permission:manage_front_cms', 'auth', 'user.activated'])->group(function () {
    Route::get('front-cms', [FrontCMSController::class, 'frontCms'])->name('front.cms');
    Route::post('front-cms', [FrontCMSController::class, 'updateFrontCms'])->name('front.cms.update');
});

require __DIR__.'/upgrade.php';
