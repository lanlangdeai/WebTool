<?php
namespace WebTool;
/**
 * 数组相关操作
 * X-Wolf
 * 2019-1-3
 */
class Arr
{

	//将对象转成数组
	static function objectToArray(object $object)
	{
		if(!is_array($object) && !is_object($object)){
			return $object;
		}
		if( is_object($object) ){
			$object = get_object_vars($object);
		}
		return array_map(['Arr','objectToArray'],$object);
	}

	//计算数组总和(支持多维)
	static function arraySum(array $array)
	{
		$total = 0;
		foreach(new recursiveIteratorIterator( new recuriveArrayIterator($array) ) as $num){
			$total += $num;
		}
		return $total;
	}

}