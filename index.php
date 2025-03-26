<?php

/***
 * Modificar el código para que las funciones sean métodos de una clase llamada Producto.
 * Usar una función PHP para llamar al método correspondiente de la clase Producto,
 * dependiendo del método HTTP usado en la solicitud.
 *
 * Ejemplo:
 *     GET localhost/producto/1        Producto::get(10)
 *     POST localhost/producto/        Producto::post({"id":2, "nombre":"laptop", "precio":10000})
 *     PUT localhost/producto/        Producto::put({"id":2, "nombre":"Computadora", "precio":15000})
 *     DELETE localhost/producto/2     Producto::delete(2)
 */

echo "Hola mundo<br/>";
echo $_GET['PATH_INFO'];
echo "<br/> {$_SERVER['REQUEST_METHOD']} ";

$parameters = explode('/', $_GET['PATH_INFO']);
$recurso = $parameters[0];
$request_method = $_SERVER['REQUEST_METHOD'];

echo "<hr><br/><br/>";


    include_once 'producto.php';

    function handleRequest() {
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path_info = trim($path_info, '/');
        $parameters = explode('/', $path_info);

        $recurso = isset($parameters[0]) ? $parameters[0] : null;
        $id = isset($parameters[1]) ? $parameters[1] : null; // Si hay un ID en la URL

        $request_method = $_SERVER['REQUEST_METHOD'];

        switch (strtoupper($request_method)) {
            case 'GET':
                return Producto::getproducto($id);
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);
                return Producto::postproducto($data);
            case 'PUT':
                $data = json_decode(file_get_contents('php://input'), true);
                return Producto::putproducto($data);
            case 'DELETE':
                return Producto::deleteproducto($id);
            default:
                return "Método no soportado.";
        }
    }

    echo handleRequest();

?>

