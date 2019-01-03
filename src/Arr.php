<?php
namespace WebTool;
/**
 * 数组相关操作
 * X-Wolf
 * 2019-1-3
 */
class Arr
{
	// 是否是多维数组(验证)
	static function isMultidimensionalArray(Array $array)
	{
		return count($array,1) === count($array);
	}

	
}