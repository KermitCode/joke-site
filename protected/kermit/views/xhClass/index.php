<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->笑话类别列表</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">类别ID</td>
            <td class="head">类别类型</td>
            <td class="head">类别名称</td>
            <td class="head">数据总量</td>
            <td class="head">排序值</td>
            <td class="head">加入时间</td>
            <td class="head">操作列表</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
				'emptyText'=>'<tr><td colspan="7" class="nodata">还未有任何类别</td></tr>',
				'summaryText'=>false,
				'enablePagination'=>false,
            )); ?>
            <tr><td class="page" colspan="7"><?php
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


