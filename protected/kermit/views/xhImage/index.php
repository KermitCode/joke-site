<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->ͼƬЦ���б�</td></tr>
    <tr><td>

<!--�б�ʼ-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">Ц�����</td>
            <td class="head">Ц������</td>
            <td class="head">����</td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_showviews'));?>">չ��</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_views'));?>">ʵ��</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_voters_up'));?>">����</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_voters_down'));?>">����</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_comments'));?>">������</a></td>
            <td class="head"><a href="<?php echo $this->createUrl('XhImage/index',array('ord'=>'im_score'));?>">�÷�</a></td>
            <td class="head"><?php
            echo CHtml::dropDownlist('im_baoxiao',$im_baoxiao,array(2=>'����',1=>'��Ц',0=>'��ͨ'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhImage/index&im_baoxiao='."'".'+this.value;'));?></td>
            <td class="head"><?php
            echo CHtml::dropDownlist('publiced',$publiced,array(2=>'����',1=>'�ѷ���',0=>'δ����'),array('onChange'=>"window.location.href='".Yii::app()->baseUrl.'/kermit.php?r=XhImage/index&publiced='."'".'+this.value;'));?></td>
            <td class="head">����ʱ��</td>
            <td class="head"><?php
            echo "<a href='".$this->createUrl('XhImage/index',array('im_visible'=>1))."'>ֻ������</a>";?> ����</td>
          </tr>
		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'enablePagination'=>false,
				'emptyText'=>'<tr><td colspan="14" class="nodata rs">����ͼƬЦ��</td></tr>',
				'summaryText'=>false,
				'itemView'=>'_view',
			)); ?>
         <tr><td class="page" style="text-align:left;" colspan="6">&nbsp;&nbsp;
          <input type="button" class="submit" value="�����������ID" onClick="javacript:gosearch()">&nbsp;
          <input type="text" name="keyword" id="keyword" value="<?php echo $this->keyword;?>">
		  <?php if($this->keyword) echo "<a href='".$this->createUrl('XhTitle/index')."'><font color=red>ȡ����ǰ������{$this->keyword}</font></a>"?></td>
		   	 <td class="page" colspan="8"><?php
            echo "��<b>{$dataProvider->totalItemCount }</b>����¼ <b>{$dataProvider->pagination->pageSize}</b>��/ҳ ��<b>{$dataProvider->pagination->pageCount}</b>ҳ��ʾ ";
			 $this->widget('CLinkPager',array(
			 		'header'=>'',
		  			'prevPageLabel'=>'��һҳ',
					'nextPageLabel'=>'��һҳ', 
					'firstPageLabel'=>'<<<',
					'lastPageLabel'=>'>>>',
		  			'pages'=>$dataProvider->pagination,
						)
					);
			?></td></tr>
     </table>
<!--�б����-->

     </td></tr>
</table>
<script language="javascript">
function gosearch(){
	var keyword=document.getElementById('keyword').value;
	if(keyword==''){alert('������ؼ��ʣ�');return false;}
	keyword=encodeURI(keyword);
	window.location.href="<?php echo $this->createUrl('XhImage/index');?>&keyword="+keyword;
	}
</script>