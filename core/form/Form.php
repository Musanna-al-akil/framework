<?php

namespace App\Core\Form;

use App\Core\Model;

class Form
{
    public static function begin($action,$method)
    {
        echo sprintf('<form acton="%s" method="%s">',$action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}