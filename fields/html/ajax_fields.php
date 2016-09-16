<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
 // no direct access 
define( '_JEXEC', 1 );

// get joomla root
$jpath_root = $_POST['jpath_root'];

//load Joomla
define( 'JPATH_BASE', $jpath_root );
require_once ( JPATH_BASE .'/includes/defines.php' );
require_once ( JPATH_BASE .'/includes/framework.php' );

jimport( 'joomla.application.application' );
jimport( 'joomla.filter.filteroutput' );

$japp = JFactory::getApplication('site');


// load ZOO
require_once ( JPATH_ADMINISTRATOR.'/components/com_zoo/config.php' );
$zoo = App::getInstance('zoo');

$switch_case = $_POST['switch_case'];
$app_id = $_POST['app_id'];

// switch case
switch($switch_case) {	
	case 'bycats':
		$opts = array($zoo->html->_('select.option', '', ''));
		$cats = array();		
		
		foreach ($zoo->table->application->all(array('order' => 'name')) as $application) {
			if($application->id == $app_id){
				$cats[]  = $zoo->html->_('zoo.categorylist', $application, $opts, 'jform[params][zoocategories][]', 'class="choose_categories" multiple data-getwhat="items"', 'value', 'text');		
			}			
		}		
		 
		echo json_encode(implode("\n", $cats));		
	break;
	
	case 'bytypes':	
		$opts = array($zoo->html->_('select.option', '', ''));		
		foreach ($zoo->table->application->all(array('order' => 'name')) as $application) {
			if($application->id == $app_id){
				foreach ($application -> getTypes() as $type) {
					$opts[] = $zoo->html->_('select.option', $type->id, $type->name);
				}
			}
		}		
		$types[] = $zoo->html->_('select.genericlist', $opts, 'jform[params][zoocategories][]',  'class="choose_categories" multiple data-getwhat="items"', 'value', 'text');
		
		echo json_encode(implode("\n", $types));		
	break;	
	
	case 'items':

        // selected categories
		$scats = $_POST['scats'];
		$choose_by = $_POST['choose_by'];
		
		if($scats[0] == ''){
			array_shift( $scats );
		}				
		if(!$scats){
			$scats = 0;
		}

        // selected items
		$sitms = $_POST['sitms'];
		
		if($sitms[0] == '' & count($sitms) != 1){
			array_shift( $sitms );
		}

		if($choose_by == 'bycats'){			
			$items = $zoo->table->item->getByCategory($app_id, $scats, true);			
		} else{			
			$items = array();
			$items_types = array();
			foreach($scats as $type){
				$items_types = $zoo->table->item->getByType($type, $app_id, true);
				foreach($items_types as $item){				
					$items[$item -> id] = $item;
				}				
			}			
		}				
		$opts = array($zoo->html->_('select.option', '', ''));
		$itms = array();
		
		foreach($items as $item){
			$opts[] = $zoo->html->_('select.option', $item->id, $item->name);		
		}		
		$itms[] = $zoo->html->_('select.genericlist', $opts, 'jform[params][zooitems][]', 'class="choose_items" multiple', 'value', 'text', $sitms);			

		echo json_encode(implode("\n", $itms));
	break;	
}