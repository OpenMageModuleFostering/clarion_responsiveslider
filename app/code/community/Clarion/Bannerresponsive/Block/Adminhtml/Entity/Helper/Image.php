<?php
class Clarion_Bannerresponsive_Block_Adminhtml_Entity_Helper_Image extends Varien_Data_Form_Element_Image
{
  public function getUrl(){
        $url = false;
        if ($this->getValue()) {
          echo   $url =  Mage::getBaseUrl('media') . 'bannerimages/'.$this->getValue();
        die;
          
        }
        return $url;
  }
}