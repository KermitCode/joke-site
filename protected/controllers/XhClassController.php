<?php

/*
 *for class list controller
 *kermit:2012-11-15
 */
 
class XhClassController extends Controller{
	
	public $layout='//layouts/column1';
	

//kermit:2012-11-3 for all user function 

	public function beforeAction(){
		
			if($this->is_phoner()){

				header("Location:http://wap.33xiao.com/wap/xhclass.html");exit;
				
				}
		
			$this->baseLoad(1);
			
			return true;
			
		}

//show class list index page

	public function actionIndex(){
	
		$this->page_title='Ц������-���ֶ���Ц��-����ͼƬЦ��-'.$this->page_title;		
		
		$this->render('index',array(
			
			'baoxiao'=>$this->getBaoxiao(14),
			'image_tuijian'=>$this->getBaoimage(10),
		
			));
	
	}

//����ԭ������kermit:�û�����Ц���б�

	public function actionMyxiao(){
		
		$this->setthispage(7);
		
		$this->page_title='ԭ��Ц��-'.$this->page_title;
		
		$dataProvider=new CActiveDataProvider('XhTitle',array(
							
							'criteria'=>array(
									'order'=>'tt_id desc',
									'condition'=>"publiced=1 and tt_visible=1 and tt_author!=''"								
									),
									
							'pagination'=>array(
									'pageSize'=>30,
									),
						));
			
		$this->render('myxiao',array(
				'dataProvider'=>$dataProvider,
				'baoxiao'=>$this->getBaoxiao(5),
				'newxiao'=>$this->getNewpage(5),
				'image_tuijian'=>$this->getBaoimage(10),
			));
			


		}	
		

}//end class
