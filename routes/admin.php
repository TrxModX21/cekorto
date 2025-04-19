<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChainingController;
use App\Http\Controllers\Admin\DiseaseController;
use App\Http\Controllers\Admin\ExtensionController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageAdminController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RecommendationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\SymptomController;
use App\Http\Controllers\Admin\SystemController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin.guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('login');

    Route::prefix('password')->as('password.')->group(function () {
        Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('reset');
        Route::post('reset', [ForgotPasswordController::class, 'sendResetCodeEmail'])->name('reset');
        Route::get('/code-verify', [ForgotPasswordController::class, 'codeVerify'])->name('code.verify');
        Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('verify.code');

        Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset.form');
        Route::post('/reset/change', [ResetPasswordController::class, 'reset'])->name('change');
    });
});

Route::middleware(['admin', 'admin.banned'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('disease')->as('disease.')->group(function () {
        Route::get('/all', [DiseaseController::class, 'all'])->name('all');
        Route::get('/create', [DiseaseController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [DiseaseController::class, 'edit'])->name('edit');
        Route::post('/store/{id?}', [DiseaseController::class, 'store'])->name('store');
        Route::post('/status/{id}', [DiseaseController::class, 'status'])->name('status');
        Route::post('/destroy/{id}', [DiseaseController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/recommendation')->as('recommendation.')->group(function () {
        Route::get('/all', [RecommendationController::class, 'all'])->name('all');
        Route::get('/create', [RecommendationController::class, 'create'])->name('create');
        Route::post('/store', [RecommendationController::class, 'store'])->name('store');
        Route::post('/update/{id}', [RecommendationController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [RecommendationController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('symptom')->as('symptom.')->group(function () {
        Route::get('/all', [SymptomController::class, 'all'])->name('all');
        Route::get('/create', [SymptomController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [SymptomController::class, 'edit'])->name('edit');
        Route::post('/store/{id?}', [SymptomController::class, 'store'])->name('store');
        Route::post('/status/{id}', [SymptomController::class, 'status'])->name('status');
        Route::post('/destroy/{id}', [SymptomController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('chaining')->as('chaining.')->group(function () {
        Route::get('/all', [ChainingController::class, 'all'])->name('all');
        Route::post('/store/{id?}', [ChainingController::class, 'store'])->name('store');
        Route::post('/destroy/{id}', [ChainingController::class, 'destroy'])->name('destroy');

        Route::prefix('recommendation')->as('recommendation.')->group(function () {
            Route::get('/all', [ChainingController::class, 'recommendationAll'])->name('all');
            Route::post('/store/{id?}', [ChainingController::class, 'storeRecommendation'])->name('store');
            Route::post('/destroy/{id}', [ChainingController::class, 'destroyRecommendation'])->name('destroy');
        });
    });

    Route::prefix('hospitals')->as('hospitals.')->group(function () {
        Route::get('/', [HospitalController::class, 'index'])->name('index');
        Route::post('/create/{id?}', [HospitalController::class, 'create'])->name('create');
        Route::post('/update/{id}', [HospitalController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [HospitalController::class, 'destroy'])->name('destroy');
    });

    Route::middleware('admin.super')->prefix('staffs')->as('staffs.')->group(function () {
        Route::get('/', [ManageAdminController::class, 'index'])->name('all');
        Route::post('/save/{id?}', [ManageAdminController::class, 'save'])->name('save');
        Route::post('/status/{id}', [ManageAdminController::class, 'updateStatus'])->name('status');
        Route::get('/login/{id}', [ManageAdminController::class, 'login'])->name('login');
    });

    Route::middleware('admin.super')->prefix('users')->as('users.')->group(function () {
        Route::get('/', [ManageUserController::class, 'allUsers'])->name('all');
        Route::get('/active', [ManageUserController::class, 'activeUsers'])->name('active');
        Route::get('/banned', [ManageUserController::class, 'bannedUsers'])->name('banned');

        Route::get('/detail/{id}', [ManageUserController::class, 'detail'])->name('detail');
        Route::get('/login/{id}', [ManageUserController::class, 'login'])->name('login');
        Route::get('notification-log/{id}', [ManageUserController::class, 'notificationLog'])->name('notification.log');
        Route::post('update/{id}', [ManageUserController::class, 'update'])->name('update');
        Route::post('status/{id}', [ManageUserController::class, 'status'])->name('status');
    });

    Route::middleware([])->group(function () {
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/password', [AdminController::class, 'password'])->name('password');
        Route::post('/password', [AdminController::class, 'passwordUpdate'])->name('password.update');
    });

    Route::prefix('notification')->as('notification.')->group(function () {
        Route::get('/', [AdminController::class, 'notifications'])->name('all');
        Route::get('/read/{id}', [AdminController::class, 'notificationRead'])->name('read');
        Route::post('/delete-single/{id}', [AdminController::class, 'deleteSingleNotification'])->name('delete.single');
        Route::get('/read-all', [AdminController::class, 'readAllNotification'])->name('read.all');
        Route::post('/delete-all', [AdminController::class, 'deleteAllNotification'])->name('delete.all');
    });

    Route::middleware('admin.super')->prefix('setting')->as('setting.')->group(function () {
        Route::get('/system-setting', [GeneralSettingController::class, 'systemSetting'])->name('system');

        Route::get('/general-setting', [GeneralSettingController::class, 'general'])->name('general');
        Route::post('/general-setting', [GeneralSettingController::class, 'generalUpdate'])->name('general');

        Route::get('/logo-icon', [GeneralSettingController::class, 'logoIcon'])->name('logo.icon');
        Route::post('/logo-icon', [GeneralSettingController::class, 'logoIconUpdate'])->name('logo.icon');

        Route::get('/system-configuration', [GeneralSettingController::class, 'systemConfiguration'])->name('system.configuration');
        Route::post('/system-configuration', [GeneralSettingController::class, 'systemConfigurationSubmit'])->name('system.configuration');

        Route::get('/social/credentials', [GeneralSettingController::class, 'socialiteCredentials'])->name('socialite.credentials');
        Route::post('/social/credentials/update/{key}', [GeneralSettingController::class, 'updateSocialiteCredentials'])->name('socialite.credentials.update');
        Route::post('/social/credentials/status/{key}', [GeneralSettingController::class, 'updateSocialiteCredentialStatus'])->name('socialite.credentials.status.update');

        Route::prefix('notification')->as('notification.')->group(function () {
            Route::get('/global/email', [NotificationController::class, 'globalEmail'])->name('global.email');
            Route::post('/global/email/update', [NotificationController::class, 'globalEmailUpdate'])->name('global.email.update');

            Route::get('/global/sms', [NotificationController::class, 'globalSms'])->name('global.sms');
            Route::post('/global/sms/update', [NotificationController::class, 'globalSmsUpdate'])->name('global.sms.update');

            Route::get('/global/push', [NotificationController::class, 'globalPush'])->name('global.push');
            Route::post('/global/push/update', [NotificationController::class, 'globalPushUpdate'])->name('global.push.update');

            Route::get('/email/setting', [NotificationController::class, 'emailSetting'])->name('email');
            Route::post('/email/setting', [NotificationController::class, 'emailSettingUpdate'])->name('email');
            Route::post('/email/test', [NotificationController::class, 'emailTest'])->name('email.test');

            Route::get('/sms/setting', [NotificationController::class, 'smsSetting'])->name('sms');
            Route::post('/sms/setting', [NotificationController::class, 'smsSettingUpdate'])->name('sms');
            Route::post('/sms/test', [NotificationController::class, 'smsTest'])->name('sms.test');

            Route::get('/notification/push/setting', [NotificationController::class, 'pushSetting'])->name('push');
            Route::post('/notification/push/setting', [NotificationController::class, 'pushSettingUpdate'])->name('push');
            Route::post('/notification/push/setting/upload', [NotificationController::class, 'pushSettingUpload'])->name('push.upload');
            Route::get('/notification/push/setting/download', [NotificationController::class, 'pushSettingDownload'])->name('push.download');

            Route::get('/templates', [NotificationController::class, 'templates'])->name('templates');
            Route::get('/template/edit/{type}/{id}', [NotificationController::class, 'templateEdit'])->name('template.edit');
            Route::post('/template/update/{type}/{id}', [NotificationController::class, 'templateUpdate'])->name('template.update');
        });

        Route::get('maintenance-mode', [GeneralSettingController::class, 'maintenanceMode'])->name('maintenance.mode');
        Route::post('maintenance-mode', [GeneralSettingController::class, 'maintenanceModeSubmit']);

        Route::get('/seo', [FrontendController::class, 'seoEdit'])->name('seo');

    });

    Route::middleware('admin.super')->prefix('language')->as('language.')->group(function () {
        Route::get('/', [LanguageController::class, 'langManage'])->name('manage');
        Route::post('/', [LanguageController::class, 'langStore'])->name('manage.store');
        Route::post('/update/{id}', [LanguageController::class, 'langUpdate'])->name('manage.update');
        Route::post('/delete/{id}', [LanguageController::class, 'langDelete'])->name('manage.delete');

        Route::get('/edit/{id}', [LanguageController::class, 'langEdit'])->name('key');
        Route::post('/store/key/{id}', [LanguageController::class, 'storeLanguageJson'])->name('store.key');
        Route::post('/update/key/{id}', [LanguageController::class, 'updateLanguageJson'])->name('update.key');
        Route::post('/delete/key/{id}', [LanguageController::class, 'deleteLanguageJson'])->name('delete.key');

        Route::get('/get-keys', [LanguageController::class, 'getKeys'])->name('get.key');
        Route::post('/import', [LanguageController::class, 'langImport'])->name('import.lang');
    });

    Route::middleware('admin.super')->prefix('extensions')->as('extensions.')->group(function () {
        Route::get('/', [ExtensionController::class, 'index'])->name('index');
        Route::post('/update/{id}', [ExtensionController::class, 'update'])->name('update');
        Route::post('/status/{id}', [ExtensionController::class, 'status'])->name('status');
    });

    Route::middleware('admin.super')->prefix('frontend')->as('frontend.')->group(function () {
        Route::get('/index', [FrontendController::class, 'index'])->name('index');
        Route::get('/frontend-sections/{key?}', [FrontendController::class, 'frontendSections'])->name('sections');
        Route::post('/frontend-content/{key}', [FrontendController::class, 'frontendContent'])->name('sections.content');
        Route::get('/frontend-element/{key}/{id?}', [FrontendController::class, 'frontendElement'])->name('sections.element');
        Route::get('frontend-element-seo/{key}/{id}', [FrontendController::class, 'frontendSeo'])->name('sections.element.seo');
        Route::post('frontend-element-seo/{key}/{id}', [FrontendController::class, 'frontendSeoUpdate']);
        Route::post('/remove/{id}', [FrontendController::class, 'remove'])->name('remove');
        Route::get('/frontent-slug-check/{key}/{id?}', [FrontendController::class, 'frontendElementSlugCheck'])->name('sections.element.slug.check');
    });

    Route::middleware('admin.super')->prefix('/report')->as('report.')->group(function () {
        Route::get('/login/history', [ReportController::class, 'loginHistory'])->name('login.history');
        Route::get('/notification/history', [ReportController::class, 'notificationHistory'])->name('notification.history');
        Route::get('/email/detail/{id}', [ReportController::class, 'emailDetails'])->name('email.details');
        Route::get('login/ipHistory/{ip}', [ReportController::class, 'loginIpHistory'])->name('login.ipHistory');
    });

    Route::middleware('admin.super')->prefix('system')->as('system.')->group(function () {
        Route::get('/info', [SystemController::class, 'systemInfo'])->name('info');
        Route::get('/server-info', [SystemController::class, 'systemServerInfo'])->name('server.info');
        Route::get('/optimize', [SystemController::class, 'optimize'])->name('optimize');
        Route::get('/optimize-clear', [SystemController::class, 'optimizeClear'])->name('optimize.clear');

        Route::get('/reset-diagnose-data', [SystemController::class, 'resetDiagnose'])->name('reset.diagnose.data');
        Route::post('/reset-diagnose-data', [SystemController::class, 'resetDiagnoseProcess'])->name('reset.diagnose.data');

        Route::get('/reset-user', [SystemController::class, 'resetUser'])->name('reset.user');
        Route::post('/reset-user', [SystemController::class, 'resetUserProcess'])->name('reset.user');

        Route::get('/reset-disease', [SystemController::class, 'resetDisease'])->name('reset.disease');
        Route::post('/reset-disease', [SystemController::class, 'resetDiseaseProcess'])->name('reset.disease');

        Route::get('/reset-symptom', [SystemController::class, 'resetSymptom'])->name('reset.symptom');
        Route::post('/reset-symptom', [SystemController::class, 'resetSymptomProcess'])->name('reset.symptom');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/banned', [AdminController::class, 'bannedPage'])->name('banned');