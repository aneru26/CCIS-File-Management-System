<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\VerificationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthController::class,'login'] );
Route::post('login', [AuthController::class,'Authlogin'] );
Route::get('/login', [AuthController::class, 'AuthLogin'])->name('post.login');
Route::get('logout', [AuthController::class,'logout'] );
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
Route::get('forgot-password', [AuthController::class,'forgotpassword'] );
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword'] );
Route::get('reset/{token}', [AuthController::class, 'reset'] ); 
Route::post('reset/{token}', [AuthController::class, 'PostReset'] );
Route::get('verify/{token}', [AuthController::class, 'verify'] );
Route::get('/check-login', [AuthController::class, 'checkLogin'])->middleware('auth');


Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard',[DashboardController::class,'dashboard'] );
    Route::get('admin/admin/list',[AdminController::class,'list'] );
    Route::get('admin/admin/add',[AdminController::class,'add'] );
    Route::post('admin/admin/add',[AdminController::class,'insert'] );
    Route::get('admin/admin/show/{id}',[AdminController::class, 'show'] );
    Route::get('admin/admin/edit/{id}',[AdminController::class, 'edit'] );
    Route::post('admin/admin/edit/{id}',[AdminController::class, 'update'] );
    Route::get('admin/admin/delete/{id}',[AdminController::class, 'delete'] );

   
    Route::get('admin/account',[UserController::class, 'MyAccount'] );
    Route::post('admin/account',[UserController::class, 'UpdateMyAccountAdmin'] );

    Route::get('admin/change_password',[UserController::class, 'change_password'] );
    Route::post('admin/change_password',[UserController::class, 'update_change_password'] );


    //student

    Route::get('admin/student/list',[StudentController::class,'list'] );
    Route::get('admin/student/add',[StudentController::class,'add'] );
    Route::post('admin/student/add',[StudentController::class,'insert'] );
    Route::get('admin/student/show/{id}',[StudentController::class,'show'] );
    Route::get('admin/student/edit/{id}',[StudentController::class,'edit'] );
    Route::post('admin/student/edit/{id}',[StudentController::class,'update'] );
    Route::get('admin/student/delete/{id}',[StudentController::class, 'delete'] );
    

    //class

    Route::get('admin/class/list',[ClassController::class,'list'] );
    Route::get('admin/class/add',[ClassController::class,'add'] );
    Route::post('admin/class/add',[ClassController::class,'insert'] );
    Route::get('admin/class/show/{id}',[ClassController::class,'show'] );
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit'] );
    Route::post('admin/class/edit/{id}',[ClassController::class,'update'] );
    Route::get('admin/class/delete/{id}',[ClassController::class, 'delete'] );

     //Homework

     Route::get('admin/homework/list',[HomeworkController::class, 'list'] );
     Route::get('admin/homework/list/secondsem',[HomeworkController::class, 'secondsemlist'] );
     Route::get('admin/homework/add',[HomeworkController::class, 'add'] );
     Route::post('admin/homework/add',[HomeworkController::class, 'insert'] );
     Route::get('admin/homework/edit/{id}',[HomeworkController::class, 'edit'] );
     Route::post('admin/homework/edit/{id}',[HomeworkController::class, 'update'] );
     Route::get('admin/homework/delete/{id}',[HomeworkController::class, 'delete'] );
     Route::get('admin/homework/accept/{id}',[HomeworkController::class, 'accept'] );
     Route::get('admin/homework/decline/{id}',[HomeworkController::class, 'decline'] );
     Route::get('admin/homework/view-users/{requirments}', [HomeworkController::class, 'notsubmitted']);

});

Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard',[DashboardController::class,'dashboard'] );


    //My Account
    Route::get('student/account',[UserController::class, 'MyAccount'] );
    Route::post('student/account',[UserController::class, 'UpdateMyAccountStudent'] );

    //My Homework 

    Route::get('student/my_homework',[HomeworkController::class, 'HomeworkStudent'] );

    Route::get('student/my_homework/submit_homework/{id}',[HomeworkController::class, 'SubmitHomework'] );
    Route::post('student/my_homework/submit_homework/{id}',[HomeworkController::class, 'SubmitHomeworkInsert'] );

    //My Submitted Homework

    Route::get('student/my_submitted_homework',[HomeworkController::class, 'HomeworkSubmittedStudent'] );

    //Course Code
    Route::get('student/class/list',[ClassController::class,'facultylist'] );
    Route::get('student/class/add',[ClassController::class,'facultyadd'] );
    Route::post('student/class/add',[ClassController::class,'facultyinsert'] );
    Route::get('student/class/show/{id}',[ClassController::class,'facultyshow'] );
    Route::get('student/class/edit/{id}',[ClassController::class,'facultyedit'] );
    Route::post('student/class/edit/{id}',[ClassController::class,'facultyupdate'] );
    Route::get('student/class/delete/{id}',[ClassController::class, 'facultydelete'] );


    //Documents
    Route::get('student/homework/list',[HomeworkController::class, 'facultylist'] );
    Route::get('student/homework/add',[HomeworkController::class, 'facultyadd'] );
    Route::post('student/homework/add',[HomeworkController::class, 'facultyinsert'] );
    Route::get('student/homework/edit/{id}',[HomeworkController::class, 'facultyedit'] );
    Route::post('student/homework/edit/{id}',[HomeworkController::class, 'facultyupdate'] );
    Route::get('student/homework/delete/{id}',[HomeworkController::class, 'facultydelete'] );
  
    

    Route::get('student/change_password',[UserController::class, 'change_password'] );
    Route::post('student/change_password',[UserController::class, 'update_change_password'] );

    

});