<?php

namespace App\Controller;

use ProxyManager\Autoloader\Autoloader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Table1;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Form\Form1Type;

/**
 * @Route("/account", name="")
 */

class AccountsController extends AbstractController{

    protected $entityManager;

    public function __construct()
    {
//        $this->entityManager    =   $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/", name="admin_account")
     * @Method("GET")
     */

    public function index(){
        $repository =   $this->getDoctrine()->getRepository(Table1::class);
        $accounts   =   $repository->findAll();
        return $this->render('accounts/index.html.twig',['accounts'=>$accounts] );
    }

    /**
     * @Route("/create", name="admin_account_new")
     * @Method("GET")
     */

    public function create(){

        $table1 =   new Table1();
        $form   =   $this->createForm(Form1Type::class, $table1);
        return $this->render('accounts/create.html.twig',
            ['form' =>  $form->createView() ]
        );
        
    }

    /**
     * @Route("/show/{id?}", name="admin_account_details")
     * @param $id
     * @Method("GET")
     * @return Response
     */

    function show($id){
        $account    =   $this->getDoctrine()->getRepository(Table1::class)->find($id);

        if( !$account ){
            throw $this->createNotFoundException('No Account found for id '.$id);
        }

        return $this->render( 'accounts/show.html.twig',[ 'account'=>$account ] );

        // return new Response( implode( (array)dump( $account ) ) );
    }

    /**
     * @Route("/edit/{id?}", name="admin_account_edit")
     */


    public function edit($id){

    }

    function update($id){
//        $repository =
    }

    /**
     * @Route("/delete/{id}",name="route_admin_account_delete")
     * @param $id
     * @return JsonResponse
     */

    function delete($id){
        try {
            $manager=$this->getDoctrine()->getManager();
            $account=$manager->getRepository(Table1::class)->find($id);
            $manager->remove($account);
            $manager->flush();

            return $this->json(['message'=>'success','status'=>200]);
        }catch (\ErrorException $e){
            return new JsonResponse(array('message' => $e->getMessage()));
        }


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