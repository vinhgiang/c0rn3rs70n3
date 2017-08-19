<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="top_callFunc_member" style="width: 100%;">
<div class="table_list toolbar fleft">
	<a href="?mod={module}&act=export{url_current}" class="btn l" style="margin-right:5px;">Export Excel</a>
    <br  />
    <br  />
</div>
<div class="searchForm table-Form1 fleft">
<form id="form1" name="form1" method="post" action="">
    <input name="q" type="text" class="txf-normal" id="q" value="{search_text}"/>
    <input name="btnSearch" type="submit" class="btn" id="cmd" value="{lang.search}" />   
</form>
</div>
</div>

<div class="error">{msg}</div>
<!--BOX msg-->
<div class="info">Email sent.</div>
<!--BOX msg-->
<form id="form2" name="form2" method="post" action="" onsubmit="return checkSubmitAction(this)">
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list list marginTop5" id="table-list">
  <tr>
  	<th class="th-checkbox firstColumn" align="center" width="4%" valign="middle">      
        <input type="checkbox" class="no_width" style="{display_checkall}" name="checkall" value="1" onclick="checkAll('#table-list',this,'pro')" />
    </th>
    <th class="th-name">ID</th>
    <th class="th-name">Name</th>   
    <th class="th-name">Child's name</th>
    <th class="th-name">Backpack</th>
    <th class="th-name">Datetime</th>
    <th class="th-name">Like</th>
    <th class="th-status lastColumn">Status</th>
  </tr>
  <!--BASIC contact-->
  <tr id="rows{contact.id}">
    <td class="th-checkbox firstColumn"><input type="checkbox" name="pro[]" value="{contact.id}" class="no_width" /></td>
    <td class="th-name"><a href="?mod=game&act=detail&id={contact.id}">{contact.id}</a></td>
    <td class="th-name"><a href="?mod=game&act=detail&id={contact.id}">{contact.name}</a></td>
    <td class="th-name">{contact.child_name}</td>
    <td class="th-name"><img src="{_UPLOAD}/game/{contact.bag_img}" style="width:70px"></img></td>
    <td class="th-name">{contact.date}</td>
    <td class="th-name">
        <div class="fb-like" data-href="{contact.like_url}" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
    </td>
    <td class="th-status lastColumn">
        <a href="?mod={module}&amp;act=active&amp;id={contact.id}" title="{button.status_hover_item}"><img src="images/icons_default/status{contact.active}_d.gif" /></a>
    </td>
  </tr>
  <!--BASIC contact-->
</table>
	<div class="pagination paging-bottom">
        <ul>
            {divpage}
        </ul>
    </div>
</form>
  <script type="text/javascript">
	$('a.divbox').divbox({ caption: false});
	function setActive(id){
		$.post('?mod=member&act=active&id='+id,{},function(){});
	}	
  </script>
