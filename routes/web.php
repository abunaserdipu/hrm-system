<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
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

    Route::get('/check-email', function (Illuminate\Http\Request $request) {
        $query = \App\Models\Employee::where('email', $request->email);

        if ($request->ignore_id) {
            $query->where('id', '!=', $request->ignore_id);
        }

        return response()->json([
            'exists' => $query->exists()
        ]);
    });

});




require __DIR__ . '/auth.php';
