<?php

    class controllerTax extends controller
    {
        protected $layoutFile = 'taxLayout';
        protected $error = '';
        protected $message = '';

        public function actionAdd()
        {
            echo $this->renderLayout([
                'taxMenu' => $this->renderTemplate('taxMenu'),
                'error' => $this->error,
                'message' => $this->renderTemplate('isCompleteMessage', ['message' => $this->message]),
                'content' => $this->renderTemplate('add')
            ]);
        }

        public function actionAddOrganization()
        {
            $organization = $this->getModel('tax');
            $data = core::app()->input->get ?? core::app()->input->post ?? [];

            try{
                $this->message = $organization->addOrganization($data);
            }catch(Exception $e){
                $this->message = 'Отмена операции';
                $this->error = $e->getMessage();
            }
            $this->actionAdd();
        }

        public function actionAddOkved()
        {
            $okved = $this->getModel('okved');
            $data = core::app()->input->get ?? core::app()->input->post ?? [];
            try{
                $this->message = $okved->add($data);
            }catch(Exception $e){
                $this->message = 'Отмена операции';
                $this->error = $e->getMessage();
            }

            $this->actionOkved();
        }

        public function actionOrganizationlist()
        {
            $organization = $this->getModel('tax');
            try{
                $orgList = $organization->getOrgList();
            }catch(Exception $e){
                $this->message = 'Отмена операции';
                $this->error = $e->getMessage();
            }

            echo $this->renderLayout([
                'taxMenu' => $this->renderTemplate('taxMenu'),
                'error' => $this->error,
                'message' => $this->renderTemplate('isCompleteMessage', ['message' => $this->message]),
                'content' => $this->renderTemplate('orgList', ['orgList' => $orgList])
            ]);

        }

        public function actionOkved()
        {
            echo $this->renderLayout([
                'taxMenu' => $this->renderTemplate('taxMenu'),
                'error' => $this->error,
                'message' => $this->message,
                'content' => $this->renderTemplate('okved')
            ]);
        }

        public function actionDelete()
        {
            $organization = $this->getModel('tax');

            $organization->delete(core::app()->input->get['id']);

            $this->actionOrganizationlist();
        }


        public function actionUpdate()
        {
            $organization = $this->getModel('tax');
            $data = core::app()->input->get ?? core::app()->input->post ?? [];
            try{
                if(core::app()->input->form == 1){
                    $organization->update($data);
                }
            }catch(Exception $e){
                $this->error = $e->getMessage();
            }
            echo $this->renderLayout([
                'taxMenu' => $this->renderTemplate('taxMenu'),
                'error' => $this->error,
                'message' => $this->renderTemplate('isCompleteMessage', ['message' => $this->message]),
                'content' => $this->renderTemplate('update')
            ]);
        }
    }