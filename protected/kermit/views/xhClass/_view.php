        <tr>
        <td class="rs"><?php echo $data->cl_id; ?></td>
        <td class="rs"><?php echo Yii::app()->params['xh_type'][$data->cl_type]; ?></td>
        <td class="rs"><?php echo CHtml::encode($data->cl_name); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->cl_articles); ?></td>
        <td class="rs"><?php echo CHtml::encode($data->cl_order); ?></td>
        <td class="rs"><?php echo $this->kermitBase->getTime('ymdhis',$data->cl_time); ?></td>
        <td class="rs"><?php 
			if($data->cl_type==1) echo "<a href='".$this->createUrl('XhTitle/index',array('clid'=>$data->cl_id))."'>�����б�<a>&nbsp;&nbsp;";
			else echo "<a href='".$this->createUrl('XhImage/index',array('clid'=>$data->cl_id))."'>�����б�<a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhClass/update',array('id'=>$data->cl_id))."'>�޸��������<a>&nbsp;&nbsp;";
			echo "<a href='".$this->createUrl('XhClass/delete',array('id'=>$data->cl_id))."' onClick=\"return(confirm('ɾ���󲻿ɻָ���ȷ��ɾ���������'))\">ɾ�����</a>";?></td>
        </tr>