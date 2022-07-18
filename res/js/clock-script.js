$(function() {

    // Cache some selectors

    var clock = $('#clock'),
        alarm = clock.find('.alarm'),
        ampm = clock.find('.ampm');

    // Map digits to their names (this will be an array)
    var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');

    // This object will hold the digit elements
    var digits = {};

    // Positions for the hours, minutes, and seconds
    var positions = [
        'h1', 'h2', ':', 'm1', 'm2', ':', 's1', 's2'
    ];

    // Generate the digits with the needed markup,
    // and add them to the clock

    var digit_holder = clock.find('.digits');

    $.each(positions, function() {

        if (this == ':') {
            digit_holder.append('<div class="dots">');
        } else {

            var pos = $('<div>');

            for (var i = 1; i < 8; i++) {
                pos.append('<span class="d' + i + '">');
            }

            // Set the digits as key:value pairs in the digits object
            digits[this] = pos;

            // Add the digit elements to the page
            digit_holder.append(pos);
        }

    });

    // Add the weekday names

    var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
        weekday_holder = clock.find('.weekdays');

    $.each(weekday_names, function() {
        weekday_holder.append('<span>' + this + '</span>');
    });

    var weekdays = clock.find('.weekdays span');

    // Run a timer every second and update the clock
    var clockServerTime = $('#hiddenTime').val();
    clockServerTime = parseInt(clockServerTime) + 18000;


    function update_time() {
        clockServerTime = clockServerTime + 1;
        var myhh = (Math.floor((clockServerTime / 3600) % 24)).toString();
        var mymm = (Math.floor((clockServerTime / 60) % 60)).toString();
        var myss = (clockServerTime % 60).toString();
        var myday = Math.floor(clockServerTime / (24 * 3600)) % 7;
        myday = ((myday + 4) % 7).toString();
        var myAMPM;
        if (myhh > 12) {
            myhh = myhh - 12;
            myAMPM = "PM"
        } else {
            myAMPM = "AM"
        }
        if (myhh < 10) {
            myhh = "0" + myhh
        }
        if (mymm < 10) {
            mymm = "0" + mymm
        }
        if (myss < 10) {
            myss = "0" + myss
        }
        var now = myhh + mymm + myss + myday + myAMPM;
        // var now = moment().format("hhmmssdA");
        //alert(myNow + " and " + now)


        digits.h1.attr('class', digit_to_name[now[0]]);
        digits.h2.attr('class', digit_to_name[now[1]]);
        digits.m1.attr('class', digit_to_name[now[2]]);
        digits.m2.attr('class', digit_to_name[now[3]]);
        digits.s1.attr('class', digit_to_name[now[4]]);
        digits.s2.attr('class', digit_to_name[now[5]]);

        // The library returns Sunday as the first day of the week.
        // Stupid, I know. Lets shift all the days one position down, 
        // and make Sunday last

        var dow = now[6];
        dow--;

        // Sunday!
        if (dow < 0) {
            // Make it last
            dow = 6;
        }

        // Mark the active day of the week
        weekdays.removeClass('active').eq(dow).addClass('active');

        // Set the am/pm text:
        ampm.text(now[7] + now[8]);
    };

    setInterval(update_time, 1000);

})