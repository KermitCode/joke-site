<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->用户评论列表</td></tr>
    <tr><td>
<script type="text/javascript">
function showxx(id){
	document.getElementById(id).style.display=document.getElementById(id).style.display=='none'?'':'none';
	}
</script>
<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">评论ID</td>
            <td class="head">笑话类型</td>
            <td class="head">笑话标题</td>
            <td class="head">评论人</td>
            <td class="head">评论时间</td>
            <td class="head">操作列表</td>
          </tr>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'enablePagination'=>false,
	'emptyText'=>'<tr><td colspan="8" class="rs nodata">暂无用户评论</td></tr>',
	'summaryText'=>false,
	'itemView'=>'_view',
)); ?><tr><td class="page" colspan="8"><?php
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

