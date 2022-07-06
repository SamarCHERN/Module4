<?php

namespace App\Controller;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    /**
     * @Route("/create/{file_name}", name="app_file")
     */
    public function create(Filesystem $filesystem,$file_name): Response
    {        $finder = new Finder();
        $finder->directories()->in('../')->name('public');
        
        foreach ($finder as $f) {
            $contents = $f->getRealPath();
        
        }
        if (!$filesystem->exists($file_name.".txt")) {
            $filesystem->touch($contents."/".$file_name.".txt");
        }
        return new Response("New file has created !");
    }
   /**
     * @Route("/write/{filename}/{text}", name="create_file_with_text")
     */
    public function createFile( Filesystem $filesystem, $filename, $text ): Response
    { 
         $filesystem->appendToFile($filename, $text );
            return new Response($filename . ' is added with the text: ' . $text);
    }

   /**
     * @Route("/copy/{source}/{target}", name="copy_text")
     */
    public function copierText( Filesystem $filesystem, $source, $target ): Response
    { 
        $current_dir_path = getcwd();
        $src_dir_path = $current_dir_path . "/$source";
        $dest_dir_path = $current_dir_path . "/$target";  

        $filesystem->copy($src_dir_path, $dest_dir_path , true);   
    return new Response($source . ' is copied');
    }

        /**
     * @Route("/delete/{filename}", name="remove_text")
     */
    public function removeText( Filesystem $filesystem, $filename ): Response
    { 
        $current_dir_path = getcwd();
        $src_dir_path = $current_dir_path . "/$filename";
        $filesystem->remove(['symlink', $src_dir_path , $filename]);
       
    return new Response($name . ' is removed successfuly ');
    }
        /**
         * @Route("/find", name="remove_text")
         */
    public function find( Filesystem $filesystem ): Response
        { 
        $finder = new Finder();
        $finder->directories()->in('../')->name('public');
        
        foreach ($finder as $f) {
            $contents = $f->getRealPath();
        
        }
        return new Response($contents);
    }
}

