<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');


// load zoo config
require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');

// get app
$zoo = App::getInstance('zoo');

// load zoo frontend language file
$zoo->system->language->load('com_zoo');

// init vars
$path = dirname(__FILE__);

// require helper
require_once $path.'/helper.php';

//register base path
$zoo->path->register($path, 'mod_zooitems');
$zoo->path->register(JPATH_ROOT.'/modules/mod_zooitems/fields/html', 'html');
$zoo->path->register(JPATH_ROOT.'/modules/mod_zooitems/assets', 'mz_assets');

if ($application = $zoo->table->application->get($params->get('application', 0))) {	
	$help = new ZooItemsHelper();
	$items = $help -> getZooItems($params);	

	// Get active template path:
	$app    = JFactory::getApplication();
	$mod_override_path   = JPATH_ROOT.'/templates/'.$app->getTemplate().'/html/mod_zooitems';
	
	// if we have template overrides set the renderer
	if(is_dir($mod_override_path)){
		$renderer = $zoo->renderer->create('item')->addPath(array($mod_override_path));
	} else{
		$renderer = $zoo->renderer->create('item')->addPath(array( dirname(__FILE__)));
	}
	
	//get layout
	$layout = $params->get('layout', 'default');
	include(JModuleHelper::getLayoutPath('mod_zooitems', $params->get('theme', 'list')));
}