<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController{
    /**
     * @Route("/")
     * @Method("GET")
     */

    public function index(){
        $articles=[ 'article_1', 'article_2' ];
        return $this->render('articles/index.html.twig',['articles'=>$articles] );
    }
        

}