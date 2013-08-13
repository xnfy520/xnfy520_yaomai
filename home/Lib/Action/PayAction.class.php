<?php

class PayAction extends CommonAction {

	function alipay_to_subscription(){

		if(isset($_GET['id']) && !empty($_GET['id'])){

			$VoteCommodity = D('VoteCommodity');
			$commodity_info = $VoteCommodity->relation(true)->where('enable=1')->find($_GET['id']);
			if(!$commodity_info || $commodity_info['expiration_date']<time()){
				$this->redirect('/Vote/schedule/id/'.$_GET['id']);
			}

		}else{
			$this->redirect('/Vote');
		}

		if($Userinfo = $this->checkLogin()){

			import('alipay_notify');

			import('alipay_submit');

			$alipay_config = C('ALIPAY_CONFIG_COMMODITY');

			$alipay_api = C('alipay_api');
			/**************************请求参数**************************/

			//支付类型
			$payment_type = "1";
			//必填，不能修改
			//服务器异步通知页面路径
			$notify_url = $alipay_api['notify_url'];
			//需http://格式的完整路径，不能加?id=123这类自定义参数

			//页面跳转同步通知页面路径
			$return_url = $alipay_api['return_url'];
			//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

			//卖家支付宝帐户
			$seller_email = $alipay_api['seller_email'];
			//必填

			//商户订单号
			$out_trade_no = $alipay_api['out_trade_no'];
			//商户网站订单系统中唯一订单号，必填

			//订单名称
			$subject = $alipay_api['subject'];
			//必填

			//付款金额
		//	$total_fee = $commodity_info['subscription'];
			$total_fee = '0.01';
			//必填

			//订单描述

			$body = $alipay_api['body'];
			//商品展示地址
			$show_url = $alipay_api['show_url'];
			//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

			//防钓鱼时间戳
			$anti_phishing_key = "";
			//若要使用请调用类文件submit中的query_timestamp函数

			//客户端的IP地址
			$exter_invoke_ip = "";
			//非局域网的外网IP地址，如：221.0.0.1


			/************************************************************/

	//构造要请求的参数数组，无需改动
			$parameter = array(
				"service" => "create_direct_pay_by_user",
				"partner" => trim($alipay_config['partner']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"seller_email"	=> $seller_email,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
			);

			$MemberOrder = M('MemberOrder');
			$order['uid'] = $Userinfo['id'];
			$order['username'] = $Userinfo['username'];
			$order['commodity_id'] = $_GET['id']; //预订商品ID
			$order['commodity_type'] = 4; //预订商品
			$order['commodity_data'] = json_encode($commodity_info);
			$order['pay_type'] = 1; //支付类型
			$order['total_fee'] = $total_fee; //充值金额倍率
			$order['out_trade_no'] = $out_trade_no;
			$order['create_date'] = time();
			if($MemberOrder->add($order)){
				//建立请求
				$alipaySubmit = new AlipaySubmit($alipay_config);

				$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
				echo $html_text;
			}else{
				$this->redirect('/Vote/schedule/id/'.$_GET['id']);
			}
		}else{
			$this->redirect('/Vote/schedule/id/'.$_GET['id']);
		}

	}

	function notify_url(){

				import('alipay_notify');
//计算得出通知验证结果
				$alipayNotify = new AlipayNotify(C('ALIPAY_CONFIG_COMMODITY'));

				$verify_result = $alipayNotify->verifyNotify();

				if($verify_result) {//验证成功
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//请在这里加上商户的业务逻辑程序代

					$MemberOrder = M('MemberOrder');

					//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

					//获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

					//商户订单号

					$out_trade_no = $_POST['out_trade_no'];

					//支付宝交易号

					$trade_no = $_POST['trade_no'];

					//交易状态
					$trade_status = $_POST['trade_status'];

					$MemberOrderInfo = $MemberOrder->where('out_trade_no='.$out_trade_no)->find();

					if($_POST['trade_status'] == 'TRADE_FINISHED') {

						//判断该笔订单是否在商户网站中已经做过处理
						//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
						//如果有做过处理，不执行商户的业务程序

						//注意：
						//该种交易状态只在两种情况下出现
						//1、开通了普通即时到账，买家付款成功后。
						//2、开通了高级即时到账，从该笔交易成功时间算起，过了签约时的可退款时限（如：三个月以内可退款、一年以内可退款等）后。

						//调试用，写文本函数记录程序运行情况是否正常
						//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
					}
					else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {

						$order['pay_date'] = time();
						$order['trade_status'] = 1;
						//判断该笔订单是否在商户网站中已经做过处理
						//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
						//如果有做过处理，不执行商户的业务程序

						//注意：
						//该种交易状态只在一种情况下出现——开通了高级即时到账，买家付款成功后。

						//调试用，写文本函数记录程序运行情况是否正常
						//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");

					}

					if($MemberOrderInfo && $_POST['trade_status'] == 'TRADE_SUCCESS'){

						$order['trade_no'] = $trade_no;
						$MemberOrder->where('out_trade_no='.$out_trade_no)->save($order);
						$commoditys = json_decode($MemberOrderInfo['commodity_data'],true);
						switch($MemberOrderInfo['commodity_type']){
							case 1: break;
							case 2: break;
							case 3: break;
							case 4:
								$VoteCommodity = M('VoteCommodity');
								$VoteCommodity->where('id='.$MemberOrderInfo['commodity_id'])->setInc('subscribe_volume');
							break;
						}

					}
					//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

					echo "success";		//请不要修改或删除

					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				}
				else {

					//验证失败
					echo "fail";

					//调试用，写文本函数记录程序运行情况是否正常
				//	logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}

		}

		function return_url(){
			$this->redirect('/Member/voteOrder');
			import('alipay_notify');
			//计算得出通知验证结果

			$alipayNotify = new AlipayNotify(C('ALIPAY_CONFIG_COMMODITY'));

			$verify_result = $alipayNotify->verifyReturn();

			if($verify_result) {//验证成功
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//请在这里加上商户的业务逻辑程序代码

				//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
				//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

				//商户订单号

				$out_trade_no = $_GET['out_trade_no'];

				//支付宝交易号

				$trade_no = $_GET['trade_no'];

				//交易状态
				$trade_status = $_GET['trade_status'];


				if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
					//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
				}
				else {
					echo "trade_status=".$_GET['trade_status'];
				}

			//	echo "验证成功<br />";

				//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			}
			else {
				//验证失败
				//如要调试，请看alipay_notify.php页面的verifyReturn函数
			//	echo "验证失败";
			}
		}

}
