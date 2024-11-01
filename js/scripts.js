(function($) {
    'use strict';
    $(function() {
        //Color Picker Admin
        $('#tcbd_custom_scrollbar_bgcolor,#tcbd_custom_scrollbar_border_color').wpColorPicker();

        //Slider for Admin
        var $document = $(document),
            $inputRange = $('input[type="range"]');

        function valueOutput(element) {
            var value = element.value,
                output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }
        for (var i = $inputRange.length - 1; i >= 0; i--) {
            valueOutput($inputRange[i]);
        };
        $document.on('input', 'input[type="range"]', function(e) {
            valueOutput(e.target);
        });
    });
})(jQuery);
