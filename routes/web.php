<?php
use App\Http\livewire\ServiceDetailsComponent;
use App\Http\livewire\Admin\AdminEditServiceComponent;
use App\Http\livewire\Admin\AdminAddServiceComponent;
use App\Http\livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\livewire\Admin\AdminServicesComponent;
use App\Http\livewire\Admin\AdminServiceCategoryComponent;
use App\Http\livewire\ServicesByCategoryComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\livewire\Admin\AdminDashboardComponent;
use App\Http\livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\livewire\Customer\CustomerDashboardComponent;
use App\Http\livewire\HomeComponent;
use App\Http\livewire\Sprovider\SproviderDashboardComponent;
use App\Http\livewire\Admin\AdminSliderComponent;
use App\Http\livewire\Admin\AdminAddSlideComponent;
use App\Http\livewire\Admin\AdminEditSlideComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceBookingController;
use App\Http\Livewire\AboutusComponent;


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

//Route::get('/', function () {
 // Customer   return view('home');
//});


Route::get('/',HomeComponent::class)->name('home');{
Route::get('/service-categories', ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.service_details');
Route::get('/about-us',AboutusComponent::class)->name('home.about_us');
Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');
Route::post('/book/service',[ServiceBookingController::class,'store'])->name('service.book');
}
// Customer
Route::middleware(['auth:sanctum', 'verified',])->group(function(){
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('/customer/dashboard');
    Route::get('/customer/orders',[ServiceBookingController::class,'index'])->name('customer.orders');
    Route::get('/customer/orders/view/{order_id}',[ServiceBookingController::class,'show'])->name('customers.orders.view');
}
);
// Service Provider
Route::middleware(['auth:sanctum', 'verified', 'authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('/sprovider/dashboard');
    Route::get('/sprovider/all-services',AdminServicesComponent::class)->name('/sprovider/all_services');
    Route::get('/sprovider/services/add',AdminAddServiceComponent::class)->name('/sprovider/add_service');
    Route::get('/sprovider/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('/sprovider/edit_service');
    Route::get('/sprovider/orders',[ServiceBookingController::class,'index'])->name('sprovider.orders');
    Route::get('/sprovider/orders/view/{order_id}',[ServiceBookingController::class,'show'])->name('orders.view');
    Route::get('/sprovider/orders/edit/{order_id}',[ServiceBookingController::class,'show'])->name('orders.edit');
    Route::post('/sprovider/orders/update',[ServiceBookingController::class,'update'])->name('orders.update');
}
);
// Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('/admin/dashboard');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('/admin/service_categories');
    Route::get('/admin/service-categories/add', AdminAddServiceCategoryComponent::class)->name('/admin/add_service_category');
    Route::get('/admin/service-categories/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('/admin/edit_service_category');
    Route::get('/admin/all-services',AdminServicesComponent::class)->name('/admin/all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('/admin/services_by_category');
    Route::get('/admin/services/add',AdminAddServiceComponent::class)->name('/admin/add_service');
    Route::get('/admin/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('/admin/edit_service');
}
);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
