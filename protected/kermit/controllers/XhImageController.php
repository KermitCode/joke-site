<?php

/*图片笑话列表
 *kermit:2012-11-23
 */
 
class XhImageController extends Controller{

	public $layout='//layouts/column2';
	
	public $keyword;

	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}

//图片笑话列表

	public function actionIndex($ord='',$im_baoxiao=2,$im_visible='',$clid=0,$keyword='',$publiced=1){
		
		if($ord!='') $ord_cond="{$ord} desc";
		
		else $ord_cond='im_time desc';
		
		if($im_baoxiao==2 || $im_baoxiao=='') $cond=' 1 ';
		
		else $cond=" im_baoxiao={$im_baoxiao} ";
		
		if($im_visible) $cond.=" and im_visible=0";
		
		if($clid) $cond.=" and cl_id={$clid}";
		
		if($publiced==2 || $publiced=='') ;
		
		else $cond=" publiced={$publiced} ";
		
		if($keyword!=''){
			
				$keyword=trim(rawurldecode(iconv('utf-8','gbk',$keyword)));
				
				$this->keyword=$keyword;
			
				$cond.=" and (im_id='$keyword' or im_title like '%$keyword%')";
				
			}
		
		$dataProvider=new CActiveDataProvider('XhImage',array(
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
			'im_baoxiao'=>$im_baoxiao,
			'publiced'=>$publiced,
		));
	
	}
	
//kermit:2012-11-23 change image status

	public function actionShow($id){
		
		$this->BaseRight(1);
		
		$model=$this->loadModel($id);
		
		if($model->getattribute('im_visible')) $model->setattribute('im_visible',0);
		
		else $model->setattribute('im_visible',1);
		
		$model->save(false);

		$this->kermitBase->msg_show('操作成功!');
		
	}

//kermit:图片类别列表

	public function getClass_tit(){
		
		$class=array();
		
		foreach($this->xhclass as $key=>$row){
			
			if($row['type']==2) $class[$key]=$row['name'];
			
			}
		
		return $class;
		
		}
		
//新发表图片数据

	public function actionCreate(){

		$model=new XhImage;

	    $xhImage_up=new xhImage_up(Yii::app()->basePath.'/../jokeimg/');
	
		if(isset($_POST['XhImage'])){
			
			if($_POST['XhImage']['im_title']=='') $this->kermitBase->msg_show('图片笑话标题必填！');
			
			if(!$_POST['imgnum']) $this->kermitBase->msg_show('未上传图片！');

			$_POST['XhImage']['img_urls']=$xhImage_up->getPostImage($model->getattribute('img_urls'),'create');
			
			$_POST['XhImage']['im_mainimg']=$xhImage_up->mainimg;
			
			$model->attributes=$_POST['XhImage'];
			
			$model->publiced=1;
			
			if($model->save()){
				
				unset($_POST);
				
				$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/imagecache');//清除图片缓存
				
				$this->kermitBase->msg_show('发表成功！',$this->createUrl('XhImage/update',array('id'=>$model->im_id)));
				
				}
		
		}

		$this->render('create',array(
			
			'model'=>$model,
			'class_arr'=>$this->getClass_tit(),
			'xhImage_up'=>$xhImage_up,
		));
	
	}

//修改图片数据------

	public function actionUpdate($id){
		
		$model=$this->loadModel($id);
		
		$xhImage_up=new xhImage_up(Yii::app()->basePath.'/../jokeimg/');

		if(isset($_POST['XhImage'])){
			
			$this->BaseRight(2);
			
			$_POST['XhImage']['img_urls']=$xhImage_up->getPostImage($model->getattribute('img_urls'),'update');
			
			$model->attributes=$_POST['XhImage'];
			
			if($model->save()){
				
				unset($_POST);
				
				//清除图片缓存
										
				$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/imagecache');
				
				$this->kermitBase->msg_show('修改成功！',$this->createUrl('XhImage/update',array('id'=>$model->im_id)));
				
				}
		
		}

		$this->render('update',array(
			
			'model'=>$model,
			'class_arr'=>$this->getClass_tit(),
			'xhImage_up'=>$xhImage_up,
		
		));
	
	}

//删除某个图片笑话中的某张图

	public function actionDelimage($id,$index){
		
		$model=XhImage::model()->findByPk($id);
		
		$xhImage_up=new xhImage_up();
		
		$delimg=0;
		
		$img_urls=$xhImage_up->mb_unserialize($model->getattribute('img_urls'));
		
		$new_imgurl=array();
		
		foreach($img_urls as $key=>$row){
			
					if($key==$index){
						
						$delimg=$row[1];
						
						continue;
					
					}
					
					$new_imgurl[]=$row;
					
			}
		
		//if(!$delimg) $this->kermitBase->msg_show('非法操作！');
		
		if(empty($new_imgurl)) $this->kermitBase->msg_show('最后一张图片，不能删除，请直接删除此篇笑话！');
		
		//删除图片--当且仅当缩略图和要删除的图不为一张时
		
		if($model->getattribute('im_mainimg')!=$delimg) @unlink(Yii::app()->basePath.'/../jokeimg/'.$delimg);
		
		$model->setattribute('img_urls',serialize($new_imgurl));	

		if($model->save()){
			
			$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/imagecache');//清除图片缓存
			
			$this->kermitBase->msg_show('删除成功！');
		
		}else $this->kermitBase->msg_show('删除失败！');
		
	}
		


//删除笑话－－还需要删除图片

	public function actionDelete($id){
		
		$this->BaseRight(2);
		
		$model=$this->loadModel($id);
		
		$xhImage_up=new xhImage_up();
		
		//删除缩略图文件
		
		@unlink(Yii::app()->basePath.'/../jokeimg/'.$model->getattribute('im_mainimg'));
		
		//删除所有各张图片
		
		$img_urls=$xhImage_up->mb_unserialize($model->getattribute('img_urls'));
		
		foreach($img_urls as $key=>$row){
			
			@unlink(Yii::app()->basePath.'/../jokeimg/'.$row[1]);
			
			}
		
		//删除数据库
			
		$model->delete();
		
		$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/imagecache');//清除图片缓存
		
		$this->kermitBase->msg_show('删除成功!',$this->createUrl('XhImage/Index'));

	}

//基本加载数据

	public function loadModel($id){
		
		$model=XhImage::model()->findByPk($id);
		
		if($model===null)
			
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}



}//end class