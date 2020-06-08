<?php

class ControllerDenis extends controller {

    protected $layoutFile = 'denisPassLayout';
    
    public function actionCreatePass(){
        $error = "";
        if (core::app()->input->form){
            try {
                $passData = $this->getModel('denisPass')->generatePass(core::app()->input->post);
                header("refresh: 0; url=?controller=denis&action=createpass&pass_id=" .$passData); 
            }
            catch (Exception $e){
                $error = $e->getMessage();
            }
            return;
        }
        //code for pass
        if(isset(core::app()->input->get['pass_id'])){
            echo $this->renderLayout([
                'content' => $this->renderTemplate('showPass', ['passData' => core::app()->input->get['pass_id']])
            ]);
        }else{
            // code for getting pass
            echo $this->renderLayout([
            'content' => $this->renderTemplate('generatePassForm')
            ]);
        }
    }

    public function actionCheckPass(){
        $error = "";
        $checkData = [];
        if (core::app()->input->form){
            try {
                $checkData = $this->getModel('denisPass')->check(core::app()->input->post['pass_id']);
            } catch(Exception $e) {
                $error = $e->getMessage();
            }
            // code for check pass
            echo $this->renderLayout([
                'content' => $this->renderTemplate('checkResult', ['checkData' => $checkData, 'error' => $error])
            ]);
            return;
        }
        // code for pass form
        echo $this->renderLayout([
            'content' => $this->renderTemplate('checkForm')
        ]);
    }
}