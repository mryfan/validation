<?php
namespace LumenV;

use Fy\Illuminate\Filesystem\Filesystem;
use Fy\Illuminate\Translation\FileLoader;
use Fy\Illuminate\Translation\Translator;
use Fy\Illuminate\Validation\Factory;
use Fy\Illuminate\Support\ExtendLoad;

class Validation
{
    private static function getInstance()
    {
        static $factory = NULL;

        if ($factory === NULL) {
            $testTranslationPath = __DIR__.'/lang';

            $testTranslationLocale = 'zn';

            $translationFileLoader = new FileLoader(new Filesystem, $testTranslationPath);

            $translator = new Translator($translationFileLoader, $testTranslationLocale);

            $factory = new Factory($translator);
            
            ExtendLoad::addExtend($factory);

        }

        return $factory;

    }
    
    /**
     * @param          $data
     * @param          $rules
     * @param   array  $messages
     * @param   array  $attributes
     *
     *   返回验证器类  让使用者自定义处理 错误
     */
    public static function cValidate($data, $rules, $messages = [], $attributes = [])
    {
        return static::getInstance()->make($data, $rules, $messages, $attributes);
    }

    public static function validate($data, $rules, $messages = [], $attributes = [])
    {
        $validator = static::getInstance()->make($data, $rules, $messages, $attributes);
        if ($validator->fails()) {
            $errorMessageArray = $validator->errors()->getMessages();
            throw new \Exception(json_encode($errorMessageArray,JSON_UNESCAPED_UNICODE +JSON_UNESCAPED_SLASHES ));
        }

        return $validator->getData();
    }
}