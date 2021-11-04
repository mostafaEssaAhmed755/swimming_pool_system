<?php

use Illuminate\Support\Facades\Route;
use App\Preparingsession;
use App\Gymnastic;
use App\Trainingdate;
use App\Trainingsession;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::group(['middleware'=>'auth'],function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/','HomeController@index')->name('home');
    // studen
    Route::match(['put','patch'],'/student/{id}/uploadImg','StudentController@uploadImg')->name('student.uploadImg');
    Route::get('/student/renewalCreate/{student}','StudentController@renewalCreate')->name('student.renewalCreate');
    Route::match(['put','patch'],'/student/renewalStore/{student}','StudentController@renewalStore')->name('student.renewalStore');
    Route::resource('/student', StudentController::class);
    
    // System
    Route::match(['put','patch'],'/system/active/{system}','SystemController@active')->name('system.active');

    Route::resource('/system', SystemController::class);
    // // job
     Route::resource('/job', JobController::class);
    // // employee
    Route::match(['put','patch'],'/employee/{id}/uploadImg','EmployeeController@uploadImg')->name('employee.uploadImg');
    Route::post('/employee/discount','EmployeeController@discount')->name('employee.discount');
     Route::resource('/employee', EmployeeController::class);
    // gymnastic
    Route::resource('/gymnastic', GymnasticController::class);
    // trainingdate

    Route::get('trainingdate/create/{id}', [
        'as' => 'trainingdate.create',
        'uses' => 'TrainingdateController@create'
    ]);
    Route::resource('/trainingdate',TrainingdateController::class, ['except' => 'create']);
    // coach
    Route::resource('/coach', CoachController::class);
    // trainingsession
    Route::resource('/trainingsession', TrainingsessionController::class);
    // Preparingsession
    Route::get('/preparingsession/createStudent/{id}','PreparingsessionController@createStudent')->name('preparingsession.createStudent');
    Route::post('/preparingsession/storeStudent/{id}','PreparingsessionController@storeStudent')->name('preparingsession.storeStudent');
    Route::get('/preparingsession/getTraningDates/{id}','PreparingsessionController@getTraningDates')->name('preparingsession.getTraningDates');
    Route::delete('/preparingsession/destroyStudent/{id}','PreparingsessionController@destroyStudent')->name('preparingsession.destroyStudent');

    
    Route::resource('/preparingsession', PreparingsessionController::class);
    // TicketController
    Route::post('/ticket/checkifExists','TicketController@checkifExists')->name('ticket.checkifExists');
    Route::resource('/ticket', TicketController::class);

    Route::get('/test',function(){
  
    });


     ######################################### Attedance Route ########################################
        Route::get('attendance','AttendanceController@index')->name('attendance.index');
        Route::post('attendance/search_attendence','AttendanceController@search_attendence')->name('attendance.search_attendence');
        Route::post('attendance/assign_attendence','AttendanceController@assign_attendence')->name('attendance.assign_attendence');
        Route::post('attendance/show_attendence','AttendanceController@show_attendence')->name('attendance.show_attendence');
    ######################################### Attedance Route ########################################


        Route::post('fine/store','FineController@store')->name('fine.store');
        Route::post('fine/show','FineController@show')->name('fine.show');
        Route::post('fine/edit','FineController@edit')->name('fine.edit');
        Route::post('salary/store','FineController@salary')->name('salary.store');

});