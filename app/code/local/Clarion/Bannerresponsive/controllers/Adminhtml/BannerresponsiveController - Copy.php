<?php

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
		
			if($data['filename']['delete']==1){
				$data['filename']='';
			}
			elseif(is_array($data['filename'])){
				$data['filename']=$data['filename']['value'];
			}
			
			
			$file = new Varien_Io_File();			
			//$baseDir = Mage::getBaseDir();
                        
			$mediaDir = Mage::getBaseDir('media');
			$imageDir = $mediaDir.DS.'bannerimages'.DS;
		
                        $thumbimageyDir = $mediaDir.DS.'bannerimages'.DS.'thumbs';
			
			if(!is_dir($imageDir)){
				$imageDirResult = $file->mkdir($imageDir, 0777);         
			}			
			if(!is_dir($thumbimageyDir)){
				$thumbimageDirResult = $file->mkdir($thumbimageyDir, 0777);     
			}
			
			//$thumbimageDirResult = $file->mkdir($thumbimageyDir);
			
			if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('filename');
					
					// Any extention would work
	           		        $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
							
					// We set media as the upload dir
					//$path = Mage::getBaseDir('media') . DS ;
                                        
					$path = $imageDir;
                                      
					$result = $uploader->save($path, $_FILES['filename']['name'] );
                                        
                          		###############################################################################
					// actual path of image
					$imageUrl = Mage::getBaseDir('media').DS."bannerimages".DS.$_FILES['filename']['name'];
					 
					// path of the resized image to be saved
					// here, the resized image is saved in media/resized folder
					$imageResized = Mage::getBaseDir('media').DS."bannerimages".DS."thumbs".DS.$_FILES['filename']['name'];					
					 
					// resize image only if the image file exists and the resized image file doesn't exist
					// the image is resized proportionally with the width/height 135px
					if (!file_exists($imageResized)&&file_exists($imageUrl)) :
						$imageObj = new Varien_Image($imageUrl);
						$imageObj->constrainOnly(TRUE);
						$imageObj->keepAspectRatio(FALSE);
						$imageObj->keepFrame(FALSE);
						$imageObj->quality(100);
						$imageObj->resize(100,100);
						$imageObj->save($imageResized);
					endif;
					#################################################################################
					
					
					
					
					$data['filename'] = $result['file'];
				} catch (Exception $e) {
					$data['filename'] = $_FILES['filename']['name'];
		        }
			}	  			
	  		
                        
                        if(isset($_FILES['thumbname']['name']) && $_FILES['thumbname']['name'] != '') {
				try {	
					/* Starting upload */	
					$uploader = new Varien_File_Uploader('thumbname');
					
					// Any extention would work
	           		$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					
					// Set the file upload mode 
					// false -> get the file directly in the specified folder
					// true -> get the file in the product like folders 
					//	(file.jpg will go in something like /media/f/i/file.jpg)
					$uploader->setFilesDispersion(false);
							
					// We set media as the upload dir
					$path = Mage::getBaseDir('media').DS.'bannerimages'.DS;
					$uploader->save($path, $_FILES['thumbname']['name'] );
					
				} catch (Exception $e) {
		      
		        }
	        
		        //this way the name is saved in DB
	  			$data['thumbname'] = $_FILES['thumbname']['name'];
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
				
				//$model->setStores(implode(',',$data['stores']));
				/*if (isset($data['category_ids'])){
					$model->setCategories(implode(',',array_unique(explode(',',$data['category_ids']))));
				}*/
				
					
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bannerresponsive')->__('Item was successfully saved'));
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
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerresponsive')->__('Unable to find item to save'));
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