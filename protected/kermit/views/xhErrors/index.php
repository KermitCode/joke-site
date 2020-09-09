<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->访问警告列表</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">登录用户</td>
            <td class="head">IP地址</td>
            <td class="head">警告原因</td>
            <td class="head">发生时间</td>
            <td class="head">操作</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="6" class="rs nodata">暂无警告</td></tr>',
				'summaryText'=>false,
				
				'itemView'=>'_view',
			)); ?>
         <tr><td class="page" colspan="6"><?php
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
