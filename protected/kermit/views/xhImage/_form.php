	<script language='javascript'>
		function addinput(start){
			if(imgnum==0){document.getElementById('imginputs').innerHTML='';return;}
			var imgnum=Number(document.getElementById('imgnum').value);
			if(imgnum>20){
				alert('һ���ϴ����ó���20��');
				document.getElementById('imgnum').value=0;
				addinput(0);
				return false;}
			var end=imgnum+start;
			var char='';
			for(i=start+1;i<=end;i++){
				char+="��"+i+"�ţ�˵����<input type='text' name='img"+i+"' size='50'> <input type='file' name='imgfile"+i+"'><br>";
				}
			document.getElementById('imginputs').innerHTML=char;
		}
	</script>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->�������޸�ͼƬЦ��</td></tr>
    <tr><td>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xh-image-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>

 <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
      <tr>
        <td class="head" colspan="2"></td>
      </tr>

	<tr>
       <td class="rs"><?php echo $form->labelEx($model,'cl_id'); ?></td>
       <td class="rs alignle"><?php echo $form->dropDownlist($model,'cl_id',$class_arr); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
if($model->im_id)
echo "<a href='".$this->createUrl('XhImage/delete',array('id'=>$model->im_id))."'  onClick=\"return(confirm('ɾ���󲻿ɻָ���ȷ��ɾ����ͼƬЦ����'))\"><font color=red>ɾ����ͼƬЦ��</font></a>";?>
       </td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'im_title'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'im_title',array('size'=>60,'maxlength'=>100)); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'im_author'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'im_author',array('size'=>20,'maxlength'=>20)); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'im_source'); ?></td>
       <td class="rs alignle"><?php echo $form->textField($model,'im_source',array('size'=>50,'maxlength'=>50)); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'im_baoxiao'); ?></td>
       <td class="rs alignle"><?php echo $form->radioButtonlist($model,'im_baoxiao',array(1=>'��Ц',0=>'��ͨ'),array('separator'=>'&nbsp;&nbsp;')); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'im_mainimg'); ?></td>
       <td class="rs alignle"><?php 
	   if($model->im_mainimg!='') echo '<img src="'.Yii::app()->baseUrl.'/jokeimg/'.$model->im_mainimg.'"><br>';
	   echo $form->textField($model,'im_mainimg',array('size'=>30,'maxlength'=>50,'readonly'=>'readonly')); ?> (Ĭ�϶Ե�һ�Ž�������)</td>
    </tr> 
     <tr>
       <td class="rs">����Ϊ�޸ĸ���ͼƬ��</td>
       <td class="rs alignle"><?php echo CHtml::submitButton($model->isNewRecord ? '������ͼƬЦ��' : '�޸Ĵ�ͼƬЦ��'); ?></td>
    </tr>
    <tr>
       <td class="rs"><?php echo $form->labelEx($model,'img_urls'); ?></td>
       <td class="rs alignle"><?php echo $xhImage_up->showImage($model->img_urls,$model->im_id); ?></td>
    </tr>
    

    <tr>
       <td class="rs"></td>
       <td class="rs alignle"><?php echo CHtml::submitButton($model->isNewRecord ? '������ͼƬЦ��' : '�޸Ĵ�ͼƬЦ��'); ?></td>
    </tr>
 </table>
 
 <?php $this->endWidget(); ?>
 
<!--�б����-->

     </td></tr>
</table>
