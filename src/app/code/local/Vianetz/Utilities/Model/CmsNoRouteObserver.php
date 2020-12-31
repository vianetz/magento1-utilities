<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is created by vianetz <info@vianetz.com>.
 * The Magento module is distributed under the GPL license.
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@vianetz.com so we can send you a copy immediately.
 *
 * @category    Vianetz
 * @package     Vianetz_Utilities
 * @author      Christoph Massmann, <C.Massmann@vianetz.com>
 * @link        http://www.vianetz.com
 * @copyright   Copyright (c) since 2006 vianetz - C. Massmann (http://www.vianetz.com)
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GNU GENERAL PUBLIC LICENSE
 */
final class Vianetz_Utilities_Model_CmsNoRouteObserver
{
    public function run(Varien_Event_Observer $observer)
    {
        $condition = $observer->getEvent()->getData('condition');

        if ($this->getRequest()->getActionName() === 'noRoute') {
            $condition->setData('continue', false);
        }
    }

    /**
     * @return \Mage_Core_Controller_Request_Http|\Zend_Controller_Request_Http
     */
    private function getRequest()
    {
        return Mage::app()->getRequest();
    }
}