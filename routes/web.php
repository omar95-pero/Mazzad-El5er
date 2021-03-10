<?php

use Illuminate\Support\Facades\Route;
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
########################Site Pages##############################
################################################################
Route::get('/', 'Site\IndexController@getIndex')->name('index');
Route::get('/ShowAuctions', 'Site\AuctionController@getAllAuctions')->name('auctions.detailes');
Route::get('/AddAuction', 'Site\IndexController@getAuctionAdd')->middleware('auth')->name('auction.add');
Route::get('AuctionDetails/{id}', 'Site\AuctionController@auctionDetails')->name('auction.details');
Route::get('/AboutUs', 'Site\IndexController@getAbout')->name('aboutus');
Route::get('/ContactUs', 'Site\ContactController@getContact')->name('site.Contact');
Route::post('/ContactUs', 'Site\ContactController@saveContact')->name('save.contact');
Route::get('/Store', 'Site\IndexController@Store')->name('store');
Route::get('mail','Site\MailController@send_Email');
Route::get('test','Site\AuctionController@checkTimeAuction');
##########################End Route Pages############################
#####################################################################
#####################################################################
########################User Profile Routes##########################
Route::get('/profile/{id}','Site\IndexController@getProfile')->name('user.profile');






#############################Bid Process#############################
#####################################################################
#####################################################################
Route::post('AuctionProcess/{id}', 'Site\BidController@bidProcess')->name('AuctionProcess');







Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/AddAuction', 'Site\AuctionController@index');
    Route::post('/AddAuction', 'Site\AuctionController@create')->name('create.auction');
    Route::get('favorite-actione/{id}','Site\BidController@favoriteAuctions')
        ->name('favorite-action');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/artisan/{order}', function ($order) {

   \Illuminate\Support\Facades\Artisan::call($order) ;
});





