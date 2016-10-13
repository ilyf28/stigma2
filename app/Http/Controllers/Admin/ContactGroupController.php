<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\ContactgroupManager;

class ContactgroupController extends Controller {

    protected $contactManager;
    protected $contactgroupManager;

    public function __construct(ContactManager $contactManager, ContactgroupManager $contactgroupManager)
    {
        $this->contactManager = $contactManager;
        $this->contactgroupManager = $contactgroupManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->contactgroupManager->getAllItems();
        return view('admin.contactgroup.index', compact('items'));
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

        $this->contactgroupManager->register($param);

        return redirect()->route('admin.contactgroups.index');
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
        
        $this->contactgroupManager->update($id,$param);

        return redirect()->route('admin.contactgroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->contactgroupManager->delete($id);
    }

    private function processFormData(Request $request)
    {
        $contactgroupTmpl = config('contactgroup_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $contactgroupTmpl) && ($value != '')) {
                $param[$key] = $value;
            }
        }

        $result['contactgroup_name'] = $request->get('contactgroup_name');
        $result['alias'] = $request->get('alias');

        $contactMembers = $request->get('contactMembers');
        $contactgroupMembers = $request->get('contactgroupMembers');

        if(count($contactMembers) > 0){
            $param['members'] = implode(',', $contactMembers);
        }
        if(count($contactgroupMembers) > 0){
            $param['contactgroup_members'] = implode(',', $contactgroupMembers);
        }

        $result['data'] = $param;

        return $result;
    }

    private function showForm($id=null)
    {
        if ($id > 0) {
            $contactgroup = $this->contactgroupManager->find($id);
            $contactgroupJsonData = json_decode($contactgroup->data);
        }

        $contactgroupTmpl = config('contactgroup_tmpl');

        $contactAllCollection = $this->contactManager->getAllItems();
        $contactgroupAllCollection = $this->contactgroupManager->getAllItems();

        if (isset($contactgroup)) {
            return view('admin.contactgroup.edit',
                compact('contactAllCollection', 'contactgroupAllCollection', 'contactgroupTmpl', 'contactgroup', 'contactgroupJsonData'));
        } else {
            return view('admin.contactgroup.create',
                compact('contactAllCollection', 'contactgroupAllCollection', 'contactgroupTmpl'));
        }
    }

}
