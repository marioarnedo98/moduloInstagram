<?php
/**
 * Hello World! Module Entry Point
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_esfacebook
 * is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
//require_once dirname(__FILE__) . '/helper.php';

$access_token = $params->get('access_token',null);
$nombre_usuario = $params->get('nombre_usuario', null);


$template = '<a href=\"{{image}}\" ><img src=\"{{image}}\" alt=\"\" class=\"img-fluid\"/></a>';

$script = '
    var userFeed = new Instafeed({
        get: "user",
        userId: '. $nombre_usuario.',
        limit: 12,
        resolution: "standard_resolution",
        accessToken: "'. $access_token .'",
        sortBy: "most-recent",
        template: "'. $template .'"
    });


    userFeed.run();


    jQuery(document).ready(function() {
        jQuery(".gallery").magnificPopup({
        type: "image",
        delegate: "a",
        gallery:{enabled:true}
        });
    });';


$document = JFactory::getDocument();


$document->addScript('./modules/mod_esinstagram/javas/instafeed.min.js');
$document->addScriptDeclaration($script);
$document->addScript('./modules/mod_esinstagram/javas/magnific.min.js');
$document->addStyleSheet('./modules/mod_esinstagram/css/magnific.css');
$document->addStyleSheet('./modules/mod_esinstagram/css/style.css');


require JModuleHelper::getLayoutPath('mod_esinstagram', $params->get('layout', 'default'));

?>