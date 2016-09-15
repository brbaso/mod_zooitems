<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="uk-width-medium-1-<?php echo $grid_columns; ?> uk-margin-large-bottom " data-uk-filter="<?php echo $data_uk_filter; ?>">
	<div class="uk-panel" style="min-height: 0px;">
	
		<?php if ($this->checkPosition('media')) : ?>
		<div class="uk-margin-remove item_image">
			<?php echo $this->renderPosition('media'); ?>
		</div>
		<?php endif; ?>
		
		<div class="item-content">
		
			<?php if ($this->checkPosition('title')) : ?>
				<p class="title"><?php echo $this->renderPosition('title'); ?></p>
			<?php endif; ?>
			
			<div class="item-text">
				
				<?php if ($this->checkPosition('meta')) : ?>
				<div class="uk-width-1-1 item-meta"> 
					<?php echo $this->renderPosition('meta'); ?> 
				</div>
				<?php endif; ?>
				
				<?php if ($this->checkPosition('description')) : ?>
				<div class="uk-width-1-1 item-description">
					<?php echo $this->renderPosition('description'); ?>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>




