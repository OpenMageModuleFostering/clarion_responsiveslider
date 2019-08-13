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
 * Adminside  banner resposive controller
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */
class Clarion_Bannerresponsive_Adminhtml_BannerresponsiveController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('bannerresponsive/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}   
 
	public function indexAction() {
		$this->_initAction()
			->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('bannerresponsive/bannerresponsive')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('bannerresponsive_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('bannerresponsive/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('bannerresponsive/adminhtml_bannerresponsive_edit'))
				->_addLeft($this->getLayout()->createBlock('bannerresponsive/adminhtml_bannerresponsive_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerresponsive')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}
 
		
        public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			
			
			if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
	  			 //this way the name is saved in DB
	  			$data['filename'] = $_FILES['filename']['name'];
				
				//Save Image Tag in DB for GRID View
				$imgName = $_FILES['filename']['name'];
				$imgPath = Mage::getBaseUrl('media')."bannerimages/thumbs/".$imgName;
				$data['filethumbgrid'] = '<img src="'.$imgPath.'" border="0" width="75" height="75" />';
			}
			
			$model = Mage::getModel('bannerresponsive/bannerresponsive');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}	
				
				$model->save();
				
				
				if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
					try {	
						
						$path = Mage::getBaseDir('media')."/bannerimages".DS ;
						/* Starting upload */							
						$uploader = new Varien_File_Uploader('filename');
						// Any extention would work
						$uploader->setAllowedExtensions(array('jpg','JPG','jpeg','gif','GIF','png','PNG'));
						$uploader->setAllowRenameFiles(false);
						$uploader->setFilesDispersion(false);
						// We set media as the upload dir
						$uploader->save($path, $_FILES['filename']['name'] );
						
						
						//Create Thumbnail and upload
						$imgName = $_FILES['filename']['name'];
						$imgPathFull = $path.$imgName;
						$resizeFolder = "thumbs";
						$imageResizedPath = $path.$resizeFolder.DS.$imgName;
						$imageObj = new Varien_Image($imgPathFull);
						$imageObj->constrainOnly(TRUE);
						$imageObj->keepAspectRatio(TRUE);
						$imageObj->resize(150,150);
						$imageObj->save($imageResizedPath);
						
						//Create View Size and upload
						$imgName = $_FILES['filename']['name'];
						$imgPathFull = $path.$imgName;
						$resizeFolder = "medium";
						$imageResizedPath = $path.$resizeFolder.DS.$imgName;
						$imageObj = new Varien_Image($imgPathFull);
						$imageObj->constrainOnly(TRUE);
						$imageObj->keepAspectRatio(TRUE);
						$imageObj->resize(400,400);
						$imageObj->save($imageResizedPath);
						
						
					} catch (Exception $e) {}
				}
				
				//Mage::helper('bannerresponsive')->generateXML();
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bannerresponsive')->__('Banner was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerresponsive')->__('Unable to find Banner to save'));
        $this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('bannerresponsive/bannerresponsive');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction() {
        $bannerresponsiveIds = $this->getRequest()->getParam('bannerresponsive');
        if(!is_array($bannerresponsiveIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
        } else {
            try {
                foreach ($bannerresponsiveIds as $bannerresponsiveId) {
                    $bannerresponsive = Mage::getModel('bannerresponsive/bannerresponsive')->load($bannerresponsiveId);
                    $bannerresponsive->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($bannerresponsiveIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
	
    public function massStatusAction()
    {
        $bannerresponsiveIds = $this->getRequest()->getParam('bannerresponsive');
        if(!is_array($bannerresponsiveIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($bannerresponsiveIds as $bannerresponsiveId) {
                    $bannerresponsive = Mage::getSingleton('bannerresponsive/bannerresponsive')
                        ->load($bannerresponsiveId)
                        ->setStatus($this->getRequest()->getParam('status'))
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($bannerresponsiveIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
  
    public function exportCsvAction()
    {
        $fileName   = 'bannerresponsive.csv';
        $content    = $this->getLayout()->createBlock('bannerresponsive/adminhtml_bannerresponsive_grid')
            ->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    public function exportXmlAction()
    {
        $fileName   = 'bannerresponsive.xml';
        $content    = $this->getLayout()->createBlock('bannerresponsive/adminhtml_bannerresponsive_grid')
            ->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }

    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        $response->sendResponse();
        die;
    }
}