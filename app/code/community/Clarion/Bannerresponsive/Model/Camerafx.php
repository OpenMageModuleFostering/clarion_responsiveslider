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
 * cameragix.php
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */
class Clarion_Bannerresponsive_Model_Camerafx
{

    public function toOptionArray(){
       return array(
                    array('value' => 'random', 'label'=>Mage::helper('bannerresponsive')->__('random')),
                    array('value' => 'simpleFade', 'label'=>Mage::helper('bannerresponsive')->__('simpleFade')),
                    array('value' => 'curtainTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainTopLeft')),
                    array('value' => 'curtainTopRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainTopRight')),
                    array('value' => 'curtainBottomLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainBottomLeft')),
                    array('value' => 'curtainBottomRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainBottomRight')),
                    array('value' => 'curtainSliceLeft', 'label'=>Mage::helper('bannerresponsive')->__('curtainSliceLeft')),
                    array('value' => 'curtainSliceRight', 'label'=>Mage::helper('bannerresponsive')->__('curtainSliceRight')),
                    array('value' => 'blindCurtainTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainTopLeft')),
                    array('value' => 'blindCurtainTopRight', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainTopRight')),
                    array('value' => 'blindCurtainBottomLeft', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainBottomLeft')),
                    array('value' => 'blindCurtainBottomRight', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainBottomRight')),
                    array('value' => 'blindCurtainSliceBottom', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainSliceBottom')),
                    array('value' => 'blindCurtainSliceTop', 'label'=>Mage::helper('bannerresponsive')->__('blindCurtainSliceTop')),
                    array('value' => 'stampede', 'label'=>Mage::helper('bannerresponsive')->__('stampede')),
                    array('value' => 'mosaic', 'label'=>Mage::helper('bannerresponsive')->__('mosaic')),
                    array('value' => 'mosaicReverse', 'label'=>Mage::helper('bannerresponsive')->__('mosaicReverse')),
                    array('value' => 'mosaicRandom', 'label'=>Mage::helper('bannerresponsive')->__('mosaicRandom')),
                    array('value' => 'mosaicSpiral', 'label'=>Mage::helper('bannerresponsive')->__('mosaicSpiral')),
                    array('value' => 'mosaicSpiralReverse', 'label'=>Mage::helper('bannerresponsive')->__('mosaicSpiralReverse')),
                    array('value' => 'bottomRightTopLeft', 'label'=>Mage::helper('bannerresponsive')->__('bottomRightTopLeft')),  
                    array('value' => 'bottomLeftTopRight', 'label'=>Mage::helper('bannerresponsive')->__('bottomLeftTopRight'))
        );
}
}




