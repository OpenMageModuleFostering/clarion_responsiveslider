<?php

class Clarion_Bannerresponsive_Model_Camerabarposistion
{
     public function toOptionArray(){
       return array(
            array('value' => 'bottom', 'label'=>Mage::helper('bannerresponsive')->__('bottom')),
            array('value' => 'left', 'label'=>Mage::helper('bannerresponsive')->__('left')),
            array('value' => 'top', 'label'=>Mage::helper('bannerresponsive')->__('top')),
            array('value' => 'right', 'label'=>Mage::helper('bannerresponsive')->__('right'))
        );
}
}