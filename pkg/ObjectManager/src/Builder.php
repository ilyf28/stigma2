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
        $hostCollection = $this->hostManager->getAllItems();

        $fields = config('service_tmpl'); 
        $payload = []; 

        foreach($hostCollection as $host){
            if($host->is_immutable == 'N'){
                if($host->service_ids != ''){
                    $serviceIds = explode(',',$host->service_ids); 
                    foreach($serviceIds  as $serviceId){
                        $service = $this->serviceManager->find($serviceId) ;
                        if($service){

                            $jsonData = json_decode($service->data);
                            $arrayData = (array)$jsonData;
                            $newDetails = array();

                            foreach($fields as $key => $field) {
                                if(array_key_exists($key,$arrayData)){ 
                                    $newDetails[$key] = $arrayData[$key];
                                }
                            } 

                            $newDetails['service_description'] = $service->service_name;
                            $newDetails['host_name'] = $host->host_name;
                            $newDetails['_graphiteprefix'] = 'service';


                            if($service->template_ids != ''){ //템플릿 상속을 사용 할 경우 
                                $templateIds = explode(',',$service->template_ids); 
                                $templates = []; 

                                foreach($templateIds as $templateId){
                                    $templateService = $this->serviceManager->find($templateId); 
                                    if($templateService->getKey() > 0){
                                        $templates[] = $templateService->service_name;
                                    }
                                }

                                $newDetails['use'] = implode(',', $templates);

                            }

                            if($service->command_id > 0){ // 커맨드가 존재할 경우
                                $command = $this->commandManager->find($service->command_id) ;
                                $newDetails['check_command'] = $command->command_name.$service->command_argument;
                            } 


                            $serviceObj = new \stdClass;
                            $serviceObj->service_name = $service->service_name;
                            $serviceObj->is_template = $service->is_template;
                            $serviceObj->details = $newDetails;

                            $payload[] = $serviceObj;
                        }
                    }
                }
            }
        }

        return $payload;
    }

    public function buildForContact()
    {
        //
    }

    public function buildForCommand()
    {
        //
    }

    public function buildForTimeperiod()
    {
        //
    }
}
