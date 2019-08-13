<?php

class Clarion_Bannerresponsive_Model_Bannereffectoption
{
      public function toOptionArray(){
    return array(
            array('value' => 'Image slideshow with captions', 'label'=>Mage::helper('bannerresponsive')->__('Image slideshow with captions')),
            array('value' => 'Auto show with start / stop controls', 'label'=>Mage::helper('bannerresponsive')->__('Auto show with start / stop controls')),
            array('value' => 'Manual show without infinite loop', 'label'=>Mage::helper('bannerresponsive')->__('Manual show without infinite loop')),
            array('value' => 'Slideshow using adaptiveHeight', 'label'=>Mage::helper('bannerresponsive')->__('Slideshow using adaptiveHeight')),
            array('value' => 'Vertical slideshow', 'label'=>Mage::helper('bannerresponsive')->__('Vertical slideshow')),
            array('value' => 'Custom next / prev control selectors', 'label'=>Mage::helper('bannerresponsive')->__('Custom next / prev control selectors

')),
            array('value' => 'Thumbnail pager', 'label'=>Mage::helper('bannerresponsive')->__('Thumbnail pager')),
   
    );
}
}
