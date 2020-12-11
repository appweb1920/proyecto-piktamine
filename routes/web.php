<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MiControladorEvento;

Route::get('/',[MiControladorEvento::class,'index'])->name('R-index');

Route::middleware(['auth:sanctum','verified'])->get('/create_event',[MiControladorEvento::class,'crearevento'])->name('R-create_event');//el middleware verifica que vamos a poder ver la ruta dashboard si se cumple la condicion de estar autentificado

Route::get('/event/events',[MiControladorEvento::class,'eventosgenerales'])->name('R-events');

Route::get('/event/{id_event}',[MiControladorEvento::class,'eventoindividual'])->name('R-event');

//Route::get('/create_event',[MiControladorEvento::class,'crearevento'])->name('R-create_event');

Route::post('/create_event/submit',[MiControladorEvento::class,'submitevento'])->name('R-submit_event');

//Route::get('/manage/event/{id_event}/',[MiControladorEvento::class,'administrarevento'])->name('R-eventmanage');

Route::middleware(['auth:sanctum','verified'])->get('/manage/event/{id_event}/',[MiControladorEvento::class,'administrarevento'])->name('R-eventmanage');

Route::get('/event/{id_event}/{id_torneo}',[MiControladorEvento::class,'torneoindividual'])->name('R-torneoindividual');

Route::get('/event/{id_event}/{id_torneo}/bracket',[MiControladorEvento::class,'bracketindividual'])->name('R-bracketindividual');

Route::get('/testing',[MiControladorEvento::class,'testing'])->name('R-testing');