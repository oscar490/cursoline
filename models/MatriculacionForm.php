<?php

namespace app\models;

use yii\base\Model;
use app\models\Modulos;

class MatriculacionForm extends Model
{
    public $clave;

    public $id_modulo;

    public function rules()
    {
        return [
            [['clave'], 'required'],
            [['clave'], function ($attribute, $params, $validator) {
                $modulo = Modulos::findOne($this->id_modulo);

                if ($modulo->clave !== $this->$attribute) {
                    $this->addError($attribute, 'Clave incorrecta');
                }
            }]
        ];
    }

    public function attributeLabels()
    {
        return [
            'clave' => 'Clave de Automatriculación',
        ];
    }
}
