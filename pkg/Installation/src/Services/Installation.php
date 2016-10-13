<?php
namespace Stigma\Installation\Services ;

abstract class Installation
{
    public function validate(array $value)
    { 
        foreach($this->validators as $validation) { 
            if(!$validation->passes($value)) {
                return false; // or throw exception
            }
        }
        return true ;
    }
}
