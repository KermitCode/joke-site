<div><img src="<?php echo $this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="<?php echo $this->createUrl('XhTitle/index');?>">文字笑话</a>
        <?php if($id) echo " -> <a href='#'>{$this->xh_class[$id]['name']}</a>";?>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo $this->baseurl;?>images/statbot.gif" border="0"/></div>

<div class="right"><!--left float-->

    <div class="main wid5">             
        <div class="mat wid5"><div class="left"><?php 
        if($id) echo $this->xh_class[$id]['name'];
        else echo '所有文字笑话';?>排行</DIV></div>
        <DIV class="stop5 wid52"></DIV>
        <div class="list wid52"><ul>  
        <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_sort',
                    'enablePagination'=>false,
                    'summaryText'=>'',
                    'emptyText'=>'<li>暂无笑话</li>',
                    'cssFile'=>false,
                )); ?> 
        </ul>        
        <div class="pagechar"><?php echo "{$dataProvider->itemCount}</b>条/页	共{$dataProvider->getPagination()->pageCount}页";
              $this->widget('CLinkPager',array('pages'=>$dataProvider->pagination,
                                                'prevPageLabel'=>'<-',
                                                'nextPageLabel'=>'->',
                                                'header'=>'',
                                                'cssFile'=>false,
                                                'firstPageLabel'=>'<<',
                                                'lastPageLabel'=>'>>',
                                            ));?></div>    
        </div>
        <DIV class="sbot5 wid52"></DIV>
    </div>
    
</div><!--endleft float-->

<div class="left"><!--right float-->

    <div class="main wid3">           
        <div class="mat wid3"><div class="left">三笑笑话网</DIV><div class="right more"></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="mulu wid34">
            <div id="adlist"><?php echo stripslashes($this->webset['ad_list_main']);?></div>
        </div>
        <DIV class="sbot3 wid34"></DIV>
    </div>
    
    <div class="main wid3 mart10">           
        <div class="mat wid3"><div class="left">查看各栏文字笑话排行</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhClass/index');?>">全部</a></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="mulu wid34">
    <?php foreach($this->xh_class as $key=>$row){ if($row['type']==1) echo "<a href='".$this->createUrl('XhTitle/sort',array('id'=>$key))."'><h1>{$row['name']}</h1></a>";} ?>  
        </div>
        <DIV class="sbot3 wid34"></DIV>
    </div>
    
    <div class="main wid3 mart10">           
        <div class="mat wid3"><div class="left">爆笑笑话</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhTitle/index',array('best'=>1));?>">全部</a></div></div>
        <DIV class="stop3 wid34"></DIV>
        <div class="list wid34"><ul class="hot"><?php //the new jokes
              foreach($baoxiao as $row){
                  echo "<li><span class='left'>[<a href='".$this->createUrl('XhTitle/index',array('id'=>$row['cl_id']))."'>{$this->xh_class[$row['cl_id']]['name']}</a>] <a href='".$this->createUrl('XhTitle/view',array('id'=>$row['tt_id']))."'>{$row['tt_title']}</a><span class='views'>({$row['tt_showviews']})</span></span>";
                  echo "<span class='right'><em>".$this->kermitBase->getTime("md",$row['tt_time'])."</em></span></li>";
        }?> 
        </ul></div>
        <DIV class="sbot3 wid34"></DIV>
    </div>

</div><!--endright float-->
<div class="clear"></div>

<div class="photos">
	<div class="mat wid9"><div class="left">爆笑图片</DIV><div class="right more"><a href="<?php echo $this->createUrl('XhImage/index');?>">更多</a></div></div>
    <div class="phlist">
	 <?php foreach($image_tuijian as $key=>$row){?>              
        <div class="photo_box">
            <a href="<?php echo $this->createUrl('XhImage/view',array('id'=>$row['im_id']));?>"  target='_blank'><img src="<?php echo $this->baseurl.'jokeimg/'.$row['im_mainimg'];?>" alt="<?php echo $row['im_title'];?>" title="<?php echo $row['im_title'];?>" class="photo" border="0" /></a>
        </div>
     <?php }?> 
    </div>                
</div>