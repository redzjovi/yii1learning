<?php $this->pageTitle = 'Yii custom conditional validation';
$this->breadcrumbs = [
    'Tutorial' => ['/tutorial'],
    $this->pageTitle,
]; ?>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <div class="row">
        <?= $form->labelEx($model, 'id', ['label' => $model->getAttributeLabel('username')]); ?>
        <?= CHtml::activeDropDownList(
            $model,
            'id',
            ['' => '- select username - '] + CHtml::listData(Users::model()->findAll(), 'id', 'username'),
                [
                    'ajax' => [
                        'data' => ['id' => 'js:this.value'],
                        'dataType' => 'json',
                        'type' => 'POST',
                        'url' => CController::createUrl('tutorial/tutorial4'),
                        'success' => 'function (data) {
                            $("#password").replaceWith(data.password_label);
                        }',
                    ]
                ]
        ); ?>
        <?php echo $form->error($model, 'id'); ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'password', [
            'id' => 'password',
            'label' => 
                $model->getAttributeLabel('password').
                ($model->passwordHasRequired() === true ? ' <span class="required">*</span>' : ''),
        ]); ?>
        <?= $form->textField($model, 'password'); ?>
        <?= $form->error($model, 'password'); ?>
    </div>

    <div class="row buttons">
        <?= CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>