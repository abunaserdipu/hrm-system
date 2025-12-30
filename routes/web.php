<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class)->only(['index', 'store']);
    Route::resource('skills', SkillController::class)->only(['index', 'store']);

    Route::get(
        '/employees/filter/department',
        [EmployeeController::class, 'filterByDepartment']
    );
});

require __DIR__ . '/auth.php';
