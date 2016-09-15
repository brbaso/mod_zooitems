<?php
/**
 * @author     brbaso@gmail.com 
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * Zoo Items Helper
 *
 */
class ZooItemsHelper {
	
	// constructor
	public function __construct() {

		// load config
		require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');
		
		// get App instance
		$this -> app = App::getInstance('zoo');		
	}
	
	/**
	 * Get items from ZOO module params.
	 *
	 * @param $params Module Parameter
	 * @return array Items
	 */
	public function getZooItems($params) {		
			
		$items = array();
		$ignore_order_priority = false;
		
		if ($application = $this->app->table->application->get($params->get('application', 0))) {

			$zooitems = (array)$params->get('zooitems');

			if($zooitems[0] == ''){
				array_shift( $zooitems ); 
			}
			
			$order = $params->get('order');
			
			if (is_string($order)) {
				$order = $this->app->itemorder->convert($order);
			}
			
			$order = (array)$order;
			
			if (($index = array_search('_ignore_priority', $order)) !== false) {
				$ignore_order_priority = true;
				unset($order[$index]);			
			}			
		
			// get items			
			if ( $itms = $this->app->table->item->getByIds( $zooitems, true, null, $order, $ignore_order_priority ) ) {
				$items = $itms;
			}
		}
		return $items;
	}	
}