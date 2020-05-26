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
  
  
    public function actionCheckPass()
	{
		echo $this->renderLayout([
			'vyacheslavTemplate' => $this->renderTemplate('checkpass')
		]);
	}
        
    public function actionPassInfo()
	{
		$res = $passdata = $this->getModel('pass')-> getPassInfo($_POST);
                if(isset($res)){
		echo $this->renderLayout([
                     'vyacheslavTemplate' => $this->renderTemplate('passinfo', 
                    [
                         'passvalue' => $res['pass_id'], 
                         'name' => $res['name'], 
                         'second_name' => $res['second_name'], 
                         'organization_name' => $res['organization_name'], 
                         'createDate' => $res['create_date'], 
                         'expireDate'=> $res['expire_date']
                    ])
		]);
                }else{
                echo $this->renderLayout([
                     'vyacheslavTemplate' => $this->renderTemplate('nopasspage')
		]);
                }
	}
  
    public function actionPrintPass() {
        
        try{
                        
        }catch(Exception $e){
            $this->error = $e->getMessage();
        }
        $res = $passmodel = $this->getModel('pass')-> createPass($_POST);
        echo $this->renderLayout([
            'error' => $this->error,
            'vyacheslavTemplate' => $this->renderTemplate('printPass', 
                    [
                        'pass'=> $res['pass'], 
                        'createDate' => $res['createDate'], 
                        'expireDate'=> $res['expireDate']
                    ]),
        ]);
            
 
//            $printpass = core::app()->print_d($res);

  }   
  
      public function actionInstructions() {
        try{

        }catch(Exception $e){
            $this->error = $e->getMessage();
        }
        echo $this->renderLayout([
            'error' => $this->error,
            'vyacheslavTemplate' => $this->renderTemplate('instructions')
        ]);
  }
}


