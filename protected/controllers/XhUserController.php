<?php

/*
 *�û���¼���û����ģ�
 */
 
class XhUserController extends Controller{
	
	public $layout='//layouts/column1';

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
		
			$this->baseLoad(9);
			
			return true;
			
		}

	//�û���¼ҳ��
	
	public function actionLogin(){
		
		if(isset($_GET['id'])) $showmes="����Ҫ�ȵ�¼��վ���ܽ��н������Ĳ���! ����<font color=blue> <b>0��ע��</b></font>";
		
		else $showmes='��ӭ��¼��ЦЦ����-����0��ע��';
		
		if(isset($_POST['username']) && isset($_POST['password'])){
			
				$username=$this->kermitBase->filter_normal($_POST['username']);
				
				$password=$this->kermitBase->filter_normal($_POST['password']);
				
				if($username=='' || $password=='' || strlen($username)<5 || strlen($password)<5){$this->RecordForbid('Խ��ע��JS��֤ע��');}
				
				if(Yii::app()->session['er_name']!=''){
					
					$this->kermitBase->msg_show('���ѵ�¼��վ�������˳���վ!',$this->createUrl('Site/index'));
					
					}
				
				if(Yii::app()->session['logintimes']>10){
					
						$this->RecordForbid('��¼������������');
						
						$this->kermitBase->msg_show('����¼�Ĵ���̫���ˣ�ЪϢЪϢ��!',$this->createUrl('Site/index'));
					
					}
				
				//��ѯ�û���
				
				$model= new XhUser;
				
				$user_rs=$model->find("er_name='{$username}'");

				if($user_rs){//�û�������
				
						$user=$user_rs->attributes;

						if(md5($password)!=$user['er_password']) $this->kermitBase->msg_show('�˺Ŵ���,���벻��ȷ!');
						
						else{//�����¼״̬
							
							Yii::app()->session['er_name']=$username;
							
							$lasttime=time();$er_times=$user['er_times']+1;
							
							$userid=$user['er_id'];
							
							Yii::app()->db->createCommand("update xh_user set er_lasttime={$lasttime},er_times={$er_times} where er_id={$userid}")->query();
							
							unset($_POST);
							
							//д���û�COOKIES
							
							$cookie = new CHttpCookie("usermess",md5(md5($password)).$username);

							$cookie->expire=time()+60*60*24*3650;   //����������
			
							Yii::app()->request->cookies["usermess"]=$cookie;
							
							header("Location:".$this->createUrl('Site/index'));
							
							}
	
					}else{//�Դ�����ע��
						
						$model= new XhUser;
						
						$model->er_name=$username;
						$model->er_password=md5($password);
						$model->er_ip=$this->kermitBase->getuserip();
						$model->er_gotime=time();
						$model->er_lasttime=time();
						$model->er_times=1;
						
						if($model->save()){
						
							Yii::app()->session['er_name']=$username;
							
							unset($_POST);
							
							//д���û�COOKIES
							
							$cookie = new CHttpCookie("usermess",md5(md5($password)).$username);

							$cookie->expire=time()+60*60*24*3650;   //����������
			
							Yii::app()->request->cookies["usermess"]=$cookie;
							
							header("Location:".$this->createUrl('Site/index'));
							
						}else $this->kermitBase->msg_show('ע������ʧ�ܣ�������!');
	
				}
				
				//��¼�����ӣ�
				
				Yii::app()->session['logintimes']=Yii::app()->session['logintimes']+1;
			
			
		}
		
		$this->render('login',array('showmes'=>$showmes));
		
		}
		
	//�û�����ҳ��	
		
	public function actionView($id=0){

		$username=Yii::app()->session['er_name'];

		if($username==''){$this->actionLogin();exit;}
	
		$model=XhUser::model()->find("er_name='$username'");
		
		$this->render('view',array('model'=>$model,));
	
	}
	
	//�û�����Ц���б�
	
	public function actionXiao(){
		
		if(Yii::app()->session['er_name']==''){$this->actionLogin();exit;}
		
		$username=Yii::app()->session['er_name'];
		
		$model=Yii::app()->db->createCommand("select * from xh_title where tt_author='{$username}' and tt_visible=1")->query()->readAll();
		
		$this->render('xiao',array('model'=>$model,));
	
		}
		
	//�û����������б�
	
	public function actionComment(){
		
		if(Yii::app()->session['er_name']==''){$this->actionLogin();exit;}
		
		$username=Yii::app()->session['er_name'];
		
		$model=Yii::app()->db->createCommand("select * from xh_pinglun where pl_author='{$username}' and pl_visible=1")->query()->readAll();
		
		$this->render('comment',array('model'=>$model,));

		}
		

	//�û��˳���վ
	
	public function actionlogout(){
		
		unset(Yii::app()->session['er_name']);
		
		//����cookie:
		
		$cookie = Yii::app()->request->getCookies();

		if(isset($cookie['usermess'])) unset($cookie['usermess']);
		
		$this->kermitBase->msg_show();
		
		}

	//�û��޸�����
	
	public function actionUpdate(){
		
		$username=Yii::app()->session['er_name'];

		if($username==''){$this->actionLogin();exit;}
	
		$model=XhUser::model()->find("er_name='$username'");

		if(isset($_POST['XhUser'])){//�û��޸�����
		
			if($_POST['XhUser']['er_password']=='') $this->kermitBase->msg_show('ԭ��¼���벻��Ϊ��!');
			
			if(md5($_POST['XhUser']['er_password'])!=$model->er_password) $this->kermitBase->msg_show('ԭ���벻��ȷ!');
			
			else unset($_POST['XhUser']['er_password']);
			
			if($_POST['XhUser']['er_qq']=='' || strlen($_POST['XhUser']['er_qq'])<5) $this->kermitBase->msg_show('�޸�����ʱQQ�˺ű�����д�ҺϷ�!');
			
			$model->attributes=$_POST['XhUser'];
			
			if(intval($_POST['XhUser']['er_qq'])!=$_POST['XhUser']['er_qq']) $this->kermitBase->msg_show('QQ����ȫ��Ϊ����!');
			
			if($_POST['er_passworda']!='' || $_POST['er_passwordb']!=''){
				
				if($this->kermitBase->filter_normal($_POST['er_passworda'])!=$_POST['er_passworda']) $this->kermitBase->msg_show('����ֻ������ĸ���ּ��»������!');
				
				if($this->kermitBase->filter_normal($_POST['er_passworda'])!=$_POST['er_passwordb']) $this->kermitBase->msg_show('�ظ����벻һ��!');
				
				$model->er_password=md5($this->kermitBase->filter_normal($_POST['er_passworda']));
				
			}

			$model->save();
			
			$this->kermitBase->jsOnly('�����޸ĳɹ�!');
			
			$this->actionlogout();
			
		}

		$this->render('update',array('model'=>$model,));
		
	}

	//�������غ���
	
	public function loadModel($id){
		
		$model=XhUser::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}//end class