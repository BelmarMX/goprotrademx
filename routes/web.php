<?php
/*
|--------------------------------------------------------------------------
| Authenticated Routes & API Routes
|--------------------------------------------------------------------------
|
| This routes are for the CMS and need authentication before you can edit
|
*/
Auth::routes();
Route::group(['prefix' => 'cms', 'middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index')
        -> name('home');

    Route::group(['prefix' => 'api'], function(){
        // Articles
        Route::resource('articles', 'BlogArticleController');
        Route::get('articles/{id}/restore', 'BlogArticleController@restore');

        // Articles Featured*
        Route::resource('articles-featured', 'BlogArticleController');
        Route::get('articles-featured/{id}/restore', 'BlogArticleController@restore');

        // Categories
        Route::resource('categories', 'BlogCategoryController');
        Route::get('categories/{id}/restore', 'BlogCategoryController@restore');
        Route::post('categories/sort', 'BlogCategoryController@sort');

        // Subcategories
        Route::resource('subcategories', 'BlogSubcategoryController');
        Route::get('subcategories/{id}/restore', 'BlogSubcategoryController@restore');

        // Authors
        Route::resource('authors', 'BlogAuthorController');
        Route::get('authors/{id}/restore', 'BlogAuthorController@restore');

        // Tags
        Route::resource('tags', 'BlogTagController');
        Route::get('tags/{id}/restore', 'BlogTagController@restore');

        Route::resource('article-tags', 'BlogArticleTagsController');
        Route::get('article-tags/{id}/restore', 'BlogArticleTagsController@restore');

        // Galleries
        Route::resource('galleries', 'GalleryController');
        Route::get('galleries/{id}/restore', 'GalleryController@restore');

        Route::resource('gallery-elements', 'GalleryElementsController');
        Route::get('gallery-elements/gallery/{id}', 'GalleryElementsController@get_gallery');
        Route::get('gallery-elements/get/images', 'GalleryElementsController@get_images');
        Route::get('gallery-elements/get/images/url_gallery/{id}', 'GalleryElementsController@url_gallery');
        Route::get('gallery-elements/get/images/url_image/{id}', 'GalleryElementsController@url_images');
        Route::get('gallery-elements/{id}/restore', 'GalleryElementsController@restore');

        // Photo galleries
        Route::resource('photo-galleries', 'PhotoGalleryController');
        Route::get('photo-galleries/{id}/restore', 'PhotoGalleryController@restore');

        Route::resource('photo-gallery-elements', 'PhotoGalleryElementController');
        Route::get('photo-gallery-elements/gallery/{id}', 'PhotoGalleryElementController@get_gallery');
        Route::get('photo-gallery-elements/get/images', 'PhotoGalleryElementController@get_images');
        Route::get('photo-gallery-elements/get/images/url_gallery/{id}', 'PhotoGalleryElementController@url_gallery');
        Route::get('photo-gallery-elements/get/images/url_image/{id}', 'PhotoGalleryElementController@url_images');
        Route::get('photo-gallery-elements/{id}/restore', 'PhotoGalleryElementController@restore');

        // Video Galleries
        Route::resource('video-galleries', 'VideoGalleryController');
        Route::get('video-galleries/{id}/restore', 'VideoGalleryController@restore');

        Route::resource('video-gallery-elements', 'VideoGalleryElementController');
        Route::get('video-gallery-elements/gallery/{id}', 'VideoGalleryElementController@get_gallery');
        Route::get('video-gallery-elements/get/images', 'VideoGalleryElementController@get_images');
        Route::get('video-gallery-elements/get/images/url_gallery/{id}', 'VideoGalleryElementController@url_gallery');
        Route::get('video-gallery-elements/get/images/url_image/{id}', 'VideoGalleryElementController@url_images');
        Route::get('video-gallery-elements/{id}/restore', 'VideoGalleryElementController@restore');

        // Anuncios
        Route::resource('client',           'AdsClientController');
        Route::get('client/{id}/restore',   'AdsClientController@restore');

        Route::resource('ads-elements', 'AdsAnnounceController');
        Route::get('ads-elements/client/{id}', 'AdsAnnounceController@get_ads');
        Route::get('ads-elements/get/images', 'AdsAnnounceController@get_images');
        Route::get('ads-elements/get/images/url_gallery/{id}', 'AdsAnnounceController@url_gallery');
        Route::get('ads-elements/get/images/url_image/{id}', 'AdsAnnounceController@url_images');
        Route::get('ads-elements/{id}/restore', 'AdsAnnounceController@restore');
    });

    Route::any('{slug}',                    'HomeController@index');
    Route::any('{slug}/{slug1}',            'HomeController@index');
    Route::any('{slug}/{slug1}/{slug2}',    'HomeController@index');
});

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

Route::get(
        '/'
    ,   'NavigationController@index'
) -> name('index');
Route::get(
        'embed/{code}'
    ,   'NavigationController@embed'
) -> name('embed');
Route::get(
        'blog'
    ,   'NavigationController@blog'
) -> name('blog');
Route::get(
    'blog/{category}'
    ,   'NavigationController@byCategory'
) -> name('blog-category');
Route::get(
    'blog/{category}/{article}'
    ,   'NavigationController@article'
) -> name('blog-article');
Route::get(
        'contact'
    ,   'NavigationController@contact'
) -> name('contact');
Route::get(
        'privacy-policy'
    ,   'NavigationController@privacyPolicy'
) -> name('privacy-policy');
Route::get(
        'sent'
    ,   'NavigationController@sent'
) -> name('sent');
Route::get(
        'thanks'
    ,   'NavigationController@thanks'
) -> name('thanks');
Route::post(
        'contact'
    ,   'NavigationController@mailContact'
) -> name('mail.contact');
// Pages
Route::get(
        'services'
    ,   'NavigationController@services'
) -> name('services');
Route::get(
        'company'
    ,   'NavigationController@company'
) -> name('company');
/* -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
