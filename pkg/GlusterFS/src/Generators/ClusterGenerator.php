<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class ClusterGenerator extends BaseGenerator
{
    protected $outputPath;

    public function __construct()
    {
    }

    public function createCluster(array $data)
    {
        array_unshift($data, "[hosts]");
        array_push($data, "\n", "[peer]", "action=probe");

        $this->outputPath = "/tmp/peer-probe.conf";
        $this->write($data);

        return $this->outputPath;
    }
}