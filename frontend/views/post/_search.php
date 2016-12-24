<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'title')->textInput(['placeholder' => 'Поиск по тайтлу'])->label(false) ?>
        </div>

    <? // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'slug') ?>

    <?php // $form->field($model, 'lead_photo') ?>

    <?php // $form->field($model, 'lead_text') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

        <div class="col-md-5">
            <?php  echo $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), ['prompd' => 'Выберите категорию'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <div class="form-group btn-group btn-group-justified">
                <div class="btn-group">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="btn-group">
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
