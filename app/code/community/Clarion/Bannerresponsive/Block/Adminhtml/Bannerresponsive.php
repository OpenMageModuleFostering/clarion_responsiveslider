<?php
class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_bannerresponsive';
    $this->_blockGroup = 'bannerresponsive';
    $this->_headerText = Mage::helper('bannerresponsive')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('bannerresponsive')->__('Add Item');
    parent::__construct();
  }
}