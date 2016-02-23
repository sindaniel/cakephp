<?php
/**
 * Help Helper
 *
 * @category Helper
 * @package  View.Helper
 * @version  1.0
 * @author   Santiago Restrepo <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class HelpHelper extends AppHelper {

/**
 * @var string
 * @access public
 */
    public $name = 'Help';

/**
 * Otros helpers usados por este helper
 *
 * @var array
 * @access public
 */
    public $helpers = array(
        'Html',
        'Session',
        'Js',
    );

/**
 * Convertir cadena de texto a URL
 *
 * Cambia los espacios en blanco por guiones, cambia vocales con tíldes o acentos por vocales normales.
 * También elimina caracteres extraños para usar como titulo en URL
 *
 * @return string
 */
    public function strToUrl($string = null) {
        $string = str_replace(array('<br>', '<br/>', '<br />'), ' ', $string);
        $string = eregi_replace("[\n|\r|\n\r]", '', $string);
        $string = strip_tags($string);
        $string = trim(strtolower(str_replace(' ', '-', $string)));
        $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', 'é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë', 'í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î','ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô', 'ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü', 'ñ', 'Ñ', 'ç', 'Ç'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'n', 'N', 'c', 'C',),
        $string
        );
        $string = str_replace( //Esta parte se encarga de eliminar cualquier caracter extraño
        array("\\", "¨", "º", "~", "#", "@", "|", "!", "\"", "·", "$", "%", "amp", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "`", "]", "}", "{", "¨", "´", ">", "<", ";", ",", ":", ".", " ", " - "),
            '',
            $string
        );
        $string = strtolower($string);
        return $string;
    }  

/**
 * Javascript variables
 *
 * Muestra información útil del sitio en una variable javascript llamada "Base", como ruta base de las apliaciones, etc.
 *
 * También se fusiona Configure::read('Js') con la variable "Base" de js.
 * Asi, esposible asignar un valor a la variable "Base" desde cualquier lugar como Configure::write('Js.my_var', 'my value'),
 * Y se puede acceder a ella como 'Base.my_var' en tu javascript.
 *
 * @return string
 */
    public function js() {
        $base = array();
        if (isset($this->request->params['locale'])) {
            $base['basePath'] = Router::url('/' . $this->request->params['locale'] . '/');
        } elseif (isset($this->request->params['lang'])) {
            $base['basePath'] = Router::url('/' . $this->request->params['lang'] . '/');
        } else {
            $base['basePath'] = Router::url('/');
        }
        $validKeys = array(
            'plugin' => null,
            'controller' => null,
            'action' => null,
            'named' => null,
        );
        $base['params'] = array_intersect_key(
            array_merge($validKeys, $this->request->params),
            $validKeys
        );
        if (is_array(Configure::read('Js'))) {
            $base = Hash::merge($base, Configure::read('Js'));
        }
        return $this->Html->scriptBlock('var Base = ' . $this->Js->object($base) . ';');
    }

/**
 * Muestra los mensajes Flash
 *
 * @return string
 */
    public function sessionFlash() {
        $messages = $this->Session->read('Message');
        $output = '';
        if (is_array($messages)) {
            foreach (array_keys($messages) as $key) {
                $output .= $this->Session->flash($key);
            }
        }
        return $output;
    }

/**
 * Crear nueva tab title/link
 */
    public function adminTab($title, $url, $options = array()) {
        return $this->Html->tag('li',
            $this->Html->link($title, $url, Hash::merge(array(
                'data-toggle' => 'tab',
                ), $options)
            )
        );
    }

/**
 * Mostrar Tabs
 *
 * @return string
 */
    public function adminTabs($show = null) {
        if (!isset($this->adminTabs)) {
            $this->adminTabs = false;
        }

        $output = '';
        $tabs = Configure::read('Admin.tabs.' . Inflector::camelize($this->request->params['controller']) . '/' . $this->request->params['action']);
        if (is_array($tabs)) {
            foreach ($tabs as $title => $tab) {
                $tab = Hash::merge(array(
                    'options' => array(
                        'linkOptions' => array(),
                        'elementData' => array(),
                        'elementOptions' => array(),
                    ),
                ), $tab);

                if (!isset($tab['options']['type']) || (isset($tab['options']['type']) && (in_array($this->_View->viewVars['typeAlias'], $tab['options']['type'])))) {
                    $domId = strtolower(Inflector::singularize($this->request->params['controller'])) . '-' . strtolower(Inflector::slug($title, '-'));
                    if ($this->adminTabs) {
                        list($plugin, $element) = pluginSplit($tab['element']);
                        $elementOptions = Hash::merge(array(
                            'plugin' => $plugin,
                        ), $tab['options']['elementOptions']);
                        $output .= '<div id="' . $domId . '" class="tab-pane">';
                        $output .= $this->_View->element($element, $tab['options']['elementData'], $elementOptions);
                        $output .= '</div>';
                    } else {
                        $output .= $this->adminTab($title, '#' . $domId, $tab['options']['linkOptions']);
                    }
                }
            }
        }

        $this->adminTabs = true;
        return $output;
    }

}

?>