<?php
include_once '/protected/models/Admin.php';

class AdminpageController extends BackEndController
{
           
	public function actionIndex()
	{       
		$this->render('index', array('admin'=> 
                    Admin::model()->getAdminInfo(Yii::app()->user->id)));
	}

         /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate(){
		
		$model= Admin::model()->findByPk(Yii::app()->user->id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
			if($model->save()) {
				if(Yii::app()->request->isAjaxRequest){
					echo 'success';
					Yii::app()->end();
				}
				else {
//					$this->redirect(array('view','id'=>$model->id));
                                    $this->redirect(array('index'));
				}
			}
		}
		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('update',array('model'=>$model), false, true);
        
		else
			$this->render('update',array('model'=>$model));
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();
                        $model= Admin::model()->findByPk(Yii::app()->user->id);
                        $model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('logout'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

        public function actionLogin()
	{
            $this->layout = 'login_layout';
            
            $model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
               $this->redirect('/');
	}

         /**
     * This is the action to handle external exceptions.
     */
        public function actionError() {
            if ($error = Yii::app()->errorHandler->error) {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('/adminpage/error', $error);
            }
        }

    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}