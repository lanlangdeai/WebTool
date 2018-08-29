<?php 
namespace WebTool;
/**
 * 文件相关处理工具
 * @Author    X-Wolf
 * @Date      2018-8-29 
 */
class FileTool
{
	// 验证文件是否存在
	public function checkExist($file)
	{
		return file_exists($file);
	}
}
