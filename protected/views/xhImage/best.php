<div><img src="<?php echo $this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">��ҳ</a> -> <a href="<?php echo $this->createUrl('XhImage/index');?>">��ЦͼƬ</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">��Ե*ҼЦ</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo $this->baseurl;?>images/statbot.gif" border="0"/></div>

<?php if($this->webset['ad_web_middle_new']) echo '<div id="ad2">'.stripslashes($this->webset['ad_web_middle_new']).'</div>';?>

<div class="photos">
	<div class="mat wid9"><div class="left">��ЦͼƬЦ���б�</DIV><div class="right more"></div></div>
    <div class="phlistall">
	  <?php 
	  if(!count($data)) echo "<div style='text-align:center;padding-top:15px;'>δ�ҵ���ظ�ЦͼƬ</div>";
	  foreach($data as $key=>$row){?>              
        <div  class="outd">
        	<div class="photo_b">
            <a href="<?php echo $this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"><img src="<?php echo $this->baseurl.'jokeimg/'.$row['im_mainimg'];?>" alt="<?php echo $row['im_title'];?>" title="<?php echo $row['im_title'];?>" class="photo" border="0" /></a></div>
        	<div class="photit"><a href="<?php echo $this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"><?php echo $row['im_title']?></a></div>
        </div>
     <?php }?>  
     
    <div class="clear"></div>
    <div class="pagechar"><?php echo "{$dataProvider->itemCount}</b>ƪ/ҳ	��{$dataProvider->getPagination()->pageCount}ҳ";
              $this->widget('CLinkPager',array('pages'=>$dataProvider->pagination,
                                                'prevPageLabel'=>'��һҳ',
                                                'nextPageLabel'=>'��һҳ',
                                                'header'=>'',
												'id'=>'yw1',
                                                'cssFile'=>false,
                                                'firstPageLabel'=>'��ҳ',
                                                'lastPageLabel'=>'ĩҳ',
                                            ));?></div>    
   
   </div><!--end imagelist -->
                       
</div>


<!--list title xiao-->
<?php 
	$rand_index=explode('=',trim($this->webset['index_class_arr'],'='));
	$start_index=date('d')%10;$i=0;
	for($key=$start_index;$key<count($rand_index);$key++){ 
		$classid=$rand_index[$key];if($key-$start_index>=3) break;?>
<div class="main wid308 left mart10<?php if($i!=0) echo ' marl20';?>">             
    <div class="mat wid308"><div class="left">����<?php echo $this->xh_class[$classid]['name'];?></DIV><div class="right more"><a href="<?php echo $this->createUrl('XhTitle/index',array('id'=>$classid));?>">����</a></div></div>
    <DIV class="stop310 wid310"></DIV>
    <div class="list wid310"><ul><?php 
          foreach($this->getClassrs($classid) as $row){
              echo "<li><span class='left'><a href='".$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."' target='_blank'>".$this->kermitBase->str_cut($row['tt_title'],30)."</a><span class='views'>({$row['tt_showviews']})</span></span>";
			  echo "<span class='right'><em>".$this->kermitBase->getTime('md',$row['tt_time'])."</em></span></li>";
    
	}?> 
    </ul></div>
    <DIV class="sbot310 wid310"></DIV>
</div>
<?php 
$i++; }?>