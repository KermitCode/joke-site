<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	public $kermitBase;
	
	public $xhclass=array();
	
	public $breadcrumbs=array();
	
	//only check admin login
	
	public function baseLoad($check=false){

		if(!Yii::app()->session['admin']){
			
			header("Location:".$this->createUrl('Site/login'));
			
			exit;
			
		}
		
				
		$this->xhclass=require(Yii::app()->basePath.'/coreData/xhclass.php');
		
		$this->kermitBase=new kermitBase();
		
		return true;

	}//end function
	
	public function BaseRight($right=1){
		
		//check super admin right;:1=>admin 2=>superadmin
		
		if($right==1){
			
				if(Yii::app()->session['admin']!='admin' && Yii::app()->session['admin']!='adminer')
				
					$this->kermitBase->msg_show('你无权进行此操作!');
		
		 }else{
			 
			 	if(Yii::app()->session['admin']!='adminer')
				
					$this->kermitBase->msg_show('你无权进行此操作!');
			 
			 }
		
		//only check admin right
		
	}
	
	
	
	
	
	
	
}