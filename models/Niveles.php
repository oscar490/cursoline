<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "niveles".
 *
 * @property int $id
 * @property string $nombre
 * @property int $curso_id
 *
 * @property Cursos $curso
 */
class Niveles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'niveles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'curso_id'], 'required'],
            [['curso_id'], 'default', 'value' => null],
            [['curso_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::className(), 'targetAttribute' => ['curso_id' => 'id']],
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
            'curso_id' => 'Curso ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Cursos::className(), ['id' => 'curso_id'])->inverseOf('niveles');
    }
}
