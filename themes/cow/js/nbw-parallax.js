/*
JavaScript for the demo: Recreating the Nikebetterworld.com Parallax Demo
Demo: Recreating the Nikebetterworld.com Parallax Demo
Author: Ian Lunn
Author URL: http://www.ianlunn.co.uk/
Demo URL: http://www.ianlunn.co.uk/demos/recreate-nikebetterworld-parallax/
Tutorial URL: http://www.ianlunn.co.uk/blog/code-tutorials/recreate-nikebetterworld-parallax/

License: http://creativecommons.org/licenses/by-sa/3.0/ (Attribution Share Alike). Please attribute work to Ian Lunn simply by leaving these comments in the source code or if you'd prefer, place a link on your website to http://www.ianlunn.co.uk/.

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

$(document).ready(function() { //when the document is ready...



	//save selectors as variables to increase performance
	var $window = $(window);
	
	var $firstBG = $('#brand');
	var brand_s1 = $("#brand #brand_s1");
	var brand_s2 = $("#brand #brand_s2");
	var brand_d1 = $("#brand #brand_d1");
	var brand_d2 = $("#brand #brand_d2");
	var brand_c1 = $("#brand #brand_c1");
	var brand_c2 = $("#brand #brand_c2");
	
	var $secondBG = $('#about');
	var about_s1 = $("#about #about_s1");
	var about_s2 = $("#about #about_s2");
	var about_d1 = $("#about #about_d1");
	var about_d2 = $("#about #about_d2");
	var about_c1 = $("#about #about_c1");
	var about_c2 = $("#about #about_c2");
	
	var $thirdBG = $('#collection');
	var collection_s1 = $("#collection #collection_s1");
	var collection_s2 = $("#collection #collection_s2");
	var collection_c1 = $("#collection #collection_c1");
	var collection_c2 = $("#collection #collection_c2");
	
	var $coll = $('#coll');
	var coll_s1 = $("#coll #coll_s1");
	var coll_s2 = $("#coll #coll_s2");
	var coll_c1 = $("#coll #coll_c1");
	var coll_c2 = $("#coll #coll_c2");
	
	var $fourthBG = $('#news');
	var news_s1 = $("#news #news_s1");
	var news_s2 = $("#news #news_s2");
	var news_d1 = $("#news #news_d1");
	var news_d2 = $("#news #news_d2");
	var news_c1 = $("#news #news_c1");
	var news_c2 = $("#news #news_c2");
	
	var $fiveBG = $('#contatti');
	var contatti_s1 = $("#contatti #contatti_s1");
	var contatti_s2 = $("#contatti #contatti_s2");
	var contatti_d1 = $("#contatti #contatti_d1");
	var contatti_d2 = $("#contatti #contatti_d2");
	var contatti_c1 = $("#contatti #contatti_c1");
	var contatti_c2 = $("#contatti #contatti_c2");
	var contatti_m = $("#contatti #contatti_m");
	
	var $sixBG = $('#social');
	var social_s1 = $("#social #social_s1");
	var social_s2 = $("#social #social_s2");
	var social_d1 = $("#social #social_d1");
	var social_d2 = $("#social #social_d2");
	var social_c1 = $("#social #social_c1");
	var social_c2 = $("#social #social_c2");
	
	var navigation = $("#nav li a");

	var $newsletter = $("#newsletter");
	
	var windowHeight = $window.height(); //get the height of the window
	
	

	//apply the class "inview" to a section that is in the viewport
	$('#brand, #about, #collection, #coll, #news, #contatti, #social, #newsletter').bind('inview', function (event, visible) {
			if (visible == true) {
			$(this).addClass("inview");
			} else {
			$(this).removeClass("inview");
			}
		});
	
			
	//function that places the navigation in the center of the window
	function RepositionNav(){
		var windowHeight = $window.height(); //get the height of the window
		var navHeight = $('#nav').height() / 2;
		var windowCenter = (windowHeight / 2); 
		var newtop = windowCenter - navHeight;
		$('#nav').css({"top": 40}); //set the new top position of the navigation list
	}
	
	//function that is called for every pixel the user scrolls. Determines the position of the background
	/*arguments: 
		x = horizontal position of background
		windowHeight = height of the viewport
		pos = position of the scrollbar
		adjuster = adjust the position of the background
		inertia = how fast the background moves in relation to scrolling
	*/
	function newPos(x, windowHeight, pos, adjuster, inertia){
		return x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px";
	}
	/*
	var entrata = 0;
	var entrata1 = 0;
	var entrata2 = 0;
	var entrata3 = 0;
	var entrata4 = 0;
	var entrata5 = 0;
	//function fissaggio
	function fissaggio(){
		var position = $window.scrollTop();
		//about us
		
		if( position > 1080 && position < 1480){
			if(entrata == 0){
			$('html, body').animate({
						scrollTop: '1280px',
					}, 500);
			entrata = 1;
			}
		}else{
			entrata = 0;
		}
		
		//collection
		if( position > 2360 && position < 2760){
			if(entrata1 == 0){
			$('html, body').animate({
						scrollTop: '2560px',
					}, 500);
			entrata1 = 1;
			}
		}else{
			entrata1 = 0;
		}
		
		//news
		if( position > 3960 && position < 4360){
			if(entrata2 == 0){
			$('html, body').animate({
						scrollTop: '4160px',
					}, 500);
			entrata2 = 1;
			}
		}else{
			entrata2 = 0;
		}
		
		
		//contact
		if( position > 5240 && position < 5640){
			if(entrata3 == 0){
			$('html, body').animate({
						scrollTop: '5440px',
					}, 500);
			entrata3 = 1;
			}
		}else{
			entrata3 = 0;
		}
		
		
		//social
		if( position > 6520 && position < 6920){
			if(entrata4 == 0){
			$('html, body').animate({
						scrollTop: '6720px',
					}, 500);
			entrata4 = 1;
			}
		}else{
			entrata4 = 0;
		}
		
		
		//newsletter
		if( position > 7800 && position < 8200){
			if(entrata5 == 0){
			$('html, body').animate({
						scrollTop: '8000px',
					}, 500);
			entrata5 = 1;
			}
		}else{
			entrata5 = 0;
		}
	}
	*/
	
	//function to be called whenever the window is scrolled or resized
	function Move(){ 
		var pos = $window.scrollTop(); //position of the scrollbar
		//fissaggio();
		//if the first section is in view...
		if($firstBG.hasClass("inview")){
			//call the newPos function and change the background position
			$firstBG.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - 100), 0.6)}); 
			brand_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-800)), -(windowHeight*0.0002))});
			brand_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (300)), 0.3)});
			brand_d1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (500)), 0.2)});
			brand_d2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-500)), -0.2)});
			brand_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-500)), -0.1)});
			brand_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (1500)), 0.1)});
			navigation.css("color","#333");
			$("#brand_menu").css("font-family",'SohoStdBold');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").show();
			$("#logo_menu_chiaro").hide();
		}
		
		//if the second section is in view...
		if($secondBG.hasClass("inview")){
			//call the newPos function and change the background position
			$secondBG.css({'backgroundPosition': newPos(50, windowHeight, pos,(windowHeight - -(1200)), 0.6)});
			//call the newPos function and change the secnond background position
			about_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-1400)), -0.3)});
			about_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-1200)), 0.3)});
			about_d1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-500)), 0.2)});
			about_d2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-1800)), -0.2)});
			about_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-2400)), -0.1)});
			about_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-300)), 0.1)});
			navigation.css("color","#999");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdBold');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").hide();
			$("#logo_menu_chiaro").show();
		}
		
		//if the third section is in view...
	if($thirdBG.hasClass("inview")){
			//call the newPos function and change the background position
			$thirdBG.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - -(2360)), 0.6)});
			
			collection_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-1800)), 0.3)});
			collection_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-1100)), 0.2)});
			collection_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-800)), 0.1)});
			collection_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5200)), -0.1)});
			navigation.css("color","#333");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdBold');
			$("#decolte_menu").css("font-family",'SohoStdBold');
			$("#tennis_menu").css("font-family",'SohoStdBold');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").show();
			$("#logo_menu_chiaro").hide();
		}
		
		
		if($coll.hasClass("inview")){
			//call the newPos function and change the background position
			$coll.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - -(3550)), 0.6)});
			
			coll_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-3200)), 0.3)});
			coll_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-3300)), 0.2)});
			coll_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-3200)), 0.1)});
			coll_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-3550)), -0.1)});
			navigation.css("color","#333");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdBold');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdBold');
			$("#infradito_menu").css("font-family",'SohoStdBold');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").show();
			$("#logo_menu_chiaro").hide();
		}
		
		//if the fourth section is in view...
		if($fourthBG.hasClass("inview")){
			//call the newPos function and change the background position for CSS3 multiple backgrounds
			$fourthBG.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - -(4720)), 0.6)});
			
			news_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5300)), -0.3)});
			news_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-4800)), 0.3)});
			news_d1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5000)), 0.2)});
			news_d2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5500)), -0.2)});
			news_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5000)), -0.1)});
			news_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-4500)), 0.1)});
			navigation.css("color","#999");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdBold');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").hide();
			$("#logo_menu_chiaro").show();
		}
		
		if($fiveBG.hasClass("inview")){
			//call the newPos function and change the background position for CSS3 multiple backgrounds
			$fiveBG.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - -(5970)), 0.6)});
			
			contatti_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-6400)), -0.3)});
			contatti_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5800)), 0.3)});
			contatti_d1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-6200)), 0.2)});
			contatti_d2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-6500)), -0.2)});
			contatti_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-6950)), -0.1)});
			contatti_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-6000)), 0.1)});
			contatti_m.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-5000)), 0.1)});
			navigation.css("color","#333");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdBold');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").show();
			$("#logo_menu_chiaro").hide();
		}
		
		if($sixBG.hasClass("inview")){
			//call the newPos function and change the background position for CSS3 multiple backgrounds
			$sixBG.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - -(7200)), 0.6)});
			
			social_s1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7500)), -0.3)});
			social_s2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7200)), 0.3)});
			social_d1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7200)), 0.2)});
			social_d2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7200)), -0.2)});
			social_c1.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7400)), -0.1)});
			social_c2.css({'backgroundPosition': newPos(50, windowHeight, pos, (windowHeight - (-7200)), 0.1)});
			navigation.css("color","#333");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdBold');
			$("#newsletter_menu").css("font-family",'SohoStdRegular');
			$("#logo_menu").show();
			$("#logo_menu_chiaro").hide();
		}
		
		if($newsletter.hasClass("inview")){
			navigation.css("color","#999");
			$("#brand_menu").css("font-family",'SohoStdRegular');
			$("#about_menu").css("font-family",'SohoStdRegular');
			$("#menu_collection").css("font-family",'SohoStdRegular');
			$("#decolte_menu").css("font-family",'SohoStdRegular');
			$("#tennis_menu").css("font-family",'SohoStdRegular');
			$("#ballerina_menu").css("font-family",'SohoStdRegular');
			$("#infradito_menu").css("font-family",'SohoStdRegular');
			$("#news_menu").css("font-family",'SohoStdRegular');
			$("#contatti_menu").css("font-family",'SohoStdRegular');
			$("#social_menu").css("font-family",'SohoStdRegular');
			$("#newsletter_menu").css("font-family",'SohoStdBold');
			$("#logo_menu").hide();
			$("#logo_menu_chiaro").show();
		}
		
		$('#pixels').html(pos); //display the number of pixels scrolled at the bottom of the page
	}
		
	RepositionNav(); //Reposition the Navigation to center it in the window when the script loads
	
	$window.resize(function(){ //if the user resizes the window...
		Move(); //move the background images in relation to the movement of the scrollbar
		RepositionNav(); //reposition the navigation list so it remains vertically central
	});		
	
	$window.bind('scroll', function(){ //when the user is scrolling...
		Move(); //move the background images in relation to the movement of the scrollbar
		
	});
	
});