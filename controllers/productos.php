<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

$ids_to_delete = [];

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


Editor::inst( $db, 'productos' )
	->fields(
		Field::inst( 'nombre' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Debe ingresar un nombre' )
        ) ),
        Field::inst( 'descripcion' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Debe indicar una descripción del producto' )
            ) ),
		Field::inst( 'precio' )
			->validator( Validate::numeric() )
            ->setFormatter( Format::ifEmpty(null) )
	)
    ->join(
        Mjoin::inst( 'files' )
            ->link( 'productos.id', 'productos_files.producto_id' )
            ->link( 'files.id', 'productos_files.file_id' )
            ->fields(
                Field::inst( 'id' ) //De esta forma se suben los archivos
                ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/Ecommerce/upload/__ID__.__EXTN__' )
                    ->db( 'files', 'id', array(
                        'filename'    => Upload::DB_FILE_NAME,
                        'filesize'    => Upload::DB_FILE_SIZE,
                        'web_path'    => Upload::DB_WEB_PATH,
                        'system_path' => Upload::DB_SYSTEM_PATH
                    ) )
                    ->validator( Validate::fileSize( 5000000, 'El archivo debe ser menor a 5M' ) )
                    ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif', 'webp' ), "Por favor carga una imagen" ) )
                )
            )
    )
	->on('postCreate',function($editor,$id,$values,$row){

		$groups = getGroups($values);

		foreach($groups as $key_color => $vals){
			$color = $vals[0];

            if (!empty($color)) {
                $res = $editor->db()->insert('grupocolores', array(
                    'producto_id' => $id,
                    'color' => strtolower($color),
                ));
                $pares_array = array_slice($vals, 1, count($vals));
                $grupocolores_id = $res->insertId();
                foreach ($pares_array as $par) {
                    $existencias = $par['existencias'];
                    $talla = $par['talla'];

                    if (!empty($talla) && !empty($existencias)) {
                        $editor->db()->insert('existencias', array(
                            'grupocolores_id' => $grupocolores_id,
                            'existencias' => $existencias,
                            'talla' => $talla
                        ));
                    }
                }
            }
		}
	})
    ->on('preRemove',function($editor,$id,$values){
    	/*justo antes de borrar, recupero los id de imagen asociados al producto
    	para poder borrarlos despues en el postRemove si fue bien el borrado del producto.
    	*/
    	global $ids_to_delete;

    	$res = $editor->db()->select('productos_files','file_id', function($q) use ($id) {
            $q->where('producto_id', $id, '=' );
        })->fetchAll();

    	$ids_to_delete = $res;
    	//$results =  print_r($ids_to_delete, true);
        //file_put_contents('filename.txt', $results);

    })
    ->on('postRemove',function($editor,$id,$values){
        // Borro las imagenes asociadas al producto eliminado, tanto de la bd como de uploads
        global $ids_to_delete;

        foreach ($ids_to_delete as $id_key){

            $path_imagen = $editor->db()->select('files','system_path', function($q) use ($id_key) {
                $q->where('id', $id_key['file_id'], '=' );
            })->fetchAll()[0]['system_path'];

            //borro imagen
			unlink($path_imagen);

			//Ahora borro su entrada de la base de datos.
            $editor->db()->delete('files', function($q) use ($id_key) {
                $q->where('id', $id_key['file_id'], '=' );
            });
		}
    })
	->debug(true)
	->process( $_POST )
	->json();


function getGroups($values_array){

	$keys = array_keys($values_array);
	$groups = [];

	//extract all colors
	foreach($keys as $ckey){
		if(0 !== preg_match('/color/', $ckey)){
			$color_key = $ckey;
			$color_value = $values_array[$ckey];
			$groups[$color_key] = [$color_value];

			$color_keynum = preg_replace('/[^0-9]/', '', $color_key);
			$tallas_patron = "/^talla_".$color_keynum."/";

			foreach ($keys as $tkey){
                if(0 !== preg_match($tallas_patron,$tkey)){
                	$tallas_key = $tkey;
                    $talla_value = $values_array[$tallas_key];

                    $existencias_talla_color_key = "existencias_".$tallas_key;
                    $existencias = $values_array[$existencias_talla_color_key];

                    $pares = array("talla"=>$talla_value, "existencias"=>$existencias);
                    $groups[$color_key][] = $pares;
				}
			}
		}
	}
	return $groups;//json_encode($groups);
}

/*
Editor::inst( $db, 'productos_meta' )
	->fields(
		Field::inst( 'color' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Debe ingresar un nombre' )
        ) ),
        Field::inst( 'existencias_talla' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Debe indicar una descripción del producto' )
            ) ),
		Field::inst( 'talla' )
			->validator( Validate::numeric() )
            ->setFormatter( Format::ifEmpty(null) )
    )
	->debug(true)
	->process( $_POST )
	->json();

*/
/*
Editor::inst( $db, 'productos' )
	->fields(
		Field::inst( 'nombre' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Debe ingresar un nombre' )
        ) ),
        Field::inst( 'descripcion' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Debe indicar una descripción del producto' )
            ) ),
		Field::inst( 'precio' )
			->validator( Validate::numeric() )
            ->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'existencias' )
            ->validator( Validate::numeric() )
            ->setFormatter( Format::ifEmpty(null) )
	)

	->join(
        Mjoin::inst( 'files' )
            ->link( 'productos.id', 'productos_files.producto_id' )
            ->link( 'files.id', 'productos_files.file_id' )
            ->fields(
                Field::inst( 'id' ) //De esta forma se suben los archivos
                    ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/Ecommerce/upload/__ID__.__EXTN__' )
                        ->db( 'files', 'id', array(
                            'filename'    => Upload::DB_FILE_NAME,
                            'filesize'    => Upload::DB_FILE_SIZE,
                            'web_path'    => Upload::DB_WEB_PATH,
                            'system_path' => Upload::DB_SYSTEM_PATH
                        ) )
                        ->validator( Validate::fileSize( 5000000, 'El archivo debe ser menor a 5M' ) )
                        ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Por favor carga una imagen" ) )
                    )
            )
    )
	->debug(true)
	->process( $_POST )
	->json();

*/
?>
