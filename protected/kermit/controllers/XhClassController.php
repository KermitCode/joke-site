<?php

//kermit:modify on 2012-11-9

class XhClassController extends Controller{

	public $layout='//layouts/column2';

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}

//kermit:2012-11-3 make class file

	public function makeClassfile(){
		
		$models=XhClass::model()->findAll(array('order'=>'cl_type asc,cl_order desc'));
		
		$writechar="<?php\r\n/*\r\n*file:xhclass file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($models as $model){
			
			$writechar.="\r\n\t{$model->cl_id}=>array('name'=>'{$model->cl_name}',\r\n\t\t\t'type'=>'{$model->cl_type}',\r\n\t\t\t'nums'=>'{$model->cl_articles}',\r\n\t\t\t'miaoshu'=>'{$model->cl_description}'\r\n\t\t\t),";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		Yii::app()->controller->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/xhclass.php');
		
	}
		

//kermit:2012-11-4 list class for adminer

	public function actionIndex(){

		$dataProvider=new CActiveDataProvider('XhClass',array(
		
						'criteria'=>array(
							'order'=>'cl_type asc,cl_id desc',
							),
							
						'pagination'=>array(
							'pageSize'=>14,
							),
							
						));
		
		$this->render('index',array(
			
			'dataProvider'=>$dataProvider,
		
		));
	
	}
		

//kermit:2012-11-10

	public function actionUpdate($id){

		$model=$this->loadModel($id);

		if(isset($_POST['XhClass'])){
			
			$this->BaseRight(1);
			
			$model->attributes=$_POST['XhClass'];
			
			if($model->getattribute('cl_name')=='') $this->kermitBase->msg_show('类别名称不能为空！');
			
			if($model->save(false)){
				
				$this->makeClassfile();
				
				$this->kermitBase->msg_show('修改成功!',$this->createUrl('XhClass/update',array('id'=>$id)));
		
				exit;
				
				}
		
		}

		$this->render('update',array('model'=>$model,));

	}
	
//kermit:2012-11-10
	
	public function actionCreate(){
		
		$model=new XhClass;

		if(isset($_POST['XhClass'])){
			
				$this->BaseRight(1);
				
				$_POST['XhClass']['cl_time']=time();
				
				$model->attributes=$_POST['XhClass'];
				
				if($model->findAll("cl_name='{$_POST['XhClass']['cl_name']}'")) $this->kermitBase->msg_show('该类别已经存在！');
				
				$model->save(false);
				
				$this->makeClassfile();
				
				$this->kermitBase->msg_show('增加成功！',$this->createUrl('XhClass/update',array('id'=>$model->cl_id)));
			
				}

		$this->render('create',array('model'=>$model,));
		
	}


//delete class from class id value 

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$nums=Yii::app()->db->createCommand("select count(*) as nums from xh_title where cl_id={$id}")->query()->read();;
		
		if($nums['nums']) $this->kermitBase->msg_show('该类别还有笑话存在！不能删除');
		
		$this->loadModel($id)->delete();
		
		$this->makeClassfile();

		$this->kermitBase->msg_show('删除成功',$this->createUrl('XhClass/index'));
		
	}

//base function load data

	public function loadModel($id){
		
		$model=XhClass::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}
