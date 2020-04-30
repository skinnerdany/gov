<?php

class controllerGibdd extends controller{
    protected $layoutFile = 'ivan';
    public function actionAdd(){
        $result ='';
        $data =  null;
        $error = false;
        $edit = core::app()->input->get['number'] ?? null;
    
        if (core::app()->input->form) {
            try {
                $result = $this->getModel('gibdd')->add(core::app()->input->post,$edit);
            } catch (Exception $e) {
                $result = $e->getMessage();
                $error = true;
                $data = core::app()->input->post;
            }
          
        }

        if(isset($edit)){
            if(!isset($_SERVER['HTTP_REFERER'])){
                header("refresh: 0; url=?controller=gibdd&action=show");    
            }
           $data =  $this->getModel('gibdd')->check(core::app()->input->get['number']);

           if(empty($data)){    
                $data = core::app()->input->post;
                $data["changeSubmit"] = true;
           }
           
        }

  
        $content = $this->renderTemplate('add', ['result'=>$result,'error' => $error,'data'=>$data]);
        echo $this->renderLayout(['content' => $content]);
        
    }

    public function actionShow(){

        $data = [];
        $data['records'] = $this->getModel('gibdd')->show();
        $data['search_lable'] = false;
        $content = $this->renderTemplate('show',$data);
        echo $this->renderLayout(['content' => $content]);
    }

    


    public function actionDelete(){

        if(!isset(core::app()->input->get['number']) || !isset($_SERVER['HTTP_REFERER'])){
                header("refresh: 0; url=?controller=gibdd&action=show");     
        } else {

            $result = $this->getModel('gibdd')->delete(core::app()->input->get['number']);
            echo $content = $this->renderTemplate('delete', ['result'=>$result]);
            header("refresh: 3; url=?controller=gibdd&action=show");
        }
         
    }


    public function actionSearch(){
        $data =[];
        if(core::app()->input->form){
            
            $data['records'] = $this->getModel('gibdd')->search(core::app()->input->post);
            $data['search_lable'] = true;
            $content = $content = $this->renderTemplate('show',$data);
        }else{
            $content = $this->renderTemplate('search', ['records'=>$data]);
        }
        echo $this->renderLayout(['content' => $content]); 


        
    }
    

}


