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
$zoo->document->addStylesheet('mod_zooitems:tmpl/list/style-uklist.css');

// include uikit if required	
$zoo->document->addStylesheet('mz_assets:uikit/css/uikit.css');
$zoo->document->addScript('mz_assets:uikit/js/uikit.min.js');

$zoo->document->addStylesheet('mod_zooitems:tmpl/uikit/style-uikitgrid.css');

$css_class = $application->getGroup().'-'.$application->getTemplate()->name;

$grid_columns = $params['grid_columns'];

if (!empty($items)) : ?>
<div class="zoo-item-grid  uk-items-grid <?php echo $css_class ?>">
<div class="uk-grid mod-zoo-items">
	<?php $i = 0; foreach ($items as $item) : ?>
			<?php echo $renderer->render('item.'.$layout, compact('item', 'params', 'grid_columns')); ?>
	<?php $i++; endforeach; ?>
</div>
</div>
<?php else : ?>
<?php echo JText::_('MOD_ZOOITEMS_NOITEMSFOUND'); ?>
<?php endif;