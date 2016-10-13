<?php
namespace Stigma\ObjectManager\Contracts;

interface ObjectManager
{
    public function register($data);
    public function update($id, $data);
    public function getAllItems();
    public function find($id);
    public function delete($id);
}
