<?php
/**
 * Vianetz Utilities Catalog Navigation
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
 */
class Vianetz_Utilities_Block_Catalog_Navigation extends Mage_Catalog_Block_Navigation
{
    /**
     * Defines unique caching group for navigation block output
     *
     * @var string
     */
    const CACHE_KEY_EXTENSION = 'navigationBlock';

    /**
     * Constructor overwriting parent construct for adding a cache lifetime (if configured)
     */
    protected function _construct()
    {
        parent::_construct();

        $this->addData(
            array(
                 'cache_lifetime' => Mage::getStoreConfig('vianetz_utilities/cache_block/cache_navigation_lifetime')
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
        // Template path has to be in cacheKey-Id to avoid caching problems, because this block can be used for several templates
        $cacheResourceIdentifier = $this->getTemplate() . '_' . self::CACHE_KEY_EXTENSION;
        // Also ignore query params for cache key.
        return Mage::helper('vianetz_utilities/cache')->getCacheKey($cacheResourceIdentifier, true);
    }
}