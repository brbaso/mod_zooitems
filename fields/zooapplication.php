<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class JFormFieldZooApplication extends JFormField {

	protected $type = 'ZooApplication';		
	
	public function __construct() {
		
		// load config
		require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');
		
		// get App instance
		$this -> app = App::getInstance('zoo');		
		parent::__construct();
	}
	
	public function getInput() {		
		return $this->render('zooapplication', $this->fieldname, $this->value, $this->element, array('control_name' => "jform[{$this->group}]", 'parent' => $this->form->getValue('params'))) ;
	}
	
	public function render($type, $name, $value, $node, $args = array()) {
		
		if (empty($type)) return;
		
		// register path to $type = zooapplication field
		$this->app->path->register(JPATH_ROOT.'/modules/mod_zooitems/fields/html', 'html');
		
		// register path to assets
		$this->app->path->register(JPATH_ROOT.'/modules/mod_zooitems/assets', 'mz_assets');
		
		// set vars
		$args['name']  = $name;
		$args['value'] = $value;
		$args['node']  = $node;	
		
		$__file = $this->app->path->path("html:$type.php");	

		if ($__file != false) {
			// render the field
			extract($args);
			ob_start();
			include($__file);
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}

		return 'Field Layout "'.$type.'" not found. ('.$this->app->utility->debugInfo(debug_backtrace()).')';

	}
}