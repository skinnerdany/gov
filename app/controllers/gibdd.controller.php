<?php

class controllerGibdd extends controller{
    protected $layoutFile = 'ivan';
    public function actionAdd(){
        $result ='';
        $data =  null;
        $error = false;
    
        if (core::app()->input->form) {
            try {
                $result = $this->getModel('gibdd')->add(core::app()->input->post);
            } catch (Exception $e) {
                $result = $e->getMessage();
                $error = true;
                $data = core::app()->input->post;
            }
          
        }

        if(isset(core::app()->input->get['number'])){
           $data =  $this->getModel('gibdd')->check(core::app()->input->get['number']);
        }

  
         echo(core::app()->input->post['edit']);
        

      
          
        
        $content = $this->renderTemplate('add', ['result'=>$result,'error' => $error,'data'=>$data]);
        echo $this->renderLayout(['content' => $content]);
        
    }

    public function actionShow(){

        $data = [];
        $data['records'] = $this->getModel('gibdd')->show();
        $content = $this->renderTemplate('show',$data);
        echo $this->renderLayout(['content' => $content]);
    }


    public function actionEdit(){
        echo "Edit";
    }

}


