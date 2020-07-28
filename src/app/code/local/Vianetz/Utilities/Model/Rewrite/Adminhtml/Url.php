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
final class Vianetz_Utilities_Model_Rewrite_Adminhtml_Url extends Mage_Adminhtml_Model_Url
{
    /**
     * Overwrite original method as Litespeed does not like session param id.
     *
     * @return Mage_Core_Model_Url
     */
    public function addSessionParam()
    {
        $isDisableSid = Mage::getStoreConfigFlag('vianetz_utilities/admin_settings/disable_sid_in_urls');
        if ($isDisableSid) {
            return $this;
        }

        return parent::addSessionParam();
    }
}