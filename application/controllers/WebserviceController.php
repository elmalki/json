<?php

class WebserviceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
     $form=new Application_Model_Formulaire();
     $this->view->form=$form;
    }

    public function signinAction()
    {
       $usersTable=new Application_Model_DbTable_Users();
       $user=$usersTable->find(6)->current();
       $this->view->user=$user;
       // if ($form->isValid($this->_request->getPost())){
            $email=$this->_request->getPost('email');if(empty($email)){$email='empty@empty.com';}
            $pass=$this->_request->getPost('pass');
            $pass=md5($pass);
            $nom=$this->_request->getPost('nom');
            if(empty($nom)){$nom='empty';}
            $prenom=$this->_request->getPost('prenom');
            if(empty($prenom)){$prenom='empty';}
            $civilite=$this->_request->getPost('civilite');
            if(empty($civilite)){$civilite='empty';}
            $gsm=$this->_request->getPost('gsm');
            if(empty($gsm)){$gsm='0600000000';}
            $dataRegister=  array('email'=>$email,'password'=>$pass,'firstname'=>$nom,'lastname'=>$prenom,'civility'=>$civilite,'phone'=>$gsm);
            
            $user = new Application_Model_DbTable_Users();
            $query = $user->select(); 
            $query->where('email = ? ',$email); 
            $result = $user->fetchRow($query); 
            if(!empty($result)){
               
                     $user->insert($dataRegister); 
                     $this->_helper->json->sendJson(array('Header'=>array('status' => 'NOK','message' => 'Email existant')));
                                                         
            }
          else{
            $user->insert($dataRegister);
           $this->_helper->json->sendJson(array('Header'=>array('status' => 'OK','message' => 'Inscription OK')));
           
           }
            /* 
            Avant d'inserer dans la base de donnee , verifier si l'email existe deja,
            si existe , return le JSON Erreur approprié
            SINON
            le JSON ssucces!

            */
            
    }
    
}



