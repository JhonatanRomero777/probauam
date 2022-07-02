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

Route::get('/', function () { return view('login'); })->middleware('guest')->name('login');

Route::get('/home', function () { return view('home'); })->middleware('auth')->name('home');

/*---------------------------------------- ----------- ----------------------------------------*/

Route::get('/profile/edit', function () { return view('profile.edit'); })->name('profile.edit');

Route::get('/user/index', function () { return view('users.index'); })->name('user.index');

Route::get('/pages/icons', function () { return view('pages.icons'); })->name('pages.icons');

/*---------------------------------------- PARAMETERS ----------------------------------------*/

Route::get('/parameters/index',function(){return view('pages/parameters.index');})
->middleware('can:parameters.index')->name('parameters.index');

/*---------------------------------------- ENTITIES -----------------------------------------*/

Route::get('/entities/index',function(){return view('pages/entities.index');})
->middleware('auth')->middleware('can:entities.index')->name('entities.index');

/*---------------------------------------- PROFESSIONALS ------------------------------------*/

Route::get('/professionals/index',function(){return view('pages/professionals.index');})
->middleware('auth')->middleware('can:professionals.index')->name('professionals.index');

/*---------------------------------------- CONTRACTS ------------------------------------*/

Route::get('/contracts/index/{entity_id}',function($entity_id)
{return view('pages/contracts.index',['entity_id'=>$entity_id]);})
->middleware('auth')->middleware('can:contracts.index')->name('contracts.index');

/*---------------------------------------- PATIENTS -----------------------------------------*/

Route::get('/patients/index/{entity_id}',function($entity_id)
{return view('pages/patients.index',['entity_id'=>$entity_id]);})
->middleware('auth')->name('patients.index');//->middleware('can:entities.index')

/*---------------------------------------- SESIONS -----------------------------------------*/

Route::get('/sesions/index/{patient_id}',function($patient_id)
{return view('pages/sesions.index',['patient_id'=>$patient_id]);})->name('sesions.index');

/*---------------------------------------- FORMS ------------------------------------*/

Route::get('/forms/index/{sesion_id}',function($sesion_id){return view('pages/forms.index',['sesion_id'=>$sesion_id]);})
->middleware('auth')->name('forms.index');

/*---------------------------------------- PUZZLES -----------------------------------------*/

Route::get('/puzzles/index/{patient_id}',function($patient_id)
{return view('pages/puzzles.index',['patient_id'=>$patient_id]);})->name('puzzles.index');