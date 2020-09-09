<div><img src="<?php echo$this->baseurl;?>images/stattop.gif" border="0"/></div>
<div class="stat">
    <div class="stats">
        <span class="left"><a href="<?php echo $this->createUrl('site/index');?>">首页</a> -> <a href="#">我要发表笑话</a>
        </span>
        <span class="right marr5"><img src="<?php echo $this->baseurl;?>images/1.gif" width="25" height="12" /><strong><a href="javascript:void(0);" id="yuan">随缘*壹笑</a></strong></span>
        <div id="xiao"><div id="xiaotext"></div></div>
    </div>
</div>
<div class="statbot"><img src="<?php echo$this->baseurl;?>images/statbot.gif" border="0"/></div>

<div class="photos">
	<div class="mat wid9"><div class="left">我要发表笑话</DIV><div class="right more"></div></div>
    <div class="phlistall">
	  
      	<div class="xiaomy">
      	<?php echo $this->renderPartial('_form', array('model'=>$model,'class_arr'=>$this->getClass_tit())); ?>
     	</div>
        
    <div class="clear"></div>
   </div><!--end imagelist -->
                       
</div>
