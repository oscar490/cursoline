<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidades".
 *
 * @property int $id
 * @property string $nombre
 * @property int $modulo_id
 *
 * @property Modulos $modulo
 */
class Unidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'modulo_id'], 'required'],
            [['modulo_id'], 'default', 'value' => null],
            [['modulo_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['modulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modulos::className(), 'targetAttribute' => ['modulo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'modulo_id' => 'Modulo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulos::className(), ['id' => 'modulo_id'])->inverseOf('unidades');
    }
}
