<?php
namespace Stigma\Installation\Validators;

use Illuminate\Contracts\Validation\Factory ; 
use Stigma\Installation\Contracts\ValidationInterface ;
use Stigma\Installation\Validators\ParameterValidation ;

class GrafanaParameterValidation extends ParameterValidation implements ValidationInterface
{ 
    protected $validatorFactory ;
    protected $rules ;

    public function __construct(Factory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory ;
        $this->rules = [
            'host' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    } 
}
