<?php

/*
 *kermit:2012-11-10
 *xiaohua list
 */
 
class XhTitleController extends Controller{
	
	public $layout='//layouts/column2';

	public $keyword;

//kermit:2012-11-3

	public function beforeAction(){
		
		if($this->baseLoad()) return true;
		
	}

//list page :kermit:2012-11-10

	public function actionIndex($ord='',$tt_best=2,$tt_visible='',$clid=0,$keyword='',$publiced=1){
		
		if($ord!='') $ord_cond="{$ord} desc";
		
		else $ord_cond='tt_time desc';
		
		if($tt_best==2 || $tt_best=='') $cond=' 1 ';
		
		else $cond=" tt_best={$tt_best} ";
		
		if($publiced==2 || $publiced=='') ;
		
		else $cond=" publiced={$publiced} ";
		
		if($tt_visible) $cond.=" and tt_visible=0";
		
		if($clid) $cond.=" and cl_id={$clid}";
		
		if($keyword!=''){
			
				$keyword=trim(rawurldecode(iconv('utf-8','gbk',$keyword)));
				
				$this->keyword=$keyword;
			
				$cond.=" and (tt_id='$keyword' or tt_title like '%$keyword%')";
				
			}
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(
						'criteria'=>array(
							'order'=>$ord_cond,
							'condition'=>$cond,
							),
						'pagination'=>array(
							'pageSize'=>14,
							),
					));
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'tt_best'=>$tt_best,
			'keyword'=>$keyword,
			'publiced'=>$publiced,
		));
	
	}
	

//kermit:2012-11-10 change page status

	public function actionShow($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('tt_visible')) $model->setattribute('tt_visible',0);
		
		else $model->setattribute('tt_visible',1);
		
		$model->save(false);

		$this->kermitBase->msg_show('操作成功!');
		
	}
	
	
//kermit:2012-11-10

	public function getClass_tit(){
		
		$class=array();
		
		foreach($this->xhclass as $key=>$row){
			
			if($row['type']==1) $class[$key]=$row['name'];
			
			}
		
		return $class;
		
		}	
	
//kermit:create xiaohua
	
	public function actionCreate(){
		
		$model=new XhTitle;

		$class_arr=$this->getClass_tit();

		if(isset($_POST['XhTitle'])){
			
				$this->BaseRight(1);
			
				$pagetext=$_POST['text'];//page text
				
				if($pagetext=='') $this->kermitBase->msg_show('文章内容不得为空！');
				
				unset($_POST['text']);
				
				if($_POST['XhTitle']['tt_title']=='')$this->kermitBase->msg_show('文章标题不得为空！');
				
				if(isset($_POST['my']) && $_POST['my']==1) $_POST['XhTitle']['tt_source']='1';//page from
				
				$_POST['XhTitle']['tt_keyword']=$this->kermitBase->makeKeyword($_POST['XhTitle']['tt_keyword']); 
				
				$model->attributes=$_POST['XhTitle'];
							
				$model->setattribute('tt_time',time());
			
				$model->setattribute('tt_author',Yii::app()->session['admin']);
				
				$model->publiced=1;
				
				if($model->save()){//update text
				
					Yii::app()->db->createCommand("insert into xh_title_text(te_tt_id,te_text) values('".$model->tt_id."','".$pagetext."')")->query();
										
					$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/pagecache');//清除短文缓存
					
					$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/newclass/'.$model->cl_id.'.php');
					
					$this->kermitBase->msg_show('发表成功！',$this->createUrl('XhTitle/update',array('id'=>$model->tt_id)));
					
				}else $this->kermitBase->msg_show('发表失败！');
				
		}

		$this->render('create',array(
			'model'=>$model,
			'text'=>'',
			'class_arr'=>$class_arr,
			));
	}

//update page kermit:2012-11-11

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);
		
		$class_arr=$this->getClass_tit();

		if(isset($_POST['XhTitle'])){
			
				$this->BaseRight(2);
			
				$pagetext=$_POST['text'];//page text
				
				if($pagetext=='') $this->kermitBase->msg_show('文章内容不得为空！');
				
				unset($_POST['text']);
				
				if($_POST['XhTitle']['tt_title']=='')$this->kermitBase->msg_show('文章标题不得为空！');
				
				if(isset($_POST['my']) && $_POST['my']==1) $_POST['XhTitle']['tt_source']='1';//page from 
				
				$_POST['XhTitle']['tt_keyword']=$this->kermitBase->makeKeyword($_POST['XhTitle']['tt_keyword']); 
				
				$model->attributes=$_POST['XhTitle'];
				
				if($model->save()){//update text
				
					Yii::app()->db->createCommand("update xh_title_text set te_text='{$pagetext}' where te_tt_id=$id")->query();
					
					$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/pagecache');//清除短文缓存
					
					$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/newclass/'.$model->cl_id.'.php');
					
					$this->kermitBase->msg_show('修改成功！',$this->createUrl('XhTitle/update',array('id'=>$model->tt_id)));
					
				}else $this->kermitBase->msg_show('修改失败！');
				
		}

		$text=Yii::app()->db->createCommand("select te_text from xh_title_text where te_tt_id=$id")->query()->read();
		
		$this->render('update',array(
					'model'=>$model,
					'text'=>$text['te_text'],
					'class_arr'=>$class_arr,
				));
		
	}

//delete page from pageid

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		//check the pinglun numbers
		
		$model=$this->loadModel($id);
		
		Yii::app()->db->createCommand("delete from xh_pinglun where pl_tt_id={$id}")->query();
		
		Yii::app()->db->createCommand("delete from xh_title_text where te_tt_id={$id}")->query();
		
		$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/newclass/'.$model->cl_id.'.php');
		
		$model->delete();
		
		//更新栏目数据
		
		$this->kermitBase->msg_show('已删除该文章及其评论');

		exit;
	
	}


//base function of load data

	public function loadModel($id){
		
		$model=XhTitle::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}

//function get all class pagenums

	protected function getClass_pagenum($id=0){
		
			if($id){//only change one class
				
					$nums=XhTitle::model()->count("cl_id={$id}");
	
					Yii::app()->db->createCommand("update xh_class set cl_articles={$nums} where cl_id={$id}");		
					
			}else{

					$nums=Yii::app()->db->createCommand("select cl_id,count(cl_id) as allnum from xh_title 
														 where tt_visible=1 group by cl_id")->query()->readAll();
			print_r($nums);
					foreach($nums as $key=>$row){
						
						Yii::app()->db->createCommand("update xh_class set cl_articles={$row['allnum']} where cl_id={$row['cl_id']}")->query();	
						
				  		}			
				
				}
				
		
	}




}//end this controller
