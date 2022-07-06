<?php

namespace AppBundle\Services;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class FileSystemImproved
{

    public function createFile(Filesystem $filesystem){
        //$arrar=array();
        $finder = new Finder();
        $finder->directories()->in('../')->name('fsi');
        
        foreach ($finder as $f) {
            $contents = $f->getRealPath();}
        $filesystem->touch($contents."/".$file_name.".php");
        }
}