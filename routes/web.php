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

Route::get('/', 'CompaniesController@index');

Auth::routes(['register' => false]);

Route::resource('companies','CompaniesController');

Route::resource('employees','EmployeesController');

// Employee based on company
Route::get('/companies/{company}/employees/create','CompanyEmployeesController@create')
        ->name('company.employees.create');
Route::post('/companies/{company}/employees','CompanyEmployeesController@store')
        ->name('company.employees.store');
Route::get('/companies/{company}/employees/{employee}/edit','CompanyEmployeesController@edit')
        ->name('company.employees.edit');
Route::patch('/companies/{company}/employees/{employee}','CompanyEmployeesController@update')
        ->name('company.employees.update');
Route::delete('/companies/{company}/employees/{employee}','CompanyEmployeesController@destroy')
        ->name('company.employees.destroy');


