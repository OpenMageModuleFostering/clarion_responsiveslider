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
 * bannereffectoption.php
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */
class Clarion_Bannerresponsive_Model_Bannereffectoption
{
      public function toOptionArray(){
    return array(
            array('value' => 'Image slideshow with captions', 'label'=>Mage::helper('bannerresponsive')->__('Image slideshow with captions')),
            array('value' => 'Auto show with start / stop controls', 'label'=>Mage::helper('bannerresponsive')->__('Auto show with start / stop controls')),
            array('value' => 'Manual show without infinite loop', 'label'=>Mage::helper('bannerresponsive')->__('Manual show without infinite loop')),
            array('value' => 'Slideshow using adaptiveHeight', 'label'=>Mage::helper('bannerresponsive')->__('Slideshow using adaptiveHeight')),
            array('value' => 'Vertical slideshow', 'label'=>Mage::helper('bannerresponsive')->__('Vertical slideshow')),
            array('value' => 'Custom next / prev control selectors', 'label'=>Mage::helper('bannerresponsive')->__('Custom next / prev control selectors

')),
            array('value' => 'Thumbnail pager', 'label'=>Mage::helper('bannerresponsive')->__('Thumbnail pager')),
   
    );
}
}
