<?php

/*kermit:2012-11-15
 *for xiaohua list pag
 */
 
class XhTitleController extends Controller{
	
	
	public $layout='//layouts/column1';

	public $pre_id=0;
	
	public $next_id=0;
	
	public $data_text;//爆笑短文列表页中内容数据
	
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
					
					$this->page_title=$this->xh_class[$id]['name'].'大全-搞笑'.$this->xh_class[$id]['name'].'-短文笑话大全-'.$this->page_title;
					
					$this->page_keyword=$this->xh_class[$id]['name'].','.$this->xh_class[$id]['name'].'大全';
					
					$this->page_description=$this->xh_class[$id]['miaoshu'];
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->RecordForbid("注入类别ID:");
					
					$this->page_title='短文笑话大全-'.$this->page_title;

					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='短文笑话大全-'.$this->page_title;
			
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
	
//kermit:2012-11-15 爆笑笑话列表页

public function actionBest($id=0){

		$this->setthispage(3);
		
		if($id){
			
				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='1'){
					
					$this->page_title='爆笑'.$this->xh_class[$id]['name'].'-超级搞笑'.$this->xh_class[$id]['name'].'-短文笑话大全-'.$this->page_title;
					
					$this->page_keyword=$this->xh_class[$id]['name'].'精华,精华'.$this->xh_class[$id]['name'].'大全';
					
					$this->page_description=$this->xh_class[$id]['miaoshu'];
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->RecordForbid("注入类别ID:");
					
					$this->page_title='超级搞笑笑话大全-爆笑笑话大全-'.$this->page_title;
					
					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='超级搞笑笑话大全-爆笑笑话大全-'.$this->page_title;
			
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
					
		$sql='';$data=$dataProvider->getData();//得到文章ID列	
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
	
//文字笑话内容详细页
	
	public function actionView($id){
		
		$pinglun=Yii::app()->db->createCommand("select * from xh_pinglun where pl_tt_id={$id} and pl_type=1 and pl_visible=1 order by pl_id desc")->query()->readAll();
		
		$model=XhTitle::model()->with('text')->findByPk($id);
		
		//内容提取//$content=Yii::app()->db->createCommand("select * from xh_title_text where te_tt_id='{$id}'")->query()->read();	//$content=$content['te_text'];
		
		$content=$model->text->te_text;
		
		//页面SEO优化
		
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

//取文字笑话上一篇以及下一篇
	
	public function getUpandDown($id){
		
		$next=Yii::app()->db->createCommand("select tt_id,tt_title from xh_title where publiced=1 and 
												   tt_visible=1 and tt_id>{$id} order by tt_id asc limit 1")->query()->read();
												   
        $pre=Yii::app()->db->createCommand("select tt_id,tt_title from xh_title where publiced=1 and 
												   tt_visible=1 and tt_id<{$id} order by tt_id desc limit 1")->query()->read();
												   									   
        if(!empty($pre)){
			
			$return_char="<a href='".$this->createUrl('XhTitle/View',array('id'=>$pre['tt_id']))."'>".$pre['tt_title']."</a>：上一篇<br>";
			
			$this->pre_id=$pre['tt_id'];
		
		}else $return_char="已经没有了...：上一篇<br>";
		
        if(!empty($next)){
			
			$return_char.="<a href='".$this->createUrl('XhTitle/View',array('id'=>$next['tt_id']))."'>".$next['tt_title']."</a>：下一篇<br>";
			
			$this->next_id=$next['tt_id'];
		
		}else $return_char.="最后一篇了...：下一篇";
		
		return $return_char;

	}

//按键进入上一篇下一篇的操作
	
	public function getPageside($id,$type){// $xhImage_show->page  $xhImage_show->page_allnum

		if($type=='next'){//下一页URL

				if($this->next_id) $next_page="window.location.href='".str_replace('.html','',$this->createUrl('XhTitle/View',array('id'=>$this->next_id))).".html';";
				
				else $next_page="alert('最后一篇了...');";
				
			    return $next_page;
				
					}
		
		if($type=='pre'){
	
				if($this->pre_id) $pre_page="window.location.href='".str_replace('.html','',$this->createUrl('XhTitle/View',array('id'=>$this->pre_id))).".html';";
				
				else $pre_page="alert('前面没有啦');";

				return $pre_page;
		
		 			}	
		
	}//end function 

//用户发表笑话

	public function actionCreate(){
		
		//必须登录才能发表
		
		if(Yii::app()->session['er_name']=='')$this->kermitBase->msg_show('',$this->createUrl('XhUser/login',array('id'=>1)));
		
		$model=new XhTitle;

		if(isset($_POST['XhTitle'])){
			
			$model->attributes=$_POST['XhTitle'];
		
			$this->render('create',array('model'=>$model,));
			
			if($_POST['XhTitle']['tt_title']==''){$this->kermitBase->jsOnly('标题不能为空');}
			
			elseif($_POST['XhTitle']['tt_keyword']==''){$this->kermitBase->jsOnly('关键词不能为空');}
			
			elseif(!isset($this->xh_class[$_POST['XhTitle']['cl_id']]) || $this->xh_class[$_POST['XhTitle']['cl_id']]['type']!=1){
				
					$this->RecordForbid('发表笑话注入类别');
					
					$this->kermitBase->msg_show('类别参数错误',$this->createUrl('site/index'));
						
			}elseif($_POST['te_text']=='' || $_POST['te_text']=='请在这里输入笑话全文..'){$this->kermitBase->jsOnly('笑话内容不能为空');}
			
			elseif(strlen($_POST['te_text'])<60){$this->RecordForbid('发表笑话内容短');$this->kermitBase->jsOnly('笑话内容不能少于30个汉字');}

			else{//插入数据文章数据处理

				$model->tt_keyword=$this->kermitBase->makeKeyword($model->tt_keyword);
				
				$model->tt_time=time();
				
				$model->publiced=1;

				$model->save();
				
				$tt_id=$model->tt_id;
				
				$text=addslashes($_POST['te_text']);
				
				Yii::app()->db->createCommand("insert into xh_title_text(te_tt_id,te_text) values('{$tt_id}','{$text}')")->query();
					
				$this->kermitBase->msg_show('发表成功',$this->createUrl('XhTitle/index'));
			
			}
			
			exit;
				
		}

		$this->render('create',array('model'=>$model,));
		
	}

//笑话排行
	
	public function actionSort($id=0){
		
		$this->setthispage(6);
		
		if($id){
			
				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='1'){
					
					$this->page_title='搞笑'.$this->xh_class[$id]['name'].'排行-最搞笑的'.$this->xh_class[$id]['name'].'-'.$this->page_title;
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->page_title='笑话排行-'.$this->page_title;
					
					$this->RecordForbid("注入类别ID:");
					
					$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='笑话排行-'.$this->page_title;
			
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
	
//得到文字笑话的类别

	public function getClass_tit(){
		
		$class=array();
		
		foreach($this->xh_class as $key=>$row){
			
			if($row['type']==1) $class[$key]=$row['name'];
			
			}
		
		return $class;
		
	}

//笑话搜索栏目：

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
		
//基本加载数据

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
