<?php

use Illuminate\Support\Facades\Route;


Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('language');

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
Route::get('/', 'FrontController@index')->name('front.home');
Route::get('/page/articles', 'FrontController@articles')->name('front.articles');
Route::get('/page/article/{article}', 'FrontController@article')->name('front.article');
Route::get('/page/stores', 'FrontController@stores')->name('front.stores');
Route::get('/page/aboutUs', function(){
    return view('about_us');
})->name('front.aboutUs');
Route::get('/page/contact','FrontController@contactForm')->name('front.contact');
Route::get('/page/contactStore/{store}','FrontController@contactStore')->name('front.contactStore');
Route::get('/page/store/{store}', 'FrontController@store')->name('front.store');

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('/profile','FrontController@profile')->name('front.profile');
    Route::get('/store/edit','FrontStoreController@edit')->name('frontStore.edit');
    Route::put('/store/update','FrontStoreController@update')->name('frontStore.update');
    Route::get('/store/articles','FrontArticleController@index')->name('frontArticle.index');
    Route::get('/store/articles/create','FrontArticleController@create')->name('frontArticle.create');
    Route::post('/store/articles/store','FrontArticleController@store')->name('frontArticle.store');
    Route::delete('/store/article/delete/{article}','FrontArticleController@destroy')->name('frontArticle.destroy');
    Route::get('/store/articles/edit/{article}','FrontArticleController@edit')->name('frontArticle.edit');
    Route::put('/store/articles/edit/{article}','FrontArticleController@update')->name('frontArticle.update');
    Route::get('/store/article/{article}','FrontArticleController@show')->name('frontArticle.show');
    Route::post('/store/article/newImage','FrontArticleController@newImage')->name('frontArticle.newImage');
    Route::delete('/store/articleImage/delete/{articleImage}','FrontArticleController@deleteImage')->name('frontArticle.deleteImage');
    Route::get('/store/article/setFeaturedImage/{article}/{articleImage}','FrontArticleController@setFeaturedImage')->name('frontArticle.setFeaturedImage');
});



Route::middleware('admin')->prefix('admin')->group(function(){
Route::get('/', 'HomeController@index')->name('home');
Route::get('/setAdmin/{user}','UserController@setAdmin')->name('user.setAdmin');
Route::resource('/category', 'CategoryController');
Route::resource('/article', 'ArticleController');
Route::resource('/store', 'StoreController');
Route::resource('/article_image', 'ArticleImageController');
Route::resource('/user', 'UserController');

Route::resource('/store_carousel', 'StoreCarouselController');

Route::get('/changePassword/{user}', 'UserController@changePassword')->name('user.changePassword');
Route::put('/updatePassword/{user}', 'UserController@passwordUpdate')->name('user.passwordUpdate');

Route::get('/article/setFeaturedImage/{article}/{articleImage}','ArticleController@setFeaturedImage')->name('article.setFeaturedImage');
Route::post('/storeFile','StoreFileController@storeFile')->name('storeFile');
Route::get('/storeDownload/{storeFile}','StoreFileController@storeDownload')->name('storeDownload');


});

