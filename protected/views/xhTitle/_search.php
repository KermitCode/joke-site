<li><span class='left'>[<a href='<?php echo $this->createUrl('XhTitle/index',array('id'=>$data->cl_id));?>'><?php echo $this->xh_class[$data->cl_id]['name']; ?></a>] <a href='<?php echo $this->createUrl('XhTitle/view',array('id'=>$data->tt_id));?>' target="_blank"><?php 
		echo str_replace($this->keyword,"<font color=green><b>{$this->keyword}</b></font>",$data->tt_title); ?></a>		
    </span>
	<span class='right'><em><?php echo $this->kermitBase->getTime("ymdhis",$data->tt_time); ?></em></span>
</li>