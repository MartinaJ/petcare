<?php

use app\models\Pet;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Treatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-form">

    <label class="control-label" for="treatment-date">Date</label>
    <?php
    $form = ActiveForm::begin();
    ?>

    <?php
    echo DateTimePicker::widget([
            'name' => 'Treatment[date]',
            'value' => empty($model->date) ? date('Y-m-d H:i') : $model->date,
            'type' => DateTimePicker::TYPE_INPUT,
            'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd HH:ii:00'
            ]
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
    $items = Pet::getPetsIdsWithDescription(Pet::find()->all());
    echo $form->field($model, 'pet_id')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
