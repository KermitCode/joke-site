<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">��̨����->��վȫ������</td></tr>
    <tr><td>
<?php foreach($rs as $key=>$value){ 
		if($key=='adminer_pass' || $key=='superadmin_pass' || $key=='adtest_pass') continue;
		$$key=$value;
		}
		?>
        
<!--�б�ʼ-->
<form action="<?php echo $this->createUrl('Xhsystem/webset',array('modify'=>'modify'));?>" method="post" name="webset" id="webset">     
      <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">��վ�������� <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></td></tr>   
          <tr>
          	<td class="rs" width="25%">��վ�Ƿ�򿪣�</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('web_open',$web_open,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ����ر���ʾ�û���Ϣ��</td>
            <td class="rs alignle"><?php echo CHtml::textArea('web_close_words',$web_close_words,array('rows'=>3,'cols'=>70));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ���ƣ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_name',$web_name,array('size'=>30));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ������ַ(����www)��</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_url',$web_url,array('size'=>30));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ�ؼ��ʣ�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('web_keyword',$web_keyword,array('rows'=>3,'cols'=>90));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ������</td>
            <td class="rs alignle"><?php echo CHtml::textArea('web_description',$web_description,array('rows'=>4,'cols'=>90));?></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">��վͳ�ƴ��룺</td>
            <td class="rs alignle"><?php echo CHtml::textArea('web_stat',$web_stat,array('rows'=>4,'cols'=>90));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��վ�����ţ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_beian',$web_beian,array('size'=>30));?></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">��������������ʱ���¼һ�Σ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('sprider_time',$sprider_time,array('size'=>5));?> Сʱ</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">����������ʼ�¼��ౣ��������</td>
            <td class="rs alignle"><?php echo CHtml::textField('sprider_num',$sprider_num,array('size'=>6));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="����������վ����"/></td>
          </tr>
          
           <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">��վ��ȫ���� <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></td></tr>   
 		  
           <tr>
          	<td class="rs" width="25%">��վ�������ã�</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('web_error',$web_error,array(1=>'��վ����ģʽ',0=>'��վ��Ӫģʽ'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">��ֹ����IP�б�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('no_ips',$no_ips,array('rows'=>4,'cols'=>90));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ֹIP�Ĵ���취</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('no_ips_do',$no_ips_do,array(1=>'���������',0=>'չʾ�հ�ҳ'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�Ƿ����վ��ˢ�����ܣ�</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('web_fangshuaxin',$web_fangshuaxin,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">������ٺ��������ˢ����</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_fangshuapin',$web_fangshuapin,array('size'=>6));?> ����</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">����ˢ�����κ���ʾ�û����ʹ���Ƶ����</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_shuapin_num',$web_shuapin_num,array('size'=>6));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ˢ������ʾ�û������Ӻ��ٷ��ʣ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_shuapin_time',$web_shuapin_time,array('size'=>6));?> ����</td>
          </tr>
           <tr>
          	<td class="rs" width="25%">��ʾˢ�����ΰ��û�IP�����ֹIP��</td>
            <td class="rs alignle"><?php echo CHtml::textField('web_shua_times_jinip',$web_shua_times_jinip,array('size'=>6));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="����������վ����"/></td>
          </tr>
     
     
         
          
         <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">�û�������ҳ����ʾ���� <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></td></tr>    
              
          <tr>
          	<td class="rs" width="25%">�Ƿ������ο����ۣ�</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('pingjia_right',$pingjia_right,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ÿ�ε�¼��������۶�������</td>
            <td class="rs alignle"><?php echo CHtml::textField('pingjia_most',$pingjia_most,array('size'=>6));?> ��</td>
          </tr>
           <tr>
          	<td class="rs" width="25%">Υ��ؼ��ʵĴ���취��</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('bad_words_do',$bad_words_do,array(1=>'ȥ��',2=>'��***�����',3=>'��ֹ����'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">Υ��ؼ����б�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('bad_words',$bad_words,array('rows'=>4,'cols'=>70));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ҳ��ʾ��12������Ц����ID˳��</td>
            <td class="rs alignle"><?php echo CHtml::textField('index_class_arr',$index_class_arr,array('size'=>35));?> ��=�����߸���</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ͼƬ��ϸҳ��ÿҳ��ʾ����ͼƬ��</td>
            <td class="rs alignle"><?php echo CHtml::textField('image_pagenum',$image_pagenum,array('size'=>5));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ÿҳֻ��ʾһ��ͼʱ�Ƿ��Զ����ţ�</td>
            <td class="rs alignle"><?php echo CHtml::radiobuttonlist('image_autoplay',$image_autoplay,array(1=>'��',0=>'��'),array('separator'=>'&nbsp;&nbsp;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��һ���Զ�������ÿ��ͼͣ�����룺</td>
            <td class="rs alignle"><?php echo CHtml::textField('image_seconds',$image_seconds,array('size'=>5));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ҳ�����ܸ��»���ʱ�䣺</td>
            <td class="rs alignle"><?php echo CHtml::textField('stat_day_cachetime',$stat_day_cachetime,array('size'=>6));?> ��</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">��ҳȫվ�����������¸��ʣ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('stat_all_cachetime',$stat_all_cachetime,array('size'=>6));?> ��֮һ���������ݸ���ʱ�����ݸ��¸��ʣ�</td>
          </tr>
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="����������վ����"/></td>
          </tr>
          
          <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">�Զ��������� <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></td></tr>     
          <tr>
          	<td class="rs" width="25%">ÿ���Զ������ƪЦ������</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public_num',$auto_public_num,array('size'=>8));?> ƪ ��"0"��Ϊ�ر�����Ц���Զ�����</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ÿ���Զ�����ͼƬЦ������</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public_imagenum',$auto_public_imagenum,array('size'=>8));?> ƪ��"0"��Ϊ�ر�ͼƬЦ���Զ�����</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�Զ���������µ������ڣ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public_day',$auto_public_day,array('size'=>15,'readonly'=>'readonly'));?></td>
          </tr>
           <tr>
          	<td class="rs" width="25%">�Զ�����ĸ��ʣ�</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public_precent',$auto_public_precent,array('size'=>4,'style'=>'text-align:center;'));?> ��֮һ
            <font color=red>(����Զ��������ڼ�����ǰ��ʱ�䣬�ɵ�С����)</font></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�������Զ���������Ц������</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public',$auto_public,array('size'=>8,'readonly'=>'readonly'));?> ƪ</td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�������Զ�����ͼƬЦ������</td>
            <td class="rs alignle"><?php echo CHtml::textField('auto_public_img',$auto_public_img,array('size'=>8,'readonly'=>'readonly'));?> ƪ  <font color=red>(ʵ�ʷ���������������һ��ƫ����������̫��)</font></td>
          </tr>

          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="����������վ����"/></td>
          </tr>
          
          
          
	
     <tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">��վ������� <font color=red>(���п���ܺ���'�ţ�ȫ��ʹ��"�Ŵ���)</font></td></tr>   
          <tr>
          	<td class="rs" width="25%">ȫվ�������Ϲ�棺<br />234*60 �� 468*60</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_web_navtop',$ad_web_navtop,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ȫվ����������棺</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_web_tanchuang',$ad_web_tanchuang,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ȫվ���߶�����棺</td>
            <td class="rs alignle" width="100%"><?php echo CHtml::textArea('ad_web_duilian',$ad_web_duilian,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ȫվС��ͨ(��ҳ���������£�����ҳ��Ե��)��<br />950*����߶�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_web_middle_new',$ad_web_middle_new,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ȫվ��ͨ(��ҳ�·�����ͨ)��<br />950*����߶�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_web_mid_down',$ad_web_mid_down,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�б�ҳ�����λ��<br />��<=320px * ����߶�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_list_main',$ad_list_main,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">����ҳ������/ͼƬ˵���ϣ�<br />��<=600px * ����߶�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_irt_downtitle',$ad_irt_downtitle,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">�����б������·���棺<br />��<=580px * ����߶�</td>
            <td class="rs alignle"><?php echo CHtml::textArea('ad_irt_pinglun',$ad_irt_pinglun,array('rows'=>3,'cols'=>'100%'));?></td>
          </tr>
 
          <tr>
          	<td class="rs" width="25%"></td>
            <td class="rs alignle"><input type="submit" value="����������վ����"/></td>
          </tr>

	<tr><td class="head" style="text-align:left;padding-left:15px;" colspan="2">һ����������</td></tr>  
    	 <tr>
          	<td class="rs" width="25%">����Ц���������������</td>
            <td class="rs alignle"><?php echo CHtml::htmlButton('һ���������ָ���Ц��������',array('onclick'=>"javascript:window.location.href='".$this->createUrl('Xhsystem/MakeStatnum',array('class'=>1))."';",'style'=>'height:32px;padding-top:0px;'));?></td>
          </tr>
          <tr>
          	<td class="rs" width="25%">ͼƬЦ���������������</td>
            <td class="rs alignle"><?php echo CHtml::htmlButton('һ������ͼƬЦ������������',array('onclick'=>"javascript:window.location.href='".$this->createUrl('Xhsystem/MakeStatnum',array('class'=>2))."';",'style'=>'height:32px;padding-top:0px;'));?></td>
          </tr>

          
     </table>
</form> 

<!--�б����-->
     </td></tr>
</table>