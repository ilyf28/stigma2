<?php 
namespace Stigma\Database\Repository;

use Stigma\Database\Repository\Contracts\ModelFactoryInterface ;

class ModelFactory implements ModelFactoryInterface
{
    public function create($model,array $data =[])
    {
        $class = '\\'.ltrim($model, '\\');

        return new $class($data); 
    }
}
