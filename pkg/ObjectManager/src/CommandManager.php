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

    public function register($data)
    { 
        $storedData = [];

        // $storedData['service_name'] = $data['service_name']   ;
        // $storedData['service_description'] =  $data['service_name']     ;
        // $storedData['is_template'] = $data['is_template']   ;
        // $storedData['is_immutable'] = $data['is_immutable']   ;
        // $storedData['template_ids'] = array_key_exists('template_ids', $data) ? $data['template_ids'] : ''  ;
        // $storedData['command_id'] = array_key_exists('command_id', $data) ? $data['command_id'] : ''  ;
        // $storedData['command_argument'] = array_key_exists('command_argument', $data) ? $data['command_argument'] : ''  ; 
        // $storedData['data'] = json_encode($data) ; 

        $ret = $this->repo->store($storedData);

        return $ret;
    }

    public function update($id,$data)
    {
        $storedData = [];

        // $storedData['service_name'] = $data['service_name']   ;
        // $storedData['service_description'] =  $data['service_name']     ;
        // $storedData['is_template'] = $data['is_template']   ;
        // $storedData['is_immutable'] = $data['is_immutable']   ;
        // $storedData['template_ids'] = array_key_exists('template_ids', $data) ? $data['template_ids'] : ''  ;
        // $storedData['command_id'] = array_key_exists('command_id', $data) ? $data['command_id'] : ''  ;
        // $storedData['command_argument'] = array_key_exists('command_argument', $data) ? $data['command_argument'] : ''  ; 
        // $storedData['data'] = json_encode($data) ; 

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
}
