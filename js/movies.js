$(function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 12,
        max: 24,
        values: [ 12, 24 ],
        slide: function( event, ui ) {
            $( "#time-range" ).val( ui.values[ 0 ] + ":00 - " + ui.values[ 1 ] + ":00" );
                $( ".movie" ).each(function() {
                    var willShow = false;
                    var id = $(this).attr('id');
                    $(this).hide();
                    $("#" + id + " tbody tr td .time").each(function() {
                        willShow = false;
                            
                        var sTime = this.dataset.starttime.substring(0,2);
                        if(sTime >= ui.values[0] && sTime <= ui.values[1])
                            willShow = true;

                    });
                    if(willShow) $(this).show();
                });
        }
    });
    $( "#time-range" ).val($( "#slider-range" ).slider( "values", 0 ) +
      ":00 - " + $( "#slider-range" ).slider( "values", 1 ) + ":00" );
  });
