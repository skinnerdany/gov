<?php

class ControllerNews extends controller {
    protected $layoutFile = 'newsLayout';

    public function actionAdd(){
        $news = [];
        if(core::app()->input->form){
            try{
                $news = $this->getModel('news')->add(core::app()->input->post);
            } catch(Exception $e) {
                $news = $e->getMessage();
            }
        }
        $content = $this->renderTemplate('add', ['news' => $news]);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionShow(){
        $news = [];
        $news['notes'] = $this->getModel('news')->show();
        $content = $this->renderTemplate('show', $news);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionUpdate(){
        $news = $this->getModel('news')->update(core::app()->input->get['newsTitle']);
        $content = $this->renderTemplate('update', $news);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionDelete(){
        $this->getModel('news')->delete(core::app()->input->get['newsTitle']);
        $this->actionShow();
    }
}