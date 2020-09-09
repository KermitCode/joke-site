
<li><span class='left'>[<a href='<?php echo $this->createUrl('XhTitle/index',array('id'=>$data->cl_id));?>'><?php echo $this->xh_class[$data->cl_id]['name']; ?></a>] <a href='<?php echo $this->createUrl('XhTitle/view',array('id'=>$data->tt_id));?>'><?php echo $data->tt_title; ?></a>
		<span class='views'>(до<?php echo $data->tt_voters_up; ?>)</span>
    </span>
	<span class='right'><em><?php echo $this->kermitBase->getTime("ymdhis",$data->tt_time); ?></em></span>
</li>