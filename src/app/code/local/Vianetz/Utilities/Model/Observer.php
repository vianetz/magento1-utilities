<?php
class Vianetz_Utilities_Model_Observer
{
    public function configureWysiwyg(Varien_Event_Observer $observer)
    {
        $event = $observer->getEvent();
        $config = $event->getConfig();
        
        $config->addData( array(
                'force_p_newlines' => false,
                'forced_root_block' => false
                ));
        return $this;
    }
}