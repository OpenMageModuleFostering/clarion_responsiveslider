<?php

class Clarion_Bannerresponsive_Block_Adminhtml_Bannerresponsive_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
     
    public function render(Varion_Object $row)
    {
        
        $html .= '<img',
       $html .='id='''.$this->getColumn()->getId().''' ';                
    }
}