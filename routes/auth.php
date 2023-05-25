<?php
use Illuminate\Support\Facades\Route;

//---auth
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware('auth')->group(function () { 

    Route::get('/dashboard',[AuthenticatedSessionController::class, 'dashboard'])->middleware('verified')->name('dashboard');
     
    // Route::get('register', [RegisteredUserController::class, 'create'])
    // ->name('register');
    
    // Route::post('register', [RegisteredUserController::class, 'store']);

    // Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    //             ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    //             ->middleware(['signed', 'throttle:6,1'])
    //             ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
// ___________________________________ //
use App\Http\Controllers\Admin_Functionality\Word_Insert_Controller;
use App\Http\Controllers\Admin_Functionality\Words_Table_Update_Controller;
use App\Http\Controllers\Admin_Functionality\ControllerForAntonymsANdSynonyms;
use App\Http\Controllers\Admin_Functionality\profile_control;
use App\Http\Controllers\Admin_Functionality\libraryController;

Route::group(['middleware'=>'disable_back_btn'],function(){
Route::middleware('auth')->group(function () { 
 // ->middleware('password.confirm')
//manage_admin_profile
Route::GET('authanticated_user',[profile_control::class, 'findUser']); 
Route::GET('view_user_detail',[profile_control::class, 'userDetails'])->name('userdetails'); 
Route::POST('change_user_mail',[profile_control::class, 'ChangeEmail']); 
Route::POST('change_user_password',[profile_control::class, 'ChangePassword']);
//search word table data 
Route::POST('get_Words_Tables_data',[Words_Table_Update_Controller::class, 'displayWords']);
Route::POST('find_details_of_this_word',[Words_Table_Update_Controller::class, 'getDetails']);
Route::GET('view_words_detail',[Words_Table_Update_Controller::class, 'view_words'])->name('view_words');
Route::POST('check_availability',[Word_Insert_Controller::class, 'availaBility']);
//insert data to word table
Route::POST('insert_word_excel',[Word_Insert_Controller::class, 'store']);
Route::POST('insert_word_form',[Word_Insert_Controller::class, 'storeForm']);
//word table update
Route::GET('word_update_form',[Words_Table_Update_Controller::class, 'viewDetails']);
Route::POST('submitUpdate',[Words_Table_Update_Controller::class, 'submitUpdate']);
//antonyms_&_synonims
Route::POST('add_antonyms_synonims',[ControllerForAntonymsANdSynonyms::class, 'findDetails']);
Route::GET('view_antonyms_synonims',[ControllerForAntonymsANdSynonyms::class, 'view']);
//synonyms
Route::POST('insert_synonyms',[ControllerForAntonymsANdSynonyms::class, 'insertSynonyms']);
Route::POST('synonyms_area_chech_availability',[ControllerForAntonymsANdSynonyms::class, 'synonymsChechAvailability']);
Route::POST('delete_this_synonym',[ControllerForAntonymsANdSynonyms::class, 'deleteSynonym']);
//antonyms
Route::POST('insert_antonyms',[ControllerForAntonymsANdSynonyms::class, 'insertAntonyms']);
Route::POST('antonyms_area_chech_availability',[ControllerForAntonymsANdSynonyms::class, 'antonymsChechAvailability']);
Route::POST('delete_this_antonym',[ControllerForAntonymsANdSynonyms::class, 'deleteAntonym']);
//Libaray
Route::GET('view_library',[libraryController::class, 'view']);
Route::POST('search_in_library',[libraryController::class, 'wordSearch']);
});
});