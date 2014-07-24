<?php  if ( ! defined('_BASE_PATH_')) exit('No direct access allowed'); 
/*
 * Checked Image
 */

function is_image($mime) {

	$A_mime = array('image/jpg', 'image/jpeg', 'image/pjpg', 'image/pjpeg', 'image/png', 'image/gif', 'image/x-png');

	if (in_array($mime, $A_mime)) {
		return TRUE;
	}else {
		return FALSE;
	}
}

/**
 * 텍스트 일정한 길이로 자르기
 */
 
 function text_cut_utf8($str, $len, $tail = '...') {

	$str = strip_tags($str);
	$var = mb_strimwidth($str, 0, $len, "…", "UTF-8");
	return $var;	
}

function text_cut_with_tag($str, $len, $tail = '...') {

	$str = strip_tags($str, '<i><b>');
	$var = mb_strimwidth($str, 0, $len, "…", "UTF-8");
	return $var;
}

/**
* 변수의 구성요소를 리턴받는다.
*/
function getPrintr($var, $title = null)
{
    $dump = '';
    $dump .=  '<div align="left">';
    $dump .=  '<pre style="background-color:#000; color:#00ff00; padding:5px; font-size:14px;">';
    if( $title )
    {
        $dump .=  "<strong style='color:#fff'>{$title} :</strong> \n";
    }
    $dump .= print_r($var, TRUE);
    $dump .=  '</pre>';
    $dump .=  '</div>';
    $dump .=  '<br />';
    return $dump;
}

/**
 * 변수의 구성요소를 출력한다.
 */
function printr($var, $title = null)
{
    $dump = getPrintr($var, $title);
    echo $dump;
}

/**
 * 변수의 구성요소를 출력하고 멈춘다.
 */
function printr2($var, $title = null)
{
    printr($var, $title);
    exit;
}



function perform_curl_operation(& $remote_url) {
	$remote_contents = "";
	$empty_contents = "";

	// Initialize a cURL session and get a handle.
  	$curl_handle = curl_init();

  	// Do we have a cURL session?
  	if ($curl_handle) {
		// Set the required CURL options that we need.
	  	// Set the URL option.
	  	curl_setopt($curl_handle, CURLOPT_URL, $remote_url);
	  	// Set the HEADER option. We don't want the HTTP headers in the output.
	  	curl_setopt($curl_handle, CURLOPT_HEADER, false);
	  	// Set the FOLLOWLOCATION option. We will follow if location header is present.
	  	curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
	  	// Instead of using WRITEFUNCTION callbacks, we are going to receive the
	  	// remote contents as a return value for the curl_exec function.
	  	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
	  
	  	// Try to fetch the remote URL contents.
	  	// This function will block until the contents are received.
	  	$remote_contents = curl_exec($curl_handle);
	  	// Do the cleanup of CURL.
	  	curl_close($curl_handle);
	  
	  	// Check the CURL result now.
	  	if ($remote_contents != false) {
	  		return($remote_contents);
	  	} else {
	  		return($empty_contents);
	  	} // End of if ($remote_contents != false)  	
  	} else {
 		// Unable to initialize cURL.
 		// Without it, we can't do much here.
  		return($empty_contents);
  	} // End of if ($curl_handle)
} // End of function perform_curl_operation

/**
 * 알림 표시하고 뒤로가기 혹은 redirect
 */
function ErrorMsg($msg, $url = null) {
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	
	if (is_null($url)) { 
	    echo "
			<script type='text/javascript' charset='utf-8'>
			window.alert(\"$msg\");
			history.go(-1);
			</script>
		";
	    exit;
	}
	else {
	    echo "
			<script type='text/javascript' charset='utf-8'>
			window.alert(\"$msg\");
			window.location.href = '".$url."';
			</script>
		";
	}
}