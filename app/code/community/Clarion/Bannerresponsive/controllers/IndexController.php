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
 * frontend index controller file
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */
class Clarion_Bannerresponsive_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/bannerresponsive?id=15 
    	 *  or
    	 * http://site.com/bannerresponsive/id/15 	
    	 */
    	/* 
		$bannerresponsive_id = $this->getRequest()->getParam('id');

  		if($bannerresponsive_id != null && $bannerresponsive_id != '')	{
			$bannerresponsive = Mage::getModel('bannerresponsive/bannerresponsive')->load($bannerresponsive_id)->getData();
		} else {
			$bannerresponsive = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($bannerresponsive == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$bannerresponsiveTable = $resource->getTableName('bannerresponsive');
			
			$select = $read->select()
			   ->from($bannerresponsiveTable,array('bannerresponsive_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$bannerresponsive = $read->fetchRow($select);
		}
		Mage::register('bannerresponsive', $bannerresponsive);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}