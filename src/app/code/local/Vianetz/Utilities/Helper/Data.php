<?php
/**
 * Helper for Cache Management
 *
 * @category Vianetz
 * @package  Vianetz_Utilities
 * @author   Christoph Massmann <c.massmann@vianetz.com>
 */
class Vianetz_Utilities_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Return payment method for given order.
     *
     * @param Mage_Sales_Model_Order $order
     *
     * @return string
     */
    public function getPaymentMethodForOrder($order)
    {
        $paymentMethod = $order->getPayment()->getMethodInstance()->getCode();

        return $paymentMethod;
    }

    /**
     * Identify referer url via all accepted methods (HTTP_REFERER, regular or base64-encoded request param).
     *
     * @param Mage_Core_Controller_Request_Http $request
     *
     * @return string
     */
    public function getRefererUrl(Mage_Core_Controller_Request_Http $request)
    {
        $refererUrl = $request->getServer('HTTP_REFERER');
        if ($url = $request->getParam(Mage_Core_Controller_Varien_Action::PARAM_NAME_REFERER_URL)) {
            $refererUrl = $url;
        }
        if ($url = $request->getParam(Mage_Core_Controller_Varien_Action::PARAM_NAME_BASE64_URL)) {
            $refererUrl = Mage::helper('core')->urlDecode($url);
        }
        if ($url = $request->getParam(Mage_Core_Controller_Varien_Action::PARAM_NAME_URL_ENCODED)) {
            $refererUrl = Mage::helper('core')->urlDecode($url);
        }

        return $refererUrl;
    }
}