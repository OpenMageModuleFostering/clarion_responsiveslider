<?php

class Clarion_Bannerresponsive_Model_Camerabardirection
{
     public function toOptionArray(){
       return array(
            array('value' => 'leftToRight', 'label'=>Mage::helper('bannerresponsive')->__('leftToRight')),
            array('value' => 'left', 'label'=>Mage::helper('bannerresponsive')->__('left')),
            array('value' => 'top', 'label'=>Mage::helper('bannerresponsive')->__('top')),
            array('value' => 'cameraslider', 'label'=>Mage::helper('bannerresponsive')->__('bottomToTop'))
        );
}
}