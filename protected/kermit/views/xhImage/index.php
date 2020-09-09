<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->图片笑话列表</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">笑话类别</td>
            <td class="head">笑话标题</td>
            <td class="head">作者</td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_showviews'));?>">展阅</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_views'));?>">实阅</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_voters_up'));?>">顶数</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_voters_down'));?>">踩数</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_comments'));?>">评论数</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_score'));?>">得分</a></td>
            <td class="head"><?php
            echo CHtml::dropDownlist('im_baoxiao',$im_baoxiao,array(2=>'所有',1=>'爆笑',0=>'普通'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhImage/index&im_baoxiao='."'".'+this.value;'));?></td>
            <td class="head"><?php
            echo CHtml::dropDownlist('publiced',$publiced,array(2=>'不限',1=>'已发布',0=>'未发布'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhImage/index&publiced='."'".'+this.value;'));?></td>
            <td class="head">发表时间</td>
            <td class="head"><?php
            echo "<a href='".$this->createUrl('XhImage/index',array('im_visible'=>1))."'>只看隐藏</a>";?> 操作</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="14" class="nodata rs">暂无图片笑话</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr><td class="page" style="text-align:left;" colspan="6">&nbsp;&nbsp;
          <input type="button" class="submit" value="搜索标题或者ID" onClick="javacript:gosearch()">&nbsp;
          <input type="text" name="keyword" id="keyword" value="<?php echo $this->keyword;?>">
		  <?php if($this->keyword) echo "<a href='".$this->createUrl('XhTitle/index')."'><font color=red>取消当前搜索：{$this->keyword}</font></a>"?></td>
		   	 <td class="page" colspan="8"><?php
            echo "共<b>{$dataProvider->totalItemCount }</b>条记录 <b>{$dataProvider->pagination->pageSize}</b>条/页 分<b>{$dataProvider->pagination->pageCount}</b>页显示 ";
			 $this->widget('CLinkPager',array(
			 		'header'=>'',
		  			'prevPageLabel'=>'上一页',
					'nextPageLabel'=>'下一页', 
					'firstPageLabel'=>'<<<',
					'lastPageLabel'=>'>>>',
		  			'pages'=>$dataProvider->pagination,
						)
					);
			?></td></tr>
     </table>
<!--列表结束-->

     </td></tr>
</table>
<script language="javascript">
function gosearch(){
	var keyword=document.getElementById('keyword').value;
	if(keyword==''){alert('请输入关键词！');return false;}
	keyword=encodeURI(keyword);
	window.location.href="<?php echo $this->createUrl('XhImage/index');?>&keyword="+keyword;
	}
</script>