
<li><span class='left'>[<a href='<?php echo $this->createUrl('XhTitle/index',array('id'=>$data->cl_id));?>'><?php echo $this->xh_class[$data->cl_id]['name']; ?></a>] <a href='<?php echo $this->createUrl('XhTitle/view',array('id'=>$data->tt_id));?>'><?php echo $data->tt_title; ?></a>
		<span class='views'>(<?php echo $data->tt_showviews; ?>)</span>
    </span>
	<span class='right'><em>发表作者：<?php 
			  echo $data->tt_author;echo '-';
			  echo $this->kermitBase->getTime("ymdhis",$data->tt_time); ?></em></span>
</li>