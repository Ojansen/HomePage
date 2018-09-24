function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    m = checkTime(m);
    document.getElementById('clock').innerHTML =
    h + ":" + m;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
// function show(id) {
//   document.getElementById(id).style.visibility = "visible";
// }
// function hide(id) {
//   document.getElementById(id).style.visibility = "hidden";
// }

var d = new Date();
var	months = ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];
var	boldMonths = '<span style="font-weight: bold;">'+months[d.getMonth()]+'</span>';
var	days = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"];
document.getElementById("year").innerHTML = d.getFullYear();
document.getElementById("date").innerHTML = days[d.getDay()] + ", " + boldMonths + " " + d.getDate() ;

$.ajax({
  method: "GET",
  url: "https://talaikis.com/api/quotes/random/",
}).then(function( data ){
  // console.log(data.contents.quotes[0]);
  $("#quote").html(data.quote);
  $("#writer").html("- "+data.author);
});

$.ajax({
  method: "GET",
  url: "https://api.openweathermap.org/data/2.5/weather?q=Zwolle,nl&appid=741d3f50a7f8f51ac4da33eb45e85bb6&units=metric"
}).then(function (weather) {
  console.log(weather);
  $weather = "<div id='temp'>"+weather.main.temp+"<sup>°C</sup></div>";
  $today = "<span id='today'>Today: "+weather.weather[0].description+" currently. The high will be "+weather.main.temp_max+"<sup>°</sup>. With a low of "+weather.main.temp_min+"<sup>°</sup>.";
  $("#weather").append( $weather, $today);
});

$.ajax({
  method: "GET",
  url: "https://roosters.deltion.nl/api/roster?group=AO3B"
}).then(function (rooster) {
  console.log(rooster);
  $("#test").each(function ( i ) {
    console.log(i);
  })
});