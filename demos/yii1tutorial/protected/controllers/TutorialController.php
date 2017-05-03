<?php
class TutorialController extends Controller
{
	public function actionIndex()
	{
        $this->render('index');
	}

    public function actionTutorial1()
	{
        $model = new Users;
        $this->render('dropDownList/1', ['model' => $model]);
	}

    public function actionTutorial2()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $user_id = Yii::app()->request->getParam('user_id');
            $user = Users::model()->findByPk($user_id);

            echo CJSON::encode([
                'error' => 'false',
                'password' => $user->password,
            ]);

            Yii::app()->end();
        }
    }
    
    public function actionTutorial3()
    {
        $model = new TutorialForm('tutorial3');
        $model->attributes = Yii::app()->request->getPost('TutorialForm');
        
        if (Yii::app()->request->isPostRequest && $model->validate()) {
            echo 'success';
            Yii::app()->end();
        }
        
        $this->render('validation/1', ['model' => $model]);
    }
    
    public function actionTutorial4()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new TutorialForm('tutorial3');
            $model->attributes = ['id' => Yii::app()->request->getParam('id')];
            
            echo CJSON::encode([
                'password_label' => CHtml::activeLabel(
                    $model,
                    'password',
                    [
                        'id' => 'password',
                        'label' =>
                            $model->getAttributeLabel('password').
                            ($model->passwordHasRequired() === true ? ' <span class="required">*</span>' : ''),
                    ]
                ),
                'password_required' => $model->passwordHasRequired(),
            ]);
            
            Yii::app()->end();
        }
    }
}
