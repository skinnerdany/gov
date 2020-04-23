<?php

    class controllerTax extends controller
    {
        protected $layoutFile = 'taxLayout';

        public function actionAdd()
        {
            $error = '';
            try{

            }catch(Exception $e){
                $error = $e->getMessage();
            }
            echo $this->renderLayout([
                'error' => $error,
                'content' => $this->renderTemplate('add')
            ]);
        }

        public function actionAddOrganization()
        {
            $organization = $this->getModel('tax');
            $error = '';
            try{
                $organization->addOrganization(core::app()->input->get);
            }catch(Exception $e){

            }
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