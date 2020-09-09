        <tr>
        <td class="rs"><?php echo $data->tt_id; ?></td>
        <td class="rs"><?php echo $this->xhclass[$data->cl_id]['name']; ?></td>
        <td class="rs"><?php 
		echo "<a href='".Yii::app()->baseUrl.'/XhTitle/'.$data->tt_id."' target='_blank'>";
		if($this->keyword=='') echo $data->tt_title;
		else echo str_replace($this->keyword,"<font color=red>{$this->keyword}</font>",$data->tt_title);
		echo '</a>';?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_author); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_showviews); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_views); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_voters_up); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_voters_down); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_comments); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->tt_score); ?></td>
        <td class="rs"><?php echo Yii::app()->params['tt_best'][$data->tt_best]; ?></td>
        <td class="rs"><?php echo Yii::app()->params['public'][$data->publiced];?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime(1,$data->tt_time); ?></td>
        <td class="rs"><?php
echo "<a href='".$this->createUrl('XhTitle/Show',array('id'=>$data->tt_id))."'>".Yii::app()->params['is_hidden'][$data->tt_visible]."</a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhTitle/update',array('id'=>$data->tt_id))."'>修改短文<a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhTitle/delete',array('id'=>$data->tt_id))."'  onClick=\"return(confirm('删除后不可恢复，确定删除此文章吗？'))\">删除</a>";?></td>
        </tr>