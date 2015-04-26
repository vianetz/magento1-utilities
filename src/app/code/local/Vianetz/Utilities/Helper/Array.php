<?php
/**
 * Helper for Arrays
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
class Vianetz_Utilities_Helper_Array extends Mage_Core_Helper_Abstract
{
    /**
     * Shuffle array preserving key => value.
     *
     * @see http://de3.php.net/shuffle
     *
     * @param array $array
     *
     * @return array
     */
    public function shuffleAssoc(array $array)
    {
        $returnArray = array();

        $keys = array_keys($array);

        shuffle($keys);

        foreach ($keys as $key) {
            $returnArray[$key] = $array[$key];
        }

        return $returnArray;
    }
}