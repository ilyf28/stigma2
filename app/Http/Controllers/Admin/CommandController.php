<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;

class CommandController extends Controller {

    protected $nagiosClient ;

    public function __construct(NagiosClient $nagiosClient)
    {
        $this->nagiosClient = $nagiosClient ;
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateCommand() ;

        if($response == 200){
            return new Response('success', 200);
        }else{
            return new Response('error', 400);
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $repository = $this->commandBuilder->getRepository() ;
        $commands = $repository->getAll() ;

        return view('admin.command.index' ,compact('commands')) ;   
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
        $data = $request->all() ;
        $this->commandBuilder->make($data) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $command = $this->commandBuilder->find($id) ;

        return json_encode($command) ;
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
        $command = $this->commandBuilder->update($id,$request->all()) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    { 
        $this->commandBuilder->delete($id) ;
    }

}
