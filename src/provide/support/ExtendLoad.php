<?php
/**
 * Created by PhpStorm.
 * User: 杨帆
 * Date: 2021/2/4
 * Time: 11:03
 */

namespace Fy\Illuminate\Support;

use Fy\Illuminate\Validation\Factory;

class ExtendLoad
{
    public static function addExtend(Factory $factory)
    {
        if (($extendFilesArray = static::dirExistFile(static::getDirExist())) === false) {
            return false;
        }

        $registry=static::getRegistry($extendFilesArray);

        foreach ($registry as $item)
        {
            $rules = $item['object'];
            $factory->replacer($item['name'], function ($message, $attribute, $rule, $parameters) use ($rules) {
                return $rules->message();
            });

            $factory->extend($item['name'],function ($attribute, $value, $parameters, $validator) use ($rules){
                return $rules->passes($attribute, $value);
            });
        }
    }


    private static function dirExistFile($path)
    {
        if (!is_dir($path)) {
            return false;
        }

        $files = scandir($path);

        // 删除  "." 和 ".."
        unset($files[0]);
        unset($files[1]);

        // 判断是否为空
        if (!empty($files[2])) {
            return array_values($files);
        }

        return false;
    }

    private static function getDirExist()
    {
        return dirname(dirname(dirname(dirname(__DIR__)))).DIRECTORY_SEPARATOR.'lumen-validation-extend'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Rules';
    }

    /**
     * 转换字符串的格式到下划线的形式
     *
     * CodeType  ->   code_type
     */
    private static function transferClassNameToUnderlineType($string)
    {
        $lowerString=strtolower($string);
        $lowerStringArray=explode('', $lowerString);
        $s=lcfirst($string);
        $lcfirstArray=explode('', $s);
        $finalStr='';
        foreach ($lcfirstArray as $k=>$v){
            if($v===$lowerStringArray[$k]){
                $finalStr.=$v;
            }else{
                $finalStr.=$lowerStringArray[$k];
            }
        }
        return $finalStr;
    }

    private static function getRegistry($extendFilesArray)
    {
        $registry=[];
        foreach ($extendFilesArray as $k=>$fileNameAll){
            if(empty($fileName=pathinfo($fileNameAll,PATHINFO_FILENAME))){
                throw new \Exception('解析文件名称出错:'.$fileNameAll);
            }

            require_once static::getDirExist().DIRECTORY_SEPARATOR.$fileNameAll;

            $registry[]=[
                'name'=>static::transferClassNameToUnderlineType($fileName),
                'object'=> new $fileNameAll,
            ];

        }
        return $registry;
    }
}
