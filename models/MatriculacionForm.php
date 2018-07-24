<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * Modelo que representa el formulario de matriculación
 * en módulo.
 */
class MatriculacionForm extends Model
{
    /**
     * Clave para matriculación.
     * @var [type]
     */
    public $clave;

    public function rules()
    {
        return [
            [['clave'], 'required'],
            [
                ['clave'],
                'exist',
                'targetClass' => Modulos::class,
                'targetAttribute' => ['clave' => 'clave'],
                'message' => 'Clave incorrecta'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'clave' => 'Clave de Automatriculación',
        ];
    }
}
