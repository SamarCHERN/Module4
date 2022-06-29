<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

        /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'title' => 'Binvenue chez Samar !',
            'age'=>26
        ]);
    }

        /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(int $id)
    {
        return $this->render('blog/show.html.twig',[
            'id'=>$id,
        ]);
    }

}
