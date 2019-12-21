<?php 
$host = '127.0.0.1';
$user = 'root';
$password = 'root';
$dbname = 'develop_department';
$db = new MySQLi($host,$user,$password,$dbname);
$db->query('set names UTF8');
if($db->connect_errno <> 0){
	echo "数据库连接失败";
	die();
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>发展规划处</title>
<style>
*{padding:0;margin:0px;}
/*背景渐变色*/
body{font-family:"微软雅黑";background:linear-gradient(top, #e7fee8 0%,white 60%);background:-ms-linear-gradient(top, #e7fee8 0%,white 60%);background: -webkit-linear-gradient(top, #e7fee8 0%,white 60%);background: -moz-linear-gradient(top, #e7fee8 0%,white 60%);}
ul,li{list-style:none;}
a{text-decoration:none;color:#000}
/*头部图片*/
#top{width:1180px;height:210px;margin:auto;background:url(images/topb1.jpg);}
/*导航栏*/
#nav{width:1180px;height:44px;margin:auto;background-color:#009744;}
#nav ul{height:44px;display:flex;justify-content:space-around;line-height:44px;}
#nav ul li a{color:#FDFDFD;font-size:22px;}
#nav ul li a:hover{color:#EE4A4A;}
/*导航下面的搜索栏*/
#search-nav{width:1180px;height:39px;margin:auto;background:url(images/tab.jpg);border-bottom-right-radius:6px;border-bottom-left-radius:6px;position:relative;}
#search-nav p{font-size:14px;line-height:39px;margin-left:20px;}
#search-nav .mytext{height:22px;width:100px;border:0.4px solid #CCC;position:absolute;right:76px;top:8px;}
#search-nav .mybutton{height:23px;width:43px;border:0.4px solid #CCC;position:absolute;right:30px;top:8px;}
/*主体*/
#main{width:1180px;height:834px;margin:12px auto 0px;position:relative;}
/*重点内容展示*/
#max-content-show{width:460px;height:332px;position:relative;box-shadow:2px 5px 10px #ccc}
/*重点内容图片展示*/
#max-content-show img{width:460px;height:240px;position:absolute;opacity:0;transition:opacity 0.8s;}
#max-content-show img:nth-child(1){opacity:1;}
/*重点内容小点展示*/
#max-content-show ul{width:100px;height:20px;position:absolute;bottom:92px;left:180px;display:flex;justify-content:space-around;}
#max-content-show ul li{width:7px;height:7px;background-color:#fff;margin-top:7px;border-radius:50%;cursor:pointer;;}
#max-content-show ul li.reddot{background-color:red;transform:scale(1.3)}
/*重点内容标题展示*/
#max-content-show .max-title{width:460px;height:34px;position:absolute;top:240px;left:0;background:#009744;}
#max-content-show .max-title p{color:#fff;line-height:31px;margin-left:26px;font-size:14px;font-weight:bold;margin:auto;width:460px;height:34px;line-height:34px;text-align:center;}
#max-content-show .max-content{width:460px;height:58px;position:absolute;left:0px;bottom:0px;color:#333;line-height:2;box-shadow:0px 3px 10px #ccc;font-weight:normal;text-indent:20px;font-size:13px;overflow:hidden;text-overflow:ellipsis;background-color:#fff;}
/*上部分部门动态*/
#one-party-department{width:700px;height:54px;margin:auto;position:absolute;top:-16px;right:0;border-bottom:4px solid #144896;}
#one-party-department ul{width:700px;height:54px;display:flex;justify-content:space-around;}
#one-party-department ul li{height:52px;line-height:52px;}
#one-party-department ul li a{color:#000;font-size:20px;}
/*上部分部门动态js经过样式*/
#one-party-department ul .o-p-d{border-bottom:5px solid #35a5f9;font-weight:600}
/*上部分部门内容动态*/
#opd-content{width:700px;height:280px;position:absolute;right:0;top:45px;}
/*上部分部门内容动态内容*/
#opd-content ul{display:none;}
#opd-content ul li{border-bottom:1px dashed #CCCCCC;margin-top:4px;list-style:url(images/list1.jpg) inside;margin-left:0px;width:700px;height:31px;line-height:26px;}
#opd-content ul li{font-size:16px;font-family:"微软雅黑";color:#000;}
#opd-content ul li span{float:right;color:#666;font-size:14px;line-height:28px;font-family:"微软雅黑"}
#opd-content ul li a{font-size:16px;font-family:"微软雅黑";color:#000;}
#opd-content ul li a:hover{color:#F60;}
#opd-content ul.opd-first{display:block;}
/*中间图片*/
#mid{width:1180px;height:132px;background:url(images/midbackground3.jpg);margin-top:16px;}
/*下部分部门动态标题*/
#two-part-department{height:54px;width:700px;border-bottom:4px solid #144896;width:704px;height:50px;margin-left:4px;}
#two-part-department li{line-height:50px;margin-left:58px;height:49px;float:left;}
#two-part-department li a{font-family:"微软雅黑";font-size:20px;color:#000;}
#two-part-department li.t-p-d{border-bottom:5px solid #35a5f9;font-weight:600;}
#tpd-content{width:704px;height:288px;margin-top:8px;margin-left:4px;}
#tpd-content ul li{border-bottom:1px dashed #CCCCCC;margin-top:4px;list-style: url(images/list1.jpg) inside;margin-left:0px;width:700px;height:31px;line-height:26px;margin-left:4px;}
#tpd-content ul{display:none;}
#tpd-content ul.tpd-content-fist{display:block;}
#tpd-content span{float:right;color:#666;font-size:14px;line-height:28px;font-family:"微软雅黑";}
#tpd-content ul li a:hover{color:#F60;}
/*右下角快速导航*/
#fact{width:452px;height:324px;position:absolute;bottom:14px;right:0;}
#fact p{color:#fff;font-size:19px;}
/*快速导航-one*/
#fact .one{border-bottom:2px solid #CCC;width:452px;height:50px;background: url(images/one.png) no-repeat;}
#fact .one p{width:108px;height:49px;text-align:center;color:#fff;font-size:19px;line-height:35px;border-bottom:2px solid #35a5f9;}
/*联系我们-two*/
#fact .two{width:448px;height:66px;background:url(images/bbs1.jpg);margin-top:12px;margin-left:2px;}
/*教育部-three*/
#fact .three{width:218px;height:50px;background:url(images/two.png);text-align:center;line-height:50px;margin-top:14px;}
/*共青团-four*/
#fact .four{width:218px;height:50px;background:url(images/three.png);text-align:center;line-height:50px;float:right;margin-top:-48px;}
/*全国规划办-five*/
#fact .five{width:218px;height:50px;background:url(images/four.png);text-align:center;line-height:50px;margin-top:14px;}
/*"双高建设"-six*/
#fact .six{width:218px;height:50px;background:url(images/five.png);text-align:center;line-height:50px;float:right;margin-top:-48px;}
/*江苏农林职业技术学院-seven*/
#fact .seven{width:448px;height:50px;background:url(images/six.png);text-align:center;line-height:50px;margin-top:14px;}
/*底部*/
#bottom{border:1px solid blue;width:1180px;height:90px;margin:auto;margin-top:20px;background-color:#009744;}
#bottom p{color:#F4F4F4;font-size:16px;font-family:"微软雅黑";text-align:center;margin-top:16px;}
</style>
</head>

<body>
<!--头部图片-->
<div id="top"></div>
<!--头部导航栏-->
<div id="nav">
	<ul>
    	<li><a href="">本站站点</a></li>
        <li><a href="">关于我们</a></li>
        <li><a href="">机构设置</a></li>
        <li><a href="">发展规划</a></li>
        <li><a href="">双高建设</a></li>
        <li><a href="">支部建设</a></li>
        <li><a href="">下载链接</a></li>
    </ul>
</div>
<!--用js获取当前时间-->
<script>
	var obj = new Date();
	var date = obj.toLocaleDateString(); 
	var d = obj.getDay();
</script>
<!--标题栏下面的搜索栏-->
<div id="search-nav">
	<p>欢迎访问江苏农林职业技术学院发展规划处，今天是: <script>document.write(date);</script> 星期 <script>document.write(d);</script></p>
    <form>
    	<input type="text" class="mytext">
        <input type="button" value="搜索" class="mybutton">
    </form>
</div>
<!--页面主体开始-->
<div id="main">
<!--重点内容展示-->
<div id="max-content-show">
	<!--图片展示,只展示三张-->
    <img src="images/photot1.jpg" class="firstphoto">
    <img src="images/photo2.jpg"/>
    <img src="images/photot3.jpg"/>
    <!--图片上的滚动点-->
    <ul>
    	<li class="reddot"></li>
        <li></li>
        <li></li>
    </ul>
    <!--重点内容标题-->
    <div class="max-title"><p>规划发展处与食品科学与工程联合开展活动:</p></div>
    <p class="max-content">6月26日上午，规划发处与食品科学与工程联合开展主题活动“不忘初心、牢记使命”，奋发图强，努力向前，活动在本部校区图书馆A403举行到达现. . .</p>
<!--js图片和小点的轮播效果-->
<script>
	var oimg = document.querySelectorAll("#max-content-show img");
	var oli = document.querySelectorAll("#max-content-show ul li");
	var index = 0;
	var len = oli.length;
	var t = "";
	for(let i=0;i<len;i++){
		oli[i].onmouseover = function(){
			clearInterval(t);
			oli[index].className = "";
			oimg[index].style.opacity = "0";
			index++;
			if(index>len-1){
				index=0;	
			}
			oli[i].className = "reddot";
			oimg[i].style.opacity = "1";
			index = i;
			}
		oli[i].onmouseout = function(){
			autoplay();
			}
		oimg[i].onmouseover = function(){
			clearInterval(t);
			}
		oimg[i].onmouseout = function(){
			autoplay();
			}
		}
	function autoplay(){
		t = setInterval(function(){
			oli[index].className = "";
			oimg[index].style.opacity = "0";
			index++;
			if(index>len-1){
				index=0;	
			}
			oli[index].className = "reddot";
			oimg[index].style.opacity = "1";
			},2000);
		}
	autoplay();
</script>
</div>
<!--上部分部门动态-->
<div id="one-party-department">
	<ul>
    	<li class="o-p-d"><a href="">工作动态</a></li>
        <li><a href="">学科动态</a></li>
        <li><a href="">发展规划动态</a></li>
    </ul>
</div>
<!--上部分部门动态内容-->
<!--php查询数据库里面的内容并显示-->
<div id="opd-content">
<!--查询工作动态并显示-->
	<ul class="opd-first">
    <?php  
		$sql = "select * from list where department = '工作动态' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		//读取数据库信息
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
		//遍历数据库信息
		foreach($rows as $row){?>
    	<li><a href=""><?php echo $row['title']?><span><?php echo $row['time']?></span></a></li>
        <?php } ?>
    </ul>
<!--查询学科动态并显示-->
	<ul>
    <?php  
		$sql = "select * from list where department = '学科动态' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		//读取数据库信息
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
		//遍历数据库信息
		foreach($rows as $row){?>
    	<li><a href=""><?php echo $row['title']?><span><?php echo $row['time']?></span></a></li>
        <?php } ?>
    </ul>
<!--查询发展规划动态并显示-->
	<ul>
    <?php  
		$sql = "select * from list where department = '发展规划动态' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		//读取数据库信息
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
		//遍历数据库信息
		foreach($rows as $row){?>
    	<li><a href=""><?php echo $row['title']?><span><?php echo $row['time']?></span></a></li>
        <?php } ?>
    </ul>
</div>
<!--js上部分学科动态-->
<script>
var opdli = document.querySelectorAll("#one-party-department ul li");
var opdtitle = document.querySelectorAll("#opd-content ul");
var opdlen = opdli.length;
var num = 0;
for(let i=0;i<opdlen;i++){
	opdli[i].onmouseover = function (){
		opdli[num].className = "";
		opdtitle[num].style.display = "none";
		opdli[i].className = "o-p-d";
		opdtitle[i].style.display = "block";
		num = i;
		}
	}
</script>
<!--中间图片展示-->
<div id="mid"></div>
<!--下部分部门动态标题-->
<div id="two-part-department">
	<ul>
    	<li class="t-p-d"><a href="">院系资讯</a></li>
        <li><a href="">政策文件</a></li>
        <li><a href="">理论观点</a></li>
    </ul>
</div>
<!--下部分部门动态内容-->
<div id="tpd-content">
<!--查询院系咨询内容并显示-->
	<ul class="tpd-content-fist">
    <?php 
		$sql = "select * from list where department = '院系资讯' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
			foreach($rows as $row){?>
    	<li><span><?php echo $row['time']?></span><a href=""><?php echo $row['title']?></a></li>
        <?php }?>
    </ul>
<!--查询政策文件内容并显示-->
	<ul>
    <?php 
		$sql = "select * from list where department = '政策文件' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
			foreach($rows as $row){?>
    	<li><span><?php echo $row['time']?></span><a href=""><?php echo $row['title']?></a></li>
        <?php }?>
    </ul>
<!--查询理论观点内容并显示-->
	<ul>
    <?php 
		$sql = "select * from list where department = '理论观点' order by time desc limit 0,8";
		$result = $db->query($sql);
		if($result == false){
			echo "sql语句错误";
			die();
			}
		$rows = array();
		while($row = $result->fetch_array( MYSQL_ASSOC )){
			$rows[] = $row;
			}
			foreach($rows as $row){?>
    	<li><span><?php echo $row['time']?></span><a href=""><?php echo $row['title']?></a></li>
        <?php }?>
    </ul>
</div>
<!--js下部分部门动态-->
<script>
	var tpdtitle = document.querySelectorAll("#two-part-department ul li");
	var tpdlen = tpdtitle.length;
	var tpdul = document.querySelectorAll("#tpd-content ul");
	var num1 = 0;
	for(let i=0;i<tpdlen;i++){
		tpdtitle[i].onmouseover = function(){
			tpdtitle[num1].className = "";
			tpdul[num1].style.display = "none";
			tpdtitle[i].className = "t-p-d";
			tpdul[i].style.display = "block";
			num1 = i;
			}
		}
</script>
<!--右下角快速导航-->
<div id="fact">
<!--快速导航-one-->
	<div class="one">
    	<p>快速导航</p>
    </div>
<!--办公室电话-two-->
	<div class="two">
    	<p></p>
    </div>
<!--教育部-three-->
	<div class="three">
    	<p>教育部</p>
    </div>
<!--共青团-four-->
	<div class="four">
    	<p>共青团</p>
    </div>
<!--全国规划办-five-->
	<div class="five">
    	<p>全国规划办</p>
    </div>
<!--“双高”建设-six-->
	<div class="six">
    	<p>“双高”建设</p>
    </div>
<!--江苏农林职业技术学院-seven-->
	<div class="seven">
    	<p>江苏农林职业技术学院</p>
    </div>   
</div>
</div>
<!--页面主体结束-->
<!--底部-->
<div id="bottom">
	<p>地址：江苏省句容市文昌东路19号 电话：0511-87290000</p>
	<p>© 版权所有 江苏农林职业技术学院&nbsp;信息工程学院&nbsp;兔子工作室</p>
</div>
</body>
</html>
