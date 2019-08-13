<?php
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