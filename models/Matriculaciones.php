<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matriculaciones".
 *
 * @property int $id
 * @property int $modulo_id
 * @property int $usuario_id
 *
 * @property Modulos $modulo
 * @property Usuarios $usuario
 */
class Matriculaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matriculaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modulo_id', 'usuario_id'], 'default', 'value' => null],
            [['modulo_id', 'usuario_id'], 'required'], 
            [['modulo_id', 'usuario_id'], 'integer'],
            [['modulo_id', 'usuario_id'], 'unique', 'targetAttribute' => ['modulo_id', 'usuario_id']],
            [['modulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modulos::className(), 'targetAttribute' => ['modulo_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modulo_id' => 'Modulo ID',
            'usuario_id' => 'Usuario ID',
        ];
    }

    public function formName()
    {
        return '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulos::className(), ['id' => 'modulo_id'])->inverseOf('matriculaciones');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('matriculaciones');
    }
}
