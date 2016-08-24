<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;
use Stigma\Installation\InstallManager;
use Illuminate\Contracts\Auth\Guard;

class ConfigurationController extends Controller { 

    protected $installManager ;
    protected $auth ;
    
    public function __construct(InstallManager $installManager, Guard $auth)
    {
        $this->installManager = $installManager ;
        $this->auth = $auth ;
    }

    public function provisioning(Request $req)
    { 
        $config = array() ;
        if(file_exists((config_path().'/provisioning.php'))){
            $config = config('provisioning') ;
        } else {
            $config['apikey'] = '' ; 
            $config['secret'] = '' ; 
        }

        $serverList = $this->provisionedServerRepo->getAll() ;

        return view('admin.configuration.provisioning',compact('config','serverList')) ;
    }

    public function provisioningRequest()
    { 
        $data = config('provisioning') ;
        $this->provisionManager->provisionNagiosEnv($data)  ;
    }

    public function provisioningUpdate(Request $req)
    { 
        try { 

            $data = $req->only('apikey','secret') ; 

            $this->provisionManager->setup($data)  ;

            return redirect()->route('admin.configuration.provisioning') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
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



        $user = \Auth::user() ;
        $user->password = bcrypt($request->get('password'));

        $user->save();


        return redirect()->route('admin.configuration.account') ;

    } 

    public function system()
    {
        if(! $this->installManager->verifyToBeInstalled()){

            /*
            $nagiosInstallation = $this->installManager->getNagiosInstallation() ;
            $nagiosInstallation->setup(array('host'=>'localhost'))  ;

            $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup(array(
                'host'=>'localhost',
                'username'=> 'stigma' , 
                'password'=> 'stigma' , 
            ));

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup(array(
                'host'=>'localhost',
                'database'=> 'stigma' , 
                'username'=> 'stigma' , 
                'password'=> 'stigma' , 
            )); */
        }


        $nagios = array(
            'host' => '' 
        );

        $grafana = array(
            'host' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $influxdb = array(
            'host' => '' ,
            'database' => '' ,
            'username' => '' ,
            'password' => '' 
        );

        $nagios = array_merge($nagios, (config('nagios'))) ;
        $grafana = array_merge($grafana,  (config('grafana'))) ;
        $influxdb = array_merge($influxdb, (config('influxdb'))) ;
        $mysql = config('database.connections.mysql') ;

        return view('admin.configuration.nagios',compact('nagios','grafana','influxdb','mysql')) ;
    }

    public function nagiosUpdate(Request $req)
    {
        try { 

            $data = $req->only('host') ; 

            $nagiosInstallation = $this->installManager->getNagiosInstallation() ;
            $nagiosInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.system') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function databaseUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','dbuser','password','database') ; 

            $databaseInstallation = $this->installManager->getDatabaseInstallation() ;
            $databaseInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.system') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function influxdbUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','password','username','database') ; 

            $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.system') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function grafanaUpdate(Request $req)
    {
        try { 

            $data = $req->only('host','password','username') ; 

            $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup($data)  ;

            return redirect()->route('admin.configuration.system') ;
        }catch (InvalidParameterException $e) { 
            //return back()->withInput() ;
        } 
    }

    public function getAccount()
    {
        return view('admin.configuration.account') ;
    } 
}
