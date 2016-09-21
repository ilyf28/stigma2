<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\HostManager;
use Stigma\ObjectManager\HostgroupManager;
use Stigma\ObjectManager\ServiceManager;
use Stigma\ObjectManager\ServicegroupManager;
use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\ContactgroupManager;
use Stigma\ObjectManager\CommandManager;
use Stigma\ObjectManager\TimeperiodManager;

class Builder
{
    protected $hostManager;
    protected $hostgroupManager;
    protected $serviceManager;
    protected $servicegroupManager;
    protected $contactManager;
    protected $contactgroupManager;
    protected $commandManager;
    protected $timeperiodManager;

    public function __construct(
        HostManager $hostManager, 
        HostgroupManager $hostgroupManager, 
        ServiceManager $serviceManager, 
        ServicegroupManager $servicegroupManager, 
        ContactManager $contactManager,
        ContactgroupManager $contactgroupManager,
        CommandManager $commandManager,
        TimeperiodManager $timeperiodManager)
    { 
        $this->hostManager = $hostManager;
        $this->hostgroupManager = $hostgroupManager;
        $this->serviceManager = $serviceManager;
        $this->servicegroupManager = $servicegroupManager;
        $this->contactManager = $contactManager;
        $this->contactgroupManager = $contactgroupManager;
        $this->commandManager = $commandManager;
        $this->timeperiodManager = $timeperiodManager;
    }

    public function buildForHost()
    {
        $hostCollection = $this->hostManager->getAllItems();
        $hostgroupCollection = $this->hostgroupManager->getAllItems();

        $payload = [];

        foreach($hostCollection as $host)
        {
            $pack = new \stdClass;
            $data = json_decode($host->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'host';

            $payload[] = $pack;
        }
        foreach($hostgroupCollection as $hostgroup)
        {
            $pack = new \stdClass;
            $data = json_decode($hostgroup->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'hostgroup';

            $payload[] = $pack;
        }

        return $payload;
    } 


    public function buildForService()
    {
        $serviceCollection = $this->serviceManager->getAllItems();
        $servicegroupCollection = $this->servicegroupManager->getAllItems();

        $payload = []; 

        foreach($serviceCollection as $service)
        {
            $pack = new \stdClass;
            $data = json_decode($service->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'service';

            $payload[] = $pack;
        }
        foreach($servicegroupCollection as $servicegroup)
        {
            $pack = new \stdClass;
            $data = json_decode($servicegroup->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'servicegroup';

            $payload[] = $pack;
        }

        return $payload;
    }

    public function buildForContact()
    {
        $contactCollection = $this->contactManager->getAllItems();
        $contactgroupCollection = $this->contactgroupManager->getAllItems();

        $payload = []; 

        foreach($contactCollection as $contact)
        {
            $pack = new \stdClass;
            $data = json_decode($contact->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'contact';

            $payload[] = $pack;
        }
        foreach($contactgroupCollection as $contactgroup)
        {
            $pack = new \stdClass;
            $data = json_decode($contactgroup->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'contactgroup';

            $payload[] = $pack;
        }

        return $payload;
    }

    public function buildForCommand()
    {
        $commandCollection = $this->commandManager->getAllItems();

        $payload = []; 

        foreach($commandCollection as $command)
        {
            $pack = new \stdClass;

            $pack->details = [
                'command_name' => $command->command_name,
                'command_line' => $command->command_line
            ];
            $pack->type = 'command';

            $payload[] = $pack;
        }

        return $payload;
    }

    public function buildForTimeperiod()
    {
        $timeperiodCollection = $this->timeperiodManager->getAllItems();

        $payload = []; 

        foreach($timeperiodCollection as $timeperiod)
        {
            $pack = new \stdClass;
            $data = json_decode($timeperiod->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->type = 'timeperiod';

            $payload[] = $pack;
        }

        return $payload;
    }
}
