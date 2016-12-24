<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
?>

<div class="panel panel-primary">

    <div class="panel-heading">
        <?= (isset($showFullContent) && $showFullContent) ? '<h1 class="panel-title">' : '<h4 class="panel-title">' ?>
            <?= Html::a(Html::encode($model->title), ['/post/view', 'id' => $model->id]) ?>

            <?php if(Yii::$app->user->can('updatePost')) { ?>
                <div class="btn-group pull-right" role="group">
                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                        ['/post/update', 'id' => $model->id],
                        [
                            'class' => 'btn btn-warning btn-sm'
                        ]) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        ['delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                </div>
            <?php } ?>
        <?= (isset($showFullContent) && $showFullContent) ? '</h1>' : '</h4>' ?>
    </div>

    <table class="table">
        <tr>
            <td>
                <span class="glyphicon glyphicon-calendar"></span>
                <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
                <span class="glyphicon glyphicon-user"></span>
                <?= $model->createdBy->username ?>
            </td>
        </tr>
    </table>

    <?php if($model->lead_photo) { ?>
        <a href="<?= Url::to(['/post/view', 'id' => $model->id]) ?>">
            <?= Html::img(Url::to(['/']) . $model->lead_photo,
                ['class' => 'img-responsive center-block']
            ) ?>
        </a>
    <?php } ?>

    <?php if((isset($showFullContent) && $showFullContent) || !empty($model->lead_text)) { ?>
        <div class="panel-body">
            <?php if(!empty($model->lead_text)) { ?>
                <?= Yii::$app->formatter->asHtml($model->lead_text) ?>
            <?php } ?>
            <?php if(isset($showFullContent) && $showFullContent) { ?>
                <?= Yii::$app->formatter->asHtml($model->content) ?>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="panel-footer">
        <?php if(!isset($showFullContent) || !$showFullContent) { ?>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Read full post',
            ['/post/view', 'id' => $model->id],
            [
                'class' => 'btn btn-primary btn-block'
            ]) ?>
        <?php } ?>
    </div>

</div>