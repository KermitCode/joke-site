<?php

/*
 *kermit:2012-11-18 user errors list
 */
 
class XhErrorsController extends Controller{
	
	public $layout='//layouts/column2';

//kermit:2012-11-18

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}
	
//delete data 
	
	public function actionDelete($id){
		
		$this->BaseRight(1);
		
		$this->loadModel($id)->delete();

		$this->kermitBase->msg_show('É¾³ý³É¹¦£¡');
	
	}

//list data

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('XhErrors',array(
						'criteria'=>array(
							'order'=>'id desc',
							),
						'pagination'=>array(
							'pageSize'=>14,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
		
	}

//base function of load data

	public function loadModel($id){
		
		$model=XhErrors::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}//end ca\lass
