<?php

class controllerGibdd extends controller{
    protected $layoutFile = 'ivan';
    public function actionAdd(){
        $result ='';
        $data =  core::app()->input->get ?? null;
        $error = false;
        $dataCar =core::app()->input->post ??  null ;
        if (core::app()->input->form) {
            try {
                $result = $this->getModel('gibdd')->add($dataCar);
            } catch (Exception $e) {
                $result = $e->getMessage();
                $error = true;
                $data = core::app()->input->post;
            }
          
        }
      
          
        
        $content = $this->renderTemplate('add', ['result'=>$result,'error' => $error,'data'=>$data]);
        echo $this->renderLayout(['content' => $content]);
        
    }

    public function actionShow(){

        $data = [];
        $data['records'] = $this->getModel('gibdd')->show();
        $content = $this->renderTemplate('show',$data);
        echo $this->renderLayout(['content' => $content]);
    }

}


