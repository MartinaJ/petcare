<?php

use app\models\Owner;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'species')->inline()->radioList([
        'Lama',
        'Pes',
    ]) ?>

    <?= $form->field($model, 'chip')->textInput(['maxlength' => true]) ?>

    <?php
    $items = Owner::getOwnerIdsWithDescription(Owner::find()->all());
    echo $form->field($model, 'owner_id')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
