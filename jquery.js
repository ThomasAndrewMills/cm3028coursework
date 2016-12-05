//defining the center of the google map
var center = new google.maps.LatLng(55.864237,-4.251806);

//some google maps settings
function initialize() {
    var mapOptions = {
        center: center,
        zoom: 4,
        disableDefaultUI: true,
        styles: [{
            featureType: 'poi',
            stylers: [{ visibility: 'off' }]  // Turn off points of interest.
        }, {
            featureType: 'transit.station',
            stylers: [{ visibility: 'off' }]  // Turn off bus stations, train stations, etc.
        }],
        disableDoubleClickZoom: true
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

    //pop up trends menu
    var content =
        '<section class="trendsMenuContainer">' +
        '<section class="cityTitle"></section>' +
        '<section class="trendsGroup">' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '</section>'+
        '<section class="trendsGroup">' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '</section>'+
        '<section class="trendsGroup">' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '<section class="trend"></section>' +
        '</section>' +
        '</section>';

    //The pop-up trends menu
    var infowindow = new google.maps.InfoWindow({
        content: content
    });

    // marker positions
    //glasgow
    var city1 = new google.maps.LatLng(55.864237,-4.251806);

    // marker options
    var marker1 = new google.maps.Marker({
        position: city1,
        map: map,
        title:"Glasgow"
    });

    ////////////////////////////marker listeners//////////////////////////////

    google.maps.event.addListener(marker1, 'click', function () {
        var obj = $.getJSON('/twitter-proxy.php?url=' + encodeURIComponent('trends/place.json?id=21125'), function (result) {

            //adding the city title to the pop-up menu
            var cityTitle = document.getElementsByClassName('cityTitle');
            cityTitle[0].innerHTML=obj.responseJSON[0].locations[0].name;

            //getting an array of the trend classes
            var trend = document.getElementsByClassName('trend');

            //getting tweet volume for each trend
            //also making sure the value if not null
            //for some reason twitter gives back null values for tweet_volume

            //taking the data received in JSON and adding the trends to the pop-up menu
            trend[0].innerHTML= '<a href="' + obj.responseJSON[0].trends[0].url + '" target="_blank">' + obj.responseJSON[0].trends[0].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[0].tweet_volume != null) ? obj.responseJSON[0].trends[0].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[1].innerHTML= '<a href="' + obj.responseJSON[0].trends[1].url + '" target="_blank">' + obj.responseJSON[0].trends[1].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[1].tweet_volume != null) ? obj.responseJSON[0].trends[1].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[2].innerHTML= '<a href="' + obj.responseJSON[0].trends[2].url + '" target="_blank">' + obj.responseJSON[0].trends[2].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[2].tweet_volume != null) ? obj.responseJSON[0].trends[2].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[3].innerHTML= '<a href="' + obj.responseJSON[0].trends[3].url + '" target="_blank">' + obj.responseJSON[0].trends[3].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[3].tweet_volume != null) ? obj.responseJSON[0].trends[3].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[4].innerHTML= '<a href="' + obj.responseJSON[0].trends[4].url + '" target="_blank">' + obj.responseJSON[0].trends[4].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[4].tweet_volume != null) ? obj.responseJSON[0].trends[4].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[5].innerHTML= '<a href="' + obj.responseJSON[0].trends[5].url + '" target="_blank">' + obj.responseJSON[0].trends[5].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[5].tweet_volume != null) ? obj.responseJSON[0].trends[5].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[6].innerHTML= '<a href="' + obj.responseJSON[0].trends[6].url + '" target="_blank">' + obj.responseJSON[0].trends[6].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[6].tweet_volume != null) ? obj.responseJSON[0].trends[6].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[7].innerHTML= '<a href="' + obj.responseJSON[0].trends[7].url + '" target="_blank">' + obj.responseJSON[0].trends[7].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[7].tweet_volume != null) ? obj.responseJSON[0].trends[7].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[8].innerHTML= '<a href="' + obj.responseJSON[0].trends[8].url + '" target="_blank">' + obj.responseJSON[0].trends[8].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[8].tweet_volume != null) ? obj.responseJSON[0].trends[8].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[9].innerHTML= '<a href="' + obj.responseJSON[0].trends[9].url + '" target="_blank">' + obj.responseJSON[0].trends[9].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[9].tweet_volume != null) ? obj.responseJSON[0].trends[9].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[10].innerHTML= '<a href="' + obj.responseJSON[0].trends[10].url + '" target="_blank">' + obj.responseJSON[0].trends[10].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[10].tweet_volume != null) ? obj.responseJSON[0].trends[10].tweet_volume + " tweets" + '</span>' : '</span><br>');
            trend[11].innerHTML= '<a href="' + obj.responseJSON[0].trends[11].url + '" target="_blank">' + obj.responseJSON[0].trends[11].name + '</a><br><span class="tweetVolume">' + ((obj.responseJSON[0].trends[11].tweet_volume != null) ? obj.responseJSON[0].trends[11].tweet_volume + " tweets" + '</span>' : '</span><br>');
        });
        infowindow.open(map, marker1);
    });

    // close pop-up menu
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });

    google.maps.event.addListener(infowindow, 'domready', function() {
        var iwOuter = $('.gm-style-iw');
        var iwBackground = iwOuter.prev();
        iwBackground.children(':nth-child(2)').css({'display' : 'none'});
        iwBackground.children(':nth-child(4)').css({'display' : 'none'});
        iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(0, 0, 0, 0.6) 0px 1px 6px', 'z-index' : '1'});
        var iwCloseBtn = iwOuter.next();
        iwCloseBtn.css({opacity: '1', right: '40px', top: '3px', border: '7px solid white', 'border-radius': '13px', 'box-shadow': '0 0 5px black'});
    });
}
google.maps.event.addDomListener(window, 'load', initialize);