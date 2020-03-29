<?php

namespace App\Controller;

use ProxyManager\Autoloader\Autoloader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Table1;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AccountsController extends AbstractController{

    protected $entityManager;

    public function __construct()
    {
//        $this->entityManager    =   $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/")
     * @Method("GET")
     */

    public function index(){
        $repository =   $this->getDoctrine()->getRepository(Table1::class);
        $accounts   =   $repository->findAll();
        return $this->render('accounts/index.html.twig',['accounts'=>$accounts] );
    }

    /**
     * @Route("/show/{id?}")
     * @param $id
     * @Method("GET")
     * @return Response
     */

    function show($id){
        $account=$this->getDoctrine()->getRepository(Table1::class)->find($id);

        if( !$account ){
            throw $this->createNotFoundException('No Account found for id '.$id);
        }

        return new Response('');
    }

    function update($id){
//        $repository =
    }

    public function createAccount(ValidatorInterface $validator){
       $entityManager=$this->getDoctrine()->getManager();

       $account= new Table1();
       $account->setDomain("facebook.com");
       $account->setEmailOrPhone("123456789");
       $account->setPassword("123456");
       $account->setStatus(1);

       $entityManager->persist($account);

       $entityManager->flush();

       return new Response('Saved  new Account with id'.$account->id );

    }
        

}