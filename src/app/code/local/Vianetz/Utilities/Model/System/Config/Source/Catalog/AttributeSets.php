<?php
/**
 * Vianetz Utilities Attribute Sets System Config Dropdown Model
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
class Vianetz_Utilities_Model_System_Config_Source_Catalog_AttributeSets
{
    /**
     * Returns all system attribute sets for config value in admin.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $result = array();

        $entityType = Mage::getModel('catalog/product')->getResource()->getTypeId();
        $attributeSetCollection = Mage::getResourceModel('eav/entity_attribute_set_collection')->setEntityTypeFilter($entityType);
        foreach ($attributeSetCollection as $attributeId => $attributeSet) {
            $attributeName = $attributeSet->getAttributeSetName();
            $result[] = array('value' => $attributeId, 'label' => $attributeName);
        }

        return $result;
    }

}
