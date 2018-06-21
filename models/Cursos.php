<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
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
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNiveles()
    {
        return $this->hasMany(Niveles::className(), ['curso_id'=>'id'])
            ->inverseOf('curso');
    }
}
