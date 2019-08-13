    jQuery(document).ready( function() {
    
        // When site loaded, load the Popupbox First
        //loadPopupBox();
    
        jQuery('#popupBoxClose').click( function() {            
            unloadPopupBox();
        });
        
        //jQuery('.ajax').click( function() {            
         //  loadPopupBox();
        //});
        
        jQuery('#container').click( function() {
            unloadPopupBox();
        });

        function unloadPopupBox() {    // TO Unload the Popupbox
            jQuery('#popup_box').fadeOut("slow");
            jQuery("#container").css({ // this is just for style        
                "opacity": "1"  
            }); 
        }    
        
        function loadPopupBox() {    // To Load the Popupbox
            jQuery('#popup_box').fadeIn("slow");
            jQuery("#container").css({ // this is just for style
                "opacity": "0.3"  
            });         
        }        
    });