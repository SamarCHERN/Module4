<?php
// src/Service/MessageGenerator.php
namespace App\FileSystemImproved;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class MessageGenerator
{
    // public function getHappyMessage(): string
    // {
    //     $messages = [
    //         'You did it! You updated the system! Amazing!',
    //         'That was one of the coolest updates I\'ve seen all day!',
    //         'Great work! Keep going!',
    //     ];

    //     $index = array_rand($messages);

    //     return $messages[$index];
    // }
    public function AddFile(){
        $filesystem = new Filesystem();

        try {
            $filesystem->mkdir(
                Path::normalize(sys_get_temp_dir().'/'.random_int(0, 1000)),
            );
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at ".$exception->getPath();
        }
    }
}