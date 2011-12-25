(function($) {    
    
    var methods = {        
        init: function(behavior) {                       
            var $this = $(this), data = $this.data('dmQuickSandBehavior');
            if (data && behavior.dm_behavior_id != data.dm_behavior_id) { // There is attached the same, so we must report it
                alert('You can not attach MediaGallery to same content'); // TODO TheCelavi - adminsitration mechanizm for this? Reporting error
            };
            $this.data('dmMediaGalleryBehavior', behavior);
            $this.addClass('dmMediaGalleryBehavior').addClass(behavior.theme).addClass('clearfix');
            
        },
        
        start: function(behavior) {  
            var $this = $(this);
            $this.children().first().addClass('first');
            $this.children().last().addClass('last');
            if (behavior.item_width) $this.children().css('width', behavior.item_width);
            if (behavior.item_height) $this.children().css('height', behavior.item_height);
            if (behavior.container_width) $this.css('width', behavior.container_width);
            if (behavior.container_height) $this.css('height', behavior.container_height);
            if (behavior.item_overflow) $this.css('overflow', behavior.item_overflow);
            if (behavior.container_overflow) $this.css('overflow', behavior.container_overflow);
        },
        stop: function(behavior) {
            var $this = $(this);
            $this.children().first().removeClass('first');
            $this.children().last().removeClass('last');
            if (behavior.item_width) $this.children().css('width', '');
            if (behavior.item_height) $this.children().css('height', '');
            if (behavior.container_width) $this.css('width', '');
            if (behavior.container_height) $this.css('height', '');
            if (behavior.item_overflow) $this.css('overflow', '');
            if (behavior.container_overflow) $this.css('overflow', '');
        },
        destroy: function(behavior) {            
            var $this = $(this);
            $this.data('dmMediaGalleryBehavior', null);
            $this.removeClass('dmMediaGalleryBehavior').removeClass(behavior.theme).removeClass('clearfix');
        }
    }
    
    $.fn.dmMediaGalleryBehavior = function(method, behavior){
        
        return this.each(function() {
            if ( methods[method] ) {
                return methods[ method ].apply( this, [behavior]);
            } else if ( typeof method === 'object' || ! method ) {
                return methods.init.apply( this, [method] );
            } else {
                $.error( 'Method ' +  method + ' does not exist on jQuery.dmMediaGalleryBehavior' );
            }  
        });
    };

    $.extend($.dm.behaviors, {        
        dmMediaGalleryBehavior: {
            init: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmMediaGalleryBehavior('init', behavior);
            },
            start: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmMediaGalleryBehavior('start', behavior);
            },
            stop: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmMediaGalleryBehavior('stop', behavior);
            },
            destroy: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmMediaGalleryBehavior('destroy', behavior);
            }
        }
    });
    
})(jQuery);