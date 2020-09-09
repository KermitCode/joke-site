<?php

/*
 *kermit:2012-11-14 for indexpage
 */
 
class SiteController extends Controller{

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
		
			if($this->is_phoner()){

				header("Location:http://wap.33xiao.com/wap/");exit;
				
				}
		
			$this->baseLoad();
			
			return true;
			
		}

//kermit:2012-10-10 ��վ��ҳ����

	public function actionIndex(){
		
		$this->page_title=$this->page_title.'-Ц����ȫ-��ЦЦ��-��ЦЦ��-��ЦͼƬ-��ЦͼƬ-Ц�����������';
		
		$statnum=$this->getStatdata();

		$number_array=array(
				'day_image'=>$statnum['dayi'],
				'day_word'=>$statnum['dayw'],
				'day_all'=>$statnum['dayi']+$statnum['dayw'],
				'all_image'=>$statnum['alli'],
				'all_word'=>$statnum['allw'],
				'all_all'=>$statnum['alli']+$statnum['allw'],
				);
				
		//�õ�����Ц����������������
		
		$new_word=$this->getNewpage(4);
		$bao_word=$this->getBaoxiao(6);	$sql='';	
		foreach($new_word as $key=>$row){$sql.=" te_tt_id={$row['tt_id']} or";}//te_tt_id=168 or te_tt_id=167 or te_tt_id=166 or te_tt_id=165 or 
		foreach($bao_word as $key=>$row){$sql.=" te_tt_id={$row['tt_id']} or";}
		$sql=rtrim($sql,'or');$data_text=array();	
		$text=Yii::app()->db->createCommand("select * from xh_title_text where {$sql}")->query()->readAll();
		foreach($text as $key=>$row){$data_text[$row['te_tt_id']]=$row['te_text'];}	unset($text);
		
		$this->render('index',array(
				'result_new'=>$new_word,//����Ц��		
				'result_tuijian'=>$bao_word,//��ЦЦ��				
				'image_new'=>$this->getNewimage(6),//����ͼƬ			
				'image_tuijian'=>$this->getBaoimage(10),//��ЦͼƬ		
				'number_array'=>$number_array,//ͳ������
				'data_text'=>$data_text,//Ц����������
				));
	
	}
	

//kermit:2012-12-6����ÿ����Ŀ�������ļ��������ɻ���

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
	
//kermit:2012-11-25 ȫվ��ҳ��Ե����

	public function actionYuan(){
		
		//if($action!='yuan') exit('no');
		
		$rand_title=Yii::app()->db->createCommand("SELECT tt_id,tt_title FROM xh_title WHERE  publiced=1 and tt_visible=1 ORDER BY RAND () limit 1 ")->query()->read();
		
		$pgid=$rand_title['tt_id'];
		
		$rand_text=Yii::app()->db->createCommand("SELECT te_text FROM xh_title_text WHERE te_tt_id={$pgid}")->query()->read();
		
		$rand_text=str_replace(array('<br>','<br />','<BR>'),'',trim($rand_text['te_text']));
		
		if(strlen($rand_text)>450) $rand_text=$this->kermitBase->str_cut($rand_text,450,"..<a href='".$this->createUrl('XhTitle/view',array('id'=>$pgid))."'>>>�鿴ȫ��</a>");
		
		$outjson=json_encode(array(
					'title'=>iconv("gbk","utf-8",$rand_title['tt_title']),
					'text'=>iconv("gbk","utf-8",$rand_text),
					));
		$rand_array=array(1,1,1,1,1,1,2,2,2,2,3,3,4);$show_add=$rand_array[rand(0,12)];

		Yii::app()->db->createCommand("update xh_title set tt_views=tt_views+1,tt_showviews=tt_showviews+$show_add where tt_id={$pgid}")->query();			
					
		Yii::app()->db->createCommand("SELECT tt_id,tt_title FROM xh_title WHERE  publiced=1 and tt_visible=1 ORDER BY RAND () limit 1 ")->query();
		
		Yii::app()->db->createCommand("update xh_system set yuan_number=yuan_number+1 where xh_system=1")->query();
		
		header("Content-type: text/html; charset=utf-8"); 

		echo $outjson;
	
		}	

//��ҳ����ͳ�����ݻ���

	public function getStatdata(){
		
		$datafile=Yii::app()->basePath.'/coreData/stat.php';
		
		$date_thistime=strtotime(date('Y-m-d'));
		
		if(file_exists($datafile)){//�ļ�����
			
				$data=require($datafile);$mtime=filemtime($datafile);$change=false;
				
				if(time()-$mtime>$this->webset['stat_day_cachetime']){//��Ҫ���µ�������
					
					$dayi=Yii::app()->db->createCommand("select count(*) as dayi from xh_image where im_visible=1 and publiced=1 and im_time>$date_thistime")->query()->read();
			
					$dayw=Yii::app()->db->createCommand("select count(*) as dayw from xh_title where tt_visible=1 and publiced=1 and tt_time>$date_thistime")->query()->read();
					
					$change=true;$data['dayi']=$dayi['dayi'];$data['dayw']=$dayw['dayw'];
				
				if(rand(1,$this->webset['stat_all_cachetime'])==1){//��Ҫ������վ������	time()-$mtime>3600*$this->webset['stat_all_cachetime']
					
					$alli=Yii::app()->db->createCommand("select count(*) as alli from xh_image where im_visible=1 and publiced=1")->query()->read();
			
					$allw=Yii::app()->db->createCommand("select count(*) as allw from xh_title where tt_visible=1 and publiced=1")->query()->read();
					
					$change=true;$data['alli']=$alli['alli'];$data['allw']=$allw['allw'];
					
					$this->makeClasscache();//���¸���ĿЦ��������������

					}
					
				}
					
				if($change){
					
					$char="<?php\r\nreturn array('dayi'=>{$data['dayi']},'dayw'=>{$data['dayw']},'alli'=>{$data['alli']},'allw'=>{$data['allw']});\r\n?>";
					
					$this->kermitBase->createFile($char,$datafile);
					
					}
					
				return $data;
	
		}else{//�ļ�������
			
				$dayi=Yii::app()->db->createCommand("select count(*) as dayi from xh_image where im_visible=1 and publiced=1 and im_time>$date_thistime")->query()->read();
		
				$dayw=Yii::app()->db->createCommand("select count(*) as dayw from xh_title where tt_visible=1 and publiced=1 and tt_time>$date_thistime")->query()->read();	
				
				$alli=Yii::app()->db->createCommand("select count(*) as alli from xh_image where im_visible=1 and publiced=1")->query()->read();
			
				$allw=Yii::app()->db->createCommand("select count(*) as allw from xh_title where tt_visible=1 and publiced=1")->query()->read();
				
				$char="<?php\r\nreturn array('dayi'=>{$dayi['dayi']},'dayw'=>{$dayw['dayw']},'alli'=>{$alli['alli']},'allw'=>{$allw['allw']});\r\n?>";
					
				$this->kermitBase->createFile($char,$datafile);
				
				return array('dayi'=>$dayi['dayi'],'dayw'=>$dayw['dayw'],'alli'=>$alli['alli'],'allw'=>$allw['allw']);
						
		}
		
	}
	
//���ɸ���Ŀ�������¼�����

	public function makeClasscache(){
		
		list($controller_sec,$action)=Yii::app()->createController('Help/actionMakeStatnum');
										
			$controller_sec->$action(1);
			
			$controller_sec->$action(2);
			
		list($controller_sec,$action)=Yii::app()->createController('Help/makeClassfile');
		
			$controller_sec->$action();
		
		}
		
//������ʾ����
		
	public function actionError(){
		
		if($error=Yii::app()->errorHandler->error){
			
			if(Yii::app()->request->isAjaxRequest)
				
				echo $error['message'];
			
			else
				
				$this->render('error', $error);
		
		}
	
	}//end error class




}//end class