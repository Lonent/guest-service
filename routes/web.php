<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::prefix('guests')->group(function () {
    Route::get('/', [GuestController::class, 'index']); // Получение списка всех гостей
    Route::get('/{id}', [GuestController::class, 'show']); // Получение конкретного гостя по ID
    Route::post('/', [GuestController::class, 'store']); // Создание нового гостя
    Route::put('/{id}', [GuestController::class, 'update']); // Обновление данных гостя по ID
    Route::delete('/{id}', [GuestController::class, 'destroy']); // Удаление гостя по ID
});
