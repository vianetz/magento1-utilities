<?php
/**
 * Helper for Arrays
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
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