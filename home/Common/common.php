<?php

function sendmail_sunchis_com($mailTo,$subject,$body,$AddAttachment){
	if(count($mailTo)==0){
		//	$this->ajaxReturn(0,"收件人不能为空！",0);
		return false;
	}
	error_reporting(E_STRICT);
	date_default_timezone_set("Asia/Shanghai");	//设定时区东八区
//	import("mail_phpmailer");
//	import("mail_smtp");
	require_once('class.phpmailer.php');
	include("class.smtp.php");
	$mail             = new PHPMailer(); 		//new一个PHPMailer对象出来
	$body             = eregi_replace("[\]",'',$body); //对邮件内容进行必要的过滤
	$mail->CharSet 	  = "UTF-8";				//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	//	$mail->IsSMTP();	 						// 设定使用SMTP服务
	//	$mail->SMTPDebug  = 1;                     	// 启用SMTP调试功能
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth   = true;                  	// 启用 SMTP 验证功能
	//$mail->SMTPSecure = "ssl";                // 安全协议
	$mail->Host       = "smtp.163.com";      	// SMTP 服务器
	$mail->Port       = 25;                   	// SMTP服务器的端口号
	$mail->Username   = "xnfy520_test@163.com";  			// SMTP服务器用户名
	$mail->Password   = "123456abc";        // SMTP服务器密码
	$mail->SetFrom('xnfy520_test@163.com', '老土网邮件');
	$mail->AddReplyTo("xnfy520_test@163.com","老土网邮件");
	$mail->Subject    = $subject;
	$mail->AltBody    = "老土网邮件"; // optional, comment out and test
	$mail->MsgHTML($body);

	foreach($mailTo as $k => $v){
		$mail->AddAddress($mailTo[$k][0], $mailTo[$k][1]);
	}

	if(count($AddAttachment) > 0){
		foreach($AddAttachment as $k => $AttachmentAddress){
			$mail->AddAttachment($AttachmentAddress);
		}
	}

	if(!$mail->Send()) {
		//	$this->ajaxReturn(0,"邮件发送出错：" . $mail->ErrorInfo,0);
		return false;
	}
	else {
		//	$this->ajaxReturn(0,"邮件发送成功！",1);
		return true;
	}
}

/**
 * 获取用户真实 IP
 *
 * @Author:
 * @Return: string
 */
function getIP()
{
	static $realip;
	if (isset($_SERVER)){
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$realip = $_SERVER["HTTP_CLIENT_IP"];
		} else {
			$realip = $_SERVER["REMOTE_ADDR"];
		}
	} else {
		if (getenv("HTTP_X_FORWARDED_FOR")){
			$realip = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("HTTP_CLIENT_IP")) {
			$realip = getenv("HTTP_CLIENT_IP");
		} else {
			$realip = getenv("REMOTE_ADDR");
		}
	}

	return $realip;
}

function getRemoteIP(){
	if( !empty( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ){
		$REMOTE_ADDR = $_SERVER["HTTP_X_FORWARDED_FOR"];
		$tmp_ip = explode( ",", $REMOTE_ADDR );
		$REMOTE_ADDR = $tmp_ip[0];
	}
	return empty( $REMOTE_ADDR ) ? ( $_SERVER["REMOTE_ADDR"] ) : ( $REMOTE_ADDR ) ;
}

function enstrhex($str,$key) {
	/* 开启加密算法/ */
	$td = mcrypt_module_open('twofish', '', 'ecb', '');
	/* 建立 IV，并检测 key 的长度 */
	$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
	$ks = mcrypt_enc_get_key_size($td);
	/* 生成 key */
	$keystr = substr(md5($key), 0, $ks);
	/* 初始化加密程序 */
	mcrypt_generic_init($td, $keystr, $iv);
	/* 加密, $encrypted 保存的是已经加密后的数据 */
	$encrypted = mcrypt_generic($td, $str);
	/* 检测解密句柄，并关闭模块 */
	mcrypt_module_close($td);
	/* 转化为16进制 */
	$hexdata = bin2hex($encrypted);
	//返回
	return $hexdata;
}

function destrhex($str,$key) {
	/* 开启加密算法/ */
	$td = mcrypt_module_open('twofish', '', 'ecb', '');
	/* 建立 IV，并检测 key 的长度 */
	$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
	$ks = mcrypt_enc_get_key_size($td);
	/* 生成 key */
	$keystr = substr(md5($key), 0, $ks);
	/* 初始化加密模块，用以解密 */
	mcrypt_generic_init($td, $keystr, $iv);
	/* 解密 */
	$encrypted = pack( "H*", $str);
	$decrypted = mdecrypt_generic($td, $encrypted);
	/* 检测解密句柄，并关闭模块 */
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);
	/* 返回原始字符串 */
	return $decrypted;
}

		/**
		 * 获取图片信息
		 * @param $image 图片地址
		 * @return array 返回图片宽度,高度,类型
		 */

		function GetImageInfo($image){
			$info = getimagesize($image);
			$imginfo['width'] = $info[0];
			$imginfo['height'] = $info[1];
			switch($info[2]){
				case 1:
					$imginfo['type'] = 'gif';
					break;
				case 2:
					$imginfo['type'] = 'jpg';
					break;
				case 3:
					$imginfo['type'] = 'png';
					break;
				default:
					$imginfo['type'] = 'null';
					break;
			}
			return $imginfo;
		}


		/**
		 * 获取文件大小
		 * @param $file 文件地址
		 * @return array 返回文件字节数,文件转换后的单位
		 */

		function GetFileSize($file){

			$unit = array();

			$unit['bytes'] = filesize($file);

			if ($unit['bytes'] >= 1073741824) {
				$unit['switchbytes'] = round($unit['bytes'] / 1073741824 * 100) / 100 . 'GB';
			} elseif ($unit['bytes'] >= 1048576) {
				$unit['switchbytes']  = round($unit['bytes'] / 1048576 * 100) / 100 . 'MB';
			} elseif ($unit['bytes'] >= 1024) {
				$unit['switchbytes']  = round($unit['bytes'] / 1024 * 100) / 100 . 'KB';
			} else {
				$unit['switchbytes']  = $unit['bytes'] . 'Bytes';
			}

			return $unit;

		}