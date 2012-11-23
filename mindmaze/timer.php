<script type="text/javascript">
function run()
{
	
for(i=0;i<10;i++)
	{
	setTimeout("hi(i)",1000);
	hi(i);
	}
}
function hi(i)
{
	document.getElementById("timer").innerHTML = i ;
}
</script>
<body onload="run()">
<div style="text-align:center; font-size:24px" id="timer"></div>
</body>