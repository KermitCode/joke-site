<?php

/*
 *用户登录；用户中心；
 */
 
class XhUserController extends Controller{
	
	public $layout='//layouts/column1';

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
		
			$this->baseLoad(9);
			
			return true;
			
		}

	//用户登录页面
	
	public function actionLogin(){
		
		if(isset($_GET['id'])) $showmes="您需要先登录网站才能进行接下来的操作! 试试<font color=blue> <b>0秒注册</b></font>";
		
		else $showmes='欢迎登录三笑笑话网-试试0秒注册';
		
		if(isset($_POST['username']) && isset($_POST['password'])){
			
				$username=$this->kermitBase->filter_normal($_POST['username']);
				
				$password=$this->kermitBase->filter_normal($_POST['password']);
				
				if($username=='' || $password=='' || strlen($username)<5 || strlen($password)<5){$this->RecordForbid('越过注册JS验证注入');}
				
				if(Yii::app()->session['er_name']!=''){
					
					$this->kermitBase->msg_show('您已登录网站，请先退出网站!',$this->createUrl('Site/index'));
					
					}
				
				if(Yii::app()->session['logintimes']>10){
					
						$this->RecordForbid('登录次数超过５次');
						
						$this->kermitBase->msg_show('您登录的次数太多了，歇息歇息吧!',$this->createUrl('Site/index'));
					
					}
				
				//查询用户名
				
				$model= new XhUser;
				
				$user_rs=$model->find("er_name='{$username}'");

				if($user_rs){//用户名存在
				
						$user=$user_rs->attributes;

						if(md5($password)!=$user['er_password']) $this->kermitBase->msg_show('账号存在,密码不正确!');
						
						else{//进入登录状态
							
							Yii::app()->session['er_name']=$username;
							
							$lasttime=time();$er_times=$user['er_times']+1;
							
							$userid=$user['er_id'];
							
							Yii::app()->db->createCommand("update xh_user set er_lasttime={$lasttime},er_times={$er_times} where er_id={$userid}")->query();
							
							unset($_POST);
							
							//写进用户COOKIES
							
							$cookie = new CHttpCookie("usermess",md5(md5($password)).$username);

							$cookie->expire=time()+60*60*24*3650;   //无限有限期
			
							Yii::app()->request->cookies["usermess"]=$cookie;
							
							header("Location:".$this->createUrl('Site/index'));
							
							}
	
					}else{//以此名称注册
						
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
							
							//写进用户COOKIES
							
							$cookie = new CHttpCookie("usermess",md5(md5($password)).$username);

							$cookie->expire=time()+60*60*24*3650;   //无限有限期
			
							Yii::app()->request->cookies["usermess"]=$cookie;
							
							header("Location:".$this->createUrl('Site/index'));
							
						}else $this->kermitBase->msg_show('注册意外失败，请重试!');
	
				}
				
				//登录次数加１
				
				Yii::app()->session['logintimes']=Yii::app()->session['logintimes']+1;
			
			
		}
		
		$this->render('login',array('showmes'=>$showmes));
		
		}
		
	//用户中心页面	
		
	public function actionView($id=0){

		$username=Yii::app()->session['er_name'];

		if($username==''){$this->actionLogin();exit;}
	
		$model=XhUser::model()->find("er_name='$username'");
		
		$this->render('view',array('model'=>$model,));
	
	}
	
	//用户发表笑话列表
	
	public function actionXiao(){
		
		if(Yii::app()->session['er_name']==''){$this->actionLogin();exit;}
		
		$username=Yii::app()->session['er_name'];
		
		$model=Yii::app()->db->createCommand("select * from xh_title where tt_author='{$username}' and tt_visible=1")->query()->readAll();
		
		$this->render('xiao',array('model'=>$model,));
	
		}
		
	//用户发表评论列表
	
	public function actionComment(){
		
		if(Yii::app()->session['er_name']==''){$this->actionLogin();exit;}
		
		$username=Yii::app()->session['er_name'];
		
		$model=Yii::app()->db->createCommand("select * from xh_pinglun where pl_author='{$username}' and pl_visible=1")->query()->readAll();
		
		$this->render('comment',array('model'=>$model,));

		}
		

	//用户退出网站
	
	public function actionlogout(){
		
		unset(Yii::app()->session['er_name']);
		
		//销毁cookie:
		
		$cookie = Yii::app()->request->getCookies();

		if(isset($cookie['usermess'])) unset($cookie['usermess']);
		
		$this->kermitBase->msg_show();
		
		}

	//用户修改资料
	
	public function actionUpdate(){
		
		$username=Yii::app()->session['er_name'];

		if($username==''){$this->actionLogin();exit;}
	
		$model=XhUser::model()->find("er_name='$username'");

		if(isset($_POST['XhUser'])){//用户修改资料
		
			if($_POST['XhUser']['er_password']=='') $this->kermitBase->msg_show('原登录密码不得为空!');
			
			if(md5($_POST['XhUser']['er_password'])!=$model->er_password) $this->kermitBase->msg_show('原密码不正确!');
			
			else unset($_POST['XhUser']['er_password']);
			
			if($_POST['XhUser']['er_qq']=='' || strlen($_POST['XhUser']['er_qq'])<5) $this->kermitBase->msg_show('修改资料时QQ账号必须填写且合法!');
			
			$model->attributes=$_POST['XhUser'];
			
			if(intval($_POST['XhUser']['er_qq'])!=$_POST['XhUser']['er_qq']) $this->kermitBase->msg_show('QQ必须全部为数字!');
			
			if($_POST['er_passworda']!='' || $_POST['er_passwordb']!=''){
				
				if($this->kermitBase->filter_normal($_POST['er_passworda'])!=$_POST['er_passworda']) $this->kermitBase->msg_show('密码只能由字母数字及下划线组成!');
				
				if($this->kermitBase->filter_normal($_POST['er_passworda'])!=$_POST['er_passwordb']) $this->kermitBase->msg_show('重复密码不一致!');
				
				$model->er_password=md5($this->kermitBase->filter_normal($_POST['er_passworda']));
				
			}

			$model->save();
			
			$this->kermitBase->jsOnly('资料修改成功!');
			
			$this->actionlogout();
			
		}

		$this->render('update',array('model'=>$model,));
		
	}

	//基本加载函数
	
	public function loadModel($id){
		
		$model=XhUser::model()->findByPk($id);
		
		if($model===null)
		
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	
	}


}//end class