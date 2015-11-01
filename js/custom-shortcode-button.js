(function() {
    tinymce.create('tinymce.plugins.Absaccdion', {
        init : function(ed, url) {
        
            ed.addButton('wext_tmslider', {
                title : 'WEXT Testimonial Slider Shortcode',
                cmd : 'wext_tmslider',
                image : url + '/wext_tmslider.png'
            });
 
             
            ed.addCommand('wext_tmslider', function() {
               
                        shortcode = '[wext-tmslider]' ;
                        ed.execCommand('mceInsertContent', 0, shortcode);
                 
                    
            });
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wexttmslider', tinymce.plugins.Absaccdion );
})();