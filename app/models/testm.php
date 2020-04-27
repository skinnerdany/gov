<?php

class testm extends model
{
    public function testMy()
    {
        echo '<pre>';
        self::$db->insert('test', ['name' => 'MYNAME', 'age' => random_int(15, 45)]);
        $res = self::$db->select('test', '*');
        print_r($res);
        self::$db->update('test', ['name' => 'first'], ['id' => 1]);
        $res = self::$db->select('test', '*');
        print_r($res);
        self::$db->insert('test', ['name' => 'MYNAME', 'age' => random_int(15, 45)]);
        self::$db->insert('test', ['name' => 'MYNAME', 'age' => random_int(15, 45)]);
        $res = self::$db->select('test', '*');
        print_r($res);
    }
}
