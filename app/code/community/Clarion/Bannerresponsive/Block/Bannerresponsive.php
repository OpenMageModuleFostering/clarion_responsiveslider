<?php
class Clarion_Bannerresponsive_Block_Bannerresponsive extends Mage_Core_Block_Template
{
   /*
     set varrible for modern style banner
   */
    protected $nextButton;
    protected $prevButton;
    protected $pagination;
    protected $animateStartingFrameIn;
    protected $autoPlay;
    protected $autoPlayDelay;
    protected $preloader;
    
    /*
     set varrible for modern style banner
     * bx silders settings 
    */
    protected $slidewidth;  //slidr width
    protected $speed;
    protected $mode;
    protected $randomStart;
    protected $responsive;
    protected $adaptiveHeight;
    
    /*
     * 
     * set varribe for cameara banner type slider's
     */
    protected $fx;  //slidr width
    protected $height;
    protected $loader;
    protected $piePosition;
    protected $paginationcameara;
    protected $time;
    protected $transPeriod;
    protected $barDirection;
    protected $barPosition;
    protected $playPause;
    protected $pauseOnClick;
    protected $thaumbNails;
    
    
    public function __construct()
    {
		

        
        $this->nextButton = Mage::getStoreConfig('bannerresponsive/modersslidersetting/nextButton');
        $this->prevButton = Mage::getStoreConfig('bannerresponsive/modersslidersetting/prevButton');
        $this->pagination = Mage::getStoreConfig('bannerresponsive/modersslidersetting/pagination');
        $this->animateStartingFrameIn = Mage::getStoreConfig('bannerresponsive/modersslidersetting/animateStartingFrameIn');
        $this->autoPlay = Mage::getStoreConfig('bannerresponsive/modersslidersetting/autoPlay');
        $this->autoPlayDelay = Mage::getStoreConfig('bannerresponsive/modersslidersetting/autoPlayDelay');
        $this->preloader = Mage::getStoreConfig('bannerresponsive/modersslidersetting/preloader');
        
    
        //general                
                            
        $this->slidewidth = Mage::getStoreConfig('bannerresponsive/commonbxslider/silderwidth');
        
        $this->speed = Mage::getStoreConfig('bannerresponsive/responsivegeneral/speed');     
        $this->mode = Mage::getStoreConfig('bannerresponsive/responsivegeneral/mode');     
        $this->randomStart = Mage::getStoreConfig('bannerresponsive/responsivegeneral/randomStart');     
        $this->responsive =Mage::getStoreConfig('bannerresponsive/responsivegeneral/responsive');     
        $this->adaptiveHeight = Mage::getStoreConfig('bannerresponsive/responsivegeneral/adaptiveheight');
        $this->minslides =Mage::getStoreConfig('bannerresponsive/responsivegeneral/minslides');     
        $this->maxSlides = Mage::getStoreConfig('bannerresponsive/responsivegeneral/maxSlides');
        $this->moveSlides = Mage::getStoreConfig('bannerresponsive/responsivegeneral/moveSlides');
        $this->slideWidth = Mage::getStoreConfig('bannerresponsive/responsivegeneral/slideWidth');
        //pager
        $this->pager = Mage::getStoreConfig('bannerresponsive/responsivegeneral/pager');
        $this->pagerType = Mage::getStoreConfig('bannerresponsive/responsivegeneral/pagerType');     
        $this->pagerShortSeparator = Mage::getStoreConfig('bannerresponsive/responsivegeneral/pagerShortSeparator');
        //controll
        $this->pager = Mage::getStoreConfig('bannerresponsive/responsivegeneral/pager');
        $this->pretext = Mage::getStoreConfig('bannerresponsive/responsivegeneral/prevText');
        $this->nexttext = Mage::getStoreConfig('bannerresponsive/responsivegeneral/nextText');
        $this->controls = Mage::getStoreConfig('bannerresponsive/responsivegeneral/controls');  
        $this->caption = Mage::getStoreConfig('bannerresponsive/responsivegeneral/caption');  
        
       //auto
        	

        $this->auto = Mage::getStoreConfig('bannerresponsive/responsivegeneral/auto');
        $this->pause = Mage::getStoreConfig('bannerresponsive/responsivegeneral/pause');
        $this->autoStart = Mage::getStoreConfig('bannerresponsive/responsivegeneral/autoStart');
        $this->autoDirection = Mage::getStoreConfig('bannerresponsive/responsivegeneral/autoDirection');
        $this->hideControlOnEnd = Mage::getStoreConfig('bannerresponsive/responsivegeneral/hidecontrolend'); 
      
        
       //camera type attributes
        $this->fx = Mage::getStoreConfig('bannerresponsive/cameraslider/fx');
        $this->height = Mage::getStoreConfig('bannerresponsive/cameraslider/hights');
        $this->loader = Mage::getStoreConfig('bannerresponsive/cameraslider/loader');
        $this->piePosition = Mage::getStoreConfig('bannerresponsive/cameraslider/piePosition');
        $this->paginationcameara = Mage::getStoreConfig('bannerresponsive/cameraslider/pagination');
        $this->time = Mage::getStoreConfig('bannerresponsive/cameraslider/time');
        $this->transPeriod = Mage::getStoreConfig('bannerresponsive/cameraslider/transPeriod');
        $this->barDirection = Mage::getStoreConfig('bannerresponsive/cameraslider/bardirection');
        $this->barPosition = Mage::getStoreConfig('bannerresponsive/cameraslider/barPosition');
        $this->playPause = Mage::getStoreConfig('bannerresponsive/cameraslider/playPause');
        $this->pauseOnClick = Mage::getStoreConfig('bannerresponsive/cameraslider/pauseOnClick');
        $this->thaumbNails = Mage::getStoreConfig('bannerresponsive/cameraslider/thumbnails');
    }
    
    public function _prepareLayout()
    {
		return parent::_prepareLayout();
                
    }
    
    
     public function getBannerresponsive()     
     { 
        if (!$this->hasData('bannerresponsive')) {
            $this->setData('bannerresponsive', Mage::registry('bannerresponsive'));
        }
        return $this->getData('bannerresponsive');
        
    }
    
   public function getBannercollection($getbanner)
   {

    $collection = Mage::getModel('bannerresponsive/bannerresponsive')->getCollection()
                       ->addFieldToFilter("nubersliderbt",$getbanner);
    return     $collection;
    }

}