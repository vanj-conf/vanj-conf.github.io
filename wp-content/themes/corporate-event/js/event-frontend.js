jQuery(document).ready(function($){
    if( event_var ) {
        corporate_event_event_countdown_timer();
    }

} );
function corporate_event_event_countdown_timer() {

    var date = event_var.date;
    var time = event_var.time;


    var date_valid_format = date.replaceAll( '-', '/' );
    var time_valid_format = time.replace( ' AM', '' );
    time_valid_format = time_valid_format.replace( ' PM', '' ); 

    var datetime = date_valid_format + ' ' + time_valid_format;


    var countDownDate = new Date(datetime).getTime();

    // Update the count down every 1 second

    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var days_html = "";
        var hours_html = "";
        var minutes_html = "";
        var seconds_html = "";

        if( ! isNaN( days ) )
            days_html = "<div><span class='days'>" + days + "</span> <div class='smalltext'>Days</div></div>";
        if( ! isNaN( hours ) )
            hours_html = "<div><span class='hours'>" + hours + "</span> <div class='smalltext'>Hours</div> </div>";
        if( ! isNaN( minutes ) )
            minutes_html = "<div><span class='minutes'>" + minutes + "</span> <div class='smalltext'>Minutes</div> </div>";
        if( ! isNaN( seconds ) )
            seconds_html = "<div><span class='seconds'>" + seconds + "</span> <div class='smalltext'>Seconds</div> </div>";

        // Output the result in an element with id="demo"
        document.getElementById("clockdiv").innerHTML = days_html + hours_html + minutes_html + seconds_html;


        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("clockdiv").innerHTML = "";
        }
    }, 1000);
}

