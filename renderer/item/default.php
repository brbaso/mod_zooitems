<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
$media_position = $params->get('media_position', 'top');
?>

<div class="layout-default <?php if ($media_position == 'top' || $media_position == 'middle' || $media_position == 'bottom') echo 'alignment-center'; ?>">

	<?php if (($media_position == 'top' || $media_position == 'left' || $media_position == 'right') && $this->checkPosition('media')) : ?>
	<div class="media media-<?php echo $media_position; ?>"><?php echo $this->renderPosition('media'); ?></div>
	<?php endif; ?>
	
	<?php if ($media_position == 'cross_first_left' && $this->checkPosition('media')) {	if ($i % 2 == 0) { ?>			
			<div class="media media-left"><?php echo $this->renderPosition('media'); ?></div>
	<?php } else{ ?>			
			<div class="media media-right"><?php echo $this->renderPosition('media'); ?></div>
	<?php } } ?>
		
	<?php if ($media_position == 'cross_first_right' && $this->checkPosition('media')) {	if ($i % 2 == 0) { ?>			
			<div class="media media-right"><?php echo $this->renderPosition('media'); ?></div>
	<?php } else{ ?>			
			<div class="media media-left"><?php echo $this->renderPosition('media'); ?></div>
	<?php } } ?>
	
	<?php if ($this->checkPosition('title')) : ?>
	<p class="title"><?php echo $this->renderPosition('title'); ?></p>
	<?php endif; ?>
	
	<?php if ($this->checkPosition('meta')) : ?>
	<p class="meta"><?php echo $this->renderPosition('meta'); ?></p>
	<?php endif; ?>
	
	<?php if (($media_position == 'middle') && $this->checkPosition('media')) : ?>
	<div class="media media-<?php echo $media_position; ?>"><?php echo $this->renderPosition('media'); ?></div>
	<?php endif; ?>
	
	<?php if ($this->checkPosition('description')) : ?>
	<div class="description"><?php echo $this->renderPosition('description'); ?></div>
	<?php endif; ?>
	
	<?php if (($media_position == 'bottom') && $this->checkPosition('media')) : ?>
	<div class="media media-<?php echo $media_position; ?>"><?php echo $this->renderPosition('media'); ?></div>
	<?php endif; ?>
	
	<?php if ($this->checkPosition('links')) : ?>
	<p class="links"><?php echo $this->renderPosition('links'); ?></p>
	<?php endif; ?>

</div>