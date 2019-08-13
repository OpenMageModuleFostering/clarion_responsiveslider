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
 * camerabardirection.php
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */
class Clarion_Bannerresponsive_Model_Camerabardirection
{
     public function toOptionArray(){
       return array(
            array('value' => 'leftToRight', 'label'=>Mage::helper('bannerresponsive')->__('leftToRight')),
            array('value' => 'left', 'label'=>Mage::helper('bannerresponsive')->__('left')),
            array('value' => 'top', 'label'=>Mage::helper('bannerresponsive')->__('top')),
            array('value' => 'cameraslider', 'label'=>Mage::helper('bannerresponsive')->__('bottomToTop'))
        );
}
}