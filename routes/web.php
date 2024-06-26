<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\GeneralController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




# appointment routes
Route::prefix('appointment')->group(function () {
    Route::get('/', [AppointmentController::class, 'appointmentPage'])->name('appointment.index');
    Route::get('records',  [AppointmentController::class, 'appointmentRecords'])->name('appointment.records');
    Route::post('register', [AppointmentController::class, 'register'])->name('appointment.register');
    Route::get('success',  [AppointmentController::class, 'successfulPage'])->name('appointment.success');
    Route::get('accept/{patient}',  [AppointmentController::class, 'accept'])->name('appointment.accept');
    Route::get('cancel/{appointment}',  [AppointmentController::class, 'cancel'])->name('appointment.cancel');
    Route::get('remove/{appointment}',  [AppointmentController::class, 'remove'])->name('appointment.remove');
    Route::get('show/{patient}',  [AppointmentController::class, 'show'])->name('appointment.info');
});

# patient routes
Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patient.index');
    Route::get('{patient}/show', [PatientController::class, 'show'])->name('patient.show');
});

# vaccine routes
Route::prefix('vaccine')->group(function () {
    Route::get('/', [VaccineController::class, 'index'])->name('vaccine.index');
    Route::get('create', [VaccineController::class, 'create'])->name('vaccine.create');
    Route::post('store', [VaccineController::class, 'store'])->name('vaccine.store');
    Route::get('archive/{vaccine}', [VaccineController::class, 'archive'])->name('vaccine.archive');
    Route::get('unarchived/{vaccine}', [VaccineController::class, 'unArchive'])->name('vaccine.unarchived');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('deactivate/{user}', [UserController::class, 'deactivate'])->name('user.deactivate');
    Route::get('reactivate/{user}', [UserController::class, 'reactivate'])->name('user.reactivate');
});

Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');
});


Route::prefix('vaccination')->group(function () {
    Route::get('/', [VaccinationController::class, 'index'])->name('vaccination.index');
});

Route::prefix('general')->group(function () {
    Route::get('/', [GeneralController::class, 'index'])->name('general.index');
});

# Patient Routes Middleware
// Route::middleware(['auth', 'auth.patient'])->group(function() {
//     Route::prefix('appointment')->group(function () {

//         Route::get('records',  [AppointmentController::class, 'appointmentRecords'])->name('appointment.records');

//     });
// });

require __DIR__ . '/auth.php';
