<?php
class TutorialController extends Controller
{
	public function actionIndex()
	{
        dump(['1', '2']);
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
}
