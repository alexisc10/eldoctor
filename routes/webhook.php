<?php

use Illuminate\Support\Facades\Route;

Route::get('/v1/webhook/horarios/consumir', 'Webhooks\WebhookHorarioController@consumir');
Route::get('/v1/webhook/citas/consumir', 'Webhooks\WebhookCitaController@consumir');
