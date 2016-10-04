<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class VolumeGenerator extends BaseGenerator
{
    public function createVolume(array $members, $volume_name, $brick_dirs)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($members as $host_name => $address) {
            array_push($data, $address);
        }
        array_push($data, "\n", "[volume]", "action=create", "volname=".$volume_name, "replica=yes", "replica_count=2", "force=yes", "brick_dirs=".$brick_dirs);

        $file = "volume-create.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }

    public function deleteVolume(array $hosts, $volume_name)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($hosts as $host) {
            array_push($data, $host);
        }
        array_push($data, "\n", "[volume]", "action=stop", "volname=".$hosts[0].":".$volume_name, "\n", "[volume]", "action=delete", "volname=".$hosts[0].":".$volume_name);

        $file = "volume-delete.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }
}