<?php

class Clarion_Bannerresponsive_Model_Cameraloader
{
        public function toOptionArray(){
       return array(
            array('value' => 'pie', 'label'=>Mage::helper('bannerresponsive')->__('pie')),
            array('value' => 'bar', 'label'=>Mage::helper('bannerresponsive')->__('bar')),
            array('value' => 'none', 'label'=>Mage::helper('bannerresponsive')->__('none'))
        );
}
}