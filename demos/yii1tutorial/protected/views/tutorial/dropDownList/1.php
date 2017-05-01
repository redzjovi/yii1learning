<?php $this->pageTitle = 'Yii dependent dropdown ajax to text';
$this->breadcrumbs = [
    'Tutorial' => ['/tutorial'],
    $this->pageTitle,
]; ?>

<?php $form = $this->beginWidget('CActiveForm'); ?>

<div class="row">
    <?= $form->labelEx($model, 'username'); ?>
    <?= CHtml::activeDropDownList(
        $model,
        'id',
        CHtml::listData(Users::model()->findAll(), 'id', 'username'),
        [
            'ajax' => [
                'data' => ['user_id' => 'js:this.value'],
                'dataType' => 'json',
                'type' => 'POST',
                'url' => CController::createUrl('tutorial/tutorial2'),
                'success' => 'function (data) {
                    $("#password").val(data.password);
                }',
            ]
        ]
    ); ?>
</div>

<div class="row">
    <?= $form->labelEx($model, 'password'); ?>
    <?= $form->textField($model, 'password', ['id' => 'password']); ?>
</div>

<?php $this->endWidget(); ?>