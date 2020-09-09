<?php

/*kermit:2017-04-18
 *interface
 */
 
class InterController extends Controller{
	
    //提取两条图片笑话和五条文字笑话
	public function actionIndex(){
	    header("Content-type:text/html;charset=utf-8");	
		$word = Yii::app()->db->createCommand("select tt_id,tt_title from xh_title where publiced=1 and 
                                                     tt_visible=1 order by rand() limit 15")->query()->readAll();
	    $image= Yii::app()->db->createCommand("select im_id,im_title,im_mainimg from xh_image where publiced=1 and 
                                                     im_visible=1 order by rand() limit 5")->query()->readAll();
        $data = array('word'=>array(), 'image'=>array());
        $this->webset=require(Yii::app()->basePath."/coreData/webset.php");
	    foreach($word as $row)
        {
            $url = $this->webset['web_url'] . $this->createUrl('XhTitle/view',array('id'=>$row['tt_id']));
            $data['word'][$url] = iconv('gbk','utf-8',$row['tt_title']); 
        }
        
	    foreach($image as $row)
        {
            $url = $this->webset['web_url'].$this->createUrl('XhImage/view',array('id'=>$row['im_id']));
            $img = "{$this->webset['web_url']}{$this->baseurl}/jokeimg/".$row['im_mainimg'];
            $data['image'][$url] = array(
                    'title'=>iconv('gbk','utf-8',$row['im_title']),
                    'img'=>$img,
                );
        }	
	    #print_r($data);
        echo json_encode($data); 
        exit;
	}
	
}
