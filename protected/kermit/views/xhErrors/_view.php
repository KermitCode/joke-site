        <tr>
        <td class="rs"><?php echo $data->id; ?></td>
        <td class="rs"><?php $data->jin_user || $data->jin_user='-';echo $data->jin_user; ?></td>
        <td class="rs"><?php echo CHtml::encode($data->jin_ip); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->jin_say); ?></td>
        <td class="rs"><?php echo date('Y-m-d H:i:s',$data->jin_time); ?></td>
        <td class="rs"><?php
			echo "<a href='".$this->createUrl('XhErrors/delete',array('id'=>$data->id))."'>É¾³ý</a>";?></td>
        </tr>