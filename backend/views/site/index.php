<?php

use yii\helpers\Html;
use yii\bootstrap\Carousel;

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
                        // the item contains only the image
                        //'<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
                        '<img class="img-responsive img-rounded" src="http://placehold.it/900x350" alt="">',
                        // equivalent to the above
                        //['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
                        // the item contains both the image and the caption
                        //[
                        //    'content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                        //    'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                        //'options' => [...],
                        //],
                    ]
                ]);

                ?>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>GPdI MD Jabar</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it,
                    but it makes a great use of the standard Bootstrap core components. Feel free to use this template
                    for any project you want!</p>
                <?= Html::a('Login', ['site/login'], ['class' => 'btn btn-primary btn-lg']) ?>
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
                <h2>Heading 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi
                    non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                    dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>

    </div>
</div>

