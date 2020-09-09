<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->搜索引擎访问记录</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">搜索引擎</td>
            <td class="head">来访时间</td>
            <td class="head">操作</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="4" class="rs nodata">暂无访问记录</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr>
         <td class="page" colspan="2" style="text-align:left;padding-left:30px;">
         搜索引擎筛选：<?php
		 $sprider_arr=array(0=>'所有引擎');
		 foreach(Yii::app()->params['sprider'] as $key=>$value) $sprider_arr[$key]=$key;
         echo CHtml::dropDownlist('sprider',$sprider,$sprider_arr,
		 array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhSprider/index&sprider='."'".'+this.value;','id'=>'sprider'));
		 ?>
         &nbsp;&nbsp;<a href="<?php echo $this->createUrl('XhSprider/Clear');?>">清除全部记录</a>
         </td>
         <td class="page" colspan="2"><?php
            echo "共<b>{$dataProvider->totalItemCount }</b>条记录 <b>{$dataProvider->pagination->pageSize}</b>条/页 分<b>{$dataProvider->pagination->pageCount}</b>页显示 ";
			 $this->widget('CLinkPager',array(
			 		'header'=>'',
		  			'prevPageLabel'=>'上一页',
					'nextPageLabel'=>'下一页', 
		  			'pages'=>$dataProvider->pagination,
						)
					);
			?></td></tr>
     </table>
<!--列表结束-->

     </td></tr>
</table>
