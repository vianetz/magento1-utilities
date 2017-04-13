<?php
/**
 * Vianetz Utilities Account Navigation Block
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
class Vianetz_Utilities_Block_Customer_Account_Navigation extends Mage_Customer_Block_Account_Navigation
{
    /**
     * Possibility to remove links from the customer account area.
     *
     * @param string $name The link name.
     *
     * @return Vianetz_Utilities_Block_Customer_Account_Navigation
     */
    public function removeLink($name)
    {
        unset($this->_links[$name]);
        return $this;
    }
}