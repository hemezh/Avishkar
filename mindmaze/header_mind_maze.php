<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once("../functions.php") ;
require_once("./mind_maze_functions.php") ;
sql_connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Avishkar 2011</title>
<link type="text/css" href="../styles/style.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../styles/tabs-accordion.css">
<link rel="stylesheet" type="text/css" media="all" href="../css/jquery.dualSlider.0.3.css" />
<link rel="stylesheet" type="text/css" href="../skin2_files/tabs-no-images.css">
<link rel="stylesheet" type="text/css" href="../matrix_files/style.css">
<script type="text/javascript" src="../matrix_files/zoominfo.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="../css/fonts.css"  />

<!--[if lt IE 8]>
<style type="text/css">
	.css-panes div,#main,#homeImage{
    	border:1px solid #1f1f1f;
    }
</style>
<![endif]-->

<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jqueryui.js"></script>
<script type="text/javascript" src="../scripts/jquery_002.js"></script>
<script type="text/javascript" src="../scripts/jquery.cycle.all.2.74.js"></script>
<script src="../scripts/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="../scripts/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>



	<script type="text/javascript">
		
		$(document).ready(function() {
			
			$(".carousel").dualSlider({
				auto:true,
				autoDelay: 3500,
				easingCarousel: "swing",
				easingDetails: "easeOutBack",
				durationCarousel: 1000,
				durationDetails: 500
			});
			
		});
		
		
	</script>
	

<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
	$('#news-container').vTicker({ 
		speed: 600,
		pause: 3000,
		animation: 'fade',
		mousePause: true,
		showItems: 4
	});

	$("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
	$("#tab1 a").click(function(){
		});
	$('#accordion h2').bind('mouseenter',function(){
					$(this).find(".unhoverd")
					.stop(true)
					.andSelf()
					.find('.hoverd')
					.stop(true)
					.animate({
						"opacity":"1"
						},800,"easeOutBack")
					
					})
					.bind('mouseleave',function(){
					$(this).find(".hoverd")
					.stop(true)
					.animate({
						"opacity":"0"
						},500)
					});
		$("#accordion h2 > .hoverd").live("click",function(){
				
				$('.pane').slideUp(500).removeClass('khulapane');
				var ul=$(this).parent().next();
				if(ul.hasClass('khulapane'))
				ul.removeClass('khulapane');
				else
				ul.slideToggle(800).addClass('khulapane');
				$('.activeplus').removeClass('activeplus').addClass('hoverd').stop(true)
					.animate({
						"opacity":"0"
						},000)
				$(this).removeClass('hoverd').addClass("activeplus");
				
			});
			//$("#accordion").tabs("#accordion div.pane", {tabs: '#accordion h2', effect: 'slide', initialIndex: null});

	
		$('.activeplus').click(function(){
					return false;
			});



	$("#accordion .pane ul li").live('mouseenter',function(){
		            $(this).stop().animate({ backgroundColor: "#B8DEF2",color:"#072331" }, 500);
					$(this).css("cursor","pointer")
                })
				.live('mouseleave',function(){
                    $(this).stop().animate({ backgroundColor: "#fbfbfb",color:"#1b1b1b"}, 500);             
                });
	$("#tab_content1").find('a').live('mouseenter',function(){
		            $(this).parent().find('p').stop().animate({ backgroundColor: "#095A8E",color:"#fff" }, 500);
                })
				.live('mouseleave',function(){
                    $(this).parent().find('p').stop().animate({ backgroundColor: "#fbfbfb",color:"#072330"}, 500);             
                });
});
</script>
<script type="text/javascript">
function changetab(tochange,totaltabs)
	{
		var i  ;
		var id ;
		for(i=1;i<=totaltabs;i++)
		{
			id = '#tab_content'+i ;
			if(i!=tochange)
				$(id).hide("fast");
		}
		id = '#tab_content'+tochange ;
		$(id).slideToggle("slow");
		$(id).show("fast");
	}
function returnHash()
{
	var category = window.location ;
	var str = new String(category);
	var start = str.indexOf("#") ;
	if(start == -1 ) 
		return start  ;
	return str.substr(start+1);
}
function getcontentintodiv(category)
{
	document.getElementById("centered_content").innerHTML="<center></center>" ;
	$.get("getcontent.php?category="+category, function(data){
	document.getElementById("centered_content").innerHTML=data ;
	});
}
function gettabstodiv(events,tabs)
{
	var tabid ; 
	var i ;
	$(".current").removeClass("current");
	$(".currenttab").removeClass("currenttab");
	tabid = "#tab"+events;
	contentid = "#tab_content"+events;
	
	$.get("gettab.php?category="+events, function(data){
	document.getElementById("tab_content").innerHTML=data ;
	});
	
	$(tabid).children("a").addClass("current");
	$(contentid).addClass("currenttab");
}
function getpermalink(category)
{
	if(category == -1 )
		category = document.location ;
	
	$.get("getpermalink.php?category="+category, function(data){
	document.getElementById("permalink").innerHTML=data ;
	});
	
	$.get("http://www.facebook.com/", function(data){
	document.getElementById("permalink").innerHTML=data ;
	});
}
function refreshOnLoad() 
{
	var afterhash = returnHash() ;
	if(afterhash!=-1) 
	{
		refreshPages(afterhash);
	}
	else
	{
	refreshPages('-1');
	}
}
function refreshPages(hashValue)
{
	if((hashValue==-1)||(hashValue==""))
	{
		hashValue=window.location;
		hashValue = String(hashValue);
		slashpos = hashValue.lastIndexOf("/");
		slashpos++;
		hashpos = hashValue.indexOf("#");
		if(hashpos==-1)
		{
			hashpos=10000;
		}
		hashValue = "./"+hashValue.substring(slashpos,hashpos);
		
	}
	
	getcontentintodiv(hashValue);
//	getpermalink(hashValue);
}


</script>
<style>	
	/* alternate colors: skin2 */
	ul.skin2 a {
		background-color:#89a;		
		color:#fff !important;
	}
	/* mouseover state */
	ul.skin2 a:hover {
		background-color:#678;
	}
	/* active tab */
	ul.skin2 a.current {
		background-color: #072331;
		
	}	
	/* tab pane with background gradient */
	div.skin2 div {
		/* IE6 does not support PNG24 images natively */
	}
	div.css-panes div.currenttab {
		display:block;
	}
	div.css-panes div{
		display:none;
	}
	</style>
<style type="text/css">
.slideshow { height: 115px; width: 200px; margin-left:0px; margin-top:30px; }
.slideshow img { padding: 0px; border: 0px solid #ccc;  }
#news-container
{
	width: 200px; margin:0px;
	padding: 0px; border: 0px solid #ccc; background-color:#0B7F9A;

}
#news-container ul li div
{	color:#EAEAEA;
text-align:justify;
line-height:16px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
size:11px;
	display:list-item;
	border-bottom:1px solid #aaaaaa;
	padding-top:15px;
	padding-left:10px;
	padding-right:10px;
	padding-bottom:10px;
	height:45px;
	background:#072331;
	box-shadow:0 0 20px #000 inset;
}
.mindmaze-panes div{
	color:#072330;
	display:none;
	min-height:150px;
	padding:25px 20px;
	background-color:#fff;		
	-webkit-box-shadow:0 0px 4px rgba(0, 0, 0, 0.3), 0 0 62px rgba(0, 0, 0, 0.07) inset;
	-moz-box-shadow:0 0px 4px rgba(0, 0, 0, 0.3), 0 0 62px rgba(0, 0, 0, 0.07) inset;
	box-shadow:0 0px 4px rgba(0, 0, 0, 0.3), 0 0 62px rgba(0, 0, 0, 0.07) inset;
	
	min-height:300px;
	border:1px solid transparent;
	font-family:Verdana, Geneva, sans-serif;
	margin-bottom: 50px;
}
#mind_maze_timer{
	text-transform:uppercase;
	opacity:0.75;
	background:#072331;
	color:#D5D5D5;
	font-size:14px;
	width:200px;
	padding:9px 0;
	text-align:center;
	margin-top:24px;
	margin-bottom:-30px;
	box-shadow:0 0.1px 2px rgba(0, 0, 0, 0.3), 0 0 80px rgba(0, 0, 0, 1) inset;
	border-bottom:2px solid #C0C0C0;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
</style>
<script type="text/javascript">
function gettimer()
{

	$.get("gettimer.php", function(data){
//	alert(data);
	document.getElementById("mind_maze_timer").innerHTML=data ;
	setTimeout('gettimer()',1000);
	});
}
window.onload=function(){
	setTimeout('gettimer()',1000);
}

</script>
</head>

<!-- <body onload="gettimer()"> -->
<body>
<div id="headerBack"></div>
	<div id="header"><div id="headerWrapper">
    <!-- <div id="login" class="headtop"></div>-->
    <!-- <div id="countdown" class="headtop"> <div  class="headheading">4</div> weeks to go</div>-->
    </div></div>
		<div id="menuBar" >
    <div id="menuWrapper">
   <?php
			include('./199.htm');  ?>
            </div>
   	</div>
    </div>
