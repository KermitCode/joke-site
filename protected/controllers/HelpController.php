<?php

/*
 *kermit:2012-11-24
 *ǰ̨����һЩ���ɳ�����ļ�
 */
 
class HelpController extends Controller{
	
	public function actionindex(){
		
		exit;
	
	}
	
	//������վ���þ�̬�ļ�

	public function actionMakeWebset(){
		
		$array=Yii::app()->db->createCommand("select * from xh_system limit 0,1")->query()->read();
		
		$writechar="<?php\r\n/*\r\n*file:webset file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($array as $key=>$value){
			
			if(!get_magic_quotes_gpc()) $value=addslashes($value);
			
			if(get_magic_quotes_gpc() && $key=='web_stat') $value=addslashes($value);
				
			$writechar.="\r\n\t'{$key}'=>'{$value}',";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/webset.php');

		return true;
		
		}

//�����ļ�����
		
	public function createFile($char,$filepath){
		
		if(empty($char)) exit('error null writechar!');
		
				if($fp=fopen($filepath, "wb")){
			   
						if(@fwrite($fp,$char)){
			   
							fclose($fp);
		   
							return true;
						
						}else{
							
							fclose($fp);
							
							return false;
		   
						}
		   
				}
												
		return false;
	   
	}

//���ɱ�Ц�����б�

	public function actionBaoxiao($num){

		$array=Yii::app()->db->createCommand("select * from xh_title where publiced=1 and tt_visible=1 and tt_best=1 order by tt_time desc limit {$num}")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:baoxiao-{$num} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['tt_title']);
			
			$writechar.="\r\n\t{$i}=>array('tt_id'=>'{$row['tt_id']}','cl_id'=>'{$row['cl_id']}','tt_title'=>'{$title}','tt_showviews'=>'{$row['tt_showviews']}','tt_time'=>'{$row['tt_time']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/pagecache/baoxiao'.$num.'.php');
		
	}

//�������ж���Ц������

	public function actionPaihang($num){
		
		$array=Yii::app()->db->createCommand("select * from xh_title where publiced=1 and tt_visible=1 order by tt_voters_up desc limit 0,{$num}")->queryAll();

		$writechar="<?php\r\n/*\r\n*file:paihang-{$num} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['tt_title']);
			
			$writechar.="\r\n\t{$i}=>array('tt_id'=>'{$row['tt_id']}','cl_id'=>'{$row['cl_id']}','tt_title'=>'{$title}','tt_showviews'=>'{$row['tt_showviews']}','tt_time'=>'{$row['tt_time']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/pagecache/paihang'.$num.'.php');
		
	}

//���ɱ�ЦͼƬ����

	public function actionImage($num){
		
		$array=Yii::app()->db->createCommand("select im_id,cl_id,im_title,im_mainimg,im_showviews,im_time from xh_image where im_visible=1 and publiced=1 and im_baoxiao=1 order by im_time desc limit 0,{$num}")->queryAll();

		$writechar="<?php\r\n/*\r\n*file:baoimage-{$num} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['im_title']);
			
			$writechar.="\r\n\t{$i}=>array('im_id'=>'{$row['im_id']}','cl_id'=>'{$row['cl_id']}','im_title'=>'{$title}','im_showviews'=>'{$row['im_showviews']}','im_time'=>'{$row['im_time']}','im_mainimg'=>'{$row['im_mainimg']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/imagecache/baoimage'.$num.'.php');

		}
		
//��������Ц����������

	public function actionNewxiao($num){
		
		$array=Yii::app()->db->createCommand("select * from xh_title where publiced=1 and tt_visible=1 order by tt_time desc limit 0,{$num}")->queryAll();
	
		$writechar="<?php\r\n/*\r\n*file:newxiao-{$num} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['tt_title']);
			
			$writechar.="\r\n\t{$i}=>array('tt_id'=>'{$row['tt_id']}','cl_id'=>'{$row['cl_id']}','tt_title'=>'{$title}','tt_showviews'=>'{$row['tt_showviews']}','tt_time'=>'{$row['tt_time']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/pagecache/newxiao'.$num.'.php');
		
		}		
		
//��������ͼƬ���ݻ���

	public function actionNewimage($num){
		
		$array=Yii::app()->db->createCommand("select im_id,cl_id,im_title,im_mainimg,im_showviews,im_time from xh_image where im_visible=1 and publiced=1 order by im_time desc limit 0,{$num}")->queryAll();

		$writechar="<?php\r\n/*\r\n*file:newimage-{$num} file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';	$i=0;
		
		foreach($array as $key=>$row){
			
			$title=addslashes($row['im_title']);
			
			$writechar.="\r\n\t{$i}=>array('im_id'=>'{$row['im_id']}','cl_id'=>'{$row['cl_id']}','im_title'=>'{$title}','im_showviews'=>'{$row['im_showviews']}','im_time'=>'{$row['im_time']}','im_mainimg'=>'{$row['im_mainimg']}'),";
			
			$i++;
			
			}
	
		$writechar.="\r\n\t);\r\n?>";
	
		$this->createFile($writechar,Yii::app()->basePath.'/coreData/imagecache/newimage'.$num.'.php');

		}		

//���¸���Ŀ�����������������»���

	public function actionMakeStatnum($class){
		
		$class_arr=Yii::app()->db->createCommand("select cl_id from xh_class where cl_type={$class}")->query()->readAll();
		
		foreach($class_arr as $key=>$row){
			
				$clid=$row['cl_id'];
				
				//����Ц��
				
				if($class==1) $number=Yii::app()->db->createCommand("select count(*) as nums from xh_title where publiced=1 and cl_id={$clid}")->query()->read();
				
				//ͼƬЦ��
				
				else $number=Yii::app()->db->createCommand("select count(*) as nums from xh_image where publiced=1 and cl_id={$clid}")->query()->read();
				
				Yii::app()->db->createCommand("update xh_class set cl_articles={$number['nums']} where cl_id={$clid}")->query();
	
				}
		
		}	
	
//��Ц����������PHP�����ļ�

	public function makeClassfile(){
		
		$models=XhClass::model()->findAll(array('order'=>'cl_type asc,cl_order desc'));
		
		$writechar="<?php\r\n/*\r\n*file:xhclass file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($models as $model){
			
			$writechar.="\r\n\t{$model->cl_id}=>array('name'=>'{$model->cl_name}',\r\n\t\t\t'type'=>'{$model->cl_type}',\r\n\t\t\t'nums'=>'{$model->cl_articles}',\r\n\t\t\t'miaoshu'=>'{$model->cl_description}'\r\n\t\t\t),";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		Yii::app()->controller->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/xhclass.php');
		
	}
	














}//end class