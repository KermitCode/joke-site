<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->����������ʼ�¼</td></tr>
    <tr><td>

<!--�б�ʼ-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">��������</td>
            <td class="head">����ʱ��</td>
            <td class="head">����</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="4" class="rs nodata">���޷��ʼ�¼</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr>
         <td class="page" colspan="2" style="text-align:left;padding-left:30px;">
         ��������ɸѡ��<?php
		 $sprider_arr=array(0=>'��������');
		 foreach(Yii::app()->params['sprider'] as $key=>$value) $sprider_arr[$key]=$key;
         echo CHtml::dropDownlist('sprider',$sprider,$sprider_arr,
		 array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhSprider/index&sprider='."'".'+this.value;','id'=>'sprider'));
		 ?>
         &nbsp;&nbsp;<a href="<?php echo $this->createUrl('XhSprider/Clear');?>">���ȫ����¼</a>
         </td>
         <td class="page" colspan="2"><?php
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
