<?php

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

// Home Route
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Article Routes
Route::get('/articles', 'ArticlesController@index');
Route::get('/article/category/{id}', 'ArticlesController@category');
Route::get('/article/{id}', 'ArticlesController@show');

// Comment Route
Route::post('/article/comment', 'CommentController@store')->name('user.comment.store');
// Requirement Route
Route::get('/requirement', 'RequirementController@index');

// Author Routes
Route::get('/authors', 'AuthorController@index');
Route::get('/author/{id}', 'AuthorController@show');


// Search Route
Route::get('/search', 'SearchController@index');

// Contact Route
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendMail');




// Auth Routes
Auth::routes();
//Auth::routes(['register' => false]);


// Auth Common Routes
Route::group(['middleware' => 'auth'], function()
{
    // Dashboard Route
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
});

// Admin Routes
Route::group(['prefix' => 'dashboard/admin', 'middleware' => ['auth', 'isAdmin']], function()
{
    // Article Routes
    Route::resource('article-category', 'Admin\ArticleCategoryController');
    Route::get('article/approve', 'Admin\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Admin\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Admin\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Admin\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Admin\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Admin\ArticleController@destroy')->name('article.destroy');

    // Issue Routes
    Route::get('issue/{id}', 'Admin\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Admin\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Admin\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Admin\ArticleIssueController@destroy')->name('issue.destroy');


    Route::resource('requirement', 'Admin\RequirementController');
    Route::resource('reviewer', 'Admin\ReviewerController');
    Route::resource('author', 'Admin\AuthorController');

    // Comment Route
    Route::resource('comment', 'Admin\CommentController');
    // Profile Route
    Route::resource('profile', 'Admin\ProfileController');

    // Setting Routes
    Route::get('setting', 'Admin\SettingController@index')->name('setting.index');
    Route::post('siteinfo', 'Admin\SettingController@siteInfo')->name('setting.siteinfo');
    Route::post('contactinfo', 'Admin\SettingController@contactInfo')->name('setting.contactinfo');
    Route::post('socialinfo', 'Admin\SettingController@socialInfo')->name('setting.socialinfo');
    Route::post('changepass', 'Admin\SettingController@changePass')->name('setting.changepass');
});


// Author Routes
Route::group(['prefix' => 'dashboard/reviewer', 'as'=>'reviewer.', 'middleware' => ['auth', 'isReviewer']], function()
{
    // Article Routes
    Route::get('article/approve', 'Reviewer\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Reviewer\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Reviewer\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Reviewer\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Reviewer\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Reviewer\ArticleController@destroy')->name('article.destroy');

    // Issue Routes
    Route::get('issue/{id}', 'Reviewer\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Reviewer\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Reviewer\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Reviewer\ArticleIssueController@destroy')->name('issue.destroy');

    // Profile Route
    Route::resource('profile', 'Reviewer\ProfileController');
});


// Author Routes
Route::group(['prefix' => 'dashboard/author', 'as'=>'author.', 'middleware' => ['auth', 'isAuthor']], function()
{
    // Article Routes
    Route::resource('article', 'Author\ArticleController');

    // Issue Routes
    Route::resource('issue', 'Author\ArticleIssueController');

    // Profile Route
    Route::resource('profile', 'Author\ProfileController');
});
