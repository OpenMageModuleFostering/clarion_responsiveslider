<?php

class Clarion_Bannerresponsive_Helper_Data extends Mage_Core_Helper_Abstract
{
    public  $val;
    public function Isbannerenable()
   {
 
      return  Mage::getStoreConfig('bannerresponsive/responsive/blockpostion');

   }

   public function Bannertype()
   {
      return  Mage::getStoreConfig('bannerresponsive/bannertypecollection/bannertype');

   }
   
   
   public function getBannerstyle()
   {
      return  Mage::getStoreConfig('bannerresponsive/commonbxslider/bannereffectoptions');

   }
   
}