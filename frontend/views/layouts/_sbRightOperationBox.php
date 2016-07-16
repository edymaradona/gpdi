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
        <?= Html::a($this->params['createButton']['title'], $this->params['createButton']['url'],
            ['class' => 'btn btn-success btn-block']) ?>
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
    SideNav::widget([
        'type' => SideNav::TYPE_INFO,
        'heading' => $this->params['menuRecentlyUpdated']['title'],
        'items' => $this->params['menuRecentlyUpdated']['list']
    ]);
    ?>
<?php endif; ?>

<?php if (isset($this->params['menuRecentlyAdded'])) : ?>
    <?=
    SideNav::widget([
        'type' => SideNav::TYPE_INFO,
        'heading' => $this->params['menuRecentlyAdded']['title'],
        'items' => $this->params['menuRecentlyAdded']['list']
    ]);
    ?>
<?php endif; ?>

