<?php

require_once ROOT . '/core/model.php';

class Model404 implements Model
{
    public static function getData()
    {
        return 'страница не найдена';
    }
}
