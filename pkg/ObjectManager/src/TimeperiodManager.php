<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\Contracts\ObjectManager;
use Stigma\ObjectManager\Repositories\TimeperiodRepository;

class TimeperiodManager implements ObjectManager
{ 
    protected $repo;

    public function __construct(TimeperiodRepository $repo)
    {
        $this->repo = $repo;
    }

    private function filterData($data)
    {
        $storedData = [];

        $storedData['timeperiod_name'] = $data['timeperiod_name'];
        $storedData['alias'] = $data['alias'];
        $storedData['template_name'] = $data['template_name'];
        $storedData['is_template'] = $data['is_template'];
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

    public function getAllTemplates()
    {
        $ret = $this->repo->getAll()->filter(function($item){
            if($item->is_template == 'Y'){
                return $item;
            }
        });

        return $ret;
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
        $timeperiodList = $this->getAllItems();

        $arr = [];

        foreach ($timeperiodList as $timeperiod) {
            $arr[$timeperiod->{$name}] = $timeperiod->{$name};
        }

        return $arr;
    }

}
