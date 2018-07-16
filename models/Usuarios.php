<?php

namespace app\models;

use yii\helpers\Html;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $email
 * @property string $password
 * @property string $ciudad
 * @property string $pais
 * @property string $descripcion
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'email', 'password'], 'required'],
            [['nombre', 'apellidos', 'email', 'password', 'ciudad', 'pais', 'descripcion'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['pais', 'ciudad', 'descripcion'], 'default', 'value' => null]
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
            'apellidos' => 'Apellidos',
            'email' => 'Email',
            'password' => 'Password',
            'token_act' => 'Token Act',
            'token_rec' => 'Token Rec',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        $usuario = Usuarios::findOne(['email' => $email]);

        return $usuario;
    }


    /**
     * Comprueba si el atributo es diferente a null. En caso de si,
     * devuelve dicho atributo para mostrarlo. En caso de que no, devuelve
     * un enlace para redireccionar a la página de modificación de perfil
     * de usuario.
     * @param string $atributo      Atributo a comprobar.
     * @param string $nombre_enlace Nombre del enlace a mostrar en caso
     *                              de que el atributo este a null.
     * @return mixed El atributo si es diferente a null o el enlace si el
     *               el atributo es null.
     */
    public function comprobarAtributo($atributo, $nombre_enlace)
    {
        if ($atributo === null) {
            return Html::a($nombre_enlace, ['usuarios/update', 'id'=>$this->id]);
        }

        return Html::encode($atributo);
    }

    /**
     * Devuelve y crea un enlace a la página de modificación
     * del perfil de usuario.
     * @param  string $nombre Nombre del enlace
     * @return mixed         Enlace creado.
     */
    public function createEnlaceUpdate($nombre)
    {
        return Html::a($nombre, ['usuarios/update', 'id' => $this->id]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        //return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return $this->password === $password;
    }

    public function getModulos()
    {
        return $this->hasMany(Modulos::classNAme(), ['id' => 'modulo_id'])
            ->viaTable('matriculaciones', ['usuario_id' => 'id']);
    }
}
