<?php

use yii\helpers\Html;
use yii\bootstrap\Carousel;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */

$this->title = 'GPdI MD Jabar';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-md-8">
                <?=
                Carousel::widget([
                    'items' => [
                        Html::img("@web/images/carousel/photo1.jpg",['style'=>'display:table-cell;width:100%;height:100%;vertical-align: middle;']),
                        Html::img("@web/images/carousel/photo2.jpg",['style'=>'display:table-cell;width:100%;height:100%;vertical-align: middle;']),
                        // the item contains only the image
                        //'<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
                        //'<img class="img-responsive img-rounded" src="http://placehold.it/900x350" alt="">',
                        // equivalent to the above
                        //['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
                        // the item contains both the image and the caption
                        //[
                        //    'content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                        //    'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                        //'options' => [...],
                        //],
                    ],
                    'options'=>[
                        'style'=>'height:350px;overflow:hidden;'
                    ]
                ]);

                ?>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <?php /*                
                <h1>Login</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it,
                    but it makes a great use of the standard Bootstrap core components. Feel free to use this template
                    for any project you want!</p>
                <?= Html::a('Login', ['site/login'], ['class' => 'btn btn-primary btn-lg']) ?> */ ?>

                <p><strong>Login ke Aplikasi</strong></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>


            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    This is a well that is a great spot for a business tagline or phone number for easy access!
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>Pendataan</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Pelayanan Lebih Maju</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Menjangkau Jiwa</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>

    </div>
</div>

