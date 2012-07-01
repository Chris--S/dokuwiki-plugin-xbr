<?php
/**
 * Render Plugin for XHTML output with preserved linebreaks
 *
 * @author Chris Smith <chris@jalakai.co.uk>
 */

if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once DOKU_INC . 'inc/parser/xhtml.php';

/**
 * The Renderer
 */
class renderer_plugin_xbr extends Doku_Renderer_xhtml {

    function canRender($format) {
      return ($format=='xhtml');
    }

    function reset() {
       $this->doc = '';
       $this->footnotes = array();
       $this->lastsec = 0;
       $this->store = '';
       $this->_counter = array();
    }

    function cdata($text) {
        $this->doc .= str_replace("\n","<br />\n",trim($this->_xmlEntities($text)));
    }

}

//Setup VIM: ex: et ts=4 enc=utf-8 :
