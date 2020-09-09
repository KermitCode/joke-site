<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr><td class="pagetit">后台管理->数据表结构</td></tr>
    <tr><td>

<!--列表开始-->     
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#BBD3EB" class="data">
          <tr>
            <td class="head">ID</td>
            <td class="head">表名称</td>
            <td class="head">表备注</td>
            <td class="head">存储引擎</td>
            <td class="head">记录行数</td>
            <td class="head">占用空间</td>
            <td class="head">索引大小</td>
          </tr>
		<?php 
		
		$totalsize=0;$total_index=0;$total_rows=0;$i=1;
		
		foreach($result as $row){
				
			$totalsize+=$row['Data_length'];
			
			$total_index+=$row['Index_length'];
			
			$total_rows+=$row['Rows'];
		
			if($row['Data_length']>(1024*1024)) $row['Data_length']='<b>'.round($row['Data_length']/(1024*1024),2).'M</b>';
			
			elseif($row['Data_length']>1024) $row['Data_length']=round($row['Data_length']/1024,2).'K';
			
			else;
		
			$row['Index_length']=$row['Index_length']>1024?(($row['Index_length']/1024).'K'):$row['Index_length'];
		
print<<<EOT
		<tr><td class="rs">{$i}</td>
			<td class="rs">{$row['Name']}</td>
			<td class="rs">{$row['Comment']}</td>
			<td class="rs">{$row['Engine']}</td>
			<td class="rs">{$row['Rows']}</td>
			<td class="rs">{$row['Data_length']}</td>
			<td class="rs">{$row['Index_length']}</td>
		</tr>
EOT;
		$i++;	
		}
		$total=number_format(($totalsize+$total_index)/(1024*1024),1);
		$totalsize=number_format($totalsize/(1024*1024),1);
		$total_index=number_format($total_index/(1024),1);
		echo "<tr><td class='rs'>$i</td>
				  <td class='rs' colspan='3'><b>数据库总大小：<font color=red><b>{$total} </b>M</font>，数据汇总</b></td>
				  <td class='rs'><b>{$total_rows} 行</b></td>
				  <td class='rs'><b>{$totalsize} M</b></td>
				  <td class='rs'><b>{$total_index} K</b></td></tr>";
		
		echo '</table>';
		 ?>
         <tr><td class="page" colspan="8"></td></tr>
     </table>
<!--列表结束-->

     </td></tr>
</table>
