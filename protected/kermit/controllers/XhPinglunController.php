<?php

/*
 *in backend for adminer
 */
 
class XhPinglunController extends Controller{

	public $layout='//layouts/column2';

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}
	
	
//delete pinglun 

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$this->loadModel($id)->delete();
		
		$this->kermitBase->msg_show('已成功删除该评论！');

		exit;
	}

//show pinglun list for admin

	public function actionIndex($order=''){
		
		if($order!='') $ord_cond="{$order} desc";
		
		else $ord_cond="pl_id desc";
		
		$dataProvider=new CActiveDataProvider('XhPinglun',array(
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

//kermit:2012-11-11 change pinglun state

	public function actionUpdate($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('pl_visible')) $model->setattribute('pl_visible',0);
		
		else $model->setattribute('pl_visible',1);
		
		$model->save(false);

		$this->kermitBase->msg_show('操作成功!');
		
	}
	
//base function load data

	public function loadModel($id){
		
		$model=XhPinglun::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}
