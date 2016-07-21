<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/11/16
 * Time: 5:20 PM
 */

use kartik\widgets\SideNav;
use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use backend\models\Pastor;

?>

<p>
    <?php
    $model = new Pastor();

    $form = ActiveForm::begin([
        'id' => 'login-form-vertical',
        'type' => ActiveForm::TYPE_INLINE
    ]);
    ?>
    <?= $form->field($model, 'pastor_name') ?>

<div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block']) ?>
</div>
<?php ActiveForm::end(); ?>

</p>


<?php if (isset($this->params['createButton'])) : ?>
    <p>
        <?= Html::a($this->params['createButton']['title'], $this->params['createButton']['url'], ['class' => 'btn btn-success btn-block']) ?>
    </p>
<?php endif; ?>

<?php if (isset($this->params['menuOperation'])) : ?>
    <?=
    SideNav::widget([
    'type' => SideNav::TYPE_PRIMARY,
        'heading' => $this->params['menuOperation']['title'],
        'items' => $this->params['menuOperation']['list']
]);
    ?>
<?php endif; ?>

<?php if (isset($this->params['menuRecentlyUpdated'])) : ?>
    <?=
    Html::panel([
        'heading' => $this->params['menuRecentlyUpdated']['title'],
        'body' => '<div class="panel-body">' .
            Html::mediaList(
                $this->params['menuRecentlyUpdated']['list']
            )
            . '</div>',
    ], $this->params['menuRecentlyUpdated']['type']);

    ?>
<?php endif; ?>

<?php if (isset($this->params['menuRecentlyAdded'])) : ?>
    <?=
    Html::panel([
        'heading' => $this->params['menuRecentlyAdded']['title'],
        'body' => '<div class="panel-body">' .
            Html::mediaList(
                $this->params['menuRecentlyAdded']['list']
            )
            . '</div>',
    ], $this->params['menuRecentlyUpdated']['type']);

    ?>
<?php endif; ?>

