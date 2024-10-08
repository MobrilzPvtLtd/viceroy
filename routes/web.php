<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Livewire\Privacy;
use App\Livewire\Terms;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\HolidayController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\FacilitiesController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Backend\ContactsController;
use App\Http\Controllers\Backend\InquairyController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\ProfessionalsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\TestimonialController;
use Illuminate\Support\Facades\Artisan;




/*
*
* Auth Routes
*
* --------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
*
* Frontend  & backend  Routes

*
* --------------------------------------------------------------------
*///professionals
Route::get('/admin/update-currency', function () {
    Artisan::call('scheduledRunOnLive:run');
    $output = Artisan::output();
    return response()->json(['message' => 'Scheduled commands executed.', 'output' => $output]);
});


Route::group(['middleware' => ['auth']], function () {
    //Contact
    Route::post('is_view', [ContactsController::class, 'is_view'])->name('is_view');
    Route::post('is_viewchackout', [ContactsController::class, 'is_viewchackout'])->name('is_viewchackout');
    Route::resource('admin/message', ContactsController::class);

    //Inquairy property
    Route::resource('admin/inquairy', InquairyController::class);

    //Currency
    Route::resource('admin/currency', CurrencyController::class);
    Route::get('/admin/currency-trash', [CurrencyController::class, 'currencyTrash'])->name('currency-trash');
    Route::patch('/admin/currency-restore/{id}', [CurrencyController::class, 'currencyRestore'])->name('currency-restore');
    Route::post('/admin/currency-delete/{id}', [CurrencyController::class, 'currencyDelete'])->name('currency-delete');

    //Country
    Route::resource('admin/country', CountryController::class);
    Route::get('/admin/country-trash', [CountryController::class, 'countryTrash'])->name('country-trash');
    Route::patch('/admin/country-restore/{id}', [CountryController::class, 'countryRestore'])->name('country-restore');
    Route::post('/admin/country-delete/{id}', [CountryController::class, 'countryDelete'])->name('country-delete');

    //state
    Route::resource('admin/state', StateController::class);
    Route::get('/admin/state-trash', [StateController::class, 'stateTrash'])->name('state-trash');
    Route::patch('/admin/state-restore/{id}', [StateController::class, 'stateRestore'])->name('state-restore');
    Route::post('/admin/state-delete/{id}', [StateController::class, 'stateDelete'])->name('state-delete');

    //city
    Route::resource('admin/city', CityController::class);
    Route::get('/admin/city-trash', [CityController::class, 'cityTrash'])->name('city-trash');
    Route::patch('/admin/city-restore/{id}', [CityController::class, 'cityRestore'])->name('city-restore');
    Route::post('/admin/city-delete/{id}', [CityController::class, 'cityDelete'])->name('city-delete');

    // property
    Route::resource('admin/property',  PropertyController::class);
    Route::get('/admin/property-trash', [PropertyController::class, 'propertyTrash'])->name('property-trash');
    Route::patch('/admin/property-restore/{id}', [PropertyController::class, 'propertyRestore'])->name('property-restore');
    Route::post('/admin/property-delete/{id}', [PropertyController::class, 'propertyDelete'])->name('property-delete');

    Route::get('fetch-city', [PropertyController::class, 'fetchCity'])->name('fetch-city');
    Route::get('fetch-states', [PropertyController::class, 'fetchStates'])->name('fetch-states');

    // Facilities
    Route::resource('admin/facility',  FacilitiesController::class);
    Route::get('/admin/facility-trash', [FacilitiesController::class, 'facilityTrash'])->name('facility-trash');
    Route::patch('/admin/facility-restore/{id}', [FacilitiesController::class, 'facilityRestore'])->name('facility-restore');
    Route::post('/admin/facility-delete/{id}', [FacilitiesController::class, 'facilityDelete'])->name('facility-delete');

    //holiday
    Route::resource('admin/holiday', HolidayController::class);
    Route::get('/admin/holiday-trash', [HolidayController::class, 'holidayTrash'])->name('holiday-trash');
    Route::patch('/admin/holiday-restore/{id}', [HolidayController::class, 'holidayRestore'])->name('holiday-restore');
    Route::post('/admin/holiday-delete/{id}', [HolidayController::class, 'holidayDelete'])->name('holiday-delete');

    //Brands
    Route::resource('admin/brand', BrandsController::class);
    Route::get('/admin/brand-trash', [BrandsController::class, 'brandTrash'])->name('brand-trash');
    Route::patch('/admin/brand-restore/{id}', [BrandsController::class, 'brandRestore'])->name('brand-restore');
    Route::post('/admin/brand-delete/{id}', [BrandsController::class, 'brandDelete'])->name('brand-delete');

    //Professionals
    Route::resource('admin/professionals', ProfessionalsController::class);
    Route::get('/admin/professionals-trash', [ProfessionalsController::class, 'professionalsTrash'])->name('professionals-trash');
    Route::patch('/admin/professionals-restore/{id}', [ProfessionalsController::class, 'professionalsRestore'])->name('professionals-restore');
    Route::post('/admin/professionals-delete/{id}', [ProfessionalsController::class, 'professionalsDelete'])->name('professionals-delete');

    //Testimonial
    Route::resource('admin/testimonial', TestimonialController::class);
    Route::get('/admin/testimonial-trash', [TestimonialController::class, 'testimonialTrash'])->name('testimonial-trash');
    Route::patch('/admin/testimonial-restore/{id}', [TestimonialController::class, 'testimonialRestore'])->name('testimonial-restore');
    Route::post('/admin/testimonial-delete/{id}', [TestimonialController::class, 'testimonialDelete'])->name('testimonial-delete');

});

    Route::get('fetch-state', [CityController::class, 'fetchState'])->name('fetch-state'); //auto select country data

    // home route
    // contact
    Route::post('contact', [ContactController::class, 'submit'])->name('contact.submit');
    // checkout
    Route::post('checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');

    // cart
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart/view', [CartController::class, 'viewCartData']);
    Route::post('cart/delete', [CartController::class, 'DeleteIteme']);
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');

    // Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/buy', [FrontendController::class, 'buy'])->name('buy');
    Route::get('/rent', [FrontendController::class, 'rent'])->name('rent');
    Route::get('/fetch-city', [FrontendController::class, 'fetchCity'])->name('fetch-city');
    Route::get('/fetch-states', [FrontendController::class, 'fetchStates'])->name('fetch-states');
    Route::get('/holiday', [FrontendController::class, 'holiday'])->name('holiday');
    Route::get('/services', [FrontendController::class, 'services'])->name('services');
    Route::get('/realtors', [FrontendController::class, 'realtors'])->name('realtors');
    Route::get('/brand', [FrontendController::class, 'brand'])->name('brand');
    Route::get('/testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/login', [FrontendController::class, 'login'])->name('login');
    Route::get('/india', [FrontendController::class, 'india'])->name('india');
    Route::get('/uk', [FrontendController::class, 'uk'])->name('uk');
    Route::get('/uae', [FrontendController::class, 'uae'])->name('uae');
    Route::get('/property/{slag}', [FrontendController::class, 'propertydetails'])->name('property');
    Route::post('/change-currency', [FrontendController::class, 'changeCurrency'])->name('change-currency');

    Route::get('/checkout', [FrontendController::class, 'cartform'])->name('cartform');
    Route::get('/terms&con', [FrontendController::class, 'terms'])->name('terms&con');
    Route::get('/privacy&poly', [FrontendController::class, 'privacy'])->name('privacy&poly');
    Route::get('/thanks', [FrontendController::class, 'thanks'])->name('thanks');

    // Route::get('search', [PropertyController::class, 'search'])->name('property.search');


    // Language Switch
    Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

    Route::get('dashboard', 'App\Http\Controllers\Frontend\FrontendController@index')->name('dashboard');

    // pages
    Route::get('terms', Terms::class)->name('terms');
    Route::get('privacy', Privacy::class)->name('privacy');


Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/edit', ['as' => "{$module_name}.profileEdit", 'uses' => "{$controller_name}@profileEdit"]);
        Route::patch('profile/edit', ['as' => "{$module_name}.profileUpdate", 'uses' => "{$controller_name}@profileUpdate"]);
        Route::get('profile/changePassword', ['as' => "{$module_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
        Route::patch('profile/changePassword', ['as' => "{$module_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
        Route::get('profile/{username?}', ['as' => "{$module_name}.profile", 'uses' => "{$controller_name}@profile"]);
        Route::get("{$module_name}/emailConfirmationResend", ['as' => "{$module_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
        Route::delete("{$module_name}/userProviderDestroy", ['as' => "{$module_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {
    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['can:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("{$module_name}", "{$controller_name}@index")->name("{$module_name}");
        Route::post("{$module_name}", "{$controller_name}@store")->name("{$module_name}.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("{$module_name}", ['as' => "{$module_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$module_name}/markAllAsRead", ['as' => "{$module_name}.markAllAsRead", 'uses' => "{$controller_name}@markAllAsRead"]);
    Route::delete("{$module_name}/deleteAll", ['as' => "{$module_name}.deleteAll", 'uses' => "{$controller_name}@deleteAll"]);
    Route::get("{$module_name}/{id}", ['as' => "{$module_name}.show", 'uses' => "{$controller_name}@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("{$module_name}", ['as' => "{$module_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$module_name}/create", ['as' => "{$module_name}.create", 'uses' => "{$controller_name}@create"]);
    Route::get("{$module_name}/download/{file_name}", ['as' => "{$module_name}.download", 'uses' => "{$controller_name}@download"]);
    Route::get("{$module_name}/delete/{file_name}", ['as' => "{$module_name}.delete", 'uses' => "{$controller_name}@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("{$module_name}", "{$controller_name}");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("{$module_name}/emailConfirmationResend/{id}", ['as' => "{$module_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
    Route::delete("{$module_name}/userProviderDestroy", ['as' => "{$module_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    Route::get("{$module_name}/changePassword/{id}", ['as' => "{$module_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
    Route::patch("{$module_name}/changePassword/{id}", ['as' => "{$module_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
    Route::get("{$module_name}/trashed", ['as' => "{$module_name}.trashed", 'uses' => "{$controller_name}@trashed"]);
    Route::patch("{$module_name}/trashed/{id}", ['as' => "{$module_name}.restore", 'uses' => "{$controller_name}@restore"]);
    Route::get("{$module_name}/index_data", ['as' => "{$module_name}.index_data", 'uses' => "{$controller_name}@index_data"]);
    Route::get("{$module_name}/index_list", ['as' => "{$module_name}.index_list", 'uses' => "{$controller_name}@index_list"]);
    Route::resource("{$module_name}", "{$controller_name}");
    Route::patch("{$module_name}/{id}/block", ['as' => "{$module_name}.block", 'uses' => "{$controller_name}@block", 'middleware' => ['can:block_users']]);
    Route::patch("{$module_name}/{id}/unblock", ['as' => "{$module_name}.unblock", 'uses' => "{$controller_name}@unblock", 'middleware' => ['can:block_users']]);
});
