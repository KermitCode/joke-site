<?php

/*
 *for admin tp change password and set web config
 */

class XhsystemController extends Controller{
	
	
	public $layout='//layouts/column2';

//kermit:2012-11-3 adminer checker
	
	public function beforeAction(){	
			
		if($this->baseLoad()) return true;
			
	}
	
	public function actionIndex(){
		
		$this->render('index');
	
	}

	public function actionmodify($type=''){
		
		if($type=='') $this->actionIndex();
		
		$this->BaseRight(2);
		
		switch($type){
			
				case 'super':

					$super1=$this->kermitBase->filter_normal($_POST['super1']);
					
					$super2=$this->kermitBase->filter_normal($_POST['super2']);
					
					$super3=$this->kermitBase->filter_normal($_POST['super3']);
					
					if($super2!=$super3) $this->kermitBase->msg_show('�ظ����벻һ�£�');
					
					if($super1==$super3) $this->kermitBase->msg_show('�¾����벻����ͬ��');
					
					if($super1!=$_POST['super1'] || $super2!=$_POST['super2']) $this->kermitBase->msg_show('����ֻ��Ϊ���֡���ĸ���»��ߣ�');
					
					$data=Yii::app()->db->createCommand("select * from xh_system")->query()->read();
					
					if(md5($super1)!=$data['superadmin_pass']) $this->kermitBase->msg_show('ԭ�������');
					
					else{
						
						$pass=md5($super2);
						
						Yii::app()->db->createCommand("update xh_system set superadmin_pass='{$pass}'")->query();
						
						$this->kermitBase->msg_show('�������޸ĳɹ���');
						
						}
					
					$this->kermitBase->msg_show('�޸�ʧ�ܣ������ԣ�');						

					exit;
				
				break;
				
				case 'normal':
				
					$password=md5($_POST['normal']);
				
					Yii::app()->db->createCommand("update xh_system set adminer_pass='{$password}'")->query();
					
					$this->kermitBase->msg_show('�޸ĳɹ���');
				
				break;
				
				case 'test':
					
					$password=md5($_POST['test']);
					
					Yii::app()->db->createCommand("update xh_system set adtest_pass='{$password}'")->query();
					
					$this->kermitBase->msg_show('�޸ĳɹ���');
					
				break;
				
				default:$this->actionIndex();break;	
			
			}
		
	}//end password modify
	
//kermit:for web all set

	public function actionWebset(){

			if(isset($_GET['modify']) && $_GET['modify']=='modify'){//�޸���վ����
			
					$this->BaseRight(2);
			
					$newset=&$_POST;$sql_array=array();
					
					unset($newset['yt0'],$newset['yt1']);
			
					if(!get_magic_quotes_gpc()){
						
						foreach($newset as $key=>$value) $newset[$key]=addslashes($value);
						
						}
						
					if(get_magic_quotes_gpc()) $newset['web_stat']=addslashes($newset['web_stat']);
					
					foreach($newset AS $key=>$value){
						
						$sql_array[]="$key='$value'";
						
						}
		
					$sql="update xh_system set ".implode(',',$sql_array);
					
					Yii::app()->db->createCommand($sql)->query();
					
					$this->makeWebset($newset);
					
					$this->kermitBase->msg_show('�޸ĳɹ���');
				
				}
		
			$rs=Yii::app()->db->createCommand("select * from xh_system")->query()->read();
			
			$this->render('webset',array(
			
						'rs'=>$rs,
						
					));	

	}

//create phpcache file:kermit:2012-11-12

	public function makeWebset($array){
		
		$writechar="<?php\r\n/*\r\n*file:webset file\r\n*time:".date("Y-m-d H:i:s")."\r\n*/\r\n\r\n".'return array(';
		
		foreach($array as $key=>$value){
			
			$writechar.="\r\n\t'{$key}'=>'{$value}',";
			
			}
		
		$writechar.="\r\n\t);\r\n?>";
		
		$this->kermitBase->createFile($writechar,Yii::app()->basePath.'/coreData/webset.php');
		
		}
		
	//stat all class data numbers
		
	public function actionMakeStatnum($class){
		
		$this->BaseRight(2);
		
		$class_arr=Yii::app()->db->createCommand("select cl_id from xh_class where cl_type={$class}")->query()->readAll();
		
		foreach($class_arr as $key=>$row){
			
				$clid=$row['cl_id'];
				
				//����Ц��
				
				if($class==1) $number=Yii::app()->db->createCommand("select count(*) as nums from xh_title where publiced=1 and cl_id={$clid}")->query()->read();
				
				//ͼƬЦ��
				
				else $number=Yii::app()->db->createCommand("select count(*) as nums from xh_image where publiced=1 and cl_id={$clid}")->query()->read();
				
				Yii::app()->db->createCommand("update xh_class set cl_articles={$number['nums']} where cl_id={$clid}")->query();
	
				}
		
		//���¸���Ц������������
		
		list($controller_sec,$action)=Yii::app()->createController('XhClass/makeClassfile');
										
		$controller_sec->$action();
			
		$this->kermitBase->msg_show('���ݿ���³ɹ������Ѹ��»��棡');
		
		}	
		
		



	
}