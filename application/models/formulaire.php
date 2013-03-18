<?php 
class Application_Model_Formulaire extends Zend_Form{
	public function __construct($options = null)
 {

 parent::__construct($options);
 $this->setName('signup');
 $this->setMethod('post');
 $this->setAction('signin');

 $email = new Zend_Form_Element_Text('email');
 $email->setRequired(true);
 $email->addValidator('emailAddress');
 $email->setAttrib('size', 35)->removeDecorator('label')->removeDecorator('htmlTag'); //Remove  ..
 //$email->addErrorMessage('Erreur e-mail :D ');//Erreur personaliséé Override toutes les autres erreurs!
  
 $nom = new Zend_Form_Element_Text('nom');
 $nom->setAttrib('size', 35);

 $prenom = new Zend_Form_Element_Text('prenom');
 $prenom->setAttrib('size', 35);

 $gsm = new Zend_Form_Element_Text('gsm');
 $gsm->setAttrib('size', 35);

 $civilite = new Zend_Form_Element_Text('civilite');
 $civilite->setAttrib('size', 35);

 $pass = new Zend_Form_Element_Password('pass');
 $pass->setAttrib('size', 35);

 $submit = new Zend_Form_Element_Submit('submit');
 $submit->setAttrib('class','btn btn-primary');


 $this->setDecorators(array(array('ViewScript', array('viewScript' => '_form_register.phtml'))));

 $this->addElements(array($email,$pass,$nom,$prenom,$gsm,$civilite,$submit));

 } 
 public function getForm($nom,$action){
 
 $this->setName($nom);
 $this->setMethod('post');
 $this->setAction($action);

$email = new Zend_Form_Element_Text('email');
 $email->setRequired(true);
 $email->addValidator('emailAddress');
 $email->setAttrib('size', 35)->removeDecorator('label')->removeDecorator('htmlTag'); //Remove  ..
 //$email->addErrorMessage('Erreur e-mail :D ');//Erreur personaliséé Override toutes les autres erreurs!
  
 $nom = new Zend_Form_Element_Text('nom');
 $nom->setAttrib('size', 35);

 $prenom = new Zend_Form_Element_Text('prenom');
 $prenom->setAttrib('size', 35);

 $gsm = new Zend_Form_Element_Text('gsm');
 $gsm->setAttrib('size', 35);

 $civilite = new Zend_Form_Element_Text('civilite');
 $civilite->setAttrib('size', 35);

 $pass = new Zend_Form_Element_Password('pass');
 $pswd->setAttrib('size', 35);

 $submit = new Zend_Form_Element_Submit('submit');
 $submit->setAttrib('class','btn btn-primary');


 $this->setDecorators(array(array('ViewScript', array('viewScript' => '_form_register.phtml'))));

 $this->addElements(array($email,$pass,$nom,$prenom,$gsm,$civilite,$submit));
 }
}
?> 