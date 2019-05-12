<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets2\AppAsset;

AppAsset::register($this);
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
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => 'Pengelolaan Zakat',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        //tambahkan icon
        'encodeLabels'=>false, //nonaktifkan kode
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Mustahik',
                //'visible' => !Yii::$app->user->isGuest, //yg sudah login
                'items' => [
                    ['label' => 'Tabel', 'url' => ['/mustahik']],
                    ['label' => 'Grafik', 'url' => ['/mustahik/grafik']],
                ],
            ],
            ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Penyaluran',
              //'visible' => !Yii::$app->user->isGuest, //yg sudah login
                'items' => [
                    ['label' => 'Tabel', 'url' => ['/penyaluran']],
                    ['label' => 'Grafik', 'url' => ['/penyaluran/grafik']],
                ],
            ],


            Yii::$app->user->isGuest ? (
                ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login', 'url' => ['/user/security/login']]
            ) : (
                /*
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                */

                ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.Yii::$app->user->identity->username,
                    'items' => [
                ['label' => '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Kelola User',
                    'url' => ['/user/admin/index'],
                    'visible' => Yii::$app->user->can('administrator'),
                //'visible' => !Yii::$app->user->isGuest,
                ],
                ['label' => 'Kelola RBAC',
                    'url' => ['/admin'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
                ['label' => '<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout',
                    'url' => ['user/security/logout'],
                    'linkOptions'=>['data-method' => 'post'],
                        ],
                    ],
                ]
            ),
            /*['label' => '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Kelola User',
                'url' => ['/user/admin/index'],
                'visible' => Yii::$app->user->identity->isAdmin,
                'visible' => !Yii::$app->user->isGuest,
            ],*/
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Pengelolaan Zakat <?= date('Y') ?></p>

        <p class="pull-right">Pengelolaan Zakat</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
