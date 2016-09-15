<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// include css
$zoo->document->addStylesheet('mod_zooitems:tmpl/list/style-list.css');

$css_class = $application->getGroup().'-'.$application->getTemplate()->name;

if (!empty($items)) : ?>
<ul class="zoo-item-list zoo-list <?php echo $css_class ?>">
	<?php $i = 0; foreach ($items as $item) : ?>
	<li><?php echo $renderer->render('item.'.$layout, compact('item', 'params', 'i')); ?></li>
	<?php $i++; endforeach; ?>
</ul>
<?php else : ?>
<?php echo JText::_('No Items found'); ?>
<?php endif;