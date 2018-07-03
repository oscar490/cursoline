<?php

namespace app\components;

use yii\helpers\Html;

class MyHelpers
{
    /**
     * Devuelve un icono de boostrap.
     *
     * @param string Clase de icono.
     * @return void
     */
    public static function icon($class)
    {
        return Html::tag(
            'span',
            '',
            [
                'class' => $class
            ]
        );
    }
}