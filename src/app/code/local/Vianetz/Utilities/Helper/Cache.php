<?php
/**
 * Helper for Cache Management
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