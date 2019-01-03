<?php 
namespace WebTool;
/**
 * 文件相关处理工具
 * X-Wolf
 * 2018-8-29 
 */
class File
{
	/**
     * 获取二进制流的文件类型
     * @param  String $stream 二进制流
     * @return String $type   文件类型
     */
    function getStreamType($stream)
    {
        if( empty($stream) ) return;

        $bin = substr($stream, 0,2);
        $code = @unpack('C2chars', $bin); //将二进制转化为十进制
        $code = intval($code['chars1'].$code['chars2']);

        $map = [
            255216  =>  'jpg',
            13780   =>  'png',
            8297    =>  'rar',
            8273    =>  'wav',
            7798    =>  'exe',
            7784    =>  'midi',
            7368    =>  'mp3',
            7173    =>  'gif',
            6677    =>  'bmp',
            0       =>  'mp4',
        ];

        return array_key_exists($code, $map) ? $map[$code] : 'unknow';
    }


}
