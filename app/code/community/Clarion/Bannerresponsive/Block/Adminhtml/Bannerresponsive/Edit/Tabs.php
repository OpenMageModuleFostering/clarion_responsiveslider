<?php

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('bannerresponsive_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('bannerresponsive')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('bannerresponsive')->__('Item Information'),
          'title'     => Mage::helper('bannerresponsive')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('bannerresponsive/adminhtml_bannerresponsive_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}