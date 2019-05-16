<?php  
namespace WebTool;
/**
 * 正则
 * X-Wolf
 * 2019-5-16
 */
class Preg
{
	// 获取子域名
	static function subDomain(string $domain):string
	{
		$res = preg_match('/(.*\.)?\w+\.\w+$/', $domain, $matches);
		return isset($res[1]) ? trim($res[1],'.') : '';
	}
}


