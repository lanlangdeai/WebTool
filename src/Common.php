<?php
namespace WebTool;
/**
 * 常用方法
 * X-Wolf
 * 2019-1-3
 */
class Common
{
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
}