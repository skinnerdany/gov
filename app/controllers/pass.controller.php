<?php

class controllerPass extends controller {

    protected $layoutFile = 'vyacheslav';
    protected $error = '';
    
    public function actionChooseservice() {
        try{

        }catch(Exception $e){
            $this->error = $e->getMessage();
        }
        echo $this->renderLayout([
            'error' => $this->error,
            'vyacheslavTemplate' => $this->renderTemplate('servicelist')
        ]);
  }


    public function actionPassform() {
                
        try{

        }catch(Exception $e){
            $this->error = $e->getMessage();
        }
        echo $this->renderLayout([
            'error' => $this->error,
            'vyacheslavTemplate' => $this->renderTemplate('passform')
        ]);

  }    
  
    public function actionPrintPass() {
        
        try{

        }catch(Exception $e){
            $this->error = $e->getMessage();
        }
        echo $this->renderLayout([
            'error' => $this->error,
            'vyacheslavTemplate' => $this->renderTemplate('printPass')
        ]);
        
        $passmodel = $this->getModel('pass');
        $passmodel -> createPass($_POST);
  }   

  protected function createPassId() {
      
      
      
  }
}


