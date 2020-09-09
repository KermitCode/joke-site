<?php
/*
maker:kermit
date:2011-12-5
notes:the pages function
email:kermit2011@126.com
*/

class Page_do{
	
	//the setting of the pagenum and the other condition of the pages

	private  $pagenum;                     //how much nums needed in a page
	
	private  $pagetype='';                 //the page str in the pages
	
    public   $pageall;                     //all pages	
	
	private  $totalall;                    //all total record nums 

	private  $pagestr;                     //the vritable that will be returned
		
	public   $page=0;                      //the now page
			
	//end  setting of pages
	
//use the second method to get pages

public function get_thispage($pagetype='page'){
	
	if(!$this->pagetype) $this->pagetype=$pagetype;
	
	$pageget=isset($_GET[$pagetype])?intval($_GET[$pagetype]):1;                //this descide the method that you get page
		
	$pageget==0 && $pageget=1;
	
	$this->page=$pageget;
	
	return $pageget;
	
}
	
	
//1,get pageall,page and all about page nums;
	
public function setpage($totalall,$pagenum){               //to get the page num in the database
		
		if(!$this->page) $this->get_thispage();
		
		$this->pagenum=$pagenum;
		
		$this->totalall=$totalall;
		
		$this->pageall=ceil($totalall/$pagenum)>1?ceil($totalall/$pagenum):1;
		
		if($this->page>$this->pageall) $this->page=$this->pageall;
		
}
	
	
//2,show pages content and using urlrewrite method	
	
public function showpage($totalall,$pagenum,$type,$url,$url_add='',$send=''){
	
	$this->setpage($totalall,$pagenum);
	$send=$send?"?{$send}":'';
	
	$pagetype=$this->pagetype;
		
	if($type==1){//the second showpage medol
		
		$this->pagestr="合计<b>{$this->totalall}</b>条记录 共<b>{$this->pageall}</b>页 当前第<b>{$this->page}</b>页\n <br>";
			
		if($this->page==1) $this->pagestr.="首页 上一页 "; //in the first page
			
		else $this->pagestr.="<a href='{$url}1{$url_add}.html{$send}' >首页</a> <a href='{$url}".($this->page-1)."{$url_add}.html{$send}' >上一页</a> \n";
			
	    if($this->page!=$this->pageall) $this->pagestr.="<a href='{$url}".($this->page+1)."{$url_add}.html{$send}' >下一页</a> <a href='{$url}{$this->pageall}{$url_add}.html{$send}' >末页</a>\n";
			
		else $this->pagestr.="下一页 末页";
			
		$this->pagestr.="<script language='javascript'>function gopage(pagego){
		if(pagego>=1 && pagego!={$this->page})window.location.href='{$url}'+pagego+'{$url_add}.html{$send}';}</script>\nGO&nbsp;<input type=\"text\"
		style='text-align:center;width:30px;height:13px;vertical-align:middle;' id='gopages' onblur='gopage(this.value)' >&nbsp;页";
					
	}	
	
	return $this->pagestr;
		
}



//simple and short pages to show pagestr

public function showpage_short($totalall,$pagenum,$type,$url){
	
	$this->setpage($totalall,$pagenum);
	
	if($type==1){//only use for pages in ten pages
		
		$this->pagestr="共<b>".$this->totalall."</b>条记录 页码<b>".$this->page."/".$this->pageall."</b>&nbsp;&nbsp;\n ";
		
		$str=array('第一页','第二页','第三页','第四页','第五页','第六页','第七页','第八页','第九页','第十页');
		
		for($i=1;$i<=$this->pageall;$i++){
			
			if($this->page!=$i) $this->pagestr.="<a href='{$url}-{$i}.html' >".$str[$i-1]."</a>&nbsp;&nbsp;\n";
					
			else $this->pagestr.=" <b>".$str[$i-1]."</b>&nbsp;&nbsp;\n";
			
			}
		
	}
	
return $this->pagestr;
	
}





		
}//end the class




?>