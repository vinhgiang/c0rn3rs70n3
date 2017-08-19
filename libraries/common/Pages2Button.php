<?php
class Pages2Button{
	var $Next = "Next";
    var $Prev = "Previous";
    var $First = "";//Label First
    var $Last = "";//Label Last
    var $maxpage = 5;
    var $params = "";
	var $current = "<strong>%page%</strong>";
	var $ClassItem="num";
	var $NextClass="next";
	var $PrevClass="prev";
	var $SeparatorLast = "<span>...</span>";
	function multipages($num, $perpage, $curpage, $mpurl) 
	{
		$page = $this->maxpage;
		$multipage = "";
		$realpages = 1;
		$from =0;
		$to= 1;
		if($num > $perpage) {
			$offset = 2;
			$realpages = @ceil($num / $perpage); //+ (($num % $perpage > 0) ? 1 : 0);
			$pages = $realpages;//maxpage<realpages ? maxpage : realpages;
			if($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				$from = $curpage - $offset;
				$to = $from + $page - 1;
				if($from < 1) {
					$to = $curpage + 1 - $from;
					$from = 1;
					if($to - $from < $page) {
						$to = $page;
					}
				} else if($to > $pages) {
					$from = $pages - $page + 1;
					$to = $pages;
				}
			}
			
			$multipage = "";

			$multipage = ($curpage > 1 ? "<a " . $this->replace_page($this->params, $curpage - 1) . " target=\"_self\" rel=\"" . ($curpage - 1) . "\" href=\"" . $this->replace_page($mpurl, $curpage - 1) . "\" class=\"".$this->PrevClass."\">" . $this->Prev . "</a>&nbsp;" : "<a class=\"".$this->PrevClass." active\" />");
		
			$multipage .= ($curpage < $pages ? "<a " . $this->replace_page($this->params, $curpage + 1) . " target=\"_self\" rel=\"" . ($curpage + 1) . "\" href=\"" . $this->replace_page($mpurl, $curpage + 1) . "\" class=\"".$this->NextClass."\">" . $this->Next . "</a>&nbsp;" : "<a class=\"".$this->NextClass." active\" />");
			
		}
		$this->maxpage = $realpages;
		return $multipage;
	}
	function replace_page($url,$page)
    {
        return str_replace("%page%",$page,$url);
    }	
}
?>