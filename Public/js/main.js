$("html:first").removeClass("no-js").addClass("has-js");
$(document).ready(function () {
	AOS.init({
  		duration: 1200,
  		once: true
	});

	$('.slider').sss({
		slideShow : true, // Set to false to prevent SSS from automatically animating.
		startOn : 0, // Slide to display first. Uses array notation (0 = first slide).
		transition : 400, // Length (in milliseconds) of the fade transition.
		speed : 3500, // Slideshow speed in milliseconds.
		showNav : true // Set to false to hide navigation arrows.
	});
})

$(document).on("click",".menu_toggle", function (e) {
	//console.log(e);
	//$(this).find(".icon").addClass("icon-times").removeClass("icon-bars");
	$("nav ul").slideToggle();
});

$(document).ready(function () {
	

var tWidth = '100%'; // width (in pixels)
var width_ = $("#info_bar").width();
var tHeight = '25px'; // height (in pixels)
var tcolour = 'transparent'; // background colour:
var moStop = false; // pause on mouseover (true or false)
var fontfamily = 'arial,sans-serif'; // font for content
var tSpeed = 1; // scroll speed (1 = slow, 5 = fast)
// enter your ticker content here (use \/ and \' in place of / and ' respectively)
var content = 'Welcome to P2P Recycler. Here, it is a peer to peer donation with no central account. Members deal directly with each other.';

var cps = -tSpeed;
var aw, mq;
var fsz = parseInt(tHeight) - 4;

function scrollticker() {
    mq.style.left = (parseInt(mq.style.left) > (-10 - aw)) ? mq.style.left = parseInt(mq.style.left) + cps + "px" : parseInt(width_) + 10 + "px";
}

function startticker() {
    if (document.getElementById) {
        var tick = '<div style="position:relative;width:' + tWidth + ';height:' + tHeight + ';overflow:hidden;background-color:' + tcolour + '"';
        if (moStop) tick += ' onmouseover="cps=0" onmouseout="cps=-tSpeed"';
        tick += '><div id="mq" style="position:absolute;left:0px;top:0px;font-family:' + fontfamily + ';font-size:' + fsz + 'px;white-space:nowrap;"><\/div><\/div>';
        document.getElementById('info_bar').innerHTML = tick;
        mq = document.getElementById("mq");
        mq.style.left = (10 + parseInt(width_)) + "px";
        mq.innerHTML = '<span id="tx">' + content + '<\/span>';
        aw = document.getElementById("tx").offsetWidth;
        lefttime = setInterval(scrollticker, 50);
    }
}
startticker();
window.onload = startticker;
});