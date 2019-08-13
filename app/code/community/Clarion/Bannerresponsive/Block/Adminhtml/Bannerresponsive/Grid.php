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
 * Admin banner resposive grid
 *
 * @category   Community
 * @package    Clarion_Bannerresponsive
 * @author     magento@clariontechnologies.co.in
 */

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('bannerresponsiveGrid');
      $this->setDefaultSort('bannerresponsive_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('bannerresponsive/bannerresponsive')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('bannerresponsive_id', array(
          'header'    => Mage::helper('bannerresponsive')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'bannerresponsive_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('bannerresponsive')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));
      
       $this->addColumn('orderid', array(
          'header'    => Mage::helper('bannerresponsive')->__('Order'),
          'align'     =>'left',
          'index'     => 'orderid',
           'width'     => '10px',
      ));
       

       
      $this->addColumn('nubersliderbt', array(
          'header'    => Mage::helper('bannerresponsive')->__('Slider Type'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'nubersliderbt',
          'type'      => 'options',
          'options'   => array(
              'bxslider' => 'Bxslider',
              'modernslide' => 'Modernslide',
              'cameraslider' =>'Camera Banner'
          ),
      ));
      
     $this->addColumn('filename', array(
                'header'    => Mage::helper('bannerresponsive')->__('Image'),
                'align'     => 'left',
                'width'     => '100px',
                'index'     => 'filename',
                'type'      => 'image',
                'align'     => 'center',
                'escape'    => true,
                'sortable'  => false,
                'filter'    => false,
                'renderer'  => new Clarion_Bannerresponsive_Block_Adminhtml_Grid_Renderer_Image,
            ));


      $this->addColumn('status', array(
          'header'    => Mage::helper('bannerresponsive')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('bannerresponsive')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('bannerresponsive')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('bannerresponsive')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('bannerresponsive')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('bannerresponsive_id');
        $this->getMassactionBlock()->setFormFieldName('bannerresponsive');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('bannerresponsive')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('bannerresponsive')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('bannerresponsive/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('bannerresponsive')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('bannerresponsive')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}