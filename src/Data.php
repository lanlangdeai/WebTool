<?php 
namespace WebTool;
/**
 * 数据相关操作
 */
class Data
{

	/**
	 * 导出CSV文件
	 * @param  string 文件名称
	 * @param  Array  数据头
	 * @param  Array  数据体
	 */
	static function exportCsv1($fileName, $titleArr=[], $dataArr=[])
	{
		ini_set('memory_limit','128M');
        ini_set('max_execution_time',0);
        ob_end_clean();
        ob_start();
        header("Content-Type: text/csv");
        header("Content-Disposition:filename=".$filename);
        $fp=fopen('php://output','w');
        fwrite($fp, chr(0xEF).chr(0xBB).chr(0xBF));//防止乱码(比如微信昵称)
        fputcsv($fp,$tileArray);
        $index = 0;
        foreach ($dataArray as $item) {
            if($index==1000){
                $index=0;
                ob_flush();
                flush();
            }
            $index++;
            fputcsv($fp,$item);
        }
 
        ob_flush();
        flush();
        ob_end_clean();
	}
	static function exportCsv2($fileName, $titleArr=[], $dataArr=[])
	{
		ini_set('memory_limit', '128M');  
		ini_set('max_execution_time',0); 
		  
		$output = fopen($fileName, 'w'); 
		//add BOM to fix UTF-8 in Excel
    	fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ) );
		//告诉浏览器这个是一个csv文件  
		header("Content-Type: application/csv;charset=utf-8");  
		header("Content-Disposition: attachment; filename={$filename}");  
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Expires:0');
		header('Pragma:public');
		 
		fputcsv($output, $titleArr); //输出表头    
		 
		foreach ($dataArr as $v) { //输出每一行数据到文件中   
		    fputcsv($output, array_values($v));  
		} 

		fclose($output);
	}
}