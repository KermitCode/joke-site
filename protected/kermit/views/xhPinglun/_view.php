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
	
if($data->pl_visible) echo "<a href='".$this->createUrl('XhPinglun/update',array('id'=>$data->pl_id))."'>点击隐藏</a>&nbsp;&nbsp;";
	else echo "<a href='".$this->createUrl('XhPinglun/update',array('id'=>$data->pl_id))."'><font color=red>点击显示</font></a>&nbsp;&nbsp;";
	
	echo "<a onclick=\"javascript:showxx('pl{$data->pl_id}')\" href='#'>显示内容</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhPinglun/delete',array('id'=>$data->pl_id))."' onClick=\"return(confirm('删除后不可恢复，确定删除此评论吗？'))\">删除</a>";?></td>
        </tr>
  <tr id="pl<?php echo $data->pl_id; ?>" style="display:none;"><td class="rs pltext" colspan='8'><?php echo CHtml::encode($data->pl_text); ?></td></tr>