<style type="text/css">
form{padding:0px;margin:0px;}
.rs{line-height:24px;}
.rs a{display:inline-bolck;width:150px;margin-right:15px;float:left;overflow:hidden;line-height:24px;}
.rs a{height:24px;}
</style>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/images/Calendar3.js"></script>
<!--�б�ʼ--> 

	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="8">��վ��Ӫ����̨��</td><td></td></tr>
          
          <tr>
          	<td class="rs" width="12%">ȫվ����Ц����</td>
            <td class="rs alignle" width="13%"><font color=red><b><?php echo $number_arr['wordxh_num'];?></b></font> ƪ</td>
            <td class="rs alignle" width="12%">ȫվͼƬЦ����</td>
            <td class="rs alignle" width="13%"><font color=red><b><?php echo $number_arr['wordimg_num'];?></b></font> ƪ</td>
            <td class="rs alignle" width="12%">��վ����������</td>
            <td class="rs alignle" width="13%"><font color=red><b><?php echo $number_arr['error_num'];?></b></font> ƪ</td>
            <td class="rs alignle" width="12%">ȫվ������������</td>
            <td class="rs alignle" width="13%"><font color=red><b><?php echo $number_arr['link_num'];?></b></font> ��</td>
          </tr>
          
          <tr>
          	<td class="rs">ȫվע���û���</td>
            <td class="rs alignle"><font color=red><b><?php echo $number_arr['user_num'];?></b></font> λ</td>
            <td class="rs alignle">ȫվ�û���������</td>
            <td class="rs alignle"><font color=red><b><?php echo $number_arr['pinglun_num'];?></b></font> ��</td>
            <td class="rs alignle">��Ե�������</td>
            <td class="rs alignle"><font color=blue><b><?php echo $number_arr['yuan_number'];?></b></font> ��</td>
            <td class="rs alignle">Ц����������</td>
            <td class="rs alignle"><font color=red><b><?php echo $number_arr['class_num'];?></b></font> ��</td>
          </tr>
        
     </table>
       <br />
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">��վ������Ӫ���ݣ�</td></tr>
          <tr>
          	<td class="rs" style="width:18%;">��ǰ�鿴���ڣ�<font color='red'><b><?php echo $tdate;?></b></font></td>
            <td class="rs alignle"><form action="<?php echo $this->createUrl('Site/Control');?>" method="post">�����鿴���ڣ� <input name="tdate" type="text" id="tdate" size="12" maxlength="10" onclick="new Calendar().show(this);" readonly="readonly" style="color:red;font-weight:bolder;" value="<?php echo $tdate;?>" /> <input type="submit" value="ȷ��" /></form></td>
          </tr>
<?php
		$date_start=strtotime($tdate);$date_end=$date_start+3600*24;
		$rs=Yii::app()->db->createCommand("select SQL_CALC_FOUND_ROWS tt_id,tt_title from xh_title where tt_visible=1 and tt_time<$date_end and tt_time>$date_start")->query()->readAll();
		$allnum=Yii::app()->db->createCommand("SELECT FOUND_ROWS();")->query()->read();
		?><tr>
          	<td class="rs">��������Ц�����£�<font color=red><b><?php echo $allnum['FOUND_ROWS()'];?></b></font> ƪ</td>
            <td class="rs alignle"><?php if($rs){$i=1;
				foreach($rs as $key=>$row){
					echo "<a href='XhTitle/".$row['tt_id'].".html' target='_blank'>{$i}.".$row['tt_title']."</a>\r\n";$i++;
					}
				}?></td>
          </tr>
<?php
		$rs=Yii::app()->db->createCommand("select SQL_CALC_FOUND_ROWS im_id,im_title from xh_image where im_visible=1 and im_time<$date_end and im_time>$date_start")->query()->readAll();
		$allnum=Yii::app()->db->createCommand("SELECT FOUND_ROWS();")->query()->read();    
		?><tr>
          	<td class="rs" >��������ͼƬЦ����<font color=red><b><?php echo $allnum['FOUND_ROWS()'];?></b></font> ��</td>
            <td class="rs alignle"><?php if($rs){$i=1;
				foreach($rs as $key=>$row){echo "<a href='XhImage/".$row['im_id'].".html' target='_blank'>{$i}.{$row['im_title']}</a>";$i++;}
				}?></td>
          </tr>    
<?php
       $rs=Yii::app()->db->createCommand("select SQL_CALC_FOUND_ROWS er_id,er_name from xh_user where er_gotime<$date_end and er_gotime>$date_start")->query()->readAll();
	   $allnum=Yii::app()->db->createCommand("SELECT FOUND_ROWS();")->query()->read(); 
		?><tr>
          	<td class="rs">��������ע���û���<font color=red><b><?php echo $allnum['FOUND_ROWS()'];?></b></font> ��</td>
            <td class="rs alignle"><?php if($rs){
				foreach($rs as $key=>$row){echo "<a>{$row['er_name']}</a>";}
				}?></td>
          </tr>
<?php
       $rs=Yii::app()->db->createCommand("select SQL_CALC_FOUND_ROWS pl_id,pl_text from xh_pinglun where pl_visible=1 and pl_time<$date_end and pl_time>$date_start")->query()->readAll();
	   $allnum=Yii::app()->db->createCommand("SELECT FOUND_ROWS();")->query()->read(); 
		?><tr>
          	<td class="rs">���������û����ۣ�<font color=red><b><?php echo $allnum['FOUND_ROWS()'];?></b></font> ��</td>
            <td class="rs alignle"><?php if($rs){
				foreach($rs as $key=>$row){echo "{$row['pl_text']}<br>";}
				}?></td>
          </tr>
		<tr>
          	<td class="rs">���������������ࣺ</td>
            <td class="rs alignle"><?php 
$rs_ping=Yii::app()->db->createCommand("select sprider,cometime from xh_sprider where cometime>$date_start and cometime<$date_end group by sprider")->query()->readAll();
						foreach($rs_ping as $key=>$row){
							echo "{$row['sprider']}��".date('Y-m-d H:i:s',$row['cometime'])."&nbsp;&nbsp;&nbsp;&nbsp;";
							}?></td>
          </tr>
     </table>
     </td></tr>
</table>