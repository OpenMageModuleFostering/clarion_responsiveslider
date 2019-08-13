<?php

class Clarion_Bannerresponsive_Model_Mysql4_Bannerresponsive_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bannerresponsive/bannerresponsive');
    }
}