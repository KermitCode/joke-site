<div style="margin:0px;text-align:center;">
<img src="<?php echo $this->baseurl;?>images/404.jpg"  />
<?php
//网站报错设置	
if($this->webset['web_error']) echo "<div style='text-align:center;height:22px;line-height:22px;color:blue;font-size:14px;margin-top:5px;'><b>错误代码：{$code}</b>	　详细信息：{$message}</div>";	
else;
?>
</div>
