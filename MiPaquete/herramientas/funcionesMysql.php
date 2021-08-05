<?php

//esta funcion nos conecta a la base de datos , indicandole un nombre de base de datos
function hayConexion ($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME) {
    $hayConexion = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if ( !$hayConexion ) {
        die("
            <!DOCTYPE html>
            <html>
            <head>
            <title>Error!!!</title>
            <style>
                body {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                .mysqlError, .mysqlError a {
                    background-color: rgb(163, 65, 82);
                    border: none;
                    color: rgb(226, 207, 207);
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                }
                
                .mysqlError a {
                    text-decoration: none;
                    background-color: rgb(155, 75, 92);
                }
                .mysqlError:hover, .mysqlError a:hover {
                    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                }
            </style>
            </head>
            <body>
            <div class='mysqlError'>No me pude conectar =( ".mysqli_connect_error()."<br><a href='./index.php'>Hogar</a></div>
            </body>
            </html>
        ");
    } else {
        return $hayConexion;
    }
}

//con esta funcion no es necesario pasarle un nombre de base de datos
function conectarParaCrear ($DB_HOST,$DB_USER,$DB_PASS) {
    $hayConexion = new mysqli($DB_HOST,$DB_USER,$DB_PASS);
    if ( $hayConexion->connect_error ) {
        die("No me pude conectar =( ".$hayConexion->connect_error);
    } else {
        return $hayConexion;
    }
}

//con esta funcion creamos una base de datos vacia
function crearBaseDeDatos (string $dbName, $conn) {
    $sql = "CREATE DATABASE $dbName";
    if ($conn->query($sql) === TRUE) {
        return "=)";
    } else {
        return "=( : " . $conn->error;
    }
    $conn->close();
}

//funcion para eliminar base de datos
function borrarBaseDeDatos (string $dbName, $conn) {
    $sql = "DROP DATABASE $dbName";
    if ($conn->query($sql) === TRUE) {
        return "=)";
    } else {
        return "=( : " . $conn->error;
    }
    $conn->close();
}

//con esta funcion llenamos la tabla posts de una base de datos
function poblarDb ($conexion) {
    $texto = file_get_contents('http://loripsum.net/api/3/short',true);
    $query = "INSERT INTO posts(contenido) VALUES('".$texto."')";
    mysqli_query($conexion,$query);
    if ($conexion->query($query) === TRUE) {
        return "Table posts Poblada successfully";
    } else {
        return "Error poblando table: " . $conexion->error;
    }
}

/*con esta funcion seleccionamos los datos de 
la tabla posts de una base de datos 
y los retornamos en formato json*/
function seleccionarPosts ($conexion) {
    $datos = [];
    $filas = [];

    $query = "SELECT * FROM posts ORDER BY id DESC";
    $resultado = mysqli_query($conexion,$query);
    if(empty($resultado)) {
        die('<!DOCTYPE html>
        <html>
        <head>
        <title>Error!!!</title>
        <style>
            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .mysqlError, .mysqlError a {
                background-color: rgb(163, 65, 82);
                border: none;
                color: rgb(226, 207, 207);
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
            }
            
            .mysqlError a {
                text-decoration: none;
                background-color: rgb(155, 75, 92);
            }
            .mysqlError:hover, .mysqlError a:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            }
        </style>
        </head>
        <body>
        <div class="mysqlError">verifique que la tabla <br>a la que quiere conectar exista !! <br><a href="./index.php">Hogar</a></div>
        </body>
        </html>');
    }
    while ( $fila = $resultado->fetch_array() ) {
        array_push($filas, [
            'id' => $fila['id'],
            'contenido' => $fila['contenido'],
            'fecha' => $fila['fecha']
        ]);
    }

    $datos['contenido'] = $filas;
    $caja = [];
    foreach($datos['contenido'] as $post) {
        array_push($caja,tag('div',['class'=>'caja'],[
            tag('h3',['class'=>'id'],$post['id']),
            tag('div',['class'=>'cajaContenido'],$post['contenido']),
            tag('h4',['class'=>'fecha'],$post['fecha'])
        ]));
    }
    return $caja;
    
}

//funcion para crear tabla posts
function crearTablaPosts ($conexion) {
    $sql = "CREATE TABLE posts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        contenido VARCHAR(30) NOT NULL,
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($conexion->query($sql) === TRUE) {
        return "Table posts created successfully";
    } else {
        return "Error creating table: " . $conexion->error;
    }
    $conexion->close();
}

/*
    esta conexion siempre sera a la base de datos scrollinfinito
    para configurar una nueva conexion vaya a el archivo CajaDeHerramientas.php
    y ahi modifique los datos de conexion , si la base de datos no existe aun
    puede crearla con la herramienta visual crear base de datos que mi 
    caja de herramientas le proporciona
    con esta funcion controlamos todas las acciones que querramos hacer con mysql
*/
function ControladorDeElFlujoDeDatos (string $conectarPara,bool $poblar=false,bool $crearTablaPosts=false,bool $selecionarPosts=false,$dbName='') {
    if ( $conectarPara === 'crear' ) {
        $conn = conectarParaCrear(DB_HOST,DB_USER,DB_PASS);
        if (!empty($dbName)) {
            return crearBaseDeDatos($dbName,$conn);
        }
    } elseif ( $conectarPara === 'consumir' ) {
        if($poblar) {
            $conexion = hayConexion(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            return poblarDb($conexion);
        }else {
            if($crearTablaPosts) {
                $conexion = hayConexion(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                return crearTablaPosts($conexion);
            }else{
                if($selecionarPosts) {
                    $conexion = hayConexion(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                    return seleccionarPosts($conexion);
                }else{
                    $conexion = conectarParaCrear(DB_HOST,DB_USER,DB_PASS);
                    if (!empty($dbName)) {
                        return borrarBaseDeDatos($dbName,$conexion);
                    }
                }
            }
        }
    }
}

/**
 * CONFIGURACIONES PARA REALIZAR DISTINTAS ACCIONES
 * CON LA FUNCION ControladorDeElFlujoDeDatos
 * 
 * PARA CREAR UNA BASE DE DATOS : 
 *  $resultado = ControladorDeElFlujoDeDatos('crear',false,false,false,'dbName');
 * PARA CREAR LA TABLA POSTS EN LA BASE DE DATOS scrollinfinito : 
 *  $resultado = ControladorDeElFlujoDeDatos('consumir',false,true,false);
 * PARA POBLAR LA TABLA POST EN LA BASE DE DATOS SCROLLINFINITO
 *  $resultado = ControladorDeElFlujoDeDatos('consumir',true,false,false);
 * PARA SELECCIONAR LOS POSTS PARA EL SCROLL INFINITO
 *  $resultado = ControladorDeElFlujoDeDatos('consumir',false,false,true);
 * PARA ELIMINAR LA BASE DE DATOS :
 *  $resultado = ControladorDeElFlujoDeDatos('consumir',false,false,false,'dbNameToDelete');
 */