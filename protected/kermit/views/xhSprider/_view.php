        <tr>
        <td class="rs"><?php echo $data->id; ?></td>
        <td class="rs"><?php echo $data->sprider; ?></td>
        <td class="rs"><?php echo date('Y-m-d H:i:s',$data->cometime); ?></td>
        <td class="rs"><?php
			echo "<a href='".$this->createUrl('xhSprider/delete',array('id'=>$data->id))."'>É¾³ý</a>";?></td>
        </tr>