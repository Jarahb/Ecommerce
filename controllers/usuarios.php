<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );
 $host="localhost"; //El servidor que utilizaremos 
 $user="Jara";     //El usuario que tiene todos los permisos en la bbdd
 $pass="123456";    //La contraseña
 $db="ecommerce";  

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
$editor = Editor::inst( $db, 'usuarios' )
	->fields(
		Field::inst( 'nombre' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar un nombre' )	
			) ),
		Field::inst( 'email' )
			->validator( Validate::email( ValidateOptions::inst()
				->message( 'Debe ingresar un email' )
				) ),
		Field::inst( 'teléfono' )
			->validator( Validate::numeric() )
				->setFormatter( Format::ifEmpty(null) )
				) ),
		Field::inst( 'dirección' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar una dirección' )	
			) ),
		Field::inst( 'población' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar la ciudad dónde reside' )	
			) ),
		Field::inst( 'provincia' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar un nombre' )	
			) ),
		Field::inst( 'código postal' )
			->validator(  Validate::numeric() )
				->setFormatter( Format::ifEmpty(null) )		
    )
	->process( $_POST )
	->json();

