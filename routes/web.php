<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

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

//route to generate qrcodes
Route::get('/generate_qrcode', [\App\Http\Controllers\QrCodeController::class, 'generate'])->name('generate_qrcode');
Route::get('/generate_qrcode_all', [\App\Http\Controllers\QrCodeController::class, 'generateAll'])->name('generate_qrcode_all');
Route::get('/generate_qrcode_general', [\App\Http\Controllers\QrCodeController::class, 'generateQrGeneral'])->name('generate_qrcode_general');
Route::post('/pay-now', [\App\Http\Controllers\PaymentsController::class, 'initiatePayment'])->name('initiate_payment');
Route::get('/paynow/return', [\App\Http\Controllers\PaymentsController::class, 'checkPayment'])->name('check_payment');

Route::get('/confirmation', [\App\Http\Controllers\PaymentsController::class, 'confirmation'])->name('check_payment');
Route::get('/igc/{reference}', [\App\Http\Controllers\PaymentsController::class, 'orderDetails'])->name('order_details');

Route::post('/upload-ticket', [\App\Http\Controllers\QrCodeController::class,'upload'])->name('ticket.upload');


Route::post('/subscribe', [SubscriptionController::class, 'store']);

Route::get('/', function () {
    return view('index');
});

Route::get('/igc', function () {
    return view('index');
});

Route::get('/ticket', function () {

    $ticketNumber = 'IGC-P1-0001';
    $qrCodeBase64 = 'data:image/svg+xml;base64,' . base64_encode(QrCode::format('svg')->size(150)->generate('https://intentionallydaring.com/igc/' . $ticketNumber));
    return view('ticket',compact('ticketNumber','qrCodeBase64'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
