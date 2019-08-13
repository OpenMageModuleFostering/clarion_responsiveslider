<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Community
 * @package     Clarion_Bannerresponsive
 * @copyright   Copyright magento@clariontechnologies.co.in
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */


/**
 * Admin banner tab form  block
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */

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
          'required'  => true,
          'name'      => 'orderid',
      ));
      
            
      $fieldset->addField('url', 'text', array(
          'label'     => Mage::helper('bannerresponsive')->__('Url'),
          'required'  => false,
          'name'      => 'url',
      ));
      
      
      $currentbannerdata = Mage::registry('bannerresponsive_data')->getData();
      if(isset($currentbannerdata['filename'])) {
      $banner_image = $currentbannerdata['filename'];
      $imgvalue = '<img src="'.Mage::getBaseUrl("media").'bannerimages/thumbs/'.$banner_image.'"/>';
      if($banner_image){
          $fieldset->addField('filename', 'file', array(
              'label'     => Mage::helper('bannerresponsive')->__('File'),
              'required'  => false,
              'name'      => 'filename',
              'note'      => $imgvalue,
              ));
      }
     } 
     else {
          $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('bannerresponsive')->__('File'),
          'required'  => false,
          'name'      => 'filename',
          ));
          }

      
       
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