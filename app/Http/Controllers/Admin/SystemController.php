<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Stigma\Installation\InstallManager;

class SystemController extends Controller {

    protected $auth;
    protected $installManager;

    public function __construct(InstallManager $installManager, Guard $auth)
    {
        $this->installManager = $installManager;
        $this->auth = $auth;
    }

    public function configuration()
    {
        $nagios = array(
            'host'=>'', 
            'port'=>'',
            'apiport'=>'',
            'username'=> '',
            'password'=> '',
        );

        $grafana = array(
            'host'=>'',
            'port'=>'',
            'username'=> '',
            'password'=> '',
        );

        $influxdb = array(
            'host'=>'',
            'port'=>'',
            'database'=> '',
            'username'=> '',
            'password'=> '',
        );

        $nagios = array_merge($nagios, (config('nagios')));
        $grafana = array_merge($grafana,  (config('grafana')));
        $influxdb = array_merge($influxdb, (config('influxdb')));
        $mysql = config('database.connections.mysql');

        return view('admin.system.configuration', compact('nagios', 'grafana', 'influxdb', 'mysql'));
    }

    public function nagiosUpdate(Request $req)
    {
        try { 

            $data = $req->only('host', 'port', 'apiport', 'username', 'password');

            $nagiosInstallation = $this->installManager->getNagiosInstallation();
            $nagiosInstallation->setup($data);

            return redirect()->route('admin.system.configuration');
        }catch (InvalidParameterException $e) { 
            //return back()->withInput();
        } 
    }

    public function databaseUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','dbuser','password','database');

            $databaseInstallation = $this->installManager->getDatabaseInstallation();
            $databaseInstallation->setup($data);

            return redirect()->route('admin.system.configuration');
        }catch (InvalidParameterException $e) { 
            //return back()->withInput();
        } 
    }

    public function influxdbUpdate(Request $req)
    {
        try { 

            $data = $req->only('host', 'port', 'database', 'username', 'password'); 

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation();
            $influxdbInstallation->setup($data);

            return redirect()->route('admin.system.configuration');
        }catch (InvalidParameterException $e) { 
            //return back()->withInput();
        } 
    }

    public function grafanaUpdate(Request $req)
    {
        try { 

            $data = $req->only('host', 'port', 'username', 'password'); 

            $grafanaInstallation = $this->installManager->getGrafanaInstallation();
            $grafanaInstallation->setup($data);

            return redirect()->route('admin.system.configuration');
        }catch (InvalidParameterException $e) { 
            //return back()->withInput();
        } 
    }

    public function getAccount()
    {
        return view('admin.system.account');
    }

    public function changePassword(Request $request)
    { 
        $v = \Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors(['msg' => 'type valid password']); 
        }

        $user = \Auth::user();
        $user->password = bcrypt($request->get('password'));

        $user->save();


        return redirect()->route('admin.system.account');
    }

}
