<?php
namespace Stigma\Database\Repository\Contracts ;

interface RepositoryInterface
{
    public function find($id) ;
    public function store(array $data) ;
    public function update($id,array $data) ;
    public function delete($id) ;
    public function findBy($column, $value, $operator) ;
}
