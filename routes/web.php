<?php

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

Route::get('/', 'HomeController@front');
Route::get('empresa', 'EmpresaController@front');
Route::get('productos/{familia}', 'ProductoController@categorias');
Route::get('productos/{familia}/{categoria}', 'ProductoController@productos');
Route::get('productos/{familia}/{categoria}/{producto}', 'ProductoController@detalle');
Route::get('articulos', 'ProductoController@articulos');
Route::get('calidad', 'CalidadController@front');
Route::get('ambiente', 'AmbienteController@front');
Route::get('catalogo', 'DescargaController@front');
Route::get('contacto', 'ContactoController@front');
Route::get('solicitud', function (){
	return view('solicitud');
});
Route::get('trabaje', function (){
	return view('trabaje');
});
Route::post('enviar-contacto', 'ContactoController@enviar');
Route::post('enviar-presupuesto', 'ContactoController@presupuesto');
Route::post('enviar-cv', 'ContactoController@cv');
Route::resource('usuarios', 'UserController');

Route::group(['prefix' => 'adm'], function() {
	
	Route::resource('slider', 'SliderController');
	Route::resource('destacado', 'DestacadoController');
	Route::resource('item', 'ItemController');
	Route::resource('icono', 'IconoController');
	Route::resource('logo', 'LogoController');
	Route::resource('categoria', 'CategoriaController');
	Route::resource('producto', 'ProductoController');
	Route::resource('texto', 'TextoController');
	Route::resource('descarga', 'DescargaController');
	Route::resource('contacto', 'ContactoController');
	Route::resource('metadato', 'MetadatoController');
	Route::resource('user', 'UserController');
	Route::resource('social', 'SocialController');
	Route::resource('imagen', 'ImagenController');

	Route::get('/', function (){
		return view('adm.login');
	});
	Route::get('index', function (){
		return view('adm.panel');
	});
	Route::post('ingresar', ['uses'=>'UserController@login','as'=>'adm.ingresar']);
	Route::get('logout', 'UserController@logout');
	Route::post('buscar', ['uses'=>'ProductoController@buscar','as'=>'producto.buscar']);

	Route::group(['prefix' => 'home'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'HomeController@crearSlider');
			Route::get('edit', 'HomeController@listarSliders');
			Route::get('edit/{id}', 'HomeController@editarSlider');
		});

		Route::group(['prefix' => 'destacado'], function() {

			Route::get('edit', 'HomeController@listarDestacados');
			Route::get('edit/{id}', 'HomeController@editardestacado');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'HomeController@editarItem');
		});

		Route::group(['prefix' => 'icono'], function() {
			Route::get('edit', 'HomeController@listarIconos');
			Route::get('edit/{id}', 'HomeController@editarIcono');
		});
	});

	Route::group(['prefix' => 'empresa'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'EmpresaController@crearSlider');
			Route::get('edit', 'EmpresaController@listarSliders');
			Route::get('edit/{id}', 'EmpresaController@editarSlider');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'EmpresaController@editarItem');
		});
	});

	Route::group(['prefix' => 'productos'], function() {

		Route::group(['prefix' => 'categoria'], function() {
			Route::get('create/{familia}', 'CategoriaController@crearCategoria');
			Route::get('edit/{familia}', 'CategoriaController@listarCategorias');
			Route::get('edit/{familia}/{id}', 'CategoriaController@editarCategoria');
		});

		Route::group(['prefix' => 'producto'], function() {
			Route::get('create/{familia}', 'ProductoController@crearProducto');
			Route::get('edit/{familia}', 'ProductoController@listarProductos');
			Route::get('edit/{familia}/{id}', 'ProductoController@editarProducto');
		});

		Route::group(['prefix' => 'imagen'], function() {
			Route::get('create/{producto}', 'ImagenController@crearImagen');
			Route::get('edit/{producto}', 'ImagenController@listarImagenes');
			Route::get('edit/{producto}/{id}', 'ImagenController@editarImagen');
		});
	});

	Route::group(['prefix' => 'calidad'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'CalidadController@crearSlider');
			Route::get('edit', 'CalidadController@listarSliders');
			Route::get('edit/{id}', 'CalidadController@editarSlider');
		});

		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'CalidadController@editarTexto');
		});
	});

	Route::group(['prefix' => 'ambiente'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'AmbienteController@crearSlider');
			Route::get('edit', 'AmbienteController@listarSliders');
			Route::get('edit/{id}', 'AmbienteController@editarSlider');
		});

		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'CalidadController@editarTexto');
		});
	});

	Route::group(['prefix' => 'catalogo'], function() {

		Route::group(['prefix' => 'descarga'], function() {
			Route::get('edit/{id}', 'CatalogoController@editarDescarga');
		});
	});

	Route::group(['prefix' => 'contactos'], function() {
		Route::group(['prefix' => 'contacto'], function() {
			Route::get('edit', 'ContactoController@listarContactos');
			Route::get('edit/{id}', 'ContactoController@editarContacto');
		});
	});

	Route::group(['prefix' => 'logos'], function() {
		Route::group(['prefix' => 'logo'], function() {
			Route::get('edit', 'LogoController@listarLogos');
			Route::get('edit/{id}', 'LogoController@editarLogo');
		});
	});

	Route::group(['prefix' => 'metadatos'], function() {

		Route::group(['prefix' => 'metadato'], function() {
			Route::get('edit', 'MetadatoController@listarMetadatos');
			Route::get('edit/{id}', 'MetadatoController@editarMetadato');
		});
	});

	Route::group(['prefix' => 'redes'], function() {
		Route::group(['prefix' => 'social'], function() {
			Route::get('create', 'SocialController@crearSocial');
			Route::get('edit', 'SocialController@listarSocials');
			Route::get('edit/{id}', 'SocialController@editarSocial');
		});
	});

	Route::group(['prefix' => 'usuarios'], function() {
		Route::group(['prefix' => 'usuario'], function() {
			Route::get('create', 'UserController@crearUsuario');
			Route::get('edit', 'UserController@listarUsuarios');
			Route::get('edit/{id}', 'UserController@editarUsuario');
		});
	});
});
