<?php

if(!defined('_PS_VERSION_'))
{
    exit;
}

class MyModule extends Module {

 
        public function __construct()
        {
            $this->displayName = $this->l('Mymodule');
            $this->name = 'mymodule';
            $this->description = $this->l("the best module ever");
            $this->tab = 'front_office_features';
            $this->version = '1.0.2';
            $this->author = 'Valentin Gautier';
            $this->confirmUninstall = "do you really want to unistall the module ?";
            $this->ps_versions_compliancy = [
                'min' => '1.6',
                'max' => _PS_VERSION_,
            ];
            $this->bootstrap = true;
            parent::__construct();
    
        }



    // on mettra dans la méthode install
    // les variables de configuration
    // Crée un table si besoin
    // on peut ajouter des hooks
    public function install()
    {
        if(!parent::install() ||
        !Configuration::updateValue("KEY",time()) ||
        !$this->createTable())

        {
            return false;
        }
        return true;
    }


    public function uninstall()
    {
        if(!parent::uninstall() ||
        !Configuration::deleteByName('KEY'))
        {
            return false;
        }

        return true;
    }

    // la méthode getContent permet d'afficher le formulaire de configuration
    // de la clé.
    public function getContent()
    {
         return $this->postProcess().$this->renderForm();   
    }

    // la méthode renderform permet de créer le formulaire
    public function renderForm(){
         $fieldsForm[0]['form'] = [
            'legend' => [
                'title' => $this->l('Settings')
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->l('clé de configuration'),
                    'name' => 'KEY',
                    'size' => 20,
                    'required' => true
                ]
                ],
              'submit' => [
                'title' => $this->l('save'),
                'class' => 'btn btn-primary',
                'name' => 'saving'
              ]
         ];

         $helper = new HelperForm();
         $helper->module = $this;
         $helper->name_controller = $this->name;
         $helper->currentIndex =  $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;

         $helper->token = Tools::getAdminTokenLite('AdminModules');
         $helper->fields_value['KEY'] = Configuration::get('KEY');
         return $helper->generateForm($fieldsForm);
    }
    // La méthode post process permet de valider les données du formulaire 
    public function postProcess(){
        // La methode is submit permet de vérifier que le formulaire a bien été valisé ou soumis
        if(Tools::isSubmit('saving')){
            // La méthode get value permet de recuperer en get ou en post les données
            if(empty(Tools::getValue('KEY'))){
                Configuration::updateValue('KEY', time());
                return $this->displayConfirmation('the key was empty so you have a random key'); 
            } else {
                Configuration::updateValue('KEY', Tools::getValue('KEY'));
                return $this->displayConfirmation('The key has been well updated');
            } 
        
        }    
    }

    public function createTable(){
        return Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'mymodule (id_parameter INT NOT NULL PRIMARY KEY AUTO_INCREMENT, parameter VARCHAR(255) NOT NULL)');
    }

}