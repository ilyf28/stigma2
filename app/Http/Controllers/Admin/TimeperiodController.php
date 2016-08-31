<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\ObjectManager\TimeperiodManager;

class TimeperiodController extends Controller {

    protected $timeperiodManager;
    protected $count;

    public function __construct(TimeperiodManager $timeperiodManager)
    {
        $this->timeperiodManager = $timeperiodManager;
        $this->count = 15;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->timeperiodManager->getAllItems();
        return view('admin.timeperiod.index', compact('items'));
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

        $this->timeperiodManager->register($param);

        return redirect()->route('admin.timeperiods.index');
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
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function processFormData(Request $request)
    {
        $count = $this->count;
        $param = [];
        $result = [];

        $param['timeperiod_name'] = $request->get('timeperiod_name');
        $param['alias'] = $request->get('alias');

        for ($i = 0; $i < $count; $i++)
        {
            $key = $request->get($i.'_key');
            if (strcmp($key, '') == 0) continue;

            $param[$key] = $request->get($i.'_value');
        }

        $result['timeperiod_name'] = $request->get('timeperiod_name');
        $result['alias'] = $request->get('alias');
        $result['is_template'] = $request->get('is_template');

        if ($request->get('is_template') == 'Y') {
            $result['template_name'] = $request->get('timeperiod_name');
            
            unset($param['timeperiod_name']);
            $param['name'] = $request->get('timeperiod_name');
        } else {
            $result['template_name'] = '';
        }

        $templates = $request->get('timeperiod_template');

        if(count($templates) > 0){
            $param['use'] = implode(',', $templates);
        }

        $result['data'] = $param;

        return $result;
    } 

    private function showForm($id=null)
    {
        $count = $this->count;

        if ($id > 0) {
            $timeperiod = $this->timeperiodManager->find($id);
            $data = json_decode($timeperiod->data);
            $timeperiodJsonData = [];
            $i = 0;

            foreach ($data as $key => $value) {
                if (strcmp($key, 'timeperiod_name') == 0 || strcmp($key, 'alias') == 0) continue;
                $timeperiodJsonData[$i.'_key'] = $key;
                $timeperiodJsonData[$i.'_value'] = $value;
                $i++;
            }
        }

        if (isset($timeperiod)) {
            return view('admin.timeperiod.edit',
                compact('timeperiod', 'timeperiodJsonData', 'count'));
        } else {
            return view('admin.timeperiod.create',
                compact('count'));
        }
    }

}
