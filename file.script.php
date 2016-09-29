<?php
/**
 * @author     brbaso@gmail.com
 * @package    zooitems
 * @subpackage Modules
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class mod_zooitemsInstallerScript {

	public function install($parent) {}

	public function uninstall($parent) {}

	public function update($parent) {}

	public function preflight($type, $parent) {

		if (strtolower($type) == 'update') {

            // make sure ZOO Component exists and enabled
            try {
                if (!JComponentHelper::getComponent('com_zoo', true)->enabled){
                    throw new RuntimeException('Please install and enable ZOO Component first');
                }
            }
            catch (RuntimeException $e) {

                // Install failed, roll back changes
                throw new RuntimeException(
                    JText::sprintf(
                        'JLIB_INSTALLER_ABORT_ROLLBACK',
                        JText::_('JLIB_INSTALLER_' . $parent->getRoute()),
                        $e->getMessage()
                    ),
                    $e->getCode(),
                    $e
                );
            }

			// load config
			require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');

			// get app
			$zoo = App::getInstance('zoo');

			foreach ($zoo->filesystem->readDirectoryFiles($parent->getParent()->getPath('source'), $parent->getParent()->getPath('source').'/', '/(positions\.(config|xml)|metadata\.xml)$/', true) as $file) {
				JFile::delete($file);
			}
		}
	}

	public function postflight($type, $parent) {}

}