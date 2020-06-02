<?php

class ControllerDenis extends controller {

    protected $layoutFile = 'denisPassLayout';
    
    public function actionCreatePass(){
        if (core::app()->input->form){
            $passData['post'] = $this->getModel('denisPass')->generatePass(core::app()->input->post);
            //code for pass
            echo $this->renderLayout([
                'content' => $this->renderTemplate('showPass')
            ]);
            return;
        }
        // code for getting pass
        echo $this->renderLayout([
            'content' => $this->renderTemplate('generatePassForm')
        ]);
    }

    public function actionCheckPass(){
        $checkData = [];
        if (core::app()->input->form){
            $checkData = $this->getModel('denisPass')->check(core::app()->input->post['pass_id']);
            // code for check pass
            echo $this->renderLayout([
                'content' => $this->renderTemplate('checkResult', ['checkData' => $checkData])
            ]);
        }
        // code for pass form
        echo $this->renderLayout([
            'content' => $this->renderTemplate('checkForm')
        ]);
    }
}