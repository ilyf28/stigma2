<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\Contracts\ObjectManager;
use Stigma\ObjectManager\Repositories\ContactgroupRepository;

class ContactgroupManager implements ObjectManager
{ 
    protected $repo;

    public function __construct(ContactgroupRepository $repo)
    {
        $this->repo = $repo;
    }

    private function filterData($data)
    {
        $storedData = [];

        $storedData['contactgroup_name'] = $data['contactgroup_name'];
        $storedData['alias'] = $data['alias'];
        $storedData['data'] = json_encode($data['data']);

        return $storedData;
    }

    public function register($data)
    { 
        $storedData = $this->filterData($data);
        $ret = $this->repo->store($storedData);

        return $ret;
    }

    public function update($id, $data)
    {
        $storedData = $this->filterData($data);
        $ret = $this->repo->update($id, $storedData);

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

}
