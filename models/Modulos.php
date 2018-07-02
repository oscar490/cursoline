<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulos".
 *
 * @property int $id
 * @property string $nombre
 * @property int $nivel_id
 * @property string $url_imagen
 * @property string $descripcion
 *
 * @property Niveles $nivel
 */
class Modulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'nivel_id'], 'required'],
            [['nivel_id'], 'default', 'value' => null],
            [['nivel_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre', 'nivel_id'], 'unique', 'targetAttribute' => ['nombre', 'nivel_id']],
            [['nivel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Niveles::className(), 'targetAttribute' => ['nivel_id' => 'id']],
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
            'nivel_id' => 'Nivel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Cursos::className(), ['id' => 'curso_id'])->inverseOf('modulos');
    }
}
