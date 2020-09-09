<?php

/*
 *kermit:2012-11-11 for xhuser table
 */
 
class XhUserController extends Controller{

	public $layout='//layouts/column2';
	

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}
	
//kermit:2012-11-11 user list

	public function actionIndex($ord=''){
		
		if($ord!='') $ord_cond="{$ord} desc";
		
		else $ord_cond='er_id desc';
		
		$dataProvider=new CActiveDataProvider('XhUser',array(
						'criteria'=>array(
							'order'=>$ord_cond,
							),
						'pagination'=>array(
							'pageSize'=>14,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}

//kermit:2012-11-11 user delete

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$this->loadModel($id)->delete();
		
		$this->kermitBase->msg_show('已成功删除该用户！');

		exit;
		
	}

//kermit:2012-11-11 change user state

	public function actionShow($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('er_status')) $model->setattribute('er_status',0);
		
		else $model->setattribute('er_status',1);
		
		$model->save(false);

		$this->kermitBase->msg_show('操作成功!');
		
	}

//kermit:base function of load data

	public function loadModel($id){
		
		$model=XhUser::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}//end class
