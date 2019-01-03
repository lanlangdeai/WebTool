<?php 
namespace WebTool;
/**
 * 文件相关处理工具
 * X-Wolf
 * 2018-8-29 
 */
class File
{
	// 验证文件是否存在
	static function checkExist($file)
	{
		return file_exists($file);
	}
}
