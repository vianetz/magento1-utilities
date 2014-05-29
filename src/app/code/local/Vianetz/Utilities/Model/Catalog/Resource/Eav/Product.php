<?php
/**
 * Vianetz Utilities
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
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