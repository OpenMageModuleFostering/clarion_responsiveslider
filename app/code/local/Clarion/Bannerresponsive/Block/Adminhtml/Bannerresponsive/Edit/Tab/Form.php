<?php

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('bannerresponsive_form', array('legend'=>Mage::helper('bannerresponsive')->__('Item information')));
    
    


      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('bannerresponsive')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      
           
      $fieldset->addField('orderid', 'text', array(
          'label'     => Mage::helper('bannerresponsive')->__('Order'),
          'class'     => 'required-entry',
          'required'  => false,
          'name'      => 'orderid',
      ));


      $fieldset->addField('filename', 'image', array(
          'label'     => Mage::helper('bannerresponsive')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
     $fieldset->addType('image', Mage::getConfig()->getBlockClassName('bannerresponsive/adminhtml_entity_helper_image'));
      // $fieldset->addField('thumbname', 'image', array(
      //    'label'     => Mage::helper('bannerresponsive')->__('ThumbNail Images'),
        //  'required'  => false,
         // 'name'      => 'thumbname',
	  //));
		

       
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('bannerresponsive')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('bannerresponsive')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('bannerresponsive')->__('Disabled'),
              ),
          ),
      ));
     
      
   $fieldset->addField('nubersliderbt', 'select', array(
  'label'     => Mage::helper('bannerresponsive')->__('Bannertype'),
     'name'      => 'nubersliderbt',
   'values'    => array(
                                array(
                                'value'     => 'bxslider',
                                'label'     => Mage::helper('bannerresponsive')->__('Bxslider'),
                                ),

                                array(
                                'value'     => 'modernslide',
                                'label'     => Mage::helper('bannerresponsive')->__('Modernslide'),
                                ),

                                array(
                                'value'     => 'cameraslider',
                                'label'     => Mage::helper('bannerresponsive')->__('Camera Banner'),
                                ),

                                ),
       
      ));
             
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('bannerresponsive')->__('Content'),
          'title'     => Mage::helper('bannerresponsive')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getBannerresponsiveData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getBannerresponsiveData());
          Mage::getSingleton('adminhtml/session')->setBannerresponsiveData(null);
      } elseif ( Mage::registry('bannerresponsive_data') ) {
          $form->setValues(Mage::registry('bannerresponsive_data')->getData());
      }
      return parent::_prepareForm();
  }
}