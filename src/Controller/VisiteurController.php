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
        $todaymy = $todayMonth."-".$todayYear ;
        $auj = date('Y-m-d') ;
        if( strlen($todayMonth) != 2 ){
            $todayMonth = 0 . $todayMonth ;
        }
        $aaa = sprintf("%02d%04d",$todayMonth,$todayYear) ;
            
        $montTotal = 0 ;
        
        
        $request = Request::createFromGlobals() ;                   
                
		$form = $this->createFormBuilder(  )
			->add( 'ETP' , TextType::class , ['data' => 0] )
                        ->add( 'KM' , TextType::class , ['data' => 0] )
                        ->add( 'NUI' , TextType::class , ['data' => 0] )
                        ->add( 'REP' , TextType::class , ['data' => 0] )
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
                        $totalF = [ '1' => " nombre d'étapes : ".$data['ETP'] ,
                                    '2' => " nombre de kilometres : ".$data['KM'] ,
                                    '3' => " nombre de nuits : ".$data['NUI'] ,
                                    '4' => " nombre de repas : ".$data['REP'] ,
                                ];
                        
				$pdo = new \PDO('mysql:host=localhost; dbname=gsbFrais', 'developpeur', 'azerty');
                                
                                $sqlb = $pdo->prepare("select * from LigneFraisForfait where idVisiteur = :id and mois = :mois and idFraisForfait = 'ETP'") ;
                                $sqlb->bindParam(':id', $idV);
                                $sqlb->bindParam(':mois', $aaa);
                                $sqlb->execute() ;
				$check1 = $sqlb->fetch(\PDO::FETCH_ASSOC) ;
                                $count1 = $sqlb->rowCount() ;
                                if ( $count1 == 0 ) {
                                    $sql = $pdo->prepare("insert into LigneFraisForfait ( idVisiteur , mois , idFraisForfait , quantite ) values ( :id , :mois , 'ETP' , :quantite )") ;
                                    $sql->bindParam(':id', $idV);
                                    $sql->bindParam(':mois', $aaa);
                                    $sql->bindParam(':quantite', $data['ETP']);
                                }
                                else {
                                    $sql = $pdo->prepare("update LigneFraisForfait set quantite = :quantite where idVisiteur = :id and mois = :mois and idFraisForfait = 'ETP'") ;
                                    $add = $check1['quantite'] + $data['ETP'] ;
                                    $sql->bindParam(':quantite', $add);
                                    $sql->bindParam(':id', $idV);
                                    $sql->bindParam(':mois', $aaa);
                                }
                                
                                $sqlc = $pdo->prepare("select * from LigneFraisForfait where idVisiteur = :id and mois = :mois and idFraisForfait = 'KM'") ;
                                $sqlc->bindParam(':id', $idV);
                                $sqlc->bindParam(':mois', $aaa);
                                $sqlc->execute() ;
				$check2 = $sqlc->fetch(\PDO::FETCH_ASSOC) ;
                                $count2 = $sqlc->rowCount() ;
                                if ( $count2 == 0 ) {
                                    $sql2 = $pdo->prepare("insert into LigneFraisForfait ( idVisiteur , mois , idFraisForfait , quantite ) values ( :id , :mois , 'KM' , :quantite )") ;
                                    $sql2->bindParam(':id', $idV);
                                    $sql2->bindParam(':mois', $aaa);
                                    $sql2->bindParam(':quantite', $data['KM']);
                                }
                                else {
                                    $sql2 = $pdo->prepare("update LigneFraisForfait set quantite = :quantite where idVisiteur = :id and mois = :mois and idFraisForfait = 'KM'") ;
                                    $add2 = $check2['quantite'] + $data['KM'] ;
                                    $sql2->bindParam(':quantite', $add2);
                                    $sql2->bindParam(':id', $idV);
                                    $sql2->bindParam(':mois', $aaa);
                                }
                                
                                $sqld = $pdo->prepare("select * from LigneFraisForfait where idVisiteur = :id and mois = :mois and idFraisForfait = 'NUI'") ;
                                $sqld->bindParam(':id', $idV);
                                $sqld->bindParam(':mois', $aaa);
                                $sqld->execute() ;
				$check3 = $sqld->fetch(\PDO::FETCH_ASSOC) ;
                                $count3 = $sqld->rowCount() ;
                                if ( $count3 == 0 ) {
                                    $sql3 = $pdo->prepare("insert into LigneFraisForfait ( idVisiteur , mois , idFraisForfait , quantite ) values ( :id , :mois , 'NUI' , :quantite )") ;
                                    $sql3->bindParam(':id', $idV);
                                    $sql3->bindParam(':mois', $aaa);
                                    $sql3->bindParam(':quantite', $data['NUI']);
                                }
                                else {
                                    $sql3 = $pdo->prepare("update LigneFraisForfait set quantite = :quantite where idVisiteur = :id and mois = :mois and idFraisForfait = 'NUI'") ;
                                    $add3 = $check3['quantite'] + $data['NUI'] ;
                                    $sql3->bindParam(':quantite', $add3);
                                    $sql3->bindParam(':id', $idV);
                                    $sql3->bindParam(':mois', $aaa);
                                }
                                
                                $sqle = $pdo->prepare("select * from LigneFraisForfait where idVisiteur = :id and mois = :mois and idFraisForfait = 'REP'") ;
                                $sqle->bindParam(':id', $idV);
                                $sqle->bindParam(':mois', $aaa);
                                $sqle->execute() ;
				$check4 = $sqle->fetch(\PDO::FETCH_ASSOC) ;
                                $count4 = $sqle->rowCount() ;
                                if ( $count4 == 0 ) {
                                    $sql4 = $pdo->prepare("insert into LigneFraisForfait ( idVisiteur , mois , idFraisForfait , quantite ) values ( :id , :mois , 'REP' , :quantite )") ;
                                    $sql4->bindParam(':id', $idV);
                                    $sql4->bindParam(':mois', $aaa);
                                    $sql4->bindParam(':quantite', $data['REP']);
                                }
                                else {
                                    $sql4 = $pdo->prepare("update LigneFraisForfait set quantite = :quantite where idVisiteur = :id and mois = :mois and idFraisForfait = 'REP'") ;
                                    $add4 = $check4['quantite'] + $data['REP'] ;
                                    $sql4->bindParam(':quantite', $add4);
                                    $sql4->bindParam(':id', $idV);
                                    $sql4->bindParam(':mois', $aaa);
                                }
                                
                        if ( $form->getClickedButton() === $form->get('valider') ) {              
				$sql->execute() ;
                                $sql2->execute() ;
                                $sql3->execute() ;
                                $sql4->execute() ;
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
                                 'totalF' => $totalF ,
                                 'todaymy' => $todaymy ,

                        ]);  
                }
                
                                    
               if ( $form2->isSubmitted() && $form2->isValid() ) {   
			$data = $form->getData() ;
                        array( 'data' => $data ) ;
                        
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
                                 'total' => $montTotal , 
                                 'totalF' => $totalF ,
                                 'todaymy' => $todaymy ,   
                        ]);
                }
    

                return $this->render( 'visiteur/renseigner.html.twig', [
                        'formulaire2' => $form2->createView() ,
                        'formulaire' => $form->createView() ,
                        'idVisiteur' => $idV ,
                        'prenomV' => $prenom ,
                        'nomV' => $nom ,
                        'total' => $montTotal ,
                        'totalF' => $totalF ,
                        'todaymy' => $todaymy ,
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
