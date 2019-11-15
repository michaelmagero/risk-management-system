<?php

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/login');
    } else {
        return redirect('/login');
    }
});
Route::get('/home', function () {
    if (Auth::check()) {
        return redirect('/admin-dash');
    } else {
        return view('auth.login');
    }
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin-dash', 'DevController@home');
});

Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['/middleware' => ['auth']], function () {

    //USER ROUTES (DEV) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER

    Route::get('all-users-dev', 'DevController@users');

    Route::get('new-user-dev', 'DevController@create');

    Route::post('new-user-dev', 'DevController@create_user');

    Route::get('/edit-user-dev/{id}', 'DevController@edit');

    Route::post('/update-user-dev/{id}', 'DevController@update');

    Route::get('/delete-user-dev/{id}', 'DevController@destroy');

    Route::get('all-itemcodes-dev', 'DevController@all_itemcodes');

    Route::get('new-itemcode-dev', 'DevController@create_itemcode');

    Route::post('new-itemcode-dev', 'DevController@insert_itemcode');

    Route::get('/verify-dev', 'DevController@check_ordercode');

    Route::post('/verify-dev', 'DevController@confirm_code');

    Route::get('/checkout-dev', 'DevController@checkout');

    Route::post('/checkout-dev', 'DevController@confirm_code_cashier');

    Route::get('/return-dev', 'DevController@return');

    Route::post('/return-dev', 'DevController@return_item');

    Route::get('/export-codes-dev/{id}', 'DevController@export');

    Route::get('/make-qr-dev/{id}', 'DevController@makeqr');

    Route::get('/show-itemcode-dev/{id}', 'DevController@show_itemcode');

    Route::get('/edit-itemcode-dev/{id}', 'DevController@edit_itemcode');

    Route::post('/update-itemcode-dev/{id}', 'DevController@update_itemcode');

    Route::get('/delete-itemcode-dev/{id}', 'DevController@destroy_itemcode');

    Route::get('/reset-itemcode-dev/{id}', 'DevController@reset_itemcode');



    /*******************************************************************************************
     * *********** ADMIN ROUTES ****************************************************************/

    Route::get('all-users', 'AdminController@users');

    Route::get('new-user', 'AdminController@create');

    Route::post('new-user', 'AdminController@create_user');

    Route::get('/edit-user/{id}', 'AdminController@edit');

    Route::post('/update-user/{id}', 'AdminController@update');

    Route::get('all-itemcodes', 'AdminController@all_itemcodes');

    Route::get('new-itemcode', 'AdminController@create_itemcode');

    Route::post('new-itemcode', 'AdminController@insert_itemcode');

    Route::get('/verify-admin', 'AdminController@check_ordercode');

    Route::post('/verify-admin', 'AdminController@confirm_code');

    Route::get('/checkout-admin', 'AdminController@checkout');

    Route::post('/checkout-admin', 'AdminController@confirm_code_cashier');

    Route::get('/return-admin', 'AdminController@return');

    Route::post('/return-admin', 'AdminController@return_item');

    Route::get('/export-codes/{id}', 'AdminController@export');

    Route::get('/show-itemcode/{id}', 'AdminController@show_itemcode');

    Route::get('/edit-itemcode/{id}', 'AdminController@edit_itemcode');

    Route::post('/update-itemcode/{id}', 'AdminController@update_itemcode');

    Route::get('/reset-itemcode/{id}', 'AdminController@reset_itemcode');


    //VERIFY CONTROLLER

    Route::get('all-itemcodes-agent', 'AgentController@all_itemcodes');

    Route::get('/verify-agent', 'AgentController@check_ordercode');

    Route::post('/verify-agent', 'AgentController@confirm_code');


    //CASHIER CONTROLLER
    Route::get('/checkout-cashier', 'CashierController@checkout');

    Route::post('/checkout-cashier', 'CashierController@confirm_code');
});
