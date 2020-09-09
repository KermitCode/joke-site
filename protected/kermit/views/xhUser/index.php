<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->注册用户列表</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">用户名</td>
            <td class="head">性别</td>
            <td class="head">用户QQ</td>
            <td class="head">注册时间</td>
            <td class="head">注册IP</td>
            <td class="head">最近登录</td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_xh_word'));?>">发文篇数</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_xh_image'));?>">发图篇数</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_money'));?>">积分</a></td>
            <td class="head">操作</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="13" class="nodata">暂无注册用户</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr><td class="page" colspan="13"><?php
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
