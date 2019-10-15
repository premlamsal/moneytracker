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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//===========================================NORMAL ROUTES=======================================================================//

Route::get('/dashboard', 'DashboardController@index')->name('dashboardboard');


Route::get('/dashboard/transactions', 'DashboardController@showTransactions')->name('transactions');

//========================================CATEGORIES ROUTES======================================================================//


Route::get('/dashboard/categories', 'DashboardController@showCategories')->name('showCategories');


Route::post('/dashboard/addCategory', 'DashboardController@addCategory')->name('addCategory');


Route::get('/dashboard/deleteCategory/{id}', 'DashboardController@deleteCategory')->name('deleteCategory');


Route::get('/dashboard/editCategory/{id}', 'DashboardController@showEditCategory')->name('showEditCategory');

Route::post('/dashboard/editCategory', 'DashboardController@editCategory')->name('editCategory');


//==========================================INCOMES ROUTES========================================================================//

//income routes
Route::get('/dashboard/incomes', 'DashboardController@showIncomes')->name('showIncomes');
//display form to add income
Route::get('/dashboard/income/add', 'DashboardController@showAddIncome')->name('showAddIncome');
//insert the income data to database
Route::post('/dashboard/addIncome', 'DashboardController@addIncome')->name('addIncome');
//shows previous data in form to edit
Route::get('/dashboard/income/edit/{id}', 'DashboardController@showEditIncome')->name('showEditIncome');
//updates the previous data with new one
Route::post('/dashboard/updateIncome', 'DashboardController@updateIncome')->name('updateIncome');



//==========================================EXPENSE ROUTES=========================================================================//
//expenses routes
Route::get('/dashboard/expenses', 'DashboardController@showExpenses')->name('showExpenses');
//display form to add expense
Route::get('/dashboard/expense/add', 'DashboardController@showAddExpense')->name('showAddExpense');
//insert the expense data to database
Route::post('/dashboard/addExpense', 'DashboardController@addExpense')->name('addExpense');
//shows previous data in form to edit
Route::get('/dashboard/expense/edit/{id}', 'DashboardController@showEditExpense')->name('showEditExpense');
//updates the previous data with new one
Route::post('/dashboard/updateExpense', 'DashboardController@updateExpense')->name('updateExpense');
//==================================================================================================================//






//==========================================COMMON ROUTES========================================================================//
//delete transcation
Route::get('/dashboard/deleteTransaction/{id}', 'DashboardController@deleteTransaction')->name('deleteTransaction');


//========================================ACCOUNTS ROUTES======================================================================//
//account routes
Route::get('/dashboard/accounts', 'DashboardController@showAccounts')->name('showAccounts');


Route::post('/dashboard/addAccount', 'DashboardController@addAccount')->name('addAccount');


Route::get('/dashboard/deleteAccount/{id}', 'DashboardController@deleteAccount')->name('deleteAccount');


Route::get('/dashboard/editAccount/{id}', 'DashboardController@showEditAccount')->name('showEditAccount');

Route::post('/dashboard/editAccount', 'DashboardController@editAccount')->name('editAccount');


//========================================ACCOUNTS ROUTES======================================================================//









