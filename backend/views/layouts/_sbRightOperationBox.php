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
use backend\modules\m1\models\Pastor;
use yii\helpers\Url;
use kartik\widgets\Typeahead;

?>

<p>
    <?php if (isset($this->params['searchModel'])) : ?>

    <?php
    $model = $this->params['searchModel'];

    $form = ActiveForm::begin([
        'id' => 'login-form-vertical',
        'type' => ActiveForm::TYPE_INLINE,
        'action' => ['index'],
        'method' => 'get'
    ]);
    ?>
    <? //= $form->field($model, 'pastor_name') ?>
    <?= $form->field($model, 'pastor_name')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Search pastor...'],
        'pluginOptions' => ['highlight' => true],
        'dataset' => [
            [
                'remote' => [
                    'url' => Url::to(['pastor/acpastor']) . '?key=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ]
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block']) ?>
    </div>
<?php ActiveForm::end(); ?>
<?php endif; ?>

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

