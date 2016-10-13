<?php
namespace Stigma\Installation\Generators ;

use Stigma\Installation\Contracts\ConfigFileGenerator;
use Stigma\Installation\Generators\FileGenerator ;

class InfluxdbFileGenerator extends FileGenerator implements ConfigFileGenerator
{
    protected $tmplPath  ;
    protected $outputPath ; 

    public function __construct(
        $tmplPath = './../tmpl/influxdb.php', 
        $outputPath )
    {
        $this->tmplPath = $tmplPath ;
        $this->outputPath = $outputPath ; 
    }

}
