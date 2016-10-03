<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class ClusterGenerator extends BaseGenerator
{
    public function createCluster(array $hosts, array $devices)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($hosts as $host) {
            array_push($data, $host);
        }
        array_push($data, "\n", "[service]", "action=restart", "service=glusterd", "\n", "[peer]", "action=probe", "\n", "[backend-setup]");
        foreach ($devices as $device) {
            array_push($data, $device);
        }

        $file = "peer-probe-with-backend-setup.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }
}