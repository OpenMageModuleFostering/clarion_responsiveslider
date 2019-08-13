<?php

class Clarion_Bannerresponsive_Model_Bannerslidingoptions
{
    protected $_options;
    const IMAGETHUMB_THUMBNAIL = 'bxslider';
    const IMAGETHUMB_PAGINATION  = 'modernslider';
     const IMAGETHUMB_ELACSTC  = 'elastic';
    
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::IMAGETHUMB_THUMBNAIL,
			   'label'=>Mage::helper('bannerresponsive')->__('Bxslider')
			);
			$this->_options[] = array(
			   'value'=>self::IMAGETHUMB_PAGINATION,
			   'label'=>Mage::helper('bannerresponsive')->__('Modernslider')
			);
                        $this->_options[] = array(
			   'value'=>self::IMAGETHUMB_ELACSTC,
			   'label'=>Mage::helper('bannerresponsive')->__('Elastic')
			);
			
			
		}
		return $this->_options;
	}
}