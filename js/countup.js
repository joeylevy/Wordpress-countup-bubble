jQuery(document).ready(function ($) {


    $('.JDL_counter').each(function () {
        var $this = $(this);
        JDL_count_up($this);
    });

});


function JDL_count_up($this) {
    var countTo = $this.data('end');
    var duration = $this.data('duration') * 1000;
    var prefix = $this.data('prefix');
    var suffix = $this.data('suffix');
    var bgcolor = $this.data('bgcolor');

    $this.css('background-color', bgcolor);
    console.log('doing countup...');
    $({countNum: $this.text()}).animate({
            countNum: countTo
        },

        {
            duration: duration,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                suffix_html = (suffix) ? '<br/><span class="JDL_count_up_small">' + suffix + '</span>' : '';
                prefix_html = (prefix) ? '<span class="JDL_count_up_small">' + prefix + '</span><br/>' : '';
                $this.html(prefix_html + this.countNum + suffix_html);
                //alert('finished');
            }

        });


};