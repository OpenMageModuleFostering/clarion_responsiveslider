<?php

class Clarion_Bannerresponsive_Model_Truefalseall
{

    public function toOptionArray(){
       return array(
                    array('value' => 'true', 'label'=>Mage::helper('bannerresponsive')->__('true')),
                    array('value' => 'false', 'label'=>Mage::helper('bannerresponsive')->__('false')),
        );
}
}




