<?php

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'bannerresponsive';
        $this->_controller = 'adminhtml_bannerresponsive';
        
        $this->_updateButton('save', 'label', Mage::helper('bannerresponsive')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('bannerresponsive')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('bannerresponsive_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'bannerresponsive_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'bannerresponsive_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('bannerresponsive_data') && Mage::registry('bannerresponsive_data')->getId() ) {
            return Mage::helper('bannerresponsive')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('bannerresponsive_data')->getTitle()));
        } else {
            return Mage::helper('bannerresponsive')->__('Add Item');
        }
    }
}