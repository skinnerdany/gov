<?php

class controllerPage extends controller
{
    public function actionTest()
    {
        echo '<a href="/?controller=page&action=test2">to test 2</a>';
    }
    
    public function actionTest2()
    {
        echo '<a href="/?controller=page&action=test">to test</a>';
    }
}