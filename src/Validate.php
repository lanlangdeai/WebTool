<?php
namespace WebTool;
/**
 * 数据验证
 */
class Validate
{
	// -------------------------   环境验证   ------------------------

	static function isWechat()
	{ 
	    return strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false;
    }

	// -------------------------   Session验证   ------------------------

	// session是否启用(验证)
	static function isActived()
	{
		if( !Common::isCli() ){
			if( version_compare(phpversion(), '5.4.0', '>=') ){
				return session_status() === PHP_SESSION_ACTIVE;
			}else{
				return !empty( session_id() );
			}
		}
		return false;
	}

	// -------------------------   HTTP验证   ------------------------

	// 验证是否是HTTPS协议
	static function isHttps()
	{
		return ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) 
			|| ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' );
	}

	// -------------------------   图片验证   ------------------------

	// 是否是GIF图
	static function isGif($img)
	{
		$handle = fopen($img,'rb');
	    $img = fread($handle,'1024');
	    fclose($handle);
	    return strpos($img,chr(0x21).chr(0xff).chr(0x0b).'NETSCAPE2.0') !== FALSE;
	}

	// -------------------------   系统验证   ------------------------

	// 是否是CLI环境(验证)
	static function isCli()
	{
		return PHP_SAPI == 'cli';
	}

	// 是否是Windows环境1
	static function isWin1()
	{
		return strncasecmp(PHP_OS,'win',3) === 0;
	}
	// 是否是Windows环境2
	static function isWin2()
	{
		return strncasecmp(php_uname('s'),'win',3) === 0;
	}
	// 是否是Windows环境3
	static function isWin3()
	{
		return DIRECTORY_SEPARATOR === chr(92);
	}
	// 是否是Windows环境4
	static function isWin4()
	{
		return PATH_SEPARATOR === chr(59);
	}
	// 是否是Windows环境5
	static function isWin5()
	{
		return strcasecmp(PHP_SHLIB_SUFFIX,'dll') === 0;
	}

	// -------------------------   数组验证   ------------------------

	// 是否是多维数组
	static function isMultidimensionalArray(Array $array)
	{
		return count($array,1) === count($array);
	}

	// -------------------------   数组验证   ------------------------
	
	// 是否存在中文字符
	static function isExistChinese($char)
	{
		return preg_match("/[\x{4e00}-\x{9fa5}]+/u",$char);
	}

}