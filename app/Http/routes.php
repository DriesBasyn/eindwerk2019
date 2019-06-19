<?php

use App\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/login', 'Front@login');
Route::get('/logout', 'Front@logout');
/*front*/
Route::get('/','Front@index');
Route::get('index1','Front@index1');
Route::get('index2','Front@index2');
Route::get('about','Front@about');
Route::get('blog','Front@blog');
Route::get('blog/post/{id}','Front@blog_post');
Route::get('contact','Front@contact');
/*product*/
Route::get('product','Front@product');
Route::get('product/details/{id}','Front@product_details');
/*cart*/
Route::get('/checkout', 'Front@checkout');
Route::post('/checkout', function(Request $request){

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;
    /***betaling transactie zelf**/
    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ],

    ]);
    /** gegevens van de klant bewaren in de vault van braintree***/
    $result2 = $gateway->customer()->create([
        'firstName' => 'Mike',
        'lastName' => 'Jones',
        'company' => 'Jones Co.',
        'email' => 'mike.jones@example.com',
        'phone' => '281.330.8004',
        'fax' => '419.555.1235',
        'website' => 'http://example.com'
    ]);
    //keuze naar braintree of naar tabel in database

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transaction success. The ID is:'. $transaction->id);
    } else {
        $errorString = "";
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        //$_SESSION["errors"] = $errorString;
        //header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }


});
Route::get('/cart', 'Front@cart');
Route::post('/cart','Front@cart');
Route::get('/clear-cart', 'Front@clear_cart');
/*search*/
Route::get('/search/{query}','Front@search');
/*admin*/
Route::get('/admin','DashboardController@index');
Route::resource('/brands','BrandsController');
Route::resource('/categories','CategoriesController');
Route::resource('/users','AdminUsersController');
Route::resource('/roles','RolesController');
Route::resource('/products','ProductsController');
/*home*/
Route::get('/home', 'HomeController@index');
