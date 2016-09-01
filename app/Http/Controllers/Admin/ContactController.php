<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\ObjectManager\CommandManager;
use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\TimeperiodManager;

class ContactController extends Controller {

    protected $commandManager;
    protected $contactManager;
    protected $timeperiodManager;

    public function __construct(
        CommandManager $commandManager, 
        ContactManager $contactManager,
        TimeperiodManager $timeperiodManager)
    {
        $this->commandManager = $commandManager;
        $this->contactManager = $contactManager;
        $this->timeperiodManager = $timeperiodManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->contactManager->getAllItems();
        return view('admin.contact.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->showForm();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $param = $this->processFormData($request);

        $this->contactManager->register($param);

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->showForm($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->showForm($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $param = $this->processFormData($request);

        $this->contactManager->update($id, $param);

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->contactManager->delete($id);
    }

    private function processFormData(Request $request)
    {
        $contactTmpl = config('contact_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $contactTmpl) && ($value != '')) {
                $param[$key] = $value;
            }
        }

        $result['contact_name'] = $request->get('contact_name');
        $result['alias'] = $request->get('alias');
        $result['is_template'] = $request->get('is_template');

        if ($request->get('is_template') == 'Y') {
            $result['template_name'] = $request->get('contact_name');
            
            unset($param['contact_name']);
            $param['name'] = $request->get('contact_name');
        } else {
            $result['template_name'] = '';
        }

        $templates = $request->get('contact_template');

        if(count($templates) > 0){
            $param['use'] = implode(',', $templates);
        }

        if (strcmp($request->get('host_notification_commands'), 'none') == 0) {
            unset($param['host_notification_commands']);
        } else {
            $param['host_notification_commands'] = $request->get('host_notification_commands').'!'.$request->get('host_notification_commandsArg');
        }
        if (strcmp($request->get('service_notification_commands'), 'none') == 0) {
            unset($param['service_notification_commands']);
        } else {
            $param['service_notification_commands'] = $request->get('service_notification_commands').'!'.$request->get('service_notification_commandsArg');
        }
        unset($param['host_notification_commandsArg']);
        unset($param['service_notification_commandsArg']);

        $result['data'] = $param;

        return $result;
    } 

    private function showForm($id=null)
    {
        $hostCommand = 'none';
        $hostCommandArg = '';
        $serviceCommand = 'none';
        $serviceCommandArg = '';
        
        if ($id > 0) {
            $contact = $this->contactManager->find($id);
            $contactJsonData = json_decode($contact->data);
            if (isset($contactJsonData->host_notification_commands)) {
                $splited = explode('!', $contactJsonData->host_notification_commands, 2);
                $hostCommand = $splited[0];
                if (count($splited) > 1) $hostCommandArg = $splited[1];
            }
            if (isset($contactJsonData->service_notification_commands)) {
                $splited = explode('!', $contactJsonData->service_notification_commands, 2);
                $serviceCommand = $splited[0];
                if (count($splited) > 1) $serviceCommandArg = $splited[1];
            }
        }

        $contactTmpl = config('contact_tmpl');

        $contactTemplateCollection = $this->contactManager->getAllTemplates();

        $commandList = $this->commandManager->pluck('command_name');
        $timeperiodList =$this->timeperiodManager->pluck('timeperiod_name');

        if (isset($contact)) {
            return view('admin.contact.edit',
                compact('contactTmpl', 'contact', 'contactJsonData', 'contactTemplateCollection', 'hostCommand', 'hostCommandArg', 'serviceCommand', 'serviceCommandArg', 'commandList', 'timeperiodList'));
        } else {
            return view('admin.contact.create',
                compact('contactTmpl', 'contactTemplateCollection', 'hostCommand', 'hostCommandArg', 'serviceCommand', 'serviceCommandArg', 'commandList', 'timeperiodList'));
        }
    }

}
