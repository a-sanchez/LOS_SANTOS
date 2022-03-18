<?php

use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\routes_diseño_nav;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ContactarAgenteController;
use App\Http\Controllers\HistorialUsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('send-mail',[TestController::class, 'sendMailWithPDF']);

/** RUTAS INICIO DE SESION*/
Route::post('/login',[UserController::class,'inicioSesion']);
Route::get('/salir',[UserController::class,'salir']);
/**CATALAGO DE PRODUCTOS */
Route::get('historial/productos',[ProductosController::class,'productos']);
Route::delete('historial/eliminar/{id}',[ProductosController::class,'eliminar_imagen']);
Route::post('historial/actualizar/{id}',[ProductosController::class,'actualizar']);
Route::resource('/historial',ProductosController::class);

/**ADMINISTRADOR-CONTACTOS */
Route::resource('/contactos',ContactarAgenteController::class);
Route::resource('/ventas',VentasController::class);
/** RUTAS SHOPPING CART */

// Route::get('cart', [CarritoController::class, 'cartList'])->name('cart.list');
// Route::post('cart', [CarritoController::class, 'addToCart'])->name('cart.store');
// Route::post('update-cart', [CarritoController::class, 'updateCart'])->name('cart.update');
// Route::post('remove', [CarritoController::class, 'removeCart'])->name('cart.remove');
// Route::post('clear', [CarritoController::class, 'clearAllCart'])->name('cart.clear');

Route::resource('/carrito', CarritoController::class);

/**CATALAGO DE USUARIOS */
Route::resource('/usuarios',HistorialUsuariosController::class);
/**CATALAGO DE ORDENES */
Route::get('ordenes/historial/{id}',[OrdenesController::class,'historial']);
Route::get('ordenes/producto/{id}',[OrdenesController::class,'edit_product_orden']);

Route::get('ordenes/historial/usuario/{id}/fecha/{fecha}/folio/{folio}',[OrdenesController::class,'ordenes']);

Route::put('ordenes/historial/usuario/{id}/folio/{folio}',[OrdenesController::class,'eliminar_producto']);
Route::put('ordenes/producto/{id}',[OrdenesController::class,'actualizar']);
Route::resource('/ordenes',OrdenesController::class);

Route::get('ordenes/actualizadas/orden/{id}/fecha/{fecha}',[OrdenesController::class,'actualizar_ordenes']);

// RUTAS DEL LOGIN

// Route::get('/login',[HistorialUsuariosController::class,'login']);

/** RUTAS DEL NAVBAR SIMPLIFICADAS */

Route::get('/objetivo',[routes_diseño_nav::class,'objetivo']);

Route::get('/nuestra_moneda',[routes_diseño_nav::class,'nuestra_moneda']);

Route::get('/contactar_agente',[routes_diseño_nav::class,'contactar_agente']);

Route::get('/vender_propiedad',[routes_diseño_nav::class,'vender_propiedad']);

/**RUTAS PARA CATEGORIAS-PRODUCTOS */

// Route::get('/arte',[ProductosController::class,'arte']);
// Route::get('/ropas',[ProductosController::class,'ropas']);
// Route::get('/joyeria',[ProductosController::class,'joyeria']);
// Route::get('/vuelos',[ProductosController::class,'vuelos']);
Route::get('/datos/{id}',[ProductosController::class,'datos']);


Route::post('/relojes/{categoria}',[ProductosController::class,'relojes']);

Route::get('/relojes/{categoria}',[ProductosController::class,'relojes']);

Route::post('/arte/{categoria}',[ProductosController::class,'arte']);

Route::get('/arte/{categoria}',[ProductosController::class,'arte']);

Route::post('/joyeria/{categoria}',[ProductosController::class,'joyeria']);

Route::get('/joyeria/{categoria}',[ProductosController::class,'joyeria']);

Route::post('/ropas/{categoria}',[ProductosController::class,'ropas']);

Route::get('/ropas/{categoria}',[ProductosController::class,'ropas']);

Route::post('/vuelos/{categoria}',[ProductosController::class,'vuelos']);

Route::get('/vuelos/{categoria}',[ProductosController::class,'vuelos']);