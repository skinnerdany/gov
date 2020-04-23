<?php

    class controllerTax extends controller
    {
        protected $layoutFile = 'taxLayout';

        public function actionAdd()
        {
            echo $this->renderLayout([
                'error' => '',
                'content' => $this->renderTemplate('add')
            ]);
        }
    }