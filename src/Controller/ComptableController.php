<?php

namespace App\Controller;

use App\Controller ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\Extension\Core\Type\PasswordType ;
use Symfony\Component\Form\Extension\Core\Type\SubmitType ;
use Symfony\Component\Form\Extension\Core\Type\ResetType ;

class ComptableController extends AbstractController
{
   
    public function index()
    {
        #
		$request = Request::createFromGlobals() ;
				
		$form = $this->createFormBuilder(  )
			->add( 'identifiant' , TextType::class )
			->add( 'motDePasse' , PasswordType::class )
			->add( 'valider' , SubmitType::class )
			->add( 'annuler' , ResetType::class )
			->getForm() ;
			
		$form->handleRequest( $request ) ;
		
		if ( $form->isSubmitted() && $form->isValid() ) {
			$data = $form->getData() ;
			return $this->redirectToRoute( 'comptable/menu', array( 'data' => $data ) ) ;
		}		
		return $this->render( 'comptable/index.html.twig', array( 'formulaire' => $form->createView() ) ) ;
		#
    }
    
    public function valider()
    {
        return $this->render('comptable/valider.html.twig', [
            'controller_name' => 'ComptableController',
        ]);
    }
    
    public function suivre()
    {
        return $this->render('comptable/suivre.html.twig', [
            'controller_name' => 'ComptableController',
        ]);
    }
    
    public function menu()
    {
        return $this->render('comptable/menu.html.twig', [
            'controller_name' => 'ComptableController',
        ]);
    }
}
