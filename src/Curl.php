<?php
namespace WebTool;

/**
 * CURL相关操作
 * X-Wolf
 * 2019-1-27		
 */
class Curl
{
	private $ch = null; 

	// 默认配置
	private $default = [
		CURLOPT_HEADER 			=> false,
        CURLOPT_RETURNTRANSFER 	=> true,
        CURLOPT_TIMEOUT			=> 10,
        CURLOPT_CONNECTTIMEOUT  => 30
	];

	/**
	 * HTTP请求
	 * @param  string $url    请求地址
	 * @param  string $method 请求方式(get/post)
	 * @param  array  $data   数据
	 * @param  array  $params 参数
	 * @return array          结果
	 */
	static function http($url,$method,$data,$params=[])
	{
		$methods = ['post','get'];
		if( in_array($method,$methods,true) ){
			$methodName = __METHOD__ . ucfirst($method);
			return self::$methodName($url,$data,$params);
		}
		return '请求方式暂不支持:' . $method;
	}
	/**
	 * post请求
	 * @param  string $url    请求地址
	 * @param  array  $data   数据
	 * @param  array  $params 参数
	 * @return array          返回值[结果数据,错误码]
	 */
	static function httpPost($url,$data,$params=[])
	{
		self::init();
		$params[CURLOPT_URL]  = $url;
		$params[CURLOPT_POST] = true;
		if($data){
			$params[CURLOPT_POSTFIELDS] = is_array($data) ? http_build_query($data) : $data;
		}
		
		$options = array_merge($this->default,$params);
		return self::response($options);
	}

	/**
	 * get请求
	 * @param  string $url    请求地址
	 * @param  array  $data   数据
	 * @param  array  $params 参数
	 * @return mixed          结果
	 */
	static function httpGet($url,$data,$params=[])
	{
		self::init();

		$url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($params);
		$params[CURLOPT_URL] = $curl;
		$options = array_merge($this->default,$params);
		return self::response($options);
	}

	// 初始化
	private static function init()
	{
		$this->ch = curl_init();
	}

	// 响应
	private static function response($options)
	{
		curl_setopt_array($this->ch,$options);
		$result   = curl_exec($this->ch);
		$httpCode = curl_getinfo($this->ch,CURLINFO_HTTP_CODE);
		$errno    = curl_errno($this->ch);
		if($errno || $httpCode < 200 || $httpCode >= 300){
			return [null,$errno,curl_error($this->ch),$httpCode];

		}
		return [$result,null];
	}

}
