<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// add uikit
$zoo->document->addStylesheet('mz_assets:uikit/css/uikit.css');
$zoo->document->addScript('mz_assets:uikit/js/uikit.min.js');	

$zoo->document->addScript('mz_assets:uikit/js/components/grid.min.js');
$zoo->document->addStylesheet('mod_zooitems:tmpl/uikit/style-uikitgrid.css');

$css_class = $application->getGroup().'-'.$application->getTemplate()->name;

// get item categories for filtering
foreach($items as $item){
    $prime_cat = $zoo-> table -> category -> getById($item -> params['config.primary_category'], true)[0];
	$cats[$prime_cat -> id] = [
		'id'    => $prime_cat -> id,
		'name'  => $prime_cat -> name,
		'alias' => $prime_cat -> alias
	];	
}
$grid_columns = $params['grid_columns'];

if (!empty($items)) : ?>

<!-- Filter Controls -->
<ul class="zoo-item-grid-filters uk-subnav uk-subnav-pill" id="filter">
	<li data-uk-filter="" class="uk-active"><a href="#"><?php echo JText::_('All'); ?></a></li>
	<?php foreach($cats as $cat){ ?>
	<li data-uk-filter="<?php echo $cat['alias']; ?>" class=""><a href="#"><?php echo $cat['name']; ?></a></li>
	<?php } ?>
</ul>

<div class="zoo-item-grid uk-items-grid <?php echo $css_class ?>">
	<div data-uk-grid="{gutter: 20, controls: '#filter'}">
		<?php $i = 0; foreach ($items as $item) : $data_uk_filter = $zoo-> table -> category -> getById($item -> params['config.primary_category'], true)[0] -> alias; ?>
				<?php echo $renderer->render('item.'.$layout, compact('item', 'params','data_uk_filter', 'grid_columns')); ?>
		<?php $i++; endforeach; ; ?>
	</div>
</div>
<?php else : ?>
<?php echo JText::_('No Items found'); ?>
<?php endif;