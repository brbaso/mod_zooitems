<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// load zoo frontend language file
$this->app->system->language->load('com_zoo');

// init vars
$params	= $this->app->parameterform->convertParams($parent);
$table	= $this->app->table->item;

// init params for new module creation
if(!isset($params -> application) ){ $params -> application = [""];}
if(!isset($params -> zoocategories) ){ $params -> zoocategories = [""];}
if(!isset($params -> zooitems) ){ $params -> zooitems = [""];}
if(!isset($params -> zootypes) ){ $params -> zootypes = "";}

$cats = (array)$params -> zoocategories ;

if($cats[0] == '' & count($cats) != 1){
	array_shift( $cats );
}

$itms = (array)$params -> zooitems ;
if($itms[0] == '' & count($itms) != 1){
	array_shift( $itms ); 
}

if(!$itms[0] & !$cats[0]){
	$options = array($this->app->html->_('select.option', '', ''));
} else{	
	if($params -> zootypes == 'bycats'){
		$items = $table->getByCategory($params -> application, $cats, true);		
	} else{
		$items = array();
		$items_types = array();
		foreach($cats as $type){
			$items_types = $table->getByType($type, $params -> application, true);
			foreach($items_types as $item){			
				$items[$item -> id] = $item;
			}
		}
	}	
	foreach ($items as $item) {		
		$options[] = $this->app->html->_('select.option', $item->id, $item->name);		
	}
}
$html[] = '<div id="'.$name.'" class="zoo-application">';
$html[] = '<span class="zoo-application-text">'.JText::_('Please Select Items').'</span>';
$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.'][]', 'class="choose_items"  multiple', 'value', 'text', $value);
$html[] = '</div>';

echo implode("\n", $html);