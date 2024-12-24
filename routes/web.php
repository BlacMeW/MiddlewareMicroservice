<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::middleware(['custom-middleware'])->group(function () {
    Route::get('/service', [ExampleController::class, 'handleService']);
});
