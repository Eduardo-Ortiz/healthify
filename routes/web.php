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



Route::get('/admin', 'AdminController@panelIndex')->name('admin.index');

Route::get('/patient', function () {
    return view('patient.index');
})->middleware('patient')->name('patient');

Route::get('/doctor','DoctorController@mainPanel')->middleware('doctor')->name('doctor');

Route::get('/doctor/appointment/{appointment}','DoctorController@showAppointment')->middleware('doctor')->name('doctor.appointment.show');

Route::get('patient/appointment/create', function () {
    return view('patient.appointments.create');
})->name('patient.appointment.create')->middleware('patient');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/doctors','DoctorController', [
    'as' => 'admin'
]);

Route::get('admin/purposes/{purpose}', 'MedicineController@purposeMedicines')->name('admin.purpose.medicines');

Route::get('admin/medicines/purposes', 'MedicineController@purposesIndex')->name('admin.medicines.purposes');

Route::post('admin/medicines/purposes', 'MedicineController@storePurpose')->name('admin.medicines.purposes.store');

Route::get('admin/medicines/presentations', 'MedicineController@presentationsIndex')->name('admin.medicines.presentations');

Route::post('admin/medicines/presentations', 'MedicineController@storePresentation')->name('admin.medicines.presentations.store');

Route::get('admin/medicines/registry', 'MedicineController@registry')->name('admin.medicines.registry');

Route::resource('admin/medicines','MedicineController', [
    'as' => 'admin'
]);

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('register', 'PatientController@registerStore')->name('patient.register');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('login', 'LoginUserController@login')->name('login');

Route::get('ajax/specialities', 'SpecialityController@getAll');

Route::post('ajax/doctors', 'DoctorController@getFromSpeciality');

Route::post('ajax/medicines', 'MedicineController@search');

Route::post('ajax/medicinesdata', 'MedicineController@data');

Route::post('ajax/medicinesalternatives', 'MedicineController@searchAlternatives');

Route::post('ajax/appointment/hours', 'AppointmentController@getUsedHours');

Route::post('patient/appointment', 'AppointmentController@store')->name('patient.appointment');

Route::get('patient/appointment', 'AppointmentController@index')->name('patient.appointment.get');

Route::get('patient/appointment/history', 'AppointmentController@history')->name('patient.appointment.history');

Route::get('patient/recipes', 'PatientController@recipes')->name('patient.recipes.index');

Route::get('patient/data', 'PatientController@data')->name('patient.data');

Route::post('ajax/appointmentfinish', 'AppointmentController@save');

Route::get('admin/patients', 'PatientController@getList')->name('admin.patients.list');

Route::get('admin/patients', 'PatientController@getList')->name('admin.patients.list');

Route::get('admin/patients/less', 'PatientController@getLessAppointments')->name('admin.patients.list.less');

Route::get('admin/appointments/{doctor}', 'DoctorController@getAppointments')->name('admin.appointments.doctor');