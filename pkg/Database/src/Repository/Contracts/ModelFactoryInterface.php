<?php
namespace Stigma\Database\Repository\Contracts ;

interface ModelFactoryInterface
{
    public function create($model,array $data = []) ;
}
