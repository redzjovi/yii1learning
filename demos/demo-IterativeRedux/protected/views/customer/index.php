<?php
/* @var $this CustomerController */

$this->breadcrumbs=array(
	'Customer',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php $form = $this->beginWidget('CActiveForm');

echo CHtml::activeDropDownList($model, 'id',
    CHtml::listData(Users::model()->findAll(), 'id', 'username'),
    [
        'ajax' => [ // add ajax
            'type' => 'POST', // type ajax
            'url' => CController::createUrl('customer/password'), // url to controller/method
            'dataType' => 'json', // return data type
            'success' => 'function(data)
            {
                    $("#label_password").html(data.label_password);
                    $("#password").val(data.password);
            }', // data json to specify id
        ]
    ]
);

echo $form->labelEx($model, 'password', ['id' => 'label_password']);
echo $form->textField($model, 'password', ['id' => 'password']);

$this->endWidget();
?>