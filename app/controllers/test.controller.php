<?php

class controllerTest extends controller
{
    public function actionTest()
    {
        $model = $this->getModel('testm')->testMy();
        //echo "YEEEEES";
    }
}