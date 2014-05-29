<?php
/**
 * Helper for Cache Management
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
 */
class Vianetz_Utilities_Helper_Cache extends Mage_Core_Helper_Abstract
{
    /**
     * Returns a unique cache key for a given cacheResourceIdentifier
     * e.g.: $cacheResourceIdentifier = 'productListBlock'
     *
     * @param string $cacheResourceIdentifier
     *
     * @return string
     */
    public function getCacheKey($cacheResourceIdentifier, $isIgnoreQueryParams = false)
    {
        // CACHE_KEY_EXTENSION + store ID + backed controller and action + template + request URI = unique
        $request = Mage::app()->getRequest();
        $storeId = Mage::app()->getStore()->getId();
        $pageBackend = $request->getModuleName() . '_' . $request->getControllerName() . '_' . $request->getActionName();
        $template = Mage::getDesign()->getPackageName(). '_' . Mage::getDesign()->getTheme('template');

        $requestUri = $request->getRequestUri();
        // Remove query string from url.
        $requestUri = preg_replace('/\?.*/', '', $requestUri);
        if ($isIgnoreQueryParams === false) {
            // Ignore all query params other than some reserved ones (see _getNonCacheableQueryParams).
            $relevantQueryString = array();
            foreach ($request->getParams() as $paramName => $paramValue) {
                if (in_array($paramName, $this->_getNonCacheableQueryParams()) === true) {
                    $relevantQueryString[$paramName] = $paramValue;
                }
            }
            $requestUri .= '?' . http_build_query($relevantQueryString);
        }
        $cacheKey = $cacheResourceIdentifier . '_' . $storeId . '_' . $pageBackend . '_' . $template . '_' . $requestUri;

        return $cacheKey;
    }

    /**
     * Returns query params that should not be removed from the cache key.
     *
     * @return array
     */
    protected function _getNonCacheableQueryParams()
    {
        return array(
            'limit', 'dir', 'order', 'p', 'q'
        );
    }
}