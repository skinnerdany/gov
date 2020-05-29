<?php

class ControllerNews extends controller {
    protected $layoutFile = 'newsLayout';

    public function actionAdd(){
    }

    public function actionShow(){
        echo $this->renderLayout([]);
    }

    public function actionUpdate(){
    }

    public function actionDelete(){
    }
}