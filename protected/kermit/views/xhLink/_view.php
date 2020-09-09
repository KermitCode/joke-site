        <tr>
        <td class="rs"><?php echo $data->lk_id; ?></td>
        <td class="rs"><?php echo CHtml::encode($data->lk_title); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->lk_url); ?></td>
        <td class="rs"><b><?php echo CHtml::encode($data->lk_hot); ?></b></td>
        <td class="rs"><?php echo $data->lk_datetime; ?></td>
        
        <td class="rs"><?php echo Yii::app()->params['is_show'][$data->lk_state]; ?></td>
        <td class="rs"><?php
			echo "<a href='".$this->createUrl('XhLink/Show',array('id'=>$data->lk_id))."'>".Yii::app()->params['is_hidden'][$data->lk_state]."</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhLink/update',array('id'=>$data->lk_id))."' >修改</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhLink/delete',array('id'=>$data->lk_id))."' onClick=\"return(confirm('删除后不可恢复，确定删除此用户吗？'))\">删除</a>";?></td>
        </tr>