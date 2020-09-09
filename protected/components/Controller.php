<?php

/**
 * kermit:2012-11-15
 * allbase load data
 */
 
//base load function:

date_default_timezone_set('Asia/Shanghai');	

//error_reporting(E_ALL ^ E_NOTICE);
 
class Controller extends CController{
	
	public $layout='//layouts/column1';

	public $xh_class=array();
	
	public $kermitBase;
	
	public $webset=array();
	
	public $sprider='unknown';
	
	public $page_title;
	
	public $page_keyword;
	
	public $page_description;
	
	public $baseurl;
	
	public $thispage;//当前页面控制
	
	//所有页面基本加载程序
	
	public function baseLoad($thispage=0){
		
		/*session  Yii::app()->session['er_name'];
				   Yii::app()->session['votes'] 
				   Yii::app()->session['pingjia_num']
				   Yii::app()->session['logintimes']
				   */
				
		$this->baseurl=Yii::app()->baseUrl.'/';
		
		$this->kermitBase=new kermitBase();
		
		//判断登录状态
		
		if(Yii::app()->session['er_name']=='') $this->autoLogin();
		
		$this->xh_class=require(Yii::app()->basePath."/coreData/xhclass.php");
		
		$this->webset=require(Yii::app()->basePath."/coreData/webset.php");
		
		if(!$this->webset['web_open'] && !Yii::app()->session['admin']){
			
			echo $this->webset['web_close_words'];exit;
			
		}
		
		$this->noIptodo();//禁止IP访问处理
		
		$this->is_sprider();//搜索引擎记录
		
		if($this->webset['web_fangshuaxin'] && $this->sprider=='') $this->forBitfresh();//防用户刷屏功能打开时处理

		if($this->sprider=='' && date('H')>=8 && intval(rand(0,$this->webset['auto_public_precent']))==1) $this->auto_public_fun();//网站自动发表文章
		
		//初始设置页面关键词，标题，描述
		
		$this->page_title=$this->webset['web_name'];
	
		$this->page_keyword=$this->webset['web_keyword'];
	
		$this->page_description=$this->webset['web_description'];
		
		//禁止加载所有JS和CSS文件
		
		Yii::app()->clientScript->scriptMap['*.js'] = false;
			
		Yii::app()->clientScript->scriptMap['*.css'] = false;
		
		$this->setthispage($thispage);
		
	}
	
	//禁止IP访问处理
	
	public function noIptodo(){

			if($this->webset['no_ips']!=''){
				
				$jzips=explode('|',trim($this->webset['no_ips'],'|'));
			
				if(in_array($this->kermitBase->getuserip(),$jzips)){
					
					if($this->webset['no_ips_do']){echo "<script language='javascript'>for(var i=1;i<5000;i++){alert('浏览器某部件出现故障，请关闭重启');}</script>";die();}
					
					else{
						
						header("Content-type: text/html; charset=gbk"); 
						
						exit("您的IP有多次违规操作，IP已被禁止，请联系网站管理员邮箱：shirley_33xiao@126.com");die();
						
						}
					
					}
			
			}
		
	}
	
	//当前页面控制
	
	public function setthispage($thispage){
		
		for($i=0;$i<10;$i++) $this->thispage[$i]='';
		
		$this->thispage[$thispage]='class="selected"';
		
		}
	
	
	//生成控制文件缓存程序
	
	public function makeWebset(){
		
		list($controller_sec,$action)=Yii::app()->createController('Help/actionMakeWebset');
										
		$controller_sec->$action();
		
	}
		
	//用户出现违规操作程序	
		
	public function RecordForbid($what){
		
		if(!$what) return;
		
		$insert_arr=array(
		
				'jin_ip'=>$this->kermitBase->getuserip(),
				'jin_say'=>$what.Yii::app()->request->getUrl(),
				'jin_time'=>time(),
				'jin_user'=>Yii::app()->session['user']['er_name'],
			);
		
		Yii::app()->db->createCommand()->insert('xh_errors',$insert_arr);
		
	}	
		
	//取得爆笑短文笑话---缓存不存在则进行生成
		
	public function getBaoxiao($num){
		
		if(!intval($num)) $num=10;
		
		if(!file_exists(Yii::app()->basePath.'/coreData/pagecache/baoxiao'.$num.'.php')){
			
			list($controller_sec,$action)=Yii::app()->createController('Help/actionBaoxiao');
										
			$controller_sec->$action($num);

			}
			
		return require(Yii::app()->basePath.'/coreData/pagecache/baoxiao'.$num.'.php');

	}
	
	//取得最新短文笑话数据
	
	public function getNewpage($num){
		
		if(!intval($num)) $num=10;
		
		if(!file_exists(Yii::app()->basePath.'/coreData/pagecache/newxiao'.$num.'.php')){
			
			list($controller_sec,$action)=Yii::app()->createController('Help/actionNewxiao');
										
			$controller_sec->$action($num);

			}
			
		return require(Yii::app()->basePath.'/coreData/pagecache/newxiao'.$num.'.php');
		
		}	
		
	//取得排行笑话数据
		
	public function getPaihang($num){
		
		if(!intval($num)) $num=10;
		
		if(!file_exists(Yii::app()->basePath.'/coreData/pagecache/paihang'.$num.'.php')){
			
			list($controller_sec,$action)=Yii::app()->createController('Help/actionPaihang');
										
			$controller_sec->$action($num);

			}
			
		return require(Yii::app()->basePath.'/coreData/pagecache/paihang'.$num.'.php');

	}	
	
	//取得爆笑图片数据
	
	public function getBaoimage($num){
		
		if(!intval($num)) $num=10;
		
		if(!file_exists(Yii::app()->basePath.'/coreData/imagecache/baoimage'.$num.'.php')){
			
			list($controller_sec,$action)=Yii::app()->createController('Help/actionImage');
										
			$controller_sec->$action($num);

			}
			
		return require(Yii::app()->basePath.'/coreData/imagecache/baoimage'.$num.'.php');
		
		}
		
	//取得最新图片数据
	
	public function getNewimage($num){
		
		if(!intval($num)) $num=6;
		
		if(!file_exists(Yii::app()->basePath.'/coreData/imagecache/newimage'.$num.'.php')){
			
			list($controller_sec,$action)=Yii::app()->createController('Help/actionNewimage');
										
			$controller_sec->$action($num);

			}
			
		return require(Yii::app()->basePath.'/coreData/imagecache/newimage'.$num.'.php');
		
		}
		
		
	//搜索引擎访问记录
	
	public function is_sprider(){
		
			if($this->sprider!='unknown') return $this->sprider;
		
			if(empty($_SERVER['HTTP_USER_AGENT'])){$this->sprider=''; return $this->sprider;}
		
			$searchs = Yii::app()->params['sprider'];
		
			$sprider_agent=strtolower($_SERVER['HTTP_USER_AGENT']);
		
			foreach($searchs as $key=>$value){
				
					if (strpos($sprider_agent,$value)!==false){//为搜索引擎进行记录
					   
							$this->sprider=$key;
							
							//对引擎记录数量达到多少时清空
							
							$allnum=Yii::app()->db->createCommand("select count(*) as num from xh_sprider")->query()->read();
							
							if($allnum['num']>=$this->webset['sprider_num'])
							
									Yii::app()->db->createCommand("delete from xh_sprider")->query();
							
							//对搜索引擎进行记录-多少小时记录一次
					
							$thistime=time()-$this->webset['sprider_time']*3600;
							 
							Yii::app()->db->createCommand("LOCK TABLES xh_sprider WRITE")->query();
							
							$nowtime=time();
							
							$allnum=Yii::app()->db->createCommand("select count(*) as num from xh_sprider where cometime>{$thistime}")->query()->read();
					
							if(!$allnum['num'])	Yii::app()->db->createCommand("insert into xh_sprider(sprider,cometime) values('$key',$nowtime)")->query();
									
							Yii::app()->db->createCommand("UNLOCK TABLES")->query();
		
							return $this->sprider;
						
					}
					
			}//结束for循环
		
			$this->sprider = '';return $this->sprider;
	
	}	
		
	//自动发表程序
	
	public function auto_public_fun(){
		
				if($this->webset['auto_public_num'] || $this->webset['auto_public_imagenum'] ){//自动发表文字笑话或者图片
					
						$public_date=$this->webset['auto_public_day'];
						
						$nowday=date('Y-m-d');
						
						if($public_date!=$nowday){//更新发表日期
							
								Yii::app()->db->createCommand("update xh_system set auto_public_day='{$nowday}',auto_public=0,auto_public_img=0 where xh_system=1")->query();
									
								$this->makeWebset();
									
								return true;
		
						}else{//进入发表程序
						
								$sql='';
							
								if($this->webset['auto_public_num'] && $this->webset['auto_public']<$this->webset['auto_public_num']){//开启短文章发表且未发表足够
									
										$public_wordnum=rand(1,3);//一次1-3篇随机
										
										$starttime=time()-300;
										
										for($i=0;$i<$public_wordnum;$i++){
											
											$starttime+=rand(80,200);$randx=rand(0,8);
											
											$baoxiao=$randx==1?",tt_best='1'":'';
											
				Yii::app()->db->createCommand("update xh_title set publiced='1',tt_time='$starttime'{$baoxiao} where publiced=0 ORDER BY publiced limit 1")->query();

											}//end for
											
										$sql="auto_public=auto_public+{$public_wordnum},";
										
										//清除短文缓存
										
										$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/pagecache');
										
										$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/newclass');
									
								}
								
								//开启图片发表且未发表足够
											
								if(rand(0,10)==1 && $this->webset['auto_public_imagenum'] && $this->webset['auto_public_img']<$this->webset['auto_public_imagenum']){
	
										$starttime=time()-600;//发布图片笑话一次一篇
											
										$baoxiao=rand(0,3)==1?",im_baoxiao='1'":"";
											
							Yii::app()->db->createCommand("update xh_image set publiced='1',im_time='$starttime'{$baoxiao} where publiced=0 ORDER BY publiced limit 1")->query();
	
										$sql.="auto_public_img=auto_public_img+1,";
										
										//清除图片缓存
										
										$this->kermitBase->clearFloder(Yii::app()->basePath.'/coreData/imagecache');
											
								}	
													
							if($sql){//更新已发布数量、更新缓存
								
								Yii::app()->db->createCommand("update xh_system set {$sql}web_open=1 where xh_system=1")->query();	
													
								$this->makeWebset();
								
								}
			
					 }//end else	
					
				}
				
		/***自动发表程序**/	

	}//end	
		
	//用户自动登录程序
	
	public function autoLogin(){

		$cookie = Yii::app()->request->cookies;

		if(!isset($cookie['usermess']) || strlen($cookie['usermess']->value)<34) return;

		$password=$this->kermitBase->filter_normal(substr($cookie['usermess']->value,0,32));
		
		$username=$this->kermitBase->filter_normal(substr($cookie['usermess']->value,32));

		//验证用户并实现登录
		
		$user_array=Yii::app()->db->createCommand("select er_name,er_password from xh_user where er_name='{$username}'")->query()->read();

		if(empty($user_array)) return;
		
		if(md5($user_array['er_password'])==$password){//验证通过

				Yii::app()->session['er_name']=$username;
	
				$cookie = new CHttpCookie("usermess",$password.$username);
				
				$cookie->expire=time()+60*60*24*3650;   //无限有限期
	
				Yii::app()->request->cookies["usermess"]=$cookie;

			}
		
	}	
	
	//网站打开了页面防刷新功能 //非搜索引擎才起作用
		
	public function forBitfresh(){
	
			$nowtime=$this->kermitBase->get_microtime();
			
			$thisip=$this->kermitBase->getuserip();
			
			$jzips=explode('|',trim($this->webset['no_ips'],'|'));
			
			if(isset($_COOKIE['times'])){//已有刷幕记录的情况处理
				
					if($_COOKIE['times']>=$this->webset['web_shuapin_num']){
					
							$seconds=intval($this->webset['web_shuapin_time']*60+$_COOKIE['visittime']-$nowtime);
				
							$minute=floor($seconds/60);$second=$seconds%60;
				
							$timetxt=($minute==0)?$second:$minute.' 分 '.$second;
				
							if($_COOKIE['times']!='yes'){//每一次达到刷屏标准进行记录
						
								$this->RecordForbid('恶意刷网页');
						
								setcookie("times",'yes',time()+$seconds);}
								
							//取得当前IP记录条数
							
							$allnum=Yii::app()->db->createCommand("select count(*) as nums from xh_errors where jin_ip='{$thisip}'")->query()->read();
						
							if($allnum['nums']==$this->webset['web_shua_times_jinip']){//恶意刷新行为次数
						
									if(empty($jzips) || !in_array($thisip,$jzips)){//如果禁止IP里无此IP则加入

											Yii::app()->db->createCommand("update xh_system set no_ips=concat(no_ips,'|$thisip')")->query();
											
											$this->makeWebset();
									
											}
							
									$this->RecordForbid('恶意刷屏加入禁止IP列');
							
									exit('恶意刷新次数过多，IP被禁止');
								
								}			
					
					exit("<br>&nbsp;^_^您访问的速度太快了，请休息 ".$timetxt.' 秒后再访问吧');
					
					}
					
				}
		
			//防止页面刷新过快

			if(!isset($_COOKIE['visittime'])){
				
				setcookie("visittime",$nowtime);
			
			}else{
				
				if(($nowtime-$_COOKIE['visittime'])<$this->webset['web_fangshuapin']/1000){
					
					if(isset($_COOKIE['times'])) setcookie("times",$_COOKIE['times']+1,time()+$this->webset['web_shuapin_time']*60);
					
					else setcookie("times",1,time()+$this->webset['web_shuapin_time']*60);
				
				}
				
				setcookie("visittime",$nowtime);
					
		}

	}	
		
	
	public function is_phoner(){

        if(!isset($_SERVER['HTTP_USER_AGENT'])) return 0;
        
		$user_agent=strtolower(addslashes($_SERVER['HTTP_USER_AGENT']));
		
        $mobile_char="nokia|iphone|android|motorola|softbank|foma|docomo|kddi|";
        $mobile_char.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|coolpad|webos|techfaith|palmsource|";
        $mobile_char.="blackberry|alcatel|ktouch|nexian|samsung|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        $mobile_char.="symbian|smartphone|midp|wap|phone|iemobile|spice|bird|longcos|pantech|gionee|portalmmm|";
        $mobile_char.="hiptop|ucweb|benq|haier|320x320|240x320|176x220";
        
		$mobile_arr=explode('|',$mobile_char);
        
		foreach($mobile_arr as $key=>$value){
            
			if(strpos($user_agent,$value)!==false) return $value;
			
        }
		
		return 0;
		
}//end function

	
		
		
}//end class