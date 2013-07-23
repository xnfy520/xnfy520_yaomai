<?php

function getArea($areas){
	if(!empty($areas)){
		import("ORG.Net.IpLocation");// 导入IpLocation类

		$Ip = new IpLocation("UTFWry.dat"); // 实例化类 参数表示IP地址库文件

		$area = $Ip->getlocation($areas); // 获取某个IP地址所在的位置

//		import("lib_splitword_full");

//		$sp = new SplitWord();
//
//		$v = $sp->SplitRMM($area['country']);
//
//		$sp->Clear();

		if($area){
			return $area['country'];
		}else{
			return '未知地址';
		}

	}else{
		return '异常操作';
	}
}


/*
* 计算星座的函数 string get_zodiac(string month, string day)
* 输入：月份，日期
* 输出：星座名称或者错误信息
*/

function get_zodiac($month, $day)
{
// 检查参数有效性
	if ($month < 1 || $month > 12 || $day < 1 || $day > 31)
		return (false);
// 星座名称以及开始日期
	$signs = array(
		array( "20" => "宝瓶座"),
		array( "19" => "双鱼座"),
		array( "21" => "白羊座"),
		array( "20" => "金牛座"),
		array( "21" => "双子座"),
		array( "22" => "巨蟹座"),
		array( "23" => "狮子座"),
		array( "23" => "处女座"),
		array( "23" => "天秤座"),
		array( "24" => "天蝎座"),
		array( "22" => "射手座"),
		array( "22" => "摩羯座")
	);
	list($sign_start, $sign_name) = each($signs[(int)$month-1]);
	if ($day < $sign_start)
		list($sign_start, $sign_name) = each($signs[($month -2 < 0) ? $month = 11: $month -= 2]);
	return $sign_name;
}//函数结束


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