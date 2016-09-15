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
$table	= $this->app->table->category;

// init params for new module creation
if(!isset($params -> application) ){ $params -> application = [""];}
if(!isset($params -> zoocategories) ){ $params -> zoocategories = [""];}
if(!isset($params -> zootypes) ){ $params -> zootypes = "";}

$cats = (array)$params -> zoocategories ;
if($cats[0] == '' & count($cats) != 1){
	array_shift( $cats );
}

$html[] = '<div id="'.$name.'" class="zoo-application">';

$options = array($this->app->html->_('select.option', '', ''));

if( !$cats[0] & !$params -> application || !$params -> zootypes){	
	$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.'][]', 'class="choose_categories"  multiple data-getwhat="items"', 'value', 'text', $value);	
} else{		
	if($params -> zootypes == 'bycats'){
		foreach ($this->app->table->application->all(array('order' => 'name')) as $appl) {
				if($appl->id == $params -> application){
					$application = $appl;
				}
		}		
		$html[] = $this->app->html->_('zoo.categorylist', $application, $options, $control_name.'['.$name.'][]', 'class="choose_categories" multiple data-getwhat="items"', 'value', 'text', $cats);		
	} else{			
		foreach ($this->app->table->application->all(array('order' => 'name')) as $appl) {
			if($appl->id == $params -> application){
				$application = $appl;
				foreach ($application -> getTypes() as $type) {
					$options[] = $this->app->html->_('select.option', $type->id, $type->name);					
				}
			}
		}		
		$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.'][]', 'class="choose_categories" multiple data-getwhat="items"', 'value', 'text', $cats);		
	}	
}
$html[] = '</div>';
echo implode("\n", $html);