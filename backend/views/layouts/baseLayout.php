<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use mdm\admin\components\MenuHelper;
use backend\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SIGEM GPdI',
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (!Yii::$app->user->isGuest) {
        $menuItemsLeft = MenuHelper::getAssignedMenu(Yii::$app->user->id);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => $menuItemsLeft,
        ]);

        $menuItems2[] = ['label' => 'Reset Password', 'url' => ['/site/request-password-reset']];
        $menuItems2[] = '<li><a>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</a></li>';

        $menuItems[] = ['label' => User::getFullname(), 'items' => $menuItems2];

    } else {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();

    ?>

    <?= $content ?>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right">&copy; GPdI MD Jabar <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
