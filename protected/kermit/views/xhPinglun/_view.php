        <tr>
        <td class="rs"><?php echo $data->pl_id; ?></td>
        <td class="rs"><?php echo Yii::app()->params['xh_type'][$data->pl_type]; ?></td>
        <td class="rs"><?php 
			$ttid=$data->pl_tt_id;
			if($data->pl_type==1){
				$rs=Yii::app()->db->createCommand("select tt_title from xh_title where tt_id=$ttid")->query()->read();
				echo $rs['tt_title'];}
			if($data->pl_type==2){
				$rs=Yii::app()->db->createCommand("select im_title from xh_image where im_id=$ttid")->query()->read();
				echo $rs['im_title'];
			}
		
		?></td>
        <td class="rs"><?php echo CHtml::encode($data->pl_author); ?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime('ymdhis',$data->pl_time); ?></td>
        <td class="rs"><?php 
	
if($data->pl_visible) echo "<a href='".$this->createUrl('XhPinglun/update',array('id'=>$data->pl_id))."'>�������</a>&nbsp;&nbsp;";
	else echo "<a href='".$this->createUrl('XhPinglun/update',array('id'=>$data->pl_id))."'><font color=red>�����ʾ</font></a>&nbsp;&nbsp;";
	
	echo "<a onclick=\"javascript:showxx('pl{$data->pl_id}')\" href='#'>��ʾ����</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhPinglun/delete',array('id'=>$data->pl_id))."' onClick=\"return(confirm('ɾ���󲻿ɻָ���ȷ��ɾ����������'))\">ɾ��</a>";?></td>
        </tr>
  <tr id="pl<?php echo $data->pl_id; ?>" style="display:none;"><td class="rs pltext" colspan='8'><?php echo CHtml::encode($data->pl_text); ?></td></tr>