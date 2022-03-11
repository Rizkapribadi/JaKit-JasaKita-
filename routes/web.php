<?php

use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\JasaComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\PromoComponent;
use App\Http\Livewire\FavoritelistComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\ResultFilterRegionComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminSubcategoryComponent;
use App\Http\Livewire\Admin\AdminAddSubcategoryComponent;
use App\Http\Livewire\Admin\AdminEditSubcategoryComponent;
use App\Http\Livewire\Admin\AdminJasaComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminProfileComponent;
use App\Http\Livewire\Admin\AdminEditProfileComponent;
use App\Http\Livewire\Admin\AdminChangePasswordComponent;
use App\Http\Livewire\User\UserJasaComponent;
use App\Http\Livewire\User\UserAddJasaComponent;
use App\Http\Livewire\User\UserEditJasaComponent;
use App\Http\Livewire\User\UserCouponsComponent;
use App\Http\Livewire\User\UserAddCouponsComponent;
use App\Http\Livewire\User\UserEditCouponsComponent;
use App\Http\Livewire\User\SellerOrderComponent;
use App\Http\Livewire\User\SellerOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserEditProfilComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserProfilComponent;
use App\Http\Livewire\User\UserAddAdsComponent;
use App\Http\Livewire\User\UserEditAdsComponent;
use App\Http\Livewire\Admin\AdminAdsComponent;
use App\Http\Livewire\Admin\AdminEditAdsComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/',HomeComponent::class);
Route::get('/jasa',JasaComponent::class);
Route::get('/cart',CartComponent::class)->name('jasa.cart');
Route::get('/promo',PromoComponent::class);
Route::get('/jasa/{slug}', DetailsComponent::class)->name('jasa.details');
Route::get('/jasa-category/{category_slug}', CategoryComponent::class)->name('jasa.category');
Route::get('/search', SearchComponent::class)->name('jasa.search');
Route::get('/favoritelist',FavoritelistComponent::class)->name('jasa.favoritelist');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/jasa-province/{province_id}', ResultFilterRegionComponent::class)->name('jasa.province');


// For user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/services', UserJasaComponent::class)->name('user.services');
    Route::get('/user/service/add', UserAddJasaComponent::class)->name('user.addservice');
    Route::get('/user/service/edit/{jasa_slug}', UserEditJasaComponent::class)->name('user.editservice');

    Route::get('/user/coupons', UserCouponsComponent::class)->name('user.coupons');
    Route::get('/user/coupon/add', UserAddCouponsComponent::class)->name('user.addcoupon');
    Route::get('/user/coupon/edit/{coupon_id}', UserEditCouponsComponent::class)->name('user.editcoupon');

    Route::get('/user/sellerorders', SellerOrderComponent::class)->name('user.sellerorders');
    Route::get('/user/sellerorders/{order_id}', SellerOrderDetailsComponent::class)->name('user.sellerdetails');
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');

    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');

    Route::get('/user/profil/edit/{user_id}',UserEditProfilComponent::class)->name('user.editprofil');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');

    Route::get('/user/profil/change-password',UserChangePasswordComponent::class)->name('user.changepassword');

    Route::get('/user/profil',UserProfilComponent::class)->name('user.profil');

    Route::get('/user/advertisement/{jasa_id}',UserAddAdsComponent::class)->name('user.add-ads');

    Route::get('/user/advertisement/edit/{jasa_id}',UserEditAdsComponent::class)->name('user.edit-ads');

});

// For admin 
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function (){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/subcategories', AdminSubcategoryComponent::class)->name('admin.subcategories');
    Route::get('/admin/subcategory/add', AdminAddSubcategoryComponent::class)->name('admin.addsubcategory');
    Route::get('/admin/subcategory/edit/{subcategory_slug}', AdminEditSubcategoryComponent::class)->name('admin.editsubcategory');
    Route::get('/admin/services', AdminJasaComponent::class)->name('admin.services');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');
    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/profile', AdminProfileComponent::class)->name('admin.profile');
    Route::get('/admin/profile/edit/{user_id}',AdminEditProfileComponent::class)->name('admin.editprofile');
    Route::get('/admin/profile/change-password',AdminChangePasswordComponent::class)->name('admin.changepassword');
    Route::get('/admin/advertisement/', AdminAdsComponent::class)->name('admin.advertisement');
    Route::get('/admin/advertisement/edit/{ads_id}',AdminEditAdsComponent::class)->name('admin.edit-ads');

});



