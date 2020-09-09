<?php

/*
 *kermit:2012-11-11 add for link manage
 */
 
class XhLinkController extends Controller{

	public $layout='//layouts/column2';

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}

//create php cache file kermit:2012-11-11

	public function makeLinkfile(){
		
		$models=XhLink::model()->findAll(array('order'=>'lk_hot desc','condition'=>'lk_state=1'));
		
		$writechar="<?php\r\n/*\r\n*file:linkweb file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($models as $model){
			
			$writechar.="\r\n\t{$model->lk_id}=>array('title'=>'{$model->lk_title}','url'=>'{$model->lk_url}'),";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		$this->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/friend_link.php');
		
		}

//add new link kermit:2012-11-11

	public function actionCreate(){
		
		$model=new XhLink;

		if(isset($_POST['XhLink'])){
			
				$this->BaseRight(1);
			
				if($_POST['XhLink']['lk_title']=='' || $_POST['XhLink']['lk_title']==''){
					
					$this->kermitBase->msg_show('网站名称和URL不能为空！');
					
					}
				
				$_POST['XhLink']['lk_datetime']=date("Y-m-d H:i:s");
				
				$_POST['XhLink']['lk_state']=1;
	
				$model->attributes=$_POST['XhLink'];
				
				$model->save(false);
				
				$this->makeLinkfile();
					
				$this->kermitBase->msg_show('操作成功!',$this->createUrl('XhLink/index'));
		
			}

		$this->render('create',array('model'=>$model,));
		
	}

//kermit:2012-11-11 change linkurl state

	public function actionShow($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('lk_state')) $model->setattribute('lk_state',0);
		
		else $model->setattribute('lk_state',1);
		
		$model->save(false);
		
		$this->makeLinkfile();

		$this->kermitBase->msg_show('操作成功!');
		
	}

//kermit:modify link url

	public function actionUpdate($id){

		$model=$this->loadModel($id);

		if(isset($_POST['XhLink'])){
			
			$this->BaseRight(1);
		
			if($_POST['XhLink']['lk_title']=='' || $_POST['XhLink']['lk_title']==''){
				
				$this->kermitBase->msg_show('网站名称和URL不能为空！');
				
				}
			
			$model->attributes=$_POST['XhLink'];
			
			$model->save(false);
			
			$this->makeLinkfile();
				
			$this->kermitBase->msg_show('已成功修改链接！');
		
		}

		$this->render('update',array('model'=>$model,));
	
	}

//delete link url

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$this->loadModel($id)->delete();
		
		$this->makeLinkfile();
		
		$this->kermitBase->msg_show('已成功删除该用户！');

		exit;

	}

//list all link url 

	public function actionIndex(){
		
		$dataProvider=new CActiveDataProvider('XhLink',array(
						'criteria'=>array(
							'order'=>'lk_id desc',
							),
						'pagination'=>array(
							'pageSize'=>14,
							),
					));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}

//base funcion 
	
	public function loadModel($id){
		
		$model=XhLink::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}
//end class