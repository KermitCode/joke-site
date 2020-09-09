<?php

/*kermit:2012-11-15
 *for xiaohua list pag
 */
 
class XhTitleController extends Controller{
	
	
	public $layout='//layouts/column1';

	public $pre_id=0;
	
	public $next_id=0;
	
	public $data_text;//��Ц�����б�ҳ����������
	
	public $keyword;

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
			
			if($this->is_phoner()){
				
					$action=strtolower($this->getAction()->getId());
					
					$id=isset($_GET['id'])?intval($_GET['id']):0;
					
					switch($action){
						
						case 'index':$gopage="newt-{$id}-0";break;
						case 'best':$gopage="bestt-{$id}-0";break;
						case 'view':$gopage="showt-{$id}";break;
						
						}

					header("Location:http://wap.33xiao.com/wap/{$gopage}.html");exit;
					
					}
					
			$this->baseLoad(2);
			
			return true;
			
		}

//list all xiaohua 

	public function actionIndex($id=0){
		
		//if user hack web and record
		
		if($id){
			
				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='1'){
					
					$this->page_title=$this->xh_class[$id]['name'].'��ȫ-��Ц'.$this->xh_class[$id]['name'].'-����Ц����ȫ-'.$this->page_title;
					
					$this->page_keyword=$this->xh_class[$id]['name'].','.$this->xh_class[$id]['name'].'��ȫ';
					
					$this->page_description=$this->xh_class[$id]['miaoshu'];
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->RecordForbid("ע�����ID:");
					
					$this->page_title='����Ц����ȫ-'.$this->page_title;

					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='����Ц����ȫ-'.$this->page_title;
			
		}
		
		//the list page of the class
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(
							
							'criteria'=>array(
									'order'=>'tt_time desc',
									'condition'=>"publiced=1 and tt_visible=1 {$cond}"								
									),
									
							'pagination'=>array(
									'pageSize'=>30,
									),
						));
			
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'baoxiao'=>$this->getBaoxiao(12),
				'id'=>$id,
				'image_tuijian'=>$this->getBaoimage(10),
			));
		
	}
	
//kermit:2012-11-15 ��ЦЦ���б�ҳ

public function actionBest($id=0){

		$this->setthispage(3);
		
		if($id){
			
				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='1'){
					
					$this->page_title='��Ц'.$this->xh_class[$id]['name'].'-������Ц'.$this->xh_class[$id]['name'].'-����Ц����ȫ-'.$this->page_title;
					
					$this->page_keyword=$this->xh_class[$id]['name'].'����,����'.$this->xh_class[$id]['name'].'��ȫ';
					
					$this->page_description=$this->xh_class[$id]['miaoshu'];
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->RecordForbid("ע�����ID:");
					
					$this->page_title='������ЦЦ����ȫ-��ЦЦ����ȫ-'.$this->page_title;
					
					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='������ЦЦ����ȫ-��ЦЦ����ȫ-'.$this->page_title;
			
		}
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(
							
							'criteria'=>array(
									'order'=>'tt_time desc',
									'condition'=>"publiced=1 and tt_visible=1 and tt_best=1 {$cond}"								
									),
									
							'pagination'=>array(
									'pageSize'=>12,
									),
						));
					
		$sql='';$data=$dataProvider->getData();//�õ�����ID��	
		foreach($data as $model){	
			$titleid=$model->attributes['tt_id'];
			$sql.=" te_tt_id={$titleid} or";}
		$sql=rtrim($sql,'or');
		$text=Yii::app()->db->createCommand("select * from xh_title_text where {$sql}")->query()->readAll();
		foreach($text as $key=>$row){$data_text[$row['te_tt_id']]=$row['te_text'];}	unset($text);
		$this->data_text=$data_text;
			
		$this->render('best',array(
				'id'=>$id,
				'dataProvider'=>$dataProvider,
				'newxiao'=>$this->getNewpage(14),
				'image_tuijian'=>$this->getBaoimage(10),
			));

	}	
	
//����Ц��������ϸҳ
	
	public function actionView($id){
		
		$pinglun=Yii::app()->db->createCommand("select * from xh_pinglun where pl_tt_id={$id} and pl_type=1 and pl_visible=1 order by pl_id desc")->query()->readAll();
		
		$model=XhTitle::model()->with('text')->findByPk($id);
		
		//������ȡ//$content=Yii::app()->db->createCommand("select * from xh_title_text where te_tt_id='{$id}'")->query()->read();	//$content=$content['te_text'];
		
		$content=$model->text->te_text;
		
		//ҳ��SEO�Ż�
		
		$this->page_title=$model->tt_title.'-'.$this->xh_class[$model->cl_id]['name'].'-'.$this->page_title;
		
		$tt_keyword=trim($model->tt_keyword,',')==''?'':trim($model->tt_keyword,',').',';
		
		if($tt_keyword!='') $this->page_keyword=$tt_keyword.$this->xh_class[$model->cl_id]['name'];
		
		else $this->page_keyword=$model->tt_title.','.$this->xh_class[$model->cl_id]['name'];
		
		$this->page_description=$this->kermitBase->str_cut(str_replace('&nbsp;','',trim(strip_tags($content))),120,'......');

		$rand_array=array(1,1,1,1,1,1,2,2,2,2,3,3,4);
       
	    $show_add=$rand_array[rand(0,12)];$show_new=$model->tt_showviews+$show_add;
        
		$model->updateCounters(array('tt_showviews'=>$show_add,'tt_views'=>1),"tt_id={$id}");

		$this->render('view',array(
			'model'=>$model,
			'pinglun'=>$pinglun,
			'baoxiao'=>$this->getBaoxiao(20),
			'content'=>$content,
			'show_new'=>$show_new,
			));
		
	}

//ȡ����Ц����һƪ�Լ���һƪ
	
	public function getUpandDown($id){
		
		$next=Yii::app()->db->createCommand("select tt_id,tt_title from xh_title where publiced=1 and 
												   tt_visible=1 and tt_id>{$id} order by tt_id asc limit 1")->query()->read();
												   
        $pre=Yii::app()->db->createCommand("select tt_id,tt_title from xh_title where publiced=1 and 
												   tt_visible=1 and tt_id<{$id} order by tt_id desc limit 1")->query()->read();
												   									   
        if(!empty($pre)){
			
			$return_char="<a href='".$this->createUrl('XhTitle/View',array('id'=>$pre['tt_id']))."'>".$pre['tt_title']."</a>����һƪ<br>";
			
			$this->pre_id=$pre['tt_id'];
		
		}else $return_char="�Ѿ�û����...����һƪ<br>";
		
        if(!empty($next)){
			
			$return_char.="<a href='".$this->createUrl('XhTitle/View',array('id'=>$next['tt_id']))."'>".$next['tt_title']."</a>����һƪ<br>";
			
			$this->next_id=$next['tt_id'];
		
		}else $return_char.="���һƪ��...����һƪ";
		
		return $return_char;

	}

//����������һƪ��һƪ�Ĳ���
	
	public function getPageside($id,$type){// $xhImage_show->page  $xhImage_show->page_allnum

		if($type=='next'){//��һҳURL

				if($this->next_id) $next_page="window.location.href='".str_replace('.html','',$this->createUrl('XhTitle/View',array('id'=>$this->next_id))).".html';";
				
				else $next_page="alert('���һƪ��...');";
				
			    return $next_page;
				
					}
		
		if($type=='pre'){
	
				if($this->pre_id) $pre_page="window.location.href='".str_replace('.html','',$this->createUrl('XhTitle/View',array('id'=>$this->pre_id))).".html';";
				
				else $pre_page="alert('ǰ��û����');";

				return $pre_page;
		
		 			}	
		
	}//end function 

//�û�����Ц��

	public function actionCreate(){
		
		//�����¼���ܷ���
		
		if(Yii::app()->session['er_name']=='')$this->kermitBase->msg_show('',$this->createUrl('XhUser/login',array('id'=>1)));
		
		$model=new XhTitle;

		if(isset($_POST['XhTitle'])){
			
			$model->attributes=$_POST['XhTitle'];
		
			$this->render('create',array('model'=>$model,));
			
			if($_POST['XhTitle']['tt_title']==''){$this->kermitBase->jsOnly('���ⲻ��Ϊ��');}
			
			elseif($_POST['XhTitle']['tt_keyword']==''){$this->kermitBase->jsOnly('�ؼ��ʲ���Ϊ��');}
			
			elseif(!isset($this->xh_class[$_POST['XhTitle']['cl_id']]) || $this->xh_class[$_POST['XhTitle']['cl_id']]['type']!=1){
				
					$this->RecordForbid('����Ц��ע�����');
					
					$this->kermitBase->msg_show('����������',$this->createUrl('site/index'));
						
			}elseif($_POST['te_text']=='' || $_POST['te_text']=='������������Ц��ȫ��..'){$this->kermitBase->jsOnly('Ц�����ݲ���Ϊ��');}
			
			elseif(strlen($_POST['te_text'])<60){$this->RecordForbid('����Ц�����ݶ�');$this->kermitBase->jsOnly('Ц�����ݲ�������30������');}

			else{//���������������ݴ���

				$model->tt_keyword=$this->kermitBase->makeKeyword($model->tt_keyword);
				
				$model->tt_time=time();
				
				$model->publiced=1;

				$model->save();
				
				$tt_id=$model->tt_id;
				
				$text=addslashes($_POST['te_text']);
				
				Yii::app()->db->createCommand("insert into xh_title_text(te_tt_id,te_text) values('{$tt_id}','{$text}')")->query();
					
				$this->kermitBase->msg_show('����ɹ�',$this->createUrl('XhTitle/index'));
			
			}
			
			exit;
				
		}

		$this->render('create',array('model'=>$model,));
		
	}

//Ц������
	
	public function actionSort($id=0){
		
		$this->setthispage(6);
		
		if($id){
			
				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='1'){
					
					$this->page_title='��Ц'.$this->xh_class[$id]['name'].'����-���Ц��'.$this->xh_class[$id]['name'].'-'.$this->page_title;
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->page_title='Ц������-'.$this->page_title;
					
					$this->RecordForbid("ע�����ID:");
					
					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='Ц������-'.$this->page_title;
			
		}
		
		//the list page of the class
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(
							
							'criteria'=>array(
									'order'=>'tt_voters_up desc',
									'condition'=>"publiced=1 and tt_visible=1 {$cond}"								
									),
									
							'pagination'=>array(
									'pageSize'=>30,
									),
						));
			
		$this->render('sort',array(
				'dataProvider'=>$dataProvider,
				'baoxiao'=>$this->getBaoxiao(12),
				'id'=>$id,
				'image_tuijian'=>$this->getBaoimage(10),
			));
		
		
		
		}
	
//�õ�����Ц�������

	public function getClass_tit(){
		
		$class=array();
		
		foreach($this->xh_class as $key=>$row){
			
			if($row['type']==1) $class[$key]=$row['name'];
			
			}
		
		return $class;
		
	}

//Ц��������Ŀ��

	public function actionSearch(){

		$keyword=trim($this->kermitBase->filter_simple(isset($_POST['keyword'])?$_POST['keyword']:''));
		
		if($keyword=='') $keyword=trim($this->kermitBase->filter_simple(isset($_GET['keyword'])?$_GET['keyword']:''));
		
		$this->keyword=$keyword;$_GET['keyword'] = $keyword;
		
		if($keyword==''){$this->actionIndex();exit;}
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(

							'criteria'=>array(
									'order'=>'tt_time desc',
									'condition'=>"tt_visible=1 and publiced=1 and tt_title like '%$keyword%'",				
									),
									
							'pagination'=>array(
									'pageSize'=>20,
									),
									
						));	
		
		$this->render('search',array(
						'dataProvider'=>$dataProvider,
						'baoxiao'=>$this->getBaoxiao(12),
						'keyword'=>$keyword,));	
	}
		
//������������

	public function loadModel($id){
		
		$model=XhTitle::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
		
	}

	protected function performAjaxValidation($model){
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='xh-title-form'){
			
			echo CActiveForm::validate($model);
			
			Yii::app()->end();
			
		}
		
	}
	
}
