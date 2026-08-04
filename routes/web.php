<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvisioningController;
use App\Http\Controllers\ReportController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

// Customers
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/addcustomer', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);

// Edit Customer
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

// Technicians
Route::get('/technicians', [TechnicianController::class, 'index']);
Route::get('/addtechnician', [TechnicianController::class, 'create']);
Route::post('/technicians', [TechnicianController::class, 'store']);

// Edit Technician
Route::get('/technicians/{id}/edit', [TechnicianController::class, 'edit']);
Route::put('/technicians/{id}', [TechnicianController::class, 'update']);
Route::delete('/technicians/{id}', [TechnicianController::class, 'destroy']);

// Activation Queue
Route::get('/activations', [ActivationController::class, 'index']);
Route::get('/activations/create', [ActivationController::class, 'create']);
Route::post('/activations', [ActivationController::class, 'store']);
Route::put('/activations/{id}/complete', [ActivationController::class, 'complete']);

// Provisioning

Route::get('/provisioning', [ProvisioningController::class, 'index']);
Route::put('/provisioning/{id}', [ProvisioningController::class, 'provision']);

Route::get('/reports', [ReportController::class, 'index']);

Route::view('/settings', 'settings');
