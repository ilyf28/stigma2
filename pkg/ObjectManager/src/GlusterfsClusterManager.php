<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\Contracts\ObjectManager;
use Stigma\ObjectManager\Repositories\GlusterfsClusterRepository;

class GlusterfsClusterManager implements ObjectManager
{ 
    protected $repo;

    public function __construct(GlusterfsClusterRepository $repo)
    {
        $this->repo = $repo;
    }

    public function register($data)
    { 
        $ret = $this->repo->store($data);

        return $ret;
    }

    public function update($id, $data)
    {
        $ret = $this->repo->update($id, $data);

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
