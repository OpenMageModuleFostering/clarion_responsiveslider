<?php

class Clarion_Bannerresponsive_Model_Camerapieposition
{
    public function toOptionArray(){
       return array(
            array('value' => 'rightTop', 'label'=>Mage::helper('bannerresponsive')->__('rightTop')),
            array('value' => 'leftTop', 'label'=>Mage::helper('bannerresponsive')->__('leftTop')),
            array('value' => 'leftBottom', 'label'=>Mage::helper('bannerresponsive')->__('leftBottom')),
            array('value' => 'rightBottom', 'label'=>Mage::helper('bannerresponsive')->__('rightBottom'))
        );
}
}