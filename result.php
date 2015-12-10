<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>校园宽带综合业务</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="./校园宽带综合业务_files/style1.css" media="all" type="text/css">
<script type="text/javascript" language="javascript" src="./校园宽带综合业务_files/jquery.min.js"></script>

<script>
    /*
     window.onbeforeunload=function window.onbeforeunload(){
       if (event.clientX>document.body.clientWidth && event.clientY<0 ||event.altKey)
      {
     	   //alert("if");
     	   window.event.returnValue = "您已经获取了网元割接方案了，如果放弃申请请撤消方案！";
      }
      else
      {
    	   window.event.returnValue="您确定要断开此网络吗?";
           return false;

      }

  }
  */
</script>



<script>

//显示时间ＪＳ
//alert(1449749257152);

ts = new Date();//.getTime();


setInterval(
function ()
{
	
	if (navigator.appName.indexOf("Explorer") > -1) 
	{ 
		
		onlinetime.innerText =""+new Date(new Date()-ts).toGMTString().match(/\d+:\d+:\d+/g)
		
	} else 
	{ 
		
		onlinetime.textContent =""+new Date(new Date()-ts).toGMTString().match(/\d+:\d+:\d+/g)
	} 

}
, 1000);
</script>
<script src="./校园宽带综合业务_files/engine.js"></script>
<script src="./校园宽带综合业务_files/util.js"></script>
<script src="./校园宽带综合业务_files/DwrManager.js"></script>
</head>
<body>
<div>
	<table>
		<tbody><tr>
			<td><img src="./校园宽带综合业务_files/mobileLogo.jpg" width="240px" height="80px"></td>
			<td align="center"><b><font size="5">欢迎使用山东移动高校无线宽带网</font></b></td>
		</tr>
	</tbody></table>
	
 </div>
 <hr>	
	<p>
	</p><p>
	</p><p>
	</p><center>
		<b><font size="4">用户登录成功！</font></b><p></p><p></p>
		<table>
			<tbody><tr>
				<td align="left"><b><font size="3">用户名：</font></b></td>
				<td><?php if(!session_id()) session_start();echo $_SESSION['username'];?></td>
			</tr>
			<tr>
				<td align="left"><b><font size="3">在线时间：</font></b></td>
				<td>
					<div class="clock-ticker">
						<div class="block">
							<span id="onlinetime" class="flip-top">00:00:00</span>
							<span class="flip-btm"></span>
						</div>						  
					</div>		
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			
		</tbody></table>
				<b><font size="2" color="red">下线请断开连接<br>系统将在一分钟内为您自动下线</font></b><font size="2" color="red">
	</font></center><font size="2" color="red">


	
<div class="main">
	
	
	<div class="text">
	</div>
	<div class="clear"></div>
	</div>

<hr>
<table width="100%">
	<tbody><tr><td align="right"><font size="2" color="">京ICP备05002571号|中国移动通讯版权所有</font></td></tr>
</tbody></table>



</font></body></html>