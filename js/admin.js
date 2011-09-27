jQuery(document).ready(function($) {
   
   logged_in_select_change();
   $('#logged_in_action').change(logged_in_select_change);
   
});

var logged_in_select_change = function() {
    
    $ = jQuery;
    
    var action = $('#logged_in_action').val();
        
    $('#logged_in_message').parents('tr').toggle(action == 'message');
    $('#logged_in_fallback').parents('tr').toggle(action == 'fallback');
};
