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
 * Admin banner edit block
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'bannerresponsive';
        $this->_controller = 'adminhtml_bannerresponsive';
        
        $this->_updateButton('save', 'label', Mage::helper('bannerresponsive')->__('Save Slide'));
        $this->_updateButton('delete', 'label', Mage::helper('bannerresponsive')->__('Delete Slide'));
		
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
            return Mage::helper('bannerresponsive')->__('Add Slide');
        }
    }
}