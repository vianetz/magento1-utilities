<?php
/**
 * Vianetz Utilities List Block
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
class Vianetz_Utilities_Block_Catalog_Product_List extends Mage_Catalog_Block_Product_List
{
    /**
     * Defines unique caching group for productList block output
     *
     * @var string
     */
    const CACHE_KEY_EXTENSION = 'productListBlock';

    /**
     * Constructor overwriting parent construct for adding a cache lifetime (if configured).
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        if (empty($this->getConfiguredCacheLifetime()) === false) {
            $this->addData(array('cache_lifetime' => $this->getConfiguredCacheLifetime()));
        }
    }

    /**
     * Returns a unique cache key.
     *
     * @return string unique cache resource identifier
     */
    public function getCacheKey()
    {
        $cacheResourceIdentifier = $this->getTemplate() . '_' . self::CACHE_KEY_EXTENSION;
        return $this->helper('vianetz_utilities/cache')->getCacheKey($cacheResourceIdentifier);
    }

    /**
     * @return string
     */
    private function getConfiguredCacheLifetime()
    {
        return Mage::getStoreConfig('vianetz_utilities/cache_block/cache_product_list_lifetime');
    }
}