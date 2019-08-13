<?php

class Clarion_Bannerresponsive_Model_Camerafx
{

    public function toOptionArray(){
       return array(
                    array('value' => 'random', 'label'=>Mage::helper('bannerresponsive')->__('random')),
                    array('value' => 'simpleFade', 'label'=>Mage::helper('bannerresponsive')->__('simpleFade')),
                    array('value' => 'curtainTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainTopLeft')),
                    array('value' => 'curtainTopRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainTopRight')),
                    array('value' => 'curtainBottomLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainBottomLeft')),
                    array('value' => 'curtainBottomRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainBottomRight')),
                    array('value' => 'curtainSliceLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainSliceLeft')),
                    array('value' => 'curtainSliceRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainSliceRight')),
                    array('value' => 'blindCurtainTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainTopLeft')),
                    array('value' => 'blindCurtainTopRight', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainTopRight')),
                    array('value' => 'blindCurtainBottomLeft', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainBottomLeft')),
                    array('value' => 'blindCurtainBottomRight', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainBottomRight')),
                    array('value' => 'blindCurtainSliceBottom', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainSliceBottom')),
                    array('value' => 'blindCurtainSliceTop', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainSliceTop')),
                    array('value' => 'stampede', 'label'=>Mage::helper('bannerresponsive')->__('stampede')),
                    array('value' => 'mosaic', 'label'=>Mage::helper('bannerresponsive')->__('mosaic')),
                    array('value' => 'mosaicReverse', 'label'=>Mage::helper('bannerresponsive')->__('mosaicReverse')),
                    array('value' => 'mosaicRandom', 'label'=>Mage::helper('bannerresponsive')->__('mosaicRandom')),
                    array('value' => 'mosaicSpiral', 'label'=>Mage::helper('bannerresponsive')->__('mosaicSpiral')),
                    array('value' => 'mosaicSpiralReverse', 'label'=>Mage::helper('bannerresponsive')->__('mosaicSpiralReverse')),
                    array('value' => 'bottomRightTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('bottomRightTopLeft')),  
                    array('value' => 'bottomLeftTopRight', 'label'=>Mage::helper('bannerresponsive')->__('bottomLeftTopRight'))
        );
}
}




