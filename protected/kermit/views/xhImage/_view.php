        <tr>
        <td class="rs"><?php echo $data->im_id; ?></td>
        <td class="rs"><?php echo $this->xhclass[$data->cl_id]['name'];?></td>
        <td class="rs"><?php 
			  echo "<a href='".Yii::app()->baseUrl.'/XhImage/'.$data->im_id."' target='_blank'>";
			  if($this->keyword=='') echo $data->im_title;
			  else echo str_replace($this->keyword,"<font color=red>{$this->keyword}</font>",$data->im_title); 
			  echo '</a>';?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_author); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_showviews); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_views); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_voters_up); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_voters_down); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_comments); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->im_score); ?></td>
        <td class="rs"><?php echo Yii::app()->params['im_baoxiao'][$data->im_baoxiao]; ?></td>
        <td class="rs"><?php echo Yii::app()->params['public'][$data->publiced];?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime(1,$data->im_time); ?></td>
        <td class="rs"><?php
echo "<a href='".$this->createUrl('XhImage/Show',array('id'=>$data->im_id))."'>".Yii::app()->params['is_hidden'][$data->im_visible]."</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhImage/update',array('id'=>$data->im_id))."'>ÐÞ¸Ä<a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhImage/delete',array('id'=>$data->im_id))."'  onClick=\"return(confirm('É¾³ýºó²»¿É»Ö¸´£¬È·¶¨É¾³ý´ËÍ¼Æ¬Ð¦»°Âð£¿'))\">É¾³ý</a>";?></td>
        </tr>
