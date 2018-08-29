<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\MyHelpers;

AppAsset::register($this);

//  Usuario invitado.
if (Yii::$app->user->isGuest) {
    $items_nav = [
        [
            'label' => MyHelpers::icon('glyphicon glyphicon-log-in')
                    . '   Acceder',
            'url' => ['/site/login'],
            'encode' => false,
        ]
    ];

//  Usuario registrado.
} else {
    $usuario_login = Yii::$app->user->identity;

    $items_nav = [
        [
            'label' =>'<div>' . MyHelpers::icon('glyphicon glyphicon-home') .
                ' ' . 'Inicio</div>',
            'url'=>['/cursos/index'],
            'encode' => false,
        ],
        [
            'label' => Html::img($usuario_login->url_imagen, ['alt' => 'imagen_user']),
            'items' => [
                [
                    'label' => MyHelpers::icon('glyphicon glyphicon-user')
                        . ' Perfil',
                    'url' => ['usuarios/view', 'id' => $usuario_login->id],
                    'encode' => false,
                ],
                '<li class="divider"></li>',
                [
                    'label' => MyHelpers::icon('glyphicon glyphicon-log-out')
                        . ' Cerrar sesión',
                    'url' => ['site/logout'],
                    'encode' => false,
                    'linkOptions' => [
                        'data-method' => 'post'
                    ]
                ]
            ],
            'encode' => false,
        ],

    ];
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>
            Html::tag(
                'p',
                Html::img(
                    '/images/logo-cursoline.png',
                    ['alt' => 'CursoLine', 'class' => 'logotipo']
                ) . Yii::$app->name
                ),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items_nav,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'options' => ['class' => 'breadcrumb sombra_div'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">CursoLine</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
