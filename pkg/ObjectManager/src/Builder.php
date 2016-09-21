<?php
namespace Stigma\ObjectManager;

use Stigma\ObjectManager\HostManager;
use Stigma\ObjectManager\ServiceManager;
use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\CommandManager;
use Stigma\ObjectManager\TimeperiodManager;

class Builder
{
    protected $hostManager;
    protected $serviceManager;
    protected $contactManager;
    protected $commandManager;
    protected $timeperiodManager;

    public function __construct(
        HostManager $hostManager, 
        ServiceManager $serviceManager, 
        ContactManager $contactManager,
        CommandManager $commandManager,
        TimeperiodManager $timeperiodManager)
    { 
        $this->hostManager = $hostManager;
        $this->serviceManager = $serviceManager;
        $this->contactManager = $contactManager;
        $this->commandManager = $commandManager;
        $this->timeperiodManager = $timeperiodManager;
    }

    public function buildForHost()
    {
        $hostCollection = $this->hostManager->getAllItems();

        $payload = [];

        foreach($hostCollection as $host)
        {
            $pack = new \stdClass;
            $data = json_decode($host->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->host_name = $host->host_name;
            $pack->is_template = $host->is_template;

            $payload[] = $pack;
        }

        return $payload;
    } 


    public function buildForService()
    {
        $serviceCollection = $this->serviceManager->getAllItems();

        $payload = []; 

        foreach($serviceCollection as $service)
        {
            $pack = new \stdClass;
            $data = json_decode($service->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->host_name = $service->host_name;
            $pack->is_template = $service->is_template;

            $payload[] = $pack;
        }

        return $payload;
    }

    public function buildForContact()
    {
        $contactCollection = $this->contactManager->getAllItems();

        $payload = []; 

        foreach($contactCollection as $contact)
        {
            $pack = new \stdClass;
            $data = json_decode($contact->data);
            $details  = (array) $data; 
            
            $pack->details = $details;
            $pack->contact_name = $contact->contact_name;
            $pack->is_template = $contact->is_template;

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
            $pack->command_name = $command->command_name;
            $pack->command_line = $command->command_line;

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
            $pack->timeperiod_name = $timeperiod->timeperiod_name;
            $pack->is_template = $timeperiod->is_template;

            $payload[] = $pack;
        }

        return $payload;
    }
}
