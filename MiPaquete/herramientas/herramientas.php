<?php require_once('./herramientas/CajaDeHerramientas.php');

/**
 * Estas son las funciones
 * que por ley nunca deben 
 * de faltar en tu arsenal
 * para iniciar cualquier
 * proyecto en php.
 */


//Esta funcion define el doctype HTML5
function documento(){
    $doctype = CajaDeHerramientas::cdh();
    $doctype->asignarAutoCerrable('y');
    $doctype->asignarEtiqueta('doctype');
    $doctype->asignarAtributos(['!' => 'html']);
    return $doctype->plantillaHtml();
}

//esta funcion defina la etiqueta html
function contenedor($content='&#9803;',$lang = 'en'){
    $html = CajaDeHerramientas::cdh();
    $html->asignarAutoCerrable('n');
    $html->asignarEtiqueta('html');
    $html->asignarAtributos(['lang' => $lang]);
    $html->asignarContenido($content);
    return $html->plantillaHtml();
}

//esta funcion nos sirve para importar un archivo .css
function estilo($path='./css/main.css'){
    $estilo = CajaDeHerramientas::cdh();
    $estilo->asignarAutoCerrable('y');
    $estilo->asignarEtiqueta('link');
    $estilo->asignarAtributos([
        'href' => $path,
        'rel' => 'stylesheet',
        'type' => 'text/css'
    ]);
    return $estilo->plantillaHtml();
}

//esta funcion nos sirve para agregar un icono al lado del titulo del tab de la pagina
function favicon($path='./imagenesEtc/php-logo.svg',$type='image/svg+xml'){
    $estilo = CajaDeHerramientas::cdh();
    $estilo->asignarAutoCerrable('y');
    $estilo->asignarEtiqueta('link');
    $estilo->asignarAtributos([
        'href' => $path,
        'rel' => 'icon',
        'type' => $type
    ]);
    return $estilo->plantillaHtml();
}

//esta funcion nos sirve para definir el titulo que aparece en el tab de la pagina
function titulo($titulo='Mis Herramientas PHP'){
    $title = CajaDeHerramientas::cdh();
    $title->asignarAutoCerrable('n');
    $title->asignarEtiqueta('title');
    $title->asignarContenido($titulo);
    return $title->etiqueta();
}

//funcion para concatenar el contenido de archivos js
function concatenaScript (array $rutas) {
    $contenido = [];
    for ($i = 0; $i < count($rutas); $i++) {
        array_push($contenido,file_get_contents($rutas[$i]));
    }
    return $contenido;
}

//con esta funcion importamos un archivo .js
function js($path){
    $js = CajaDeHerramientas::cdh();
    $js->asignarAutoCerrable('n');
    $js->asignarEtiqueta('script');
    $js->asignarAtributos([
        'type' => 'text/javascript',
        '!' => 'defer'
    ]);
    if (is_array($path)) {
        $js->asignarContenido(concatenaScript($path));
    }else{
        $js->asignarContenido(file_get_contents($path));
    }
    return $js->plantillaHtml();
}

//esta funcion define el tag head
function cabeza($content='<title>=)</title>'){
    $head = CajaDeHerramientas::cdh();
    $head->asignarAutoCerrable('n');
    $head->asignarEtiqueta('head');
    $head->asignarContenido($content);
    return $head->etiqueta();
}

//esta funcion define el tag body
function cuerpo($content='<a href="./index.php">ReConstruir Html</a>',$atributo = ['class'=>'cuerpo']){
    $body = CajaDeHerramientas::cdh();
    $body->asignarAutoCerrable('n');
    $body->asignarEtiqueta('body');
    $body->asignarAtributos($atributo);
    $body->asignarContenido($content);
    return $body->plantillaHtml();
}

//esta funcion nos sirve para crear mas tags
function tag($a,$b,$c){
    $etiqueta = CajaDeHerramientas::cdh();
    $etiqueta->asignarAutoCerrable('n');
    $etiqueta->asignarEtiqueta($a);
    $etiqueta->asignarAtributos($b);
    $etiqueta->asignarContenido($c);
    return $etiqueta->plantillaHtml();
}

//funcion para crear mas self closing tags
function _tag($a,$b){
    $etiqueta = CajaDeHerramientas::cdh();
    $etiqueta->asignarAutoCerrable('y');
    $etiqueta->asignarEtiqueta($a);
    $etiqueta->asignarAtributos($b);
    return $etiqueta->plantillaHtml();
}

//esta funcion transcribe todo nuestro codigo a html
function crearArchivoHtml (string $nombre,string $pagina) {
    $archivo = fopen($nombre, "w") or die("no se pudo abrir el archivo!");
    fwrite($archivo, $pagina);
}

//funcion para agregar fontawesome version 4.7
function iconos () {
    return _tag('link',[
        'rel' => 'stylesheet',
        'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    ]);
}

//funcion para mostrar los archivos que debo documentar
function menuAdaptable () {
    return tag('div',[
        'class' => 'menuSuperior',
        'id' => 'miMenuSuperior'
    ],[
        tag('a',[
            'href' => './index.php?posts=true',
            'class' => ($_SERVER['PHP_SELF'] === '/MyToolKit/MyToolKitPhp/Rgg/MiPaquete/index.php') ? 'active' : ''
        ],'Hogar'),
        tag('a',[
            'href' => './crearBaseDeDatos.php',
            'class' => ($_SERVER['PHP_SELF'] === '/MyToolKit/MyToolKitPhp/Rgg/MiPaquete/crearBaseDeDatos.php') ? 'active' : ''
        ],'Crear Base de Datos'),
        tag('a',[
            'class' => 'icon',
            'onclick' => 'abrirMenu()'
        ],'<i class="fa fa-bars"></i>')
    ]);
}

//funcion para agregar la tipografia que a mi me gusta
function condense () {
    return implode("",[
        _tag('link',[
            'rel' => 'preconnect',
            'href' => 'https://fonts.gstatic.com'
        ]),
        _tag('link',[
            'href' => 'https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap',
            'rel' => 'stylesheet'
        ])
    ]);
}

//funcion para crear un pie de pagina muy simple
function footer () {
    return tag('footer',['class'=>'footer'],'&copy; Ramiro G_IG >>> @ramiroseh');
}

//formulario muy sencillo
function formularioMuySencillo() {
    return tag('form',[
        'action' => './crearBaseDeDatos.php',
        'method' => 'get'
    ],[
        _tag('input',[
            'type' => 'text',
            'name' => 'dbName',
            'placeholder' => 'Ingrese el nombre de la base de datos: ',
            'class' => 'dbName',
            '!' => 'required'
        ]),
        tag('label',['class'=>'drop'],[
            "Eliminar ",
            _tag('input',[
                'type' => 'checkbox',
                'name' => 'drop',
                'value' => 'drop'
            ])
        ]),
        _tag('input',[
            'type' => 'submit',
            'name' => 'crearDb',
            'value' => 'Crear/Eliminar DB',
            'class' => 'btnCdb'
        ])
    ]);
}

//funcion para apagar las notificaciones de errores de php
function offErrores() {
    // Turn off error reporting
    error_reporting(0);
}

#funcion que contiene la estructura base
function MiPaginaWeb ( 
    bool $activarJs,
    string|array $rutaAlJavascript,
    string $idioma,
    string $rutaAlosEstilosCss,
    string $rutaAlFavicon,
    string $titulo,
    array $otrasEtiquetasDelHead,
    array $contenidoDeLaPagina,
    string $puntoDeEntrada
) {

    $datos = [
        'activarJs' => $activarJs,
        'javascript' => $rutaAlJavascript,
        'idioma' => $idioma,
        'estilo' => $rutaAlosEstilosCss,
        'favicon' => $rutaAlFavicon,
        'titulo' => $titulo,
        'otrasEtiquetasDelHead' => $otrasEtiquetasDelHead,
        'cuerpo' => $contenidoDeLaPagina,
        'vista' => $puntoDeEntrada
    ];

    $EstructuraBase = null;

    if( $datos['activarJs'] === true ) {

        $EstructuraBase = documento().contenedor([
            cabeza([
                estilo(
                    $datos['estilo']
                ),
                favicon(
                    $datos['favicon']
                ),
                titulo(
                    $datos['titulo']
                ),
                $datos['otrasEtiquetasDelHead']
            ]),
            cuerpo(
                $datos['cuerpo']
            )
        ],
            $datos['idioma']
        ).js($datos['javascript']);

    }else {

        $EstructuraBase = documento().contenedor([
            cabeza([
                estilo(
                    $datos['estilo']
                ),
                favicon(
                    $datos['favicon']
                ),
                titulo(
                    $datos['titulo']
                ),
                $datos['otrasEtiquetasDelHead']
            ]),
            cuerpo(
                $datos['cuerpo']
            )
        ],
            $datos['idioma']
        );

    }
    
    crearArchivoHtml($datos['vista'],$EstructuraBase);
    header("Location: ".$datos['vista']);
}