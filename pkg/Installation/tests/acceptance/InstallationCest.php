<?php
namespace Stigma\Installation;
use Stigma\Installation\AcceptanceTester;

class InstallationCest
{
    public function _before(AcceptanceTester $I)
    {
        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        }
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /*
    public function testToInstallWhenNotInstalled(AcceptanceTester $I)
    { 
        $I->wantTo('Try to Install If stigma was not installed') ;

        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        }

        $I->amOnPage('/') ;
        $I->seeInCurrentUrl('/installation') ;
        $I->see('installation') ;
        $I->click('#next-btn') ; 

        $I->amOnPage('/install/database') ;
    } 
    
    public function testToInstallDatabase(AcceptanceTester $I)
    { 
        $I->wantTo('Install database') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('database','stigma') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ; 

        $I->seeFileFound('database.php', config_path()) ;
    }
    

    public function testToInstallDatabaseWhenParametersAreInvalid(AcceptanceTester $I)
    { 
        $I->wantTo('Fail when parameters are invalid') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ; 
        $I->see('Install Database') ; 
    }

    public function testToInstallDatabaseWhenDatabaseConnectionIsOff(AcceptanceTester $I)
    { 
        $I->wantTo('Fail when database connection is off') ; 
        
        $I->amOnPage('/install/database') ; 
        $I->fillField('host','localhost') ;
        $I->fillField('database','not_exists_database') ;
        $I->fillField('dbuser','homestead') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ; 
        $I->see('Install Database') ; 
    } 

    public function testToInstallNagios(AcceptanceTester $I)
    {
        foreach(['nagios'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        } 

        $I->wantTo('visit Nagios Install Page') ;
        $I->amOnPage('install/nagios') ;
        $I->see('Install Nagios') ;

        $I->fillField('host','localhost') ;
        $I->fillField('port','80') ;
        $I->click('#next-btn') ;

        $I->seeFileFound('nagios.php', config_path()) ;
        $I->see('Install Grafana') ; 
    }

    public function testToInstallGrafana(AcceptanceTester $I)
    {
        foreach(['grafana'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        } 

        $I->wantTo('visit Grafana Install Page') ;
        $I->amOnPage('install/grafana') ;
        $I->see('Install Grafana') ;

        $I->fillField('host','localhost') ;
        $I->fillField('port','80') ;
        $I->fillField('username','nagios') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ;

        $I->seeFileFound('grafana.php', config_path()) ;
        $I->see('Install InfluxDB') ; 
    }

    public function testToInstallInfluxdb(AcceptanceTester $I)
    {
        foreach(['influxdb'] as $fileName) {
            if(file_exists(config_path()."/$fileName.php" )){ 
                $I->deleteFile(config_path().'/'.$fileName.'.php') ;
            }
        } 

        $I->wantTo('visit Influxdb Install Page') ;
        $I->amOnPage('install/influxdb') ;
        $I->see('Install InfluxDB') ; 

        $I->fillField('host','localhost') ;
        $I->fillField('port','80') ;
        $I->fillField('username','influxdb') ;
        $I->fillField('password','secret') ;
        $I->click('#next-btn') ;

        $I->seeFileFound('influxdb.php', config_path()) ;
        //$I->see('Install InfluxDB') ; 
    }

    public function testToInstall(AcceptanceTester $I)
    { 
        $I->wantTo('see status whene installation is succesful') ;

        foreach(['nagios','grafana','influxdb'] as $fileName) {
            if(!file_exists(config_path()."/$fileName.php" )){ 
                file_put_contents((config_path().'/'.$fileName.'.php'),'') ;
            }
        }

        $I->amOnPage('/') ;
        $I->see('installed') ;
    }*/
}
