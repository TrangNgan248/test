<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CateController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingAdminController;
use App\Http\Controllers\UserCategoryController;
use App\Traits\AuthAdminTrait;
use SebastianBergmann\CodeUnit\FunctionUnit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//user

Route::get('/register', [
    RegisterController::class, 'index'
])->name('register');
Route::post('/register', [
    RegisterController::class, 'store'
]);

Route::get('/login', [
    LoginController::class, 'index'
])->name('login');
Route::post('/login', [
    LoginController::class, 'store'
]);

Route::get('/logout', [
    LogoutController::class, 'store'
])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/category/{id}',[
   UserCategoryController::class, 'index'
])->name('category.product');

Route::get('/search',[
    SearchController::class, 'index'
])->name('search');
//admin



Route::prefix('admin')->group(function () {

    Route::get('/', [
        AdvertAdminController::class,'home'
    ])->name('adminhome');
    
    Route::get('/register',[
        AdminRegisterController::class, 'index'
    ])->name('adminregister');
    Route::post('/register', [
        AdminRegisterController::class, 'store'
    ]);

    Route::get('/login', [
        AdminLoginController::class, 'index'
    ])->name('adminlogin');
    Route::post('/login', [
        AdminLoginController::class, 'store'
    ]);
    Route::get('/logout', [
        AdminLogoutController::class, 'logoutAdmin'
    ])->name('logoutAdmin');

    Route::get('/home', [
        AdvertAdminController::class,'home'
    ])->name('adminhome');

    Route::prefix('categories')->group(function (){
        Route::get('/',[
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index'
            //CategoryController::class, 'index',
        ]);
        Route::get('/create',[
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create',
        ]);
        Route::post('/store',[
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store',
        ]);
    
         Route::get('/edit/{id}',[
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit',
        ]);
          Route::post('/update/{id}',[
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
        ]);
    
          Route::get('/delete/{id}',[
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
        ]);
    });
    
    Route::prefix('menus')->group(function (){
        Route::get('/',[
            'as'=>'menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index',
        ]);
        Route::get('/create',[
            'as'=>'menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create',
        ]);
        Route::post('/store',[
            'as'=>'menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'menus.edit',
            'uses'=>'App\Http\Controllers\MenuController@edit',
        ]);
          Route::post('/update/{id}',[
            'as'=>'menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update',
        ]);
    
          Route::get('/delete/{id}',[
            'as'=>'menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete',
        ]);
    });
    
    Route::prefix('sachs')->group(function (){
        Route::get('/', [SachController::class, 'index'])->name('sachs.index');
        Route::get('/create',[
            'as'=>'sachs.create',
            'uses'=>'App\Http\Controllers\SachController@create',
        ]);
        Route::post('/store',[
            'as'=>'sachs.store',
            'uses'=>'App\Http\Controllers\SachController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'sachs.edit',
            'uses'=>'App\Http\Controllers\SachController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'sachs.update',
            'uses'=>'App\Http\Controllers\SachController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'sachs.delete',
            'uses'=>'App\Http\Controllers\SachController@delete',
        ]);
    
    });


    Route::prefix('advert')->group(function (){
        Route::get('/', [
            AdvertAdminController::class, 'index'
        ])->name('advert.index');
        Route::get('/create', [
            AdvertAdminController::class, 'create'
        ])->name('advert.create');
        Route::post('/store', [
            AdvertAdminController::class, 'store'
        ])->name('advert.store');
        Route::get('/edit/{id}', [
            AdvertAdminController::class, 'edit'
        ])->name('advert.edit');
        Route::post('/update/{id}', [
            AdvertAdminController::class, 'update'
        ])->name('advert.update');
        Route::get('/delete/{id}', [
            AdvertAdminController::class, 'delete'
        ])->name('advert.delete');
        
    });
    
    Route::prefix('Settings')->group(function () {
        Route::get('/', [
            SettingAdminController::class, 'index'
        ])->name('settings.index');
        Route::get('/create', [
            SettingAdminController::class, 'create'
        ])->name('settings.create');
        Route::post('/store', [
            SettingAdminController::class, 'store'
        ])->name('settings.store');
        Route::get('/edit/{id}', [
            SettingAdminController::class, 'edit'
        ])->name('settings.edit');
        Route::post('/update/{id}', [
            SettingAdminController::class, 'update'
        ])->name('settings.update');
        Route::get('/delete/{id}', [
            SettingAdminController::class, 'delete'
        ])->name('settings.delete');
        
    });
    Route::prefix('Newsgroup')->group(function (){
        Route::get('/',[
            'as'=>'newsgroup.index',
            'uses'=>'App\Http\Controllers\NewsgroupController@index',
        ]);
        Route::get('/create',[
            'as'=>'newsgroup.create',
            'uses'=>'App\Http\Controllers\NewsgroupController@create',
        ]);
        Route::post('/store',[
            'as'=>'newsgroup.store',
            'uses'=>'App\Http\Controllers\NewsgroupController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'newsgroup.edit',
            'uses'=>'App\Http\Controllers\NewsgroupController@edit',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'newsgroup.delete',
            'uses'=>'App\Http\Controllers\NewsgroupController@delete',
        ]);
        Route::post('/update/{id}',[
            'as'=>'newsgroup.update',
            'uses'=>'App\Http\Controllers\NewsgroupController@update',
        ]);

    });
    Route::prefix('News')->group(function (){
        Route::get('/',[
            'as'=>'news.index',
            'uses'=>'App\Http\Controllers\NewsController@index',
        ]);
        Route::get('/create',[
            'as'=>'news.create',
            'uses'=>'App\Http\Controllers\NewsController@create',
        ]);
        Route::post('/store',[
            'as'=>'news.store',
            'uses'=>'App\Http\Controllers\NewsController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'news.edit',
            'uses'=>'App\Http\Controllers\NewsController@edit',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'news.delete',
            'uses'=>'App\Http\Controllers\NewsController@delete',
        ]);
        Route::post('/update/{id}',[
            'as'=>'news.update',
            'uses'=>'App\Http\Controllers\NewsController@update',
        ]);

    });
    
    Route::prefix('nxbs')->group(function (){
        Route::get('/',[
            'as'=>'nxbs.index',
            'uses'=>'App\Http\Controllers\NXBController@index',
        ]);
        Route::get('/create',[
            'as'=>'nxbs.create',
            'uses'=>'App\Http\Controllers\NXBController@create',
        ]);
        Route::post('/store',[
            'as'=>'nxbs.store',
            'uses'=>'App\Http\Controllers\NXBController@store',
        ]);
         Route::get('/edit/{id}',[
            'as'=>'nxbs.edit',
            'uses'=>'App\Http\Controllers\NXBController@edit',
        ]);
          Route::post('/update/{id}',[
            'as'=>'nxbs.update',
            'uses'=>'App\Http\Controllers\NXBController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'nxbs.delete',
            'uses'=>'App\Http\Controllers\NXBController@delete',
        ]);
    });

    Route::prefix('tacgias')->group(function (){
        Route::get('/',[
            'as'=>'tacgias.index',
            'uses'=>'App\Http\Controllers\TacgiaController@index',
        ]);
        Route::get('/create',[
            'as'=>'tacgias.create',
            'uses'=>'App\Http\Controllers\TacgiaController@create',
        ]);
        Route::post('/store',[
            'as'=>'tacgias.store',
            'uses'=>'App\Http\Controllers\TacgiaController@store',
        ]);
        Route::get('/edit/{id}',[
            'as'=>'tacgias.edit',
            'uses'=>'App\Http\Controllers\TacgiaController@edit',
        ]);
        Route::post('/update/{id}',[
            'as'=>'tacgias.update',
            'uses'=>'App\Http\Controllers\TacgiaController@update',
        ]);
        Route::get('/delete/{id}',[
            'as'=>'tacgias.delete',
            'uses'=>'App\Http\Controllers\TacgiaController@delete',
        ]);
    });
    
});