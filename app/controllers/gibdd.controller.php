<?php

class controllerGibdd extends controller{
    protected $layoutFile = 'ivan';
    public function actionAdd(){

        if (core::app()->input->form) {
            $this->getModel('gibdd')->add(core::app()->input->post);
        }
        
        $content = $this->renderTemplate('add');
        echo $this->renderLayout(['content' => $content]);

    }

}


