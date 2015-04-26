<?php
/**
 * Vianetz Utilities
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
 * @copyright   Copyright (c) 2006-14 vianetz - C. Massmann (http://www.vianetz.com)
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GNU GENERAL PUBLIC LICENSE
 */
class Vianetz_Utilities_Model_Catalog_Resource_Eav_Product extends Mage_Catalog_Model_Resource_Eav_Mysql4_Product
{
    /**
     * Overwrite original method to call costly getSortedAttributes()/uasort() only in backend
     * because it is not needed in frontend and only consumes time.
     *
     * @param null $setId
     *
     * @return array
     */
    public function getSortedAttributes($setId = null)
    {
        if (Mage::app()->getStore()->isAdmin() === false) {
            $attributes = $this->getAttributesByCode();
            return $attributes;
        } else {
            return parent::getSortedAttributes($setId);
        }
    }
}