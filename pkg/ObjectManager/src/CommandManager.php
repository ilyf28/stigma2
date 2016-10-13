<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\Contracts\ObjectManager;
use Stigma\ObjectManager\Repositories\CommandRepository;

class CommandManager implements ObjectManager
{
    protected $repo;

    public function __construct(CommandRepository $repo)
    {
        $this->repo = $repo;
    }

    private function filterData($data)
    {
        $storedData = [];

        $storedData['command_name'] = $data['command_name'];
        $storedData['command_line'] = $data['command_line'];

        return $storedData;
    }

    public function register($data)
    { 
        $storedData = $this->filterData($data);
        $ret = $this->repo->store($storedData);

        return $ret;
    }

    public function update($id,$data)
    {
        $storedData = $this->filterData($data);
        $ret = $this->repo->update($id,$storedData);

        return $ret;
    }

    public function getAllItems()
    {
        return $this->repo->getAll();
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function pluck($name)
    {
        $commandList = $this->getAllItems();

        $arr = [];

        foreach ($commandList as $command) {
            $arr[$command->{$name}] = $command->{$name};
        }

        return $arr;
    }
}
