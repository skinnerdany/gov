<?php

class controllerGibdd extends controller{
    protected $layoutFile = 'ivan';
    public function actionAdd(){
        $this->getModel('gibdd')->activitys();
        $content = $this->renderTemplate('add');
        echo $this->renderLayout(['content' => $content]);

    }

}


