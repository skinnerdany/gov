<?php 

    class controllerDmitry extends controller
    {
        protected $layoutFile = 'dmitryPassLayout';
        protected $error = '';

        public function actionTest()
        {
            $model = $this->getModel('dmitryPass');
            $model->buildPass();
        }

        public function actionShowpass()
        {
            $pass = $this->getModel('dmitryPass');
            $data = [];
            try{
                if(core::app()->input->form){
                    $data = $pass->showPass(core::app()->input->get);
                }
            }catch(Exception $e){
                $this->error = $e->getMessage();
            }

            $this->layoutFile = 'dmitryPassShowLayout';
            echo $this->renderLayout([
                'error' => $this->error,
                'data'  => $this->renderTemplate('ShowPass', ['data' => $data]),
                'menu' =>  $this->renderTemplate('taxMenu')
                ]
            );
        }

        public function actionGetpass()
        {
            $model = $this->getModel('dmitryPass');

            echo $this->renderLayout([
                'error' => $this->error,
                'menu' =>  $this->renderTemplate('taxMenu')
            ]);
        }


        public function actionBuildpass()
        {
            $model = $this->getModel('dmitryPass');
            $this->layoutFile = 'dmitryPassLayout';
            try{
                if(core::app()->input->form){
                    $model->buildPass(core::app()->input->post);
                }
            }catch(Exception $e){
                $this->error = $e->getMessage();
                $this->actionGetpass();
            }

        }
    }