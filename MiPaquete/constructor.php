<?php
#Static Code
    offErrores();
    function verificaString ($resultado) {
        if (is_string($resultado)) {
            return tag('div',['class'=>'mensaje'],$resultado);
        }
    }
    /**
     * Area para el tratamiento de datos
     * Cuando utilice la funcion de crear 
     * una nueva base de datos
     */
    #en caso de esperar un mensaje creo la variable mensaje
    $mensaje = '';
    $posts = '';
    //verifico que se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //recibo el nombre de la base de datos a crear
        $dbName = $_GET['dbName'];
        $eliminar = $_GET['drop'];

        if($eliminar === 'drop') {
            #proceso datos entre la vista y la base de datos
            $resultado = ControladorDeElFlujoDeDatos('consumir',false,false,false,$dbName);
            #si se confirma que el resultado es un mensaje, lo guardo
            $mensaje = verificaString ($resultado);
        }else{
            #proceso datos entre la vista y la base de datos
            $resultado = ControladorDeElFlujoDeDatos('crear',false,false,false,$dbName);
            #si se confirma que el resultado es un mensaje, lo guardo
            $mensaje = verificaString ($resultado);
        }
    }
    //fin del area para tratamiento de datos

    /**
     * Area para los procesos del scroll infinito
     */

    //PARA CREAR LA TABLA POSTS EN LA BASE DE DATOS scrollinfinito : 
    if ( isset($_GET['crear']) ) {
        $resultado = ControladorDeElFlujoDeDatos('consumir',false,true);
        $mensaje = verificaString ($resultado);
    }
    // PARA POBLAR LA TABLA POST EN LA BASE DE DATOS SCROLLINFINITO
    if ( isset($_GET['poblar']) ) {
        $resultado = ControladorDeElFlujoDeDatos('consumir',true,false);
        $mensaje = verificaString ($resultado);
    }
    //PARA OBTENER LOS POSTS DE LA TABLA POSTS
    if ( isset($_GET['posts']) ) {
        $posts = ControladorDeElFlujoDeDatos('consumir',false,false,true);
    }
    //fin del area del scroll infinito
#Static Code

/*
este arreglo contiene los datos de cada pagina de nuestra aplicacion
es necesario definir la clave y la estructura basica para cada pagina
lo que sera dinamico es el valor de cada clave de la estructura
*/
$Constructor = [];