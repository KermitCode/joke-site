<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->Ц������б�</td></tr>
    <tr><td>

<!--�б�ʼ-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">���ID</td>
            <td class="head">�������</td>
            <td class="head">�������</td>
            <td class="head">��������</td>
            <td class="head">����ֵ</td>
            <td class="head">����ʱ��</td>
            <td class="head">�����б�</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
				'emptyText'=>'<tr><td colspan="7" class="nodata">��δ���κ����</td></tr>',
				'summaryText'=>false,
				'enablePagination'=>false,
            )); ?>
            <tr><td class="page" colspan="7"><?php
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


