<?php class CajaDeHerramientas {

    //con esta funcion obtenemos un objeto CajaDeHerramientas
    public static function cdh () {
        return new self;
    }

    //esta es la estructura en la que almacenamos los fragmentos para construir elementos html
    private array $anatomia_elemento = [
        "Contenido" => null,
        "Etiqueta" => null,
        "Atributos" => null,
        "AutoCerrable" => null,
    ];

    //head && title
    //esta funcion es especificamente para construir tags sin atributos
    #pero sigue siendo obligatorio agregarle un contenido
    ##########################################
    public function etiqueta () {
        if(!empty($this->obtenerEtiqueta())) {
            return '<'.$this->obtenerEtiqueta().'>'.$this->obtenerContenido().'</'.$this->obtenerEtiqueta().'>';
        }
    }
    #########################################

    //con esta funcion asignamos la etiqueta que queramos crear
    public function asignarEtiqueta (string $etiqueta) {
        
        $etiqueta = htmlspecialchars($etiqueta);

        switch ($etiqueta) {

            case 'doctype': $this->anatomia_elemento['Etiqueta'] = '!'.strtoupper($etiqueta); break;
            case 'html': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'head': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'title': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'body': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h1': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h2': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h3': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h4': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h5': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'h6': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'p': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'br': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'hr': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'abbr': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'address': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'b': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'bdi': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'bdo': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'blockquote': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'cite': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'code': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'del': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'dfn': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'em': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'i': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'ins': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'kbd': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'mark': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'meter': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'pre': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'progress': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'q': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'rp': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'rt': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'ruby': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 's': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'samp': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'small': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'strong': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'sub': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'sup': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'template': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'time': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'u': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'var': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'wbr': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'form': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'input': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'textarea': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'button': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'select': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'optgroup': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'option': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'label': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'fieldset': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'legend': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'datalist': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'output': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'iframe': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'img': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'map': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'area': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'canvas': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'figcation': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'figure': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'picture': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'svg': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'audio': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'source': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'track': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'video': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'a': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'link': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'nav': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'ul': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'ol': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'li': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'dl': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'dt': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'dd': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'table': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'caption': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'th': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'tr': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'td': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'thead': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'tbody': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'tfoot': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'col': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'colgroup': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'style': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'div': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'span': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'header': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'footer': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'main': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'section': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'article': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'aside': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'details': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'dialog': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'summary': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'data': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'head': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'meta': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'base': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'script': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'noscript': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'embed': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'object': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            case 'param': $this->anatomia_elemento['Etiqueta'] = $etiqueta; break;
            default: 
                die('Usted a Ingresado una Etiqueta Invalida.');
            break;

        }

    }

    //con esta funcion podemos obtener el valor que asignamos a la clave Etiqueta
    public function obtenerEtiqueta () : string {
        return (is_string($this->anatomia_elemento['Etiqueta'])) ? $this->anatomia_elemento['Etiqueta'] : die('Defina una Etiqueta Porfavor');
    }

    //con esta funcion indicamos que tipo de etiqueta queremos crear
    public function asignarAutoCerrable (string $tipoDeEtiqueta) {
        if (
            $tipoDeEtiqueta === 'si' ||
            $tipoDeEtiqueta === 'no' ||
            $tipoDeEtiqueta === 'SI' ||
            $tipoDeEtiqueta === 'NO' ||
            $tipoDeEtiqueta === 'Si' ||
            $tipoDeEtiqueta === 'No' ||
            $tipoDeEtiqueta === 'n' ||
            $tipoDeEtiqueta === 's' ||
            $tipoDeEtiqueta === 'N' ||
            $tipoDeEtiqueta === 'S' ||
            $tipoDeEtiqueta === 'yes' ||
            $tipoDeEtiqueta === 'y' ||
            $tipoDeEtiqueta === 'Y' ||
            $tipoDeEtiqueta === 'YES' 
        ) {
            $this->anatomia_elemento['AutoCerrable'] = $tipoDeEtiqueta;
        }else{
            die('Usted ha ingresado un valor No Valido');
        }
    }

    //con esta funcion obtenemos el valor de la asignacion del tipo de etiqueta
    public function obtenerAutoCerrable () : string {
        return (is_string($this->anatomia_elemento['AutoCerrable'])) ? $this->anatomia_elemento['AutoCerrable'] : die('Defina un tipo de Etiqueta Porfavor');
    }

    //con esta funcion asignamos los atributos que tendra el elemento html
    public function asignarAtributos (array $atributos) {

        if(empty($atributos)) {
            die('Usted a ingresado un arreglo Vacio Por lo tanto no puedo hacer nada');
        }else{

            $atributosValidos = [
                'accept',
                'accept-charset',
                'accesskey',
                'action',
                'alt',
                'async',
                'autocomplete',
                'autofocus',
                'autoplay',
                'bgcolor',
                'charset',
                'checked',
                'cite',
                'class',
                'cols',
                'colspan',
                'content',
                'contenteditable',
                'controls',
                'coords',
                'data',
                'data-*',
                'datetime',
                'default',
                'defer',
                'dir',
                'dirname',
                'disabled',
                'download',
                'draggable',
                'enctype',
                'for',
                'form',
                'formaction',
                'headers',
                'height',
                'hidden',
                'high',
                'href',
                'hreflang',
                'http-equiv',
                'id',
                'ismap',
                'kind',
                'label',
                'lang',
                'list',
                'loop',
                'low',
                'max',
                'maxlenght',
                'media',
                'method',
                'min',
                'multiple',
                'muted',
                'name',
                'novalidate',
                'onabort',
                'onafterprint',
                'onbeforeprint',
                'onbeforeunload',
                'onblur',
                'oncanplay',
                'oncanplaythrough',
                'onchange',
                'onclick',
                'oncontextmenu',
                'oncopy',
                'oncuechange',
                'oncut',
                'ondblclick',
                'ondrag',
                'ondragend',
                'ondragenter',
                'ondragleave',
                'ondragover',
                'ondragstart',
                'ondrop',
                'ondurationchange',
                'onemptied',
                'onended',
                'onerror',
                'onfocus',
                'onhashchange',
                'oninput',
                'oninvalid',
                'onkeydown',
                'onkeypress',
                'onkeyup',
                'onload',
                'onloadeddata',
                'onloadedmetadata',
                'onloadstart',
                'onmousedown',
                'onmousemove',
                'onmouseout',
                'onmouseover',
                'onmouseup',
                'onmousewheel',
                'onoffline',
                'ononline',
                'onpagehide',
                'onpageshow',
                'onpaste',
                'onpause',
                'onplay',
                'onplaying',
                'onpopstate',
                'onprogress',
                'onratechange',
                'onreset',
                'onresize',
                'onscroll',
                'onsearch',
                'onseeked',
                'onseeking',
                'onselect',
                'onstalled',
                'onstorage',
                'onsubmit',
                'onsuspend',
                'ontimeupdate',
                'ontoggle',
                'onunload',
                'onvolumechange',
                'onwaiting',
                'onwheel',
                'open',
                'optimum',
                'pattern',
                'placeholder',
                'poster',
                'preload',
                'readonly',
                'rel',
                'required',
                'reversed',
                'rows',
                'rowspan',
                'sandbox',
                'scope',
                'selected',
                'shape',
                'size',
                'sizes',
                'span',
                'spellcheck',
                'src',
                'srcdoc',
                'srclang',
                'srcset',
                'start',
                'step',
                'style',
                'tabindex',
                'target',
                'title',
                'translate',
                'type',
                'usemap',
                'value',
                'width',
                'wrap',
                'html'
            ];
            
            foreach ($atributos as $clave => $valor) {
                $clave = htmlspecialchars($clave);
                $valor = htmlspecialchars($valor);
                if($clave === '!') {
                    $valido = false;
                    $listaDeAtributos = explode(' ',$valor);
                    for($i = 0; $i < count($listaDeAtributos); $i++) {
                        for($j = 0; $j < count($atributosValidos); $j++) {
                            if($listaDeAtributos[$i] === $atributosValidos[$j]) {
                                $valido = true;
                                break;
                            }else{
                                $valido = false;
                            }
                        }
                        if($valido) {
                            $this->anatomia_elemento['Atributos'] .= ' '.$listaDeAtributos[$i];
                        }else{
                            die($listaDeAtributos[$i] . ' no es valido');
                        }
                    }
                }else{
                    for($i = 0; $i < count($atributosValidos); $i++) {
                        if($clave === $atributosValidos[$i]) {
                            $valido = true;
                            break;
                        }else{
                            $valido = false;
                        }
                    }
                    if($valido) {
                        $this->anatomia_elemento['Atributos'] .= ' '.$clave.'="'.$valor.'"';
                    }else{
                        die($clave.' no es valido');
                    }
                }
            }

        }

    }

    //con esta funcion obtenemos los atributos que el elemento html tendra
    public function obtenerAtributos () : string {
        return (is_string($this->anatomia_elemento['Atributos'])) ? $this->anatomia_elemento['Atributos'] : die('Defina los Atributos de la Etiqueta Porfavor');
    }

    //con esta funcion agregamos contenido a el elemento html
    public function asignarContenido ($contenido) {
        if(is_array($contenido)) {
            $auxiliar = [];
            for($i = 0; $i < count($contenido); $i++) {
                array_push($auxiliar,(is_array($contenido[$i])) ? implode("",$contenido[$i]) : $contenido[$i]);
            }
            $this->anatomia_elemento['Contenido'] = implode("",$auxiliar);
        }else{
            
            if(empty($contenido)) {
                die('No se permiten etiquetas sin contenido');
            }else{
                $this->anatomia_elemento['Contenido'] = $contenido;
            }
        }
        if(strpos($this->obtenerContenido() , 'script') !== false){
            die('Php &#128024; only.');
        }
    }

    //con esta funcion obtenemos el contenido del elemento html
    public function obtenerContenido () : string {
        return (is_string($this->anatomia_elemento['Contenido'])) ? $this->anatomia_elemento['Contenido'] : die('Defina el Contenido de la Etiqueta Porfavor');
    }

    //con esta funcion unificamos los datos para construir un elemento self closing
    public function construirAutoCerrable () : string {
        if(
            $this->obtenerEtiqueta() === '!DOCTYPE'
        ) {
            return '<'.$this->obtenerEtiqueta().$this->obtenerAtributos().'>';
        }else{
            return '<'.$this->obtenerEtiqueta().$this->obtenerAtributos().'/>';
        }
    }

    //con esta funcion unificamos los datos para crear una etiqueta de apertura y cierre
    public function construirEtiqueta () : string {
        return '<'.$this->obtenerEtiqueta().$this->obtenerAtributos().'>'.$this->obtenerContenido().'</'.$this->obtenerEtiqueta().'>';
    }

    //con esta funcion hacemos el llamado al constructor correspondiente y obtenemos el elemento
    public function plantillaHtml () {
        
        switch($this->obtenerAutoCerrable()) {
            case 'si': 
                return $this->construirAutoCerrable();
                break;
            case 's': 
                return $this->construirAutoCerrable();
                break;
            case 'Si': 
                return $this->construirAutoCerrable();
                break;
            case 'SI': 
                return $this->construirAutoCerrable();
                break;
            case 'S': 
                return $this->construirAutoCerrable();
                break;
            case 'y': 
                return $this->construirAutoCerrable();
                break;
            case 'Y': 
                return $this->construirAutoCerrable();
                break;
            case 'yes': 
                return $this->construirAutoCerrable();
                break;
            case 'YES': 
                return $this->construirAutoCerrable();
                break;
            case 'no': 
                return $this->construirEtiqueta();
                break;
            case 'n': 
                return $this->construirEtiqueta();
                break;
            case 'NO': 
                return $this->construirEtiqueta();
                break;
            case 'N': 
                return $this->construirEtiqueta();
                break;
            case 'No': 
                return $this->construirEtiqueta();
                break;
            default: die('Usted ingreso un valor incorrecto'); break;
        }
    }

}

#CONSTANTES PARA DEFINIR LOS VALORES DE CONEXION A LA BASE DE DATOS:

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','test');

require_once('./herramientas/funcionesMysql.php');