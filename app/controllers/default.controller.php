<?php

    class controllerDefault extends controller
    {
        public function actionDefault()
        {
            echo $this->renderLayout([
                'error' => '',
                'modal' => '',
                'content' => ''
            ]);
        }
    }