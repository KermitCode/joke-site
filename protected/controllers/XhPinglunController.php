<?php

/*
 *2012-11-30评论
 */
 
class XhPinglunController extends Controller{

	public $layout='//layouts/column1';

	public function beforeAction(){
		
			$this->baseLoad();
			
			return true;
			
		}

	public function actionCreate($id,$type,$text){//  $id=5;$type=2;$text='lkjlkjlkj';
												
		if($type!=1)$type=2;
		
		if($this->webset['pingjia_right']==0 && !Yii::app()->session['er_name']){//游客不允许评价
		
			$result=array('rs'=>2);
		
		}elseif(Yii::app()->session['pingjia_num']>=$this->webset['pingjia_most']){
			
			$result=array('rs'=>3);
		
		}elseif($text!='' && $id){
			
			$text=strip_tags(iconv('utf-8','gbk',$text));
			
			$text=$this->kermitBase->keyword_filtrate($text,$this->webset['bad_words'],$this->webset['bad_words_do']);

			if($text===false) $result=array('rs'=>4);//阻止操作
			
			else{//已过滤敏感词
				
					$model=new XhPinglun;
					$model->pl_type=$type;
					$model->pl_tt_id=$id;
					$model->pl_author=Yii::app()->session['er_name'];
					$model->pl_text=$text;
					$model->pl_ip=$this->kermitBase->getuserip();
					$model->pl_time=time();
		
					if($model->save()){
						
						$result=array('rs'=>1,'tim'=>date('Y-m-d H:i:s',$model->pl_time));
						
						if(!Yii::app()->session['pingjia_num']){Yii::app()->session['pingjia_num']=1;}
						
						else{Yii::app()->session['pingjia_num']=Yii::app()->session['pingjia_num']+1;}
						
						}
						
					else $result=array('rs'=>0);
					
			}
			
		}else $result=array('rs'=>0);
		
		header("Content-type: text/html; charset=utf-8"); 
		
		echo json_encode($result);
			
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('XhPinglun');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	public function loadModel($id)
	{
		$model=XhPinglun::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='xh-pinglun-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
