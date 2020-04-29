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

Route::get('/article-list', 'HomeController@article_list');
Route::get('/article-detail/{id}', 'HomeController@article_detail');
Route::get('/team-detail', 'HomeController@team_detail');
Route::get('/event-list', 'HomeController@event_list');
Route::get('/block-akses', 'HomeController@blockAkses');
Route::get('/detail-pengumuman/{id}', 'HomeController@detailPengumuman');	
Route::get('/detail-pimpinan/{id}', 'HomeController@detailPimpinan');	
Route::get('/detail-datadosen/{id}', 'HomeController@detailDatadosen');		
Route::get('/all-gallery', 'HomeController@allgallery');	
Route::get('/gallery-detail', 'HomeController@galleryDetail');	
Route::get('/all-testimony', 'HomeController@allTestimony');
Route::get('/detail-testimony/{id}', 'HomeController@detailTestimony');
Route::get('/about-us', 'HomeController@about_us');
Route::get('/contact-us', 'HomeController@contact_us');
Route::get('/gallery-detail/{id}', 'HomeController@gallery_detail');
Route::get('/event-detail/{id}', 'HomeController@event_detail');
Auth::routes();

// landing
Route::get('/', 'HomeController@index');
Route::get('/detail-finalis', 'HomeController@detailFinalis');
Route::get('/detail-prestasi', 'HomeController@detailPrestasi');
Route::get('/slider/detail/{id}', 'HomeController@detailSlider');
Route::get('/sambutan/detail/{id}', 'HomeController@detailSambutan');
Route::post('/berita/viewer/{id}', 'HomeController@viewerBerita');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin');

// Register Peserta
Route::get('/register-peserta', 'RegisterPesertaController@register');
Route::post('/register-peserta', 'RegisterPesertaController@postRegister');
Route::get('/register-peserta-sukses', 'RegisterPesertaController@registerSuccess');


Route::resource('user-groups', 'admin\UserGroupController');
Route::get('search-user-groups','admin\UserGroupController@search');
Route::resource('groups', 'admin\GroupController');
Route::get('search-groups','admin\GroupController@search');
Route::resource('group-roles', 'admin\GroupRoleController');
Route::get('search-group-roles','admin\GroupRoleController@search');
Route::resource('roles', 'admin\RoleController');
Route::get('search-roles','admin\RoleController@search');
Route::resource('categories', 'admin\CategoryController');
Route::get('search-categories','admin\CategoryController@search');
Route::resource('news', 'admin\BeritaController');
Route::get('search-news','admin\BeritaController@search');
Route::resource('events', 'admin\EventController');
Route::get('search-events','admin\EventController@search');
Route::resource('list-pengumuman', 'admin\ListPengumumanController');
Route::get('search-list-pengumuman','admin\ListPengumumanController@search');
Route::get('search-list-event','HomeController@searchEvent');

// Slider
Route::get('slider/index', ['as' => 'slider', 'uses' => 'SliderController@index']);
Route::get('slider/create', ['as' => 'create', 'uses' => 'SliderController@create']);
Route::post('slider/create', ['as' => 'store', 'uses' => 'SliderController@store']);
Route::get('slider/edit/{id}', ['as' => 'edit', 'uses' => 'SliderController@edit']);
Route::put('slider/edit/{id}', ['as' => 'edit', 'uses' => 'SliderController@update']);
Route::get('slider/show/{id}', ['as' => 'show', 'uses' => 'SliderController@show']);
Route::delete('slider/destroy/{id}', ['as' => 'destroy', 'uses' => 'SliderController@destroy']);
Route::get('/searchslider', ['as' => 'searchhari', 'uses' => 'SliderController@search']);

// Gallery
Route::get('gallery/index', ['as' => 'gallery', 'uses' => 'admin\GalleryController@index']);
Route::get('gallery/create', ['as' => 'create', 'uses' => 'admin\GalleryController@create']);
Route::post('gallery/create', ['as' => 'store', 'uses' => 'admin\GalleryController@store']);
Route::get('gallery/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GalleryController@edit']);
Route::put('gallery/edit/{id}', ['as' => 'edit', 'uses' => 'admin\GalleryController@update']);
Route::get('gallery/show/{id}', ['as' => 'show', 'uses' => 'admin\GalleryController@show']);
Route::delete('gallery/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\GalleryController@destroy']);
Route::get('/searchgallery', ['as' => 'searchgallery', 'uses' => 'admin\GalleryController@search']);

// Image Gallery
Route::get('image-gallery/index', ['as' => 'image-gallery', 'uses' => 'admin\ImageGalleryController@index']);
Route::get('image-gallery/create/{id}', ['as' => 'create', 'uses' => 'admin\ImageGalleryController@create']);
Route::post('image-gallery/create/{id}', ['as' => 'store', 'uses' => 'admin\ImageGalleryController@store']);
Route::get('image-gallery/edit/{id}', ['as' => 'edit', 'uses' => 'admin\ImageGalleryController@edit']);
Route::put('image-gallery/edit/{id}', ['as' => 'edit', 'uses' => 'admin\ImageGalleryController@update']);
Route::get('image-gallery/show/{id}', ['as' => 'show', 'uses' => 'admin\ImageGalleryController@show']);
Route::delete('image-gallery/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\ImageGalleryController@destroy']);
Route::get('/searchimagegallery', ['as' => 'searchimagegallery', 'uses' => 'admin\ImageGalleryController@search']);

// Pengumuman
Route::get('pengumuman/index', ['as' => 'pengumuman', 'uses' => 'admin\PengumumanController@index']);
Route::get('pengumuman/create', ['as' => 'create', 'uses' => 'admin\PengumumanController@create']);
Route::post('pengumuman/create', ['as' => 'store', 'uses' => 'admin\PengumumanController@store']);
Route::get('pengumuman/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PengumumanController@edit']);
Route::put('pengumuman/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PengumumanController@update']);
Route::get('pengumuman/show/{id}', ['as' => 'show', 'uses' => 'admin\PengumumanController@show']);
Route::delete('pengumuman/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PengumumanController@destroy']);
Route::get('/searchpengumuman', ['as' => 'searchgallery', 'uses' => 'admin\PengumumanController@search']);

// testimony
Route::get('testimony/index', ['as' => 'tesimony', 'uses' => 'admin\TestimonyController@index']);
Route::get('testimony/create', ['as' => 'create', 'uses' => 'admin\TestimonyController@create']);
Route::post('testimony/create', ['as' => 'storetestimony', 'uses' => 'admin\TestimonyController@store']);
Route::get('testimony/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TestimonyController@edit']);
Route::put('testimony/edit/{id}', ['as' => 'edit', 'uses' => 'admin\TestimonyController@update']);
Route::get('testimony/show/{id}', ['as' => 'show', 'uses' => 'admin\TestimonyController@show']);
Route::delete('testimony/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\TestimonyController@destroy']);
Route::get('/searchtestimony', ['as' => 'searchtestimony', 'uses' => 'admin\TestimonyController@search']);

// category-galleri
Route::get('category-galleri/index', ['as' => 'category-galleri', 'uses' => 'admin\CategoryGalleriController@index']);
Route::get('category-galleri/create', ['as' => 'create', 'uses' => 'admin\CategoryGalleriController@create']);
Route::post('category-galleri/create', ['as' => 'storecategorygalleri', 'uses' => 'admin\CategoryGalleriController@store']);
Route::get('category-galleri/edit/{id_category_galleries}', ['as' => 'ubah', 'uses' => 'admin\CategoryGalleriController@edit']);
Route::put('category-galleri/edit/{id_category_galleries}', ['as' => 'edit', 'uses' => 'admin\CategoryGalleriController@update']);
Route::get('category-galleri/show/{id_category_galleries}', ['as' => 'show', 'uses' => 'admin\CategoryGalleriController@show']);
Route::delete('category-galleri/destroy/{id_category_galleries}', ['as' => 'destroy', 'uses' => 'admin\CategoryGalleriController@destroy']);
Route::get('/searchcategorygalleri', ['as' => 'searchcategorygalleri', 'uses' => 'admin\CategoryGalleriController@search']);

// Berita
Route::get('berita/index', ['as' => 'berita', 'uses' => 'admin\BeritaController@index']);
Route::get('berita/create', ['as' => 'create', 'uses' => 'admin\BeritaController@create']);
Route::post('berita/create', ['as' => 'storecategorygalleri', 'uses' => 'admin\BeritaController@store']);
Route::get('berita/edit/{id}', ['as' => 'ubah', 'uses' => 'admin\BeritaController@edit']);
Route::put('berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\BeritaController@update']);
Route::get('berita/show/{id}', ['as' => 'show', 'uses' => 'admin\BeritaController@show']);
Route::delete('berita/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\BeritaController@destroy']);
Route::get('/searchberita', ['as' => 'searchberita', 'uses' => 'admin\BeritaController@search']);

// Kategori Berita
Route::get('kategori-berita/index', ['as' => 'kategori-berita', 'uses' => 'admin\CategoryBeritaController@index']);
Route::get('kategori-berita/create', ['as' => 'create', 'uses' => 'admin\CategoryBeritaController@create']);
Route::post('kategori-berita/create', ['as' => 'storecategoryberita', 'uses' => 'admin\CategoryBeritaController@store']);
Route::get('kategori-berita/edit/{id}', ['as' => 'ubah', 'uses' => 'admin\CategoryBeritaController@edit']);
Route::put('kategori-berita/edit/{id}', ['as' => 'edit', 'uses' => 'admin\CategoryBeritaController@update']);
Route::get('kategori-berita/show/{id}', ['as' => 'show', 'uses' => 'admin\CategoryBeritaController@show']);
Route::delete('kategori-berita/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\CategoryBeritaController@destroy']);
Route::get('/searchkategoriberita', ['as' => 'searchkategoriberita', 'uses' => 'admin\CategoryBeritaController@search']);

// Kategori Events
Route::get('kategori-events/index', ['as' => 'kategori-events', 'uses' => 'admin\CategoryEventController@index']);
Route::get('kategori-events/create', ['as' => 'create', 'uses' => 'admin\CategoryEventController@create']);
Route::post('kategori-events/create', ['as' => 'storecategoryberita', 'uses' => 'admin\CategoryEventController@store']);
Route::get('kategori-events/edit/{id_category_event}', ['as' => 'ubah', 'uses' => 'admin\CategoryEventController@edit']);
Route::put('kategori-events/edit/{id_category_event}', ['as' => 'edit', 'uses' => 'admin\CategoryEventController@update']);
Route::get('kategori-events/show/{id_category_event}', ['as' => 'show', 'uses' => 'admin\CategoryEventController@show']);
Route::delete('kategori-events/destroy/{id_category_event}', ['as' => 'destroy', 'uses' => 'admin\CategoryEventController@destroy']);
Route::get('/searchkategorievents', ['as' => 'searchkategorievents', 'uses' => 'admin\CategoryEventController@search']);

// Categori Pengumuman
Route::get('kategori-pengumuman/index', ['as' => 'kategori-pengumuman', 'uses' => 'admin\CategoryPengumumanController@index']);
Route::get('kategori-pengumuman/create', ['as' => 'create', 'uses' => 'admin\CategoryPengumumanController@create']);
Route::post('kategori-pengumuman/create', ['as' => 'store', 'uses' => 'admin\CategoryPengumumanController@store']);
Route::get('kategori-pengumuman/edit/{id}', ['as' => 'ubah', 'uses' => 'admin\CategoryPengumumanController@edit']);
Route::put('kategori-pengumuman/edit/{id}', ['as' => 'edit', 'uses' => 'admin\CategoryPengumumanController@update']);
Route::get('kategori-pengumuman/show/{id}', ['as' => 'show', 'uses' => 'admin\CategoryPengumumanController@show']);
Route::delete('kategori-pengumuman/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\CategoryPengumumanController@destroy']);
Route::get('/searchkategori-pengumuman', ['as' => 'searchkategori-pengumuman', 'uses' => 'admin\CategoryPengumumanController@search']);

Route::get('/ajax-prodi', ['as' => 'store', 'uses' =>'HomeController@ajaxGetProdi']);
Route::get('/ajax-get-mhs-by-nim', ['as' => 'store', 'uses' =>'HomeController@ajaxGetMahasiswaByNim']);
Route::get('/ajax-check-mhs-by-nim', ['as' => 'store', 'uses' =>'HomeController@ajaxCheckMahasiswaByNim']);

