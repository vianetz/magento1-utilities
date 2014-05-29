<?php
/**
 * Vianetz Utilities Account Navigation Block
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
 */
class Vianetz_Utilities_Block_Customer_Account_Navigation extends Mage_Customer_Block_Account_Navigation
{
    /**
     * @param $name
     *
     * @return Vianetz_Utilities_Block_Customer_Account_Navigation
     */
    public function removeLink($name)
    {
        unset($this->_links[$name]);
        return $this;
    }
}