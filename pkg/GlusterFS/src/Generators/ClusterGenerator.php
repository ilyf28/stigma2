<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class ClusterGenerator extends BaseGenerator
{
    public function createCluster(array $hosts, $devices)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($hosts as $host) {
            array_push($data, $host);
        }
        array_push($data, "\n", "[service]", "action=restart", "service=glusterd", "\n", "[peer]", "action=probe", "\n", "[backend-setup]", "devices=".$devices);

        $file = "cluster-basic-setup.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }

    public function deleteCluster(array $hosts, $devices, $vgs)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($hosts as $host) {
            array_push($data, $host);
        }
        array_push($data, "\n", "[backend-setup]", "devices=".$devices, "\n", "[backend-reset]", "pvs=".$devices, "vgs=".$vgs, "unmount=yes");

        $file = "cluster-basic-reset.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }
}