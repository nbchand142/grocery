<?php

use App\Http\Livewire\HomepageLivewire;
use App\Http\Livewire\SingleProductLivewire;
use App\Http\Livewire\CategoriesLivewire;
use App\Http\Livewire\AdminCategoriesLivewire;
use App\Http\Livewire\AdminCategoryEditLivewire;
use App\Http\Livewire\AdminCategoryAddLivewire;
use App\Http\Livewire\CartLivewire;
use App\Http\Livewire\SearchLivewire;
use App\Http\Livewire\OrderLivewire;
use App\Http\Livewire\CheckoutLivewire;
use App\Http\Livewire\AdminOrderLivewire;
use App\Http\Livewire\AdminOrderEditLivewire;
use App\Http\Livewire\AdminProductLivewire;
use App\Http\Livewire\AdminProductEditLivewire;
use App\Http\Livewire\AdminProductAddLivewire;
use App\Http\Livewire\AdminUserLivewire;
use App\Http\Livewire\AdminUserEditLivewire;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\OrderBillLivewire;
use Illuminate\Support\Facades\Route;


// Storefront Layout
Route::get('/',HomepageLivewire::class)->name('homepage');
Route::get('/product/{product_id}',SingleProductLivewire::class)->name('product');
Route::get('/categories/{category_id}',CategoriesLivewire::class)->name('categories');
Route::get('/cart',CartLivewire::class)->name('cart');
Route::get('/search',SearchLivewire::class)->name('search');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {


    Route::get('/my-orders',OrderLivewire::class)->name('my-orders');
    Route::get('/bill/{order_id}',OrderBillLivewire::class)->name('order-bill');

    Route::middleware(['only_admin'])->group(function () {

        Route::get('/dashboard', DashboardLivewire::class)->name('dashboard');
        Route::get('/admin/order/',AdminOrderLivewire::class)->name('admin.order');
        Route::get('/admin/order/edit/{order_id}',AdminOrderEditLivewire::class)->name('admin.order.edit');
        Route::get('/admin/products',AdminProductLivewire::class)->name('admin.products');
        Route::get('/admin/product/edit/{product_id}',AdminProductEditLivewire::class)->name('admin.product.edit');
        Route::get('/admin/product/add',AdminProductAddLivewire::class)->name('admin.product.add');
        Route::get('/admin/users',AdminUserLivewire::class)->name('admin.users');
        Route::get('/admin/user/edit{user_id}',AdminUserEditLivewire::class)->name('admin.user.edit');
        Route::get('/admin/category/edit/{category_id}',AdminCategoryEditLivewire::class)->name('admin.category.edit');
        Route::get('/admin/category/add',AdminCategoryAddLivewire::class)->name('admin.category.add');
        Route::get('/admin/categories',AdminCategoriesLivewire::class)->name('admin.categories');

    });
});
