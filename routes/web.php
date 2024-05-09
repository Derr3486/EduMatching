<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResultMail;
use App\Http\Controllers\Users;
use App\Http\Controllers\PersonalityController;
use App\Http\Controllers\ProgramController;

use App\Http\Controllers\MatchController;

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

//personality test route
Route::get("/Test1",[PersonalityController::class,'test1'])->name('test1');
Route::post("/Test1",[PersonalityController::class,'analyse'])->name('analyse');
Route::get("/Result",[PersonalityController::class,'result'])->name('result');

//Input academic result route
Route::get("/Test2",[ProgramController::class,'test2'])->name('test2');
Route::post("/Test2",[ProgramController::class,'result1'])->name('result1');
Route::get("/Result2",[ProgramController::class,'result2'])->name('result2');
Route::post("/Result2",[ProgramController::class,'resultAnalyse'])->name('resultAnalyse');
Route::get("/AcademicResult",[ProgramController::class,'AacademicResult'])->name('AcademicResult');

//Login-Register route
Route::get("/",[Users::class,'index'])->name('user.index');
Route::post("/Register",[Users::class,'store'])->name('user.store');
Route::get("/Registered",[Users::class,'registered'])->name('user.registered');
Route::post("/",[Users::class,'login'])->name('user.login');
Route::get("/Login",[Users::class,'loggedin'])->name('user.loggedin');
Route::get("/Index/Invalid",[Users::class,'fail'])->name('user.fail');
Route::get("/Logout",[Users::class,'logout'])->name('user.logout');

//input data into DB
Route::get("/home",[PersonalityController::class,'home'])->name('home');
Route::get("/home/create",[PersonalityController::class,'create'])->name('create');
Route::post("/home/create",[PersonalityController::class,'store'])->name('store');
Route::get("/home/createMatch",[MatchController::class,'create'])->name('createMatch');
Route::post("home/createMatch",[MatchController::class,'store'])->name('storeMatch');
Route::get("/home/matchP",[MatchController::class,'match'])->name('MatchP');


Route::get("/Test/{user}/edit",[Users::class,'edit'])->name('user.edit');
Route::put("/Test/{user}/update",[Users::class,'update'])->name('user.update');
Route::delete("/Test/{user}/delete",[Users::class,'delete'])->name('user.delete');

//testing
Route::get("/next",[MatchController::class,'p2'])->name('p2');
Route::post("/next",[MatchController::class,'catch'])->name('catch');
Route::get("/Recommendation",[MatchController::class,'recommendation'])->name('recommendation');
Route::get("/AllProgram",[MatchController::class,'AllProgram'])->name('AllProgram'); //view all program
Route::get("/Feedback",[MatchController::class,'Feedback'])->name('Feedback'); //Provide feedback
Route::post("/Feedback/store",[MatchController::class,'SaveFeedback'])->name('SaveFeedback'); //Save the Provided feedback
Route::post("/Feedback/compare",[MatchController::class,'compare'])->name('compare'); //Compare courses
Route::post("/CompareProgram",[MatchController::class,'CompareProgram'])->name('CompareProgram'); //Compare courses
Route::post("/ResultMail",[MatchController::class,'sendMail'])->name('sendMail');

//Admin page
Route::get("/AdminHome",[Users::class,'AdminHome'])->name('AdminHome');
Route::get("/AdminManageUsers",[Users::class,'AdminManageUsers'])->name('AdminManageUsers');
Route::post("/AdminHome/Register",[Users::class,'AdminStore'])->name('admin.store');

//testing
Route::get("/Test",[Users::class,'test'])->name('test');