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


class VisiteurController extends AbstractController
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
			
				array( 'data' => $data ) ;
				$pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
				
				$sql1 = $pdo->prepare("select * from Visiteur where login = :identifiant") ;
				$sql1->bindParam(':identifiant', $data['identifiant']);
				$sql1->execute() ;
				$b1 = $sql1->fetch(\PDO::FETCH_ASSOC) ;
				
				$sql2 = $pdo->prepare("select * from Visiteur where mdp = :motDePasse") ;
				$sql2->bindParam(':motDePasse', $data['motDePasse']);
				$sql2->execute() ;
				$b2 = $sql2->fetch(\PDO::FETCH_ASSOC) ;
				
				if ( $b1['login'] == $data['identifiant'] && $b2['mdp'] == $data['motDePasse'] ) {
					return $this->redirectToRoute( 'visiteur/menu', array( 'data' => $data ) ) ;
					}
	
		}		
		return $this->render( 'visiteur/index.html.twig', array( 'formulaire' => $form->createView() ) ) ;
		
    }
    
    
    
    
    public function consulter($mois)
    {
		
		###
		$pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');	
        $sql = "select * from FicheFrais where mois = $mois" ;     
        $data = $pdo->query($sql) ;
        $aaa = $data->fetch() ;
        ###
		
        return $this->render('visiteur/consulter.html.twig', [
            'controller_name' => 'VisiteurController',
            'sql' => $aaa,
          
        ]);
    }
    
    public function saisir()
    {
        return $this->render('visiteur/saisir.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
    public function menu()
    {
        return $this->render('visiteur/menu.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
    public function saisirMois()
    {
        #
		$request = Request::createFromGlobals() ;
				
		$form = $this->createFormBuilder(  )
			->add( 'mois' , TextType::class )
			->add( 'valider' , SubmitType::class )
			->add( 'annuler' , ResetType::class )
			->getForm() ;
			
		$form->handleRequest( $request ) ;
		
		if ( $form->isSubmitted() && $form->isValid() ) {
			$data = $form->getData() ;
			return $this->redirectToRoute( 'visiteur/consulter', array( 'data' => $data ) ) ;
			#return array($this->redirectToRoute( 'visiteur/consulter' ) ,
			 #$this->forward( 'VisiteurController::consulter', [ 'mois' => $data  ] )) ;
		}		
		return $this->render( 'visiteur/saisirMois.html.twig', array( 'formulaire' => $form->createView() ) ) ;
		#
    }
}
