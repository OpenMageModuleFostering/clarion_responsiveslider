<?php

class Clarion_Bannerresponsive_Model_Typebanners
{
    
    
    public function toOptionArray(){
       return array(
            array('value' => 'bxslider', 'label'=>Mage::helper('bannerresponsive')->__('Bxslider')),
            array('value' => 'modernslide', 'label'=>Mage::helper('bannerresponsive')->__('Modern Slide')),
            array('value' => 'cameraslider', 'label'=>Mage::helper('bannerresponsive')->__('Camera Slider'))
        );
}
}