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
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;


class VisiteurController extends AbstractController
{ 
        
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
				
				$sql = $pdo->prepare("select * from Visiteur where login = :identifiant and mdp = :motDePasse") ;
				$sql->bindParam(':identifiant', $data['identifiant']);
                                $sql->bindParam(':motDePasse', $data['motDePasse']);
				$sql->execute() ;
				$b1 = $sql->fetch(\PDO::FETCH_ASSOC) ;
				
				if ( $b1['login'] == $data['identifiant'] && $b1['mdp'] == $data['motDePasse'] ) {
                                    
                                    ###
                                    $session = $test->getSession() ;
                                    $session->set('id',$b1['id']) ;
                                    $session->set('prenom',$b1['prenom']) ;
                                    $session->set('nom',$b1['nom']) ;
                                    ###
                                    
                                    $estCo = "Conection valide" ;
                                    
					return $this->redirectToRoute( 'visiteur/menu', 
                                                [ 'data' => $data ,
                                                    'connection' => $estCo ,
                                                    ] ) ;
					}
	
		}	
                
                $estCo = null ;
                if ( $form->getClickedButton() === $form->get('valider') ) {
                    $estCo = "identifiant ou mot de passe invalide" ;
                }                
                 
		return $this->render( 'visiteur/index.html.twig', 
                        [ 'formulaire' => $form->createView() ,
                            'connection' => $estCo ,
                            ] ) ;
		
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function consulter( Request $request )
    {
            
        $session = $request->getSession() ;
        $idV = $session->get( 'id' ) ;
        $ficheFrais = $session->get( 'fiche' ) ;
        $prenom = $session->get( 'prenom' ) ;
        $nom = $session->get( 'nom' ) ;
        #$session->clear();
        
        #return $this->render( 'visiteur/consulter.html.twig' , array( 'fiche' => $ficheFrais ) );
        return $this->render( 'visiteur/consulter.html.twig' , [ 'fiche' => $ficheFrais ,
            'idVisiteur' => $idV ,
            'prenomV' => $prenom ,
            'nomV' => $nom ,
            ] );
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function renseigner( Request $test )
    {
        
        #Session
        $session = $test->getSession() ;
        $idV = $session->get( 'id' ) ;
        $prenom = $session->get( 'prenom' ) ;
        $nom = $session->get( 'nom' ) ;
        
        #Date
        $today = getdate() ;
        $todayMonth = $today['mon'] ;
        $todayYear = $today['year'] ;
        $auj = date('Y-m-d') ;
        if( strlen($todayMonth) != 2 ){
            $todayMonth = 0 . $todayMonth ;
        }
        $aaa = sprintf("%02d%04d",$todayMonth,$todayYear) ;
            
        $montTotal = 0 ;
        
        
        $request = Request::createFromGlobals() ;                   
                
		$form = $this->createFormBuilder(  )
			->add( 'ETP' , TextType::class )
                        ->add( 'KM' , TextType::class )
                        ->add( 'NUI' , TextType::class )
                        ->add( 'REP' , TextType::class )
			->add( 'suivant' , SubmitType::class )
			->add( 'modifier' , ResetType::class )
                        ->add( 'valider' , SubmitType::class )
			->getForm() ;
			
                $form2 = $this->createFormBuilder(  )
                        ->add( 'dateEngagement' , TextType::class , ['data' => $auj] )
                        ->add( 'libelle' , TextType::class )
                        ->add( 'montant' , TextType::class )
                        ->add( 'suivant' , SubmitType::class )
			->add( 'modifier' , ResetType::class )
                        ->add( 'valider' , SubmitType::class )
			->getForm() ;
                
		$form->handleRequest( $request ) ;
                $form2->handleRequest( $request ) ;
 
		if ( $form->isSubmitted() && $form->isValid() ) {
                #if ( $form->getClickedButton() === $form->get('suivant') ) {
			$data = $form->getData() ;
                        array( 'data' => $data ) ;
                        
                        $montETP = 110.00*$data['ETP'];
                        $montKM = 0.62*$data['KM'];
                        $montNUI = 80.00*$data['NUI'];
                        $montREP = 25.00*$data['REP'];
                        $montTotal = $montETP + $montKM + $montNUI + $montREP ;
                        
				$pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
                                
                                $sql = $pdo->prepare("insert into LigneFraisForfait ( idVisiteur , mois , idFraisForfait , quantite ) values ( :idV , :mois , :idF , :quantite )") ;
                                $sql->bindParam(':idV', $idV);
                                $sql->bindParam(':mois', $aaa);
                                $sql->bindParam(':idF', $data['idFraisForfait']);
                                $sql->bindParam(':quantite', $data['quantite']);
                                
                        if ( $form->getClickedButton() === $form->get('valider') ) {              
				$sql->execute() ;
                        }   
                        
                        return $this->render( 'visiteur/renseigner.html.twig', [ 
                                 'formulaire' => $form->createView() ,
                                 'formulaire2' => $form2->createView() ,
                                 'controller_name' => 'VisiteurController',
                                 'idVisiteur' => $idV ,
                                 'data' => $data ,
                                 'prenomV' => $prenom ,
                                 'nomV' => $nom ,
                                 'total' => $montTotal ,

                        ]);  
                }
                
                                    
               if ( $form2->isSubmitted() && $form2->isValid() ) {   
			$data = $form->getData() ;
                        array( 'data' => $data ) ;
                        $aff = [
                            'montant' => null ,
                           'montant2' => $data['montant'] ,
                                ] ;
                        
                        $pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
				
				$sql = $pdo->prepare("insert into LigneFraisHorsForfait ( idVisiteur , mois , libelle , date , montant ) values ( :identifiant , :moisAnnee , :libelle , :date , :montant )") ;
				$sql->bindParam(':identifiant', $idV);
                                $sql->bindParam(':moisAnnee', $aaa);
                                $sql->bindParam(':libelle', $data['libelle']);
                                $sql->bindParam(':date', $data['dateEngagement']);
                                $sql->bindParam(':montant', $data['montant']);       
				$sql->execute() ;                             
                                
                                return $this->render( 'visiteur/renseigner.html.twig', [ 
                                 'formulaire' => $form->createView() ,
                                 'formulaire2' => $form2->createView() ,
                                 'controller_name' => 'VisiteurController',
                                 'idVisiteur' => $idV ,
                                 'data' => $data ,
                                 'prenomV' => $prenom ,
                                 'nomV' => $nom ,
                                 'aff' => $aff ,
                                 'total' => $montTotal ,    
                                 #'fiche' => $fiche ,
                                 #'fiche' => $ficheA ,
                        ]);
                }
                        ###
                        
                        #if ( $form->getClickedButton() === $form->get('modifier') ) {        
			#	$fiche['montantValide'] = null ;
                        #}
                        
                                
                                #$session->set('ficheA',$b1) ;
                                #$session->set('tab',$tab) ;
                                #$ficheA = $session->get( 'ficheA' ) ;                               
		
                #if ( $form->isSubmitted() && $form2->isSubmitted() ){
                
                #return $this->redirectToRoute( 'visiteur/renseigner', array( 'data' => $data ) ) ;                
                #return $this->redirectToRoute( 'visiteur/renseigner' ) ;
                #return $this->render( 'visiteur/renseigner.html.twig', array( 'formulaire' => $form->createView() ) ) ;                
                #return $this->render( 'visiteur/renseigner.html.twig', [ 
                #                 'formulaire' => $form->createView() ,
                #                 'formulaire2' => $form2->createView() ,
                #                 'controller_name' => 'VisiteurController',
                #                 'idVisiteur' => $idV ,
                #                 'data' => $data ,
                #                 'prenomV' => $prenom ,
                #                 'nomV' => $nom ,
                #                 'fiche' => $fiche ,
                #                 #'fiche' => $ficheA ,
                #        ]);  

                #}
                
                $aff = [
                    'montant' => null,
                    'montant2' => null ,
                ] ;

                return $this->render( 'visiteur/renseigner.html.twig', [
                        'formulaire2' => $form2->createView() ,
                        'formulaire' => $form->createView() ,
                        'idVisiteur' => $idV ,
                        'prenomV' => $prenom ,
                        'nomV' => $nom ,
                        'aff' => $aff ,
                        'total' => $montTotal ,
                        ]); 
    }
                
    /*------------------------------------------------------------------------------------------------*/
    
    public function menu( Request $test )
    {
 
        $session = $test->getSession() ;
        $idV = $session->get( 'id' ) ;
        $prenom = $session->get( 'prenom' ) ;
        $nom = $session->get( 'nom' ) ;
        
        $request = Request::createFromGlobals() ;
        
        $form = $this->createFormBuilder(  )
                        ->add( 'SeDéconnecter' , SubmitType::class )
			->getForm() ;
        
        $form->handleRequest( $request ) ;
        
        if ( $form->isSubmitted() && $form->isValid() ) {
            return $this->redirectToRoute( 'visiteur' , array( 'formulaire' => $form->createView() ) ) ;
        }
        
        return $this->render('visiteur/menu.html.twig', [
            'controller_name' => 'VisiteurController',
            'formulaire' => $form->createView() ,
            'idVisiteur' => $idV ,
            'prenomV' => $prenom ,
            'nomV' => $nom ,
        ]);
    }
    
    /*------------------------------------------------------------------------------------------------*/
    
    public function saisirMois( Request $test )
    {
        
                $session = $test->getSession() ;
                $idV = $session->get( 'id' ) ;
                $prenom = $session->get( 'prenom' ) ;
                $nom = $session->get( 'nom' ) ;
      
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
                        
                        ###
                        $bbb = $session->get( 'id' ) ;
                        ###
                        
                        $aaa = sprintf("%02d%04d",$data['mois'],$data['annee']) ;
                        
                        $pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
                        
                        #$sql = $pdo->prepare("select * from FicheFrais where mois = :mois and idVisiteur = :idVisiteur") ;
                        $sql = $pdo->prepare( 'select e.id,
                            e.libelle ,
                            f.mois ,
                            f.dateModif,
                            l.quantite,
                            LigneFraisHorsForfait.montant,
                            LigneFraisHorsForfait.libelle,
                            LigneFraisHorsForfait.date
                            from FicheFrais as f inner join Etat as e
                            on f.idEtat = e.id  
                            inner join LigneFraisForfait as l on f.idVisiteur = l.idVisiteur
                            inner join LigneFraisHorsForfait on f.idVisiteur = LigneFraisHorsForfait.idVisiteur
                            where f.mois = :mois and f.idVisiteur = :idVisiteur ;');
                        
                        $sql->bindParam(':mois', $aaa);
                        $sql->bindParam(':idVisiteur', $bbb);
                        $sql->execute() ;
                        $b1 = $sql->fetch(\PDO::FETCH_ASSOC) ;    
                        
                        ###
                        $session->set('fiche',$b1) ;
                        ###
                        
                        if ( $b1['mois'] == $aaa ) {
                        #return $this->redirectToRoute( 'visiteur/consulter', array( 'data' => $data ) ) ;
                         return $this->redirectToRoute( 'visiteur/consulter' , [
                                 'date' => $data ,
                                 'controller_name' => 'VisiteurController',
                                 'idVisiteur' => $bbb ,
                                 'prenomV' => $prenom ,
                                 'nomV' => $nom ,
                        ]); 
                        }

                }		
		#return $this->render( 'visiteur/saisirMois.html.twig', array( 'formulaire' => $builder->createView() ) ) ; 
                return $this->render( 'visiteur/saisirMois.html.twig', [ 'formulaire' => $builder->createView() ,
                                 'idVisiteur' => $idV ,
                                 'prenomV' => $prenom ,
                                 'nomV' => $nom ,
                    ]) ;
    }
    
    /*------------------------------------------------------------------------------------------------*/
}
