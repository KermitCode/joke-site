<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->ע���û��б�</td></tr>
    <tr><td>

<!--�б�ʼ-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">�û���</td>
            <td class="head">�Ա�</td>
            <td class="head">�û�QQ</td>
            <td class="head">ע��ʱ��</td>
            <td class="head">ע��IP</td>
            <td class="head">�����¼</td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_xh_word'));?>">����ƪ��</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_xh_image'));?>">��ͼƪ��</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhUser/index',array('ord'=>'er_money'));?>">����</a></td>
            <td class="head">����</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="13" class="nodata">����ע���û�</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr><td class="page" colspan="13"><?php
            echo "��<b>{$dataProvider->totalItemCount }</b>����¼ <b>{$dataProvider->pagination->pageSize}</b>��/ҳ ��<b>{$dataProvider->pagination->pageCount}</b>ҳ��ʾ ";
			 $this->widget('CLinkPager',array(
			 		'header'=>'',
		  			'prevPageLabel'=>'��һҳ',
					'nextPageLabel'=>'��һҳ', 
		  			'pages'=>$dataProvider->pagination,
						)
					);
			?></td></tr>
     </table>
<!--�б����-->

     </td></tr>
</table>
