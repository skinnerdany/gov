<?php

    class controllerDmitry extends controller
    {
        protected $layoutFile = 'dmitryPassLayout';

        public function actionGetpass()
        {
            $model = $this->getModel('dmitryPass');

            echo $this->renderLayout();
        }
    }