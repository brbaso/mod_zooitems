<?php
/**
 * @package   ZOO Item
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class mod_zooitemInstallerScript {

	public function install($parent) {}

	public function uninstall($parent) {}

	public function update($parent) {}

	public function preflight($type, $parent) {

        //because the module doesn't come with ZOO Component package let's make sure that the ZOO component has been installed and enabled
        if (strtolower($type) == 'install') {
           // check for zoo
        }


		if (strtolower($type) == 'update') {

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