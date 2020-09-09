        <tr>
        <td class="rs"><?php echo $data->er_id; ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_name); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_sex); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_qq); ?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime('ymdhis',$data->er_gotime); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_ip); ?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime('ymdhis',$data->er_lasttime); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_xh_word); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_xh_image); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->er_money); ?></td>
        <td class="rs"><?php
			echo "<a href='".$this->createUrl('XhUser/Show',array('id'=>$data->er_id))."'>".Yii::app()->params['is_hidden'][$data->er_status]."</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhUser/delete',array('id'=>$data->er_id))."' onClick=\"return(confirm('删除后不可恢复，确定删除此用户吗？'))\">删除</a>";?></td>
        </tr>