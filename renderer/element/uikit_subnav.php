<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// create label
$label = '';
if (isset($params['showlabel']) && $params['showlabel']) {
	$label = ($params['altlabel']) ? $params['altlabel'] : $element->config->get('name');
}

// create class attribute
$class = 'element element-'.$element->getElementType().($params['first'] ? ' first' : '').($params['last'] ? ' last' : '');

?>
<li>
	<?php echo $label.' '.$element->render($params); ?>
</li>