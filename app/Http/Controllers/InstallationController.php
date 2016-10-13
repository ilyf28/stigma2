<?php
namespace App\Http\Controllers ;
use Stigma\Installation\InstallManager;
use Illuminate\Http\Request;
use Stigma\Installation\Exceptions\InvalidParameterException ;

class InstallationController extends Controller
{
    protected $installManager ;
    
    public function __construct(InstallManager $installManager)
    {
        $this->installManager = $installManager ;
    }

    public function index()
    {
        return view('installation.init');
    }

    public function installDatabaseView()
    {
        return view('installation.database');
    }

    public function installNagiosView()
    {
        return view('installation.nagios');
    }

    public function installGrafanaView()
    {
        return view('installation.grafana');
    }

    public function installInfluxdbView()
    {
        return view('installation.influxdb');
    }

    public function installDatabase(Request $req)
    {
        $databaseInstallation = $this->installManager->getDatabaseInstallation() ;

        try { 

            $data = $req->only('host','dbuser','password','database') ; 
            $data['port'] = $req->input('port','3306') ;

            $databaseInstallation->setup($data)  ;

            return redirect()->route('installation::nagios.view') ;
        }catch (InvalidParameterException $e) { 
            return back()->withInput() ;
        }catch (\PDOException $e){
            return back()->withInput() ;
        }
    } 

    public function installNagios(Request $req)
    {
        $nagiosInstallation = $this->installManager->getNagiosInstallation() ;

        try { 

            $data = $req->only('host') ; 
            $data['port'] = $req->input('port','80') ;

            $nagiosInstallation->setup($data)  ;

            return redirect()->route('installation::grafana.view') ;
        }catch (InvalidParameterException $e) { 
            return back()->withInput() ;
        } 
    }

    public function installGrafana(Request $req)
    {
        $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;

        try { 

            $data = $req->only('host','port','username','password') ; 

            $grafanaInstallation->setup($data)  ;

            return redirect()->route('installation::influxdb.view') ;
        }catch (InvalidParameterException $e) { 
            return back()->withInput() ;
        } 
    }

    public function installInfluxdb(Request $req)
    {
        $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;

        try { 

            $data = $req->only('host','port','username','password') ; 

            $influxdbInstallation->setup($data)  ;

            //return redirect()->route('installation::influxdb.view') ;
        }catch (InvalidParameterException $e) { 
            return back()->withInput() ;
        } 
    }

}
