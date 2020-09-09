<?php

/*kermit:2012-11-25
 *ͼƬЦ���б�ҳ����ЦͼƬ�б�
 */
 
class XhImageController extends Controller{
	
	public $layout='//layouts/column1';
	
	public $pre_id=0;//��ƪ���µ�ID
	
	public $next_id=0;//��ƪ���µ�ID
	
	public $keyword;

	public $sec_class;
	
	public function beforeAction(){
		
			if($this->is_phoner()){
				
					$action=strtolower($this->getAction()->getId());
					
					$id=isset($_GET['id'])?intval($_GET['id']):0;
					
					switch($action){
						
						case 'index':$gopage="newi-{$id}-0";break;
						case 'best':$gopage="besti-{$id}-0";break;
						case 'view':$gopage="showi-{$id}";break;
						
						}

					header("Location:http://wap.33xiao.com/wap/{$gopage}.html");exit;
					
					}
		
			$this->baseLoad(4);
			
			return true;
			
		}
		
	//ͼƬЦ���б�
	
	public function actionIndex($id=0){

		if($id){

				if(isset($this->xh_class[$id]) && $this->xh_class[$id]['type']=='2'){
					
					$this->page_title=$this->xh_class[$id]['name'].'��ЦͼƬ��ȫ-������Ц'.$this->xh_class[$id]['name'].'-'.$this->page_title;
					
					$this->page_keyword=$this->xh_class[$id]['name'].'ͼƬ,��Ц'.$this->xh_class[$id]['name'].'ͼƬ,'.$this->xh_class[$id]['name'].'ͼƬ��ȫ';
					
					$this->page_description=$this->xh_class[$id]['miaoshu'];
					
					$cond="and cl_id={$id}";
						
				}else{
					
					$this->page_title='ͼƬЦ����ȫ-��ЦͼƬЦ��-'.$this->page_title;
					
					$this->RecordForbid("ע�����ID:");$cond='';$id=0;
					
					}
			
		}else{
			
			$cond='';
			
			$this->page_title='ͼƬЦ����ȫ-��ЦͼƬЦ��-'.$this->page_title;
		
		}

		$dataProvider=new CActiveDataProvider('XhImage',array(
							
							'criteria'=>array(
									'order'=>'im_time desc',
									'condition'=>"publiced=1 and im_visible=1 {$cond}"								
									),
									
							'pagination'=>array(
									'pageSize'=>20,
									),
						));
		
		$this->render('index',array(
			
			'data'=>$dataProvider->getData(),
			'dataProvider'=>$dataProvider,
			'image_tuijian'=>$this->getBaoimage(30),
			'id'=>$id,
		
		));
	
	}
	
	//��ЦͼƬ�б�
	
	public function actionbest(){
		
		$this->setthispage(5);
		
		$this->page_title='������ЦͼƬ-��ЦͼƬЦ��-������ЦͼƬ-�����ЦͼƬ'.$this->page_title;
		
		$this->page_keyword='��ЦͼƬ,���ֱ�ЦͼƬ,��ЦͼƬ��ȫ,'.$this->page_keyword;
					
		$this->page_description='���ָ����ı�ЦͼƬ,��ЦͼƬ��ȫ';
		
		$dataProvider=new CActiveDataProvider('XhImage',array(
							
							'criteria'=>array(
									'order'=>'im_time desc',
									'condition'=>"im_baoxiao=1 and publiced=1 and im_visible=1"								
									),
									
							'pagination'=>array(
									'pageSize'=>15
									),
						));
		
		$this->render('best',array(
			
			'data'=>$dataProvider->getData(),
			'dataProvider'=>$dataProvider,
			'image_tuijian'=>$this->getBaoimage(30),
		
		));
	
	}
	
	//ͼƬЦ����ϸҳ

	public function actionView($id,$page=1){
	
		$xhImage_show=new xhImage_show(Yii::app()->basePath.'/../jokeimg/',$this->webset['image_pagenum'],$page);
		
		$model=$this->loadModel($id);
		
		//����ʾ״̬Ϊע��
		
		if($model->publiced==0 || $model->im_visible==0){$this->RecordForbid('δ����ͼƬע��');$this->kermitBase->msg_show('',$this->createUrl('Site/index'));}
	
		$this->page_title=$model->im_title.'-'.$this->xh_class[$model->cl_id]['name'].'-'.$this->page_title;
		
		$this->page_keyword=$model->im_title.',��Ц'.$this->xh_class[$model->cl_id]['name'].'ͼƬ,'.$this->xh_class[$model->cl_id]['name'].'��ЦͼƬ��ȫ';
					
		$this->page_description='��Ц'.$this->xh_class[$model->cl_id]['name'].'ͼƬ'.$model->im_title;
		
		$pinglun=Yii::app()->db->createCommand("select * from xh_pinglun where pl_tt_id={$id} and pl_type=2 and pl_visible=1 order by pl_id desc")->query()->readAll();
		
		$this->render('view',array(
			
			'model'=>$model,
			'xhImage_show'=>$xhImage_show,
			'page'=>$page,
			'pinglun'=>$pinglun,
			
		));
		
	}
	
	//���ڵ�һ��ͼƬʱ�޸�ͼƬ��ʾ����
	
	public function updateView($model,$page){
		
		$showview=$model->im_showviews;
		
		if($page==1){//��һҳʱ������������	
		
				$showview=$showview+rand(1,3);
				
				$update_arr=array(
					'im_views'=>$model->im_views+1,
					'im_showviews'=>$showview,
					'im_score'=>abs($model->im_views+1+($model->im_voters_up-$model->im_voters_down)*5+10*$model->im_comments),
					);

				$model->updateByPk($model->im_id,$update_arr);
		
		}

		if($this->webset['image_pagenum']=='1' && $this->webset['image_autoplay']=='1'){//�Զ�����
		
				$autoplay='<a href="javascript:playimg();" id="playdos"></a>';
						
		}else{
			
				$autoplay='<script type="text/javascript">playcook=0;</script>';
		
			}
		
		
		return '<div class="autop"><span class="left">����ʱ�䣺'.date('Y-m-d H:i:s',$model->im_time).'��������<b>'.$showview.'</b>��</span><span class="right">'.$autoplay.'</span></div>';
		
	}

	//�û�ͶƱ
	
	public function actionvote($id,$type,$class){

			header("Content-type: text/html; charset=utf-8"); 
			
			$vote_arr=Yii::app()->session['votes'];
			
			if($type) $type=1;else $type=0;
	
			$id=intval($this->kermitBase->filter_normal($id));
			
			if(isset($vote_arr[$id])){echo json_encode(array('rs'=>0));exit;}
			
			if($class=='i'){
				
					if($type) $sql="update xh_image set im_voters_up=im_voters_up+1 where im_id={$id} ";
			
					else $sql="update xh_image set im_voters_down=im_voters_down+1 where im_id={$id} ";
					
			}else{
				
					if($type) $sql="update xh_title set tt_voters_up=tt_voters_up+1 where tt_id={$id} ";
			
					else $sql="update xh_title set tt_voters_down=tt_voters_down+1 where tt_id={$id} ";

				}
			
			if(Yii::app()->db->createCommand($sql)->query()){
				
					$vote_arr[$id]=$id;
					
					Yii::app()->session['votes']=$vote_arr;
				
					echo json_encode(array('rs'=>1));
			
			}else echo json_encode(array('rs'=>0));

	}

	//ȡͼƬЦ����һƪ�Լ���һƪ
	
	public function getUpandDown($id){
		
		$next_image=Yii::app()->db->createCommand("select im_id,im_title from xh_image where publiced=1 and 
												   im_visible=1 and im_id>{$id} order by im_id asc limit 1")->query()->read();
												   
        $pre_image=Yii::app()->db->createCommand("select im_id,im_title from xh_image where publiced=1 and 
												   im_visible=1 and im_id<{$id} order by im_id desc limit 1")->query()->read();
												   									   
        if(!empty($pre_image)){
			
			$return_char="��һƪ��<a href='".$this->createUrl('XhImage/View',array('id'=>$pre_image['im_id']))."'>".$pre_image['im_title']."</a><br>";
        
			$this->pre_id=$pre_image['im_id'];
		
		}else $return_char="��һƪ���Ѿ�û����...<br>";
		
        if(!empty($next_image)){
			
			$return_char.="��һƪ��<a href='".$this->createUrl('XhImage/View',array('id'=>$next_image['im_id']))."'>".$next_image['im_title']."</a><br>";
       
	    	$this->next_id=$next_image['im_id'];
		
		}else $return_char.="��һƪ�����һƪ��...";
		
		return $return_char;

	}
	
	//��������ż��Զ�����ʱ����һ����һ��URL
	
	public function getPageside($id,$type,$page,$pageall){// $xhImage_show->page  $xhImage_show->page_allnum

		if($type=='next'){//��һҳURL
			
				$next_page=$page+1;
				
				if($next_page<=$pageall) $next_page="window.location.href='".str_replace('.html','',$this->createUrl('XhImage/View',array('id'=>$id)).'-').$next_page.".html#pos';";

				else{
					
					if($this->next_id) $next_page="window.location.href='".str_replace('.html','',$this->createUrl('XhImage/View',array('id'=>$this->next_id))).".html#pos';";
					
					else $next_page="alert('���һ����...');";
				
				}
				
			    return $next_page;
				
		}
		
		if($type=='pre'){
		
				$pre_page=$page-1;
				
				if($pre_page>0)
					
					 $pre_page="window.location.href='".str_replace('.html','',$this->createUrl('XhImage/View',array('id'=>$id)).'-').$pre_page.".html#pos';";
				
				else{
					
					if($this->pre_id) $pre_page="window.location.href='".str_replace('.html','',$this->createUrl('XhImage/View',array('id'=>$this->pre_id)))."-50.html#pos';";
					
					else $pre_page="alert('ǰ��û����');";
				
				}
				
				return $pre_page;
		
		 }	
		
	}//end function 
	
	//kermit:2012-12-6��������ҳ��ÿ����Ŀ�������ļ��������ɻ���

	public function getClassrs($classid,$num=7){
		
		$file_path=Yii::app()->basePath.'/coreData/newclass/new'.$classid.'.php';
		
		if(file_exists($file_path)) return require($file_path);//�ļ�����ֱ�ӷ��ػ���
		
		$array=Yii::app()->db->createCommand("select * from xh_title where cl_id='{$classid}' and publiced=1 and tt_visible=1 order by tt_time desc limit 0,{$num}")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:new��classID:{$classid} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['tt_title']);
			
			$writechar.="\r\n\t{$i}=>array('tt_id'=>'{$row['tt_id']}','cl_id'=>'{$row['cl_id']}','tt_title'=>'{$title}','tt_showviews'=>'{$row['tt_showviews']}','tt_time'=>'{$row['tt_time']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/newclass/new'.$classid.'.php');
		
		return $array;
		
		}
	
	
	//���ݼ��غ���

	public function loadModel($id){
		
		$model=XhImage::model()->findByPk($id);
		
		if($model===null)throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}
	
//ͼƬЦ��������

	public function actionSearch(){

		$this->sec_class=2;
		
		$keyword=$this->kermitBase->filter_simple(isset($_POST['keyword'])?$_POST['keyword']:'');

		if($keyword=='') $keyword=trim($this->kermitBase->filter_simple(isset($_GET['keyword'])?$_GET['keyword']:''));
		
		$this->keyword=$keyword;$_GET['keyword'] = $keyword;
		
		if($keyword==''){$this->actionIndex();exit;}
		
		$dataProvider=new CActiveDataProvider('XhImage',array(
							
							'criteria'=>array(
									'order'=>'im_time desc',
									'condition'=>"publiced=1 and im_visible=1 and im_title like '%$keyword%'"								
									),
									
							'pagination'=>array(
									'pageSize'=>5
									),
						));
		
		$this->render('search',array(
			
			'data'=>$dataProvider->getData(),
			'dataProvider'=>$dataProvider,
			'image_tuijian'=>$this->getBaoimage(30),
			'keyword'=>$keyword,
		
		));

	}

}//end class
