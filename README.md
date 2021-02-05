# validation
Laravel Validation 完美移植版
根据pack_composer 包生成的laravel 验证器移植版




#usage

use LumenV\Validation;

	$data      = [
            'file' => 'file',
            'data' => 'data',
        ];
        $rules     = [
            'file' => 'int|min:10|bail',
            'data' => 'int',
        ];
	$validator = Validation::cValidate($data, $rules);
	if ($validator->fails()) {
            var_dump($validator->errors()->messages());
    }

        $validator->getData();
