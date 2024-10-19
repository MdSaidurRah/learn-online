<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\People\PeopleController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\contents\FormsController;

use App\Http\Controllers\People\CommitteeMembersController;

use App\Http\Controllers\UserController\AdminUserController;

use App\Http\Controllers\UserController\UserProfileController;

use App\Http\Controllers\UserController\RolePermissionController;



use  App\Http\Controllers\Quiz\AnswerkeyController ;
use  App\Http\Controllers\Quiz\QuestionController ;

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

//System Routes


Route::middleware(['checkauthencation'])->prefix('user')->group(function() {
    Route::get('/all-user', [AdminUserController::class, 'allUser'])->name('all-user');
    Route::get('/add-user', [AdminUserController::class, 'addUser'])->name('add-user');
    Route::post('/store-user', [AdminUserController::class, 'storeUser'])->name('store-user');
    Route::get('/view-user/{id}', [AdminUserController::class, 'viewUser'])->name('view-user');
    Route::get('/view-activities/{id}', [AdminUserController::class, 'viewUserActivities'])->name('view-user-activities');
    Route::post('/update-user', [AdminUserController::class, 'updateUser'])->name('update-user');

    Route::get('/user/delete/{id}', [AdminUserController::class, 'delete'])->name('delete-user');
    Route::get('/user/role/{id}', [AdminUserController::class, 'userRole'])->name('user-role');
});


Route::middleware(['checkauthencation'])->prefix('userprofile')->group(function() {
    Route::get('/edit-profile',[UserProfileController::class,'editProfile'])->name('edit-profile');
    Route::get('/user-profile',[UserProfileController::class,'userProfile'])->name('user-profile-view');
    Route::get('/password-change',[UserProfileController::class,'passwordChange'])->name('password-change');
    Route::post('/password-update',[UserProfileController::class,'passwordUpdate'])->name('password-update');
    Route::post('/profile-photo-update',[UserProfileController::class,'profilePhotoUpdate'])->name('profile-photo-update');
    
});

Route::middleware(['checkauthencation'])->prefix('configurations')->group(function() {
    Route::get('/role-permission',[RolePermissionController::class,'rolePermission'])->name('role-permission');
});





Route::middleware(['checkauthencation'])->prefix('people')->group(callback: function() {

    Route::get('/peoples', [PeopleController::class,'index'])->name('people');
    Route::get('/people/create', [PeopleController::class,'create'])->name('add-people');
    Route::post('/people/store', [PeopleController::class,'store'])->name('store-people');
    Route::get('/people/show/{id}', [PeopleController::class,'show'])->name('show-people');
    Route::get('/people/edit/{id}', [PeopleController::class,'edit'])->name('edit-people');
    Route::post('/people/update', [PeopleController::class,'update'])->name('update-people');
    Route::get('/people/get-all-items', [PeopleController::class,'getAllItems'])->name('get-all-people');

    Route::get('/people-list/{category}',[PeopleController::class,'peopleList'])->name('people-list');
    Route::get('/people/add-as-user/{id}',[PeopleController::class,'addAsUser'])->name('add-as-User');

    Route::get('/committee-members', [CommitteeMembersController::class,'index'])->name('committeemembers');
    Route::get('/committeemembers/create', [CommitteeMembersController::class,'create'])->name('add-committeemembers');
    Route::post('/committeemembers/store', [CommitteeMembersController::class,'store'])->name('store-committeemembers');
    Route::get('/committeemembers/show/{id}', [CommitteeMembersController::class,'show'])->name('show-committeemembers');
    Route::get('/committeemembers/edit/{id}', [CommitteeMembersController::class,'edit'])->name('edit-committeemembers');
    Route::post('/committeemembers/update', [CommitteeMembersController::class,'update'])->name('update-committeemembers');
    Route::get('/committeemembers/delete/{id}', [CommitteeMembersController::class,'delete'])->name('delete-committeemembers');
    Route::get('/committeemembers/get-all-items', [CommitteeMembersController::class,'getAllItems'])->name('get-all-committeemembers');



});



Route::middleware(['checkauthencation'])->prefix('quiz')->group(function() {

 Route::get('/question', [QuestionController::class,'index'])->name('question');
 Route::get('/question/create', [QuestionController::class,'create'])->name('add-question');
 Route::post('/question/store', [QuestionController::class,'store'])->name('store-question');
 Route::get('/question/show/{id}', [QuestionController::class,'show'])->name('show-question');
 Route::get('/question/edit/{id}', [QuestionController::class,'edit'])->name('edit-question');
 Route::post('/question/update', [QuestionController::class,'update'])->name('update-question');
 Route::get('/question/delete/{id}', [QuestionController::class,'delete'])->name('delete-question');
 Route::get('/question/get-all-items', [QuestionController::class,'getAllItems'])->name('gat-all-question');

 Route::get('/answerkey', [AnswerkeyController::class,'index'])->name('answerkey');
 Route::get('/answerkey/create', [AnswerkeyController::class,'create'])->name('add-answerkey');
 Route::post('/answerkey/store', [AnswerkeyController::class,'store'])->name('store-answerkey');
 Route::get('/answerkey/show/{id}', [AnswerkeyController::class,'show'])->name('show-answerkey');
 Route::get('/answerkey/edit/{id}', [AnswerkeyController::class,'edit'])->name('edit-answerkey');
 Route::post('/answerkey/update', [AnswerkeyController::class,'update'])->name('update-answerkey');
 Route::get('/answerkey/delete/{id}', [AnswerkeyController::class,'delete'])->name('delete-answerkey');
 Route::get('/answerkey/get-all-items', [AnswerkeyController::class,'getAllItems'])->name('gat-all-answerkey');

});





Route::middleware(['checkauthencation'])->group(function(){


    Route::post('/emplyee-member-form-submit','FormsController@employeeMembershipFormPost');





    Route::get('/get-all-user', [AdminUserController::class, 'allSystemUser'])->name('all-user');
    Route::get('/dashboard',[AuthenticationController::class,'admin'])->name('dashboard');

    Route::get('/get-role-permission',[RolePermissionController::class,'getRolePermission'])->name('get-all-role-permission');
    Route::get('/get-role',[RolePermissionController::class,'getRole'])->name('get-all-role');
    Route::get('/get-permission',[RolePermissionController::class,'getPermission'])->name('get-all-permission');
    Route::get('/save-permission',[RolePermissionController::class,'savePermission'])->name('save-permission');
    Route::get('/save-role',[RolePermissionController::class,'saveRole'])->name('save-role');
    Route::get('/role-permission-assign',[RolePermissionController::class,'rolePermissionAssign'])->name('assign-role-permission');
    Route::get('/role-permission-delete/{id}',[RolePermissionController::class,'rolePermissionDelete'])->name('delete-role-permission');


    Route::post('/get-message-people',[DataController::class,'getMessagePeople'])->name('get-message-people');
});



Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login-post', [AuthenticationController::class, 'loginAttempt']);
Route::get('/', [HomeController::class, 'welcome']);


Route::group(['middleware'=>'preventback'], function()
      {
            Route::get('/sign-out',[AuthenticationController::class,'signOut'])->name('signout');
      });


Route::get('/clear-env', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    return 'Application ENV Cleared';
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
