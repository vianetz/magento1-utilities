<?php
/**
 * Vianetz Utilities Product List Block
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
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
     * Constructor overwriting parent construct for adding a cache lifetime (if configured)
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->addData(
            array(
                 'cache_lifetime' => Mage::getStoreConfig('vianetz_utilities/cache_block/cache_product_list_lifetime')
            )
        );
    }

    /**
     * Returns a unique cache key
     *
     * @return string unique cache resource identifier
     */
    public function getCacheKey()
    {
        // Template path has to be in cacheKey-Id to avoid caching problems, because this block can be used for several templates.
        $cacheResourceIdentifier = $this->getTemplate() . '_' . self::CACHE_KEY_EXTENSION;
        return Mage::helper('vianetz_utilities/cache')->getCacheKey($cacheResourceIdentifier);
    }
}