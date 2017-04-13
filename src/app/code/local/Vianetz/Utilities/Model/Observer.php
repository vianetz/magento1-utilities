<?php
/**
 * Vianetz Utilities Observer
 *
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
class Vianetz_Utilities_Model_Observer
{
    public function configureWysiwyg(Varien_Event_Observer $observer)
    {
        $event = $observer->getEvent();
        $config = $event->getConfig();
        
        $config->addData( array(
                'force_p_newlines' => false,
                'forced_root_block' => false
                ));
        return $this;
    }
}