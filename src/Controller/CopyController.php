<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class CopyController extends Controller
{
    /**
     * @Route("/copy", name="copy")
     */
    public function index(Request $request)
    {
        $data=[];
        $form=$this->createFormBuilder()
            ->add('nume1', TextType::class, array('attr'=>array('size'=>'30','placeholder'=>'bau bau')))
            ->add('submit', SubmitType::class)
            ->add('nume2', TextareaType::class, array('attr'=>array('size'=>'30','placeholder'=>'bau bau'),'required' => false))
            ->getForm();
        $form->handleRequest($request);
        $data['head']="<h1>Input your name</h1>";
        $data['form']=$form->createView();

        if($form->isSubmitted()){

            // $data['value']=$request->request->all();
            $data['value'] = $form->get('nume1')->getData();
            $data['value1'] = $form->get('nume2')->getData();;
        }else {
            $data['value']='';
            $data['value1']='';
        }
        return $this->render('copy/index.html.twig', $data);
    }
}
