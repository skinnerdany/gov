<?php

    class controllerTax extends controller
    {
        protected $layoutFile = 'taxLayout';
        protected $error = '';

        public function actionAdd()
        {
            try{

            }catch(Exception $e){
                $this->error = $e->getMessage();
            }
            echo $this->renderLayout([
                'error' => $this->error,
                'content' => $this->renderTemplate('add')
            ]);
        }

        public function actionAddOrganization()
        {
            $organization = $this->getModel('tax');
            $message = '';
            try{
                $message = $organization->addOrganization(core::app()->input->get);
            }catch(Exception $e){
                $this->error = $e->getMessage();
                $this->actionAdd();
            }

            echo $this->renderLayout([
                'error' => $this->error,
                'content' => $this->renderTemplate('addOrganization', ['message' => $message])
            ]);

        }

        public function actionAddOkved()
        {
            $okved = $this->getModel('okved');
            $error = '';
            try{

            }catch(Exception $e){

            }

        }
    }