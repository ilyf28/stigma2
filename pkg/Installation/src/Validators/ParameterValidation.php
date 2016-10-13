<?php
namespace Stigma\Installation\Validators ;

use Stigma\Installation\Exceptions\InvalidParameterException ; 

abstract class ParameterValidation
{
    protected $validatorFactory ;
    protected $rules ;

    public function passes($data)
    { 
        $validator = $this->validatorFactory->make($data,$this->rules);
        if($validator->fails()) {
            throw new InvalidParameterException;
        }

        return true;
    } 
}
