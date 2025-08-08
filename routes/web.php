<?php

use App\Http\Controllers\AdvancedSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AppController;
use App\Http\Controllers\Client\AppDashboardController;
use App\Http\Controllers\Client\AppSettingsController;
use App\Http\Controllers\Client\CustomizationController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.trangchu');
})->name('index');
Route::get('/dac-trung', function () {
    return view('client.dactrung');
})->name('dactrung');
Route::get('/gia-ca', function () {
    return view('client.giaca');
})->name('giaca');
Route::get('/cau-hoi', function () {
    return view('client.cauhoi');
})->name('cauhoi');
Route::get('/tin-moi', function () {
    return view('client.tinmoi');
})->name('tinmoi');
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact.form');
Route::post('/lien-he', [ContactController::class, 'send'])->name('contact.send');


// Đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('FormLogin');
Route::post('/check-login', [AuthController::class, 'login'])->name('login');

// Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('FormRegister');
Route::post('/check-register', [AuthController::class, 'register'])->name('register');

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/callback/google', [GoogleController::class, 'handleGoogleCallback']);
// routes/web.php
Route::get('/forgot-password', [ForgotPasswordController::class, 'showFormEmail'])->name('password.email');
Route::post('/forgot-password-email', [ForgotPasswordController::class, 'sendEmail'])->name('password.check-email');


// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('password.email');

Route::get('/check-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp.form');
Route::post('/check-otp', [ForgotPasswordController::class, 'checkOtp'])->name('check.otp');
Route::get('/resend-otp', [ForgotPasswordController::class, 'resendOtp'])->name('resend.otp');

Route::get('/reset-password', [ForgotPasswordController::class, 'showReset'])->name('showReset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('check-reset');

Route::middleware('auth')->group(function () {
    // form nhanh: nhận website và chuyển tiếp tới create với query param
    Route::get('/quick-create', [AppController::class, 'prefill'])->name('apps.prefill');
    Route::delete('/apps/{app}', [AppController::class, 'destroy'])
        ->name('apps.destroy');

    // trang tạo app chính
    Route::get('/apps/index', [AppController::class, 'index'])->name('apps.index');
    Route::get('/apps/create', [AppController::class, 'create'])->name('apps.create');
    Route::get('/apps/edit-account', [AppController::class, 'editAccount'])->name('apps.edit.account');
    Route::put('/apps/update-account', [AppController::class, 'updateAccount'])->name('apps.update.account');
    // routes/web.php
    Route::post('/account/delete', [AppController::class, 'deleteAccount'])->name('account.delete');

    Route::post('/apps', [AppController::class, 'store'])->name('apps.store');
    Route::get('/payment/{app}', [PaymentController::class, 'index'])->name('payment.index');

    Route::post('/payment/{app}/choose', [PaymentController::class, 'choose'])->name('payment.choose');
    Route::post('/payment/{app}/vnpay', [PaymentController::class, 'createVnPay'])->name('payment.vnpay');
    Route::match(['get', 'post'], '/payment/{app}/vnpay/callback', [PaymentController::class, 'vnpayCallback'])
        ->name('payment.vnpay.callback');
});
Route::prefix('app/{app}')->middleware(['auth', 'check.app.subscription'])->group(function () {
    Route::get('/dashboard', [AppDashboardController::class, 'index'])->name('app.dashboard')->middleware('app.permission:dashboard');
    Route::get('/notification', [AppDashboardController::class, 'notification'])->name('app.notification')->middleware('app.permission:notification');
    Route::get('/firebase-new', [AppDashboardController::class, 'firebase'])->name('app.firebase')->middleware('app.permission:firebase');
    Route::get('/admob', [AppDashboardController::class, 'admob'])->name('app.admob')->middleware('app.permission:admob');
    Route::get('/settings/edit', [AppSettingsController::class, 'edit'])->name('app.settings.edit')->middleware('app.permission:app-info');
    Route::put('/settings/update', [AppSettingsController::class, 'update'])->name('app.settings.update')->middleware('app.permission:app-info');
    Route::get('/settings/edit-screen', [AppSettingsController::class, 'editScreen'])->name('app.settings.edit.screent')->middleware('app.permission:splash-screen');
    Route::put('/settings/update-screen', [AppSettingsController::class, 'updateScreen'])->name('app.settings.update.screen')->middleware('app.permission:splash-screen');
    Route::get('/customization/edit', [CustomizationController::class, 'edit'])->name('customization.edit')->middleware('app.permission:customization');
    Route::put('/customization/update', [CustomizationController::class, 'update'])->name('customization.update')->middleware('app.permission:customization');
    Route::get('/advanced-settings', [AdvancedSettingsController::class, 'edit'])->name('advanced-settings.edit')->middleware('app.permission:advanced');
    Route::PUT('/advanced-settings', [AdvancedSettingsController::class, 'update'])->name('advanced-settings.update')->middleware('app.permission:advanced');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/apps/show-members', [AppController::class, 'showMember'])->name('showMember');
    Route::post('/apps/add-members', [AppController::class, 'addMember'])->name('addMember');
    Route::delete('/apps/{app}/members/{user}', [AppController::class, 'destroyMember'])->name('apps.members.destroy');
    Route::put('/account/collaborators/{collaborator}', [AppController::class, 'updateMember'])->name('apps.members.update');
});
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');
