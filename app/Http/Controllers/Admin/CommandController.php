<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\CommandManager;
use Stigma\Nagios\Client as NagiosClient;

class CommandController extends Controller {

    protected $commandManager;
    protected $nagiosClient;

    public function __construct(CommandManager $commandManager, NagiosClient $nagiosClient)
    {
        $this->commandManager = $commandManager;
        $this->nagiosClient = $nagiosClient;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $items = $this->commandManager->getAllItems();

        return view('admin.command.index', compact('items'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    { 
        $data = $request->all();
        $this->commandManager->register($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $command = $this->commandManager->find($id);

        return json_encode($command);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request,$id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $data = $request->all();
        $this->commandManager->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    { 
        $this->commandManager->delete($id);
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateCommand();

        if ($response == 200) {
            return new Response('success', 200);
        } else {
            return new Response('error', 400);
        }
    }

}
