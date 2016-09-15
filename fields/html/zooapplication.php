<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// load zoo frontend language file
$this->app->system->language->load('com_zoo');

$this->app->document->addStylesheet('mz_assets:css/zooapplication.css');
$this->app->document->addScript('mz_assets:js/ajax_fields.js');

// init vars
$params	= $this->app->parameterform->convertParams($parent);
$table	= $this->app->table->application;

// create application select
$options = array($this->app->html->_('select.option', '', '- '.JText::_('Select Application').' -'));
//print_r($table->all(array('order' => 'name'))); die;
if($table->all(array('order' => 'name'))){
	foreach ($table->all(array('order' => 'name')) as $application) {	
		$options[] = $this->app->html->_('select.option', $application->id, $application->name);	
	}
	// create html
	$html[] = '<div id="'.$name.'" class="zoo-application">';
	$html[] = '<span class="zoo-application-text">'.JText::_('Select Application').'</span>';
	$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.']', 'class="application app-ajax-on-change required" required data-getwhat="cats"', 'value', 'text', $value);
	$html[] = '</div>';

	$javascript  = '';
	$html[] = '<input type="hidden" id="jpath_root" name="jpath_root" value="'.JPATH_ROOT.'" />';

	echo implode("\n", $html).$javascript;
} else{
	
	// check ZOO config
	jimport('joomla.filesystem.file');
	if ( !JFile::exists(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php') || !JComponentHelper::getComponent('com_zoo', true)->enabled ) {
		$html[] = '<div class="invalid ">'.JText::_('You don\'t have ZOO Component installed and enabled!').'</div>';
		$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.']', 'class="application app-ajax-on-change required" required data-getwhat="cats"', 'value', 'text', $value);
		echo implode("\n", $html);		
	} else{	
		$html[] = '<div class="invalid ">'.JText::_('You must have at least one application instance defined in the com_zoo component!').'</div>';
		$html[] = $this->app->html->_('select.genericlist', $options, $control_name.'['.$name.']', 'class="application app-ajax-on-change required" required data-getwhat="cats"', 'value', 'text', $value);
		echo implode("\n", $html);
	}
}