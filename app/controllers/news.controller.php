<?php

class ControllerNews extends controller {
    protected $layoutFile = 'newsLayout';

    public function actionAdd(){
        $news = '';
        $data = null;
        $error = false;
        if(core::app()->input->form){
            try{
                $news = $this->getModel('news')->add(core::app()->input->post);
            } catch(Exception $e) {
                $news = $e->getMessage();
                $error = true;
                $data = core::app()->input->post;
            }
        }
        $content = $this->renderTemplate('add', ['news' => $news, 'error' => $error, 'data' => $data]);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionShow(){
        $news = [];
        $news['notes'] = $this->getModel('news')->show();
        $content = $this->renderTemplate('show', $news);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionUpdate(){
        $news = $this->getModel('news')->update();
        $content = $this->renderTemplate('update', $news);
        echo $this->renderLayout(['content' => $content]);
    }

    public function actionDelete(){
        $news = $this->getModel('news')->delete(core::app()->get['newsTitle']);
        $this->actionShow();
    }
}