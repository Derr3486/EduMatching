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

//Login-Register route
Route::get("/",[Users::class,'index'])->name('user.index');
Route::post("/Register",[Users::class,'store'])->name('user.store');
Route::get("/Registered",[Users::class,'registered'])->name('user.registered');
Route::post("/",[Users::class,'login'])->name('user.login');
Route::get("/Index/Invalid",[Users::class,'fail'])->name('user.fail');
Route::get("/Logout",[Users::class,'logout'])->name('user.logout');

//personality test route
Route::get("/Test1",[PersonalityController::class,'test1'])->name('test1');
Route::post("/Test1",[PersonalityController::class,'analyse'])->name('analyse');
Route::get("/Result",[PersonalityController::class,'result'])->name('result');

//Analysis
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

Route::get("/AdminManagePrograms",[Users::class,'AdminManagePrograms'])->name('AdminManagePrograms');
Route::get("/AdminEditPrograms/{Program}/Edit",[Users::class,'AdminEditPrograms'])->name('EditProgram');
Route::put("/AdminEditPrograms/{Program}/update",[Users::class,'AdminUpdatePrograms'])->name('UpdateProgram');
Route::delete('/programs/{Program}', [ProgramController::class, 'deleteProgram'])->name('DeleteProgram');
Route::get("/AdminAddProgram",[ProgramController::class,'AddProgram'])->name('AddProgram');
Route::post("/AdminAddProgram/store",[ProgramController::class,'StoreProgram'])->name('StoreProgram');

Route::get("/AdminManagePersonalities",[Users::class,'AdminManagePersonalities'])->name('AdminManagePersonalities');
Route::get("/AdminEditPersonalities/{Personality}/Edit",[Users::class,'AdminEditPersonalities'])->name('EditPersonality');
Route::put("/AdminEditPersonalities/{Personality}/update",[Users::class,'AdminUpdatePersonalities'])->name('UpdatePersonality');