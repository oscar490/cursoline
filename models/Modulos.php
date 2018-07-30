<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use app\models\Matriculas;

/**
 * This is the model class for table "modulos".
 *
 * @property int $id
 * @property string $nombre
 * @property int $clave
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
            [['nombre', 'nivel_id', 'clave'], 'required'],
            [['nivel_id'], 'default', 'value' => null],
            [['nivel_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    public function getEnlace()
    {
        return Html::a(
            $this->nombre,
            ['modulos/view', 'id' => $this->id]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Cursos::className(), ['id' => 'curso_id'])->inverseOf('modulos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaciones()
    {
        return $this->hasMany(Matriculaciones::className(), ['modulo_id' => 'id'])
            ->inverseOf('modulo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidades()
    {
        return $this->hasMany(Unidades::className(), ['modulo_id' => 'id'])
            ->inverseOf('modulo');
    }
}
