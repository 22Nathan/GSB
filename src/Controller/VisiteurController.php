<?php

namespace App\Controller;

use App\Controller ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\Extension\Core\Type\PasswordType ;
use Symfony\Component\Form\Extension\Core\Type\SubmitType ;
use Symfony\Component\Form\Extension\Core\Type\ResetType ;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class VisiteurController extends AbstractController
{ 
    /*------------------------------------------------------------------------------------------------*/
    
    public function index(Request $test)
    {

           
        
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
                                    
                                    ###
                                    $session = $test->getSession() ;
                                    $session->set('id',$b1['id']) ;
                                    ###
                                    
					return $this->redirectToRoute( 'visiteur/menu', array( 'data' => $data ) ) ;
					}
	
		}		
		return $this->render( 'visiteur/index.html.twig', array( 'formulaire' => $form->createView() ) ) ;
		
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function consulter( Request $request )
    {
            
        $session = $request->getSession() ;
        $idV = $session->get( 'id' ) ;
        $ficheFrais = $session->get( 'fiche' ) ;
        #$session->clear();
        
        if ( $idV == $ficheFrais['idVisiteur'] ) {
        return $this->render( 'visiteur/consulter.html.twig' , array( 'fiche' => $ficheFrais ) );
        }
        return $this->render( 'visiteur/consulter.html.twig' );
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function saisir()
    {
        return $this->render('visiteur/saisir.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function menu()
    {
        return $this->render('visiteur/menu.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function saisirMois( Request $test )
    {
        
		$request = Request::createFromGlobals() ;
                
                $builder = $this->createFormBuilder(  )
                  ->add('mois', ChoiceType::class, [
                  'choices'  => [
                  '01' => '01',
                  '02' => '02',
                  '03' => '03',
                  '04' => '04',
                  '05' => '05',
                  '06' => '06',
                  '07' => '07',
                  '08' => '08',
                  '09' => '09',
                  '10' => '10',
                  '11' => '11', 
                  '12' => '12',  
                      ] ])
                  ->add('annee', ChoiceType::class, [
                  'choices'  => [
                  '2018' => '2018',
                  '2019' => '2019',
                  '2020' => '2020',
                      ] ])      
                ->add( 'valider' , SubmitType::class )
		->add( 'annuler' , ResetType::class )
		->getForm() ;    
                    
                $builder->handleRequest( $request ) ;
                
                if ( $builder->isSubmitted() && $builder->isValid() ) {
			$data = $builder->getData() ;
                        
                        $aaa = sprintf("%02d%04d",$data['mois'],$data['annee']) ;
                        
                        $pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
                        
                        $sql = $pdo->prepare("select * from FicheFrais where mois = :mois") ;
                        $sql->bindParam(':mois', $aaa);
                        $sql->execute() ;
                        $b1 = $sql->fetch(\PDO::FETCH_ASSOC) ;    
                        
                        ###
                        $session = $test->getSession() ;
                        $session->set('fiche',$b1) ;
                        ###
                        
                        if ( $b1['mois'] == $aaa ) {
                        return $this->redirectToRoute( 'visiteur/consulter', array( 'data' => $data ) ) ;
                        }

                }		
		return $this->render( 'visiteur/saisirMois.html.twig', array( 'formulaire' => $builder->createView() ) ) ;        
    }
    
    /*------------------------------------------------------------------------------------------------*/
}
