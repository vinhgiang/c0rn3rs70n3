<div class="top_callFunc_member">
<div class="table_list toolbar fleft">
    <!--BOX export-->
    <a href="?mod=member&act=export{contact_url}" class="btn l" style="margin-right:5px;">Export Excel (All)</a>
    <!--BOX export-->
    <a href="?mod=member&act=update" class="btn l" style="margin-right:5px;">Add</a>
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
<form id="form2" name="form2" method="post" action="" onsubmit="return checkSubmitAction(this)">
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list list marginTop5" id="table-list">
  <tr>
  	<th class="th-checkbox firstColumn" align="center" width="4%" valign="middle">
        <input type="checkbox" class="no_width" style="{display_checkall}" name="checkall" value="1" onclick="checkAll('#table-list',this,'pro')" />
    </th>
    <th class="th-name">Tên</th>
    <th class="th-name">Facebook name</th>
    <th class="th-name">Email </th>
    <th class="th-name">Di động</th>
    <th class="th-name">Ngày tham gia</th>
    <th class="th-status">Trạng thái</th>
    <th align="center"  class="th-action lastColumn">Chức Năng</th>
  </tr>
  <!--BASIC user-->
  <tr id="rows{user.id}">
  	<td class="th-checkbox firstColumn"><input type="checkbox" name="pro[]" value="{user.id}" class="no_width" /></td>
    <td class="th-name"><a href="{url_link}&act=detail&id={user.id}" title="Detail" class="mbajax">{user.fullname}</a></td>
    <td class="th-name"><a href="{url_link}&act=detail&id={user.id}" title="Detail" class="mbajax">{user.fbname}</a></td>
    <td class="th-name"><a href="{url_link}&act=detail&id={user.id}" title="Detail" class="mbajax">{user.email}</a></td>
    <td class="th-name"><a href="{url_link}&act=detail&id={user.id}" title="Detail" class="mbajax">{user.tel}</a></td>
    <td class="th-name">{user.timestamp}</td>

     <td class="th-status"><img src="images/icons_default/status{user.active}.gif" /></td>
     <td class="th-status lastColumn">
      <a href="?mod=card&act=add&id={user.id}" title="card"><img src="images/icons_default/card.png" width="16" height="16" /></a>&nbsp;&nbsp;
      <!--BOX edit-->
      <a href="{url_link}&act=update&id={user.id}" title="edit"><img src="images/icons_default/edit.png" width="16" height="16" /></a>&nbsp;&nbsp;
      <!--BOX edit-->
     <a href="{url_link}&act=detail&id={user.id}" title="Detail" class="mbajax"><img src="images/icons_default/view.gif" width="16" height="16" /></a>&nbsp;&nbsp;
   	 <!-- <a href="{url_link}&act=delete&id={user.id}" title="Delete" onClick="deleteConfirm(this); return false;"><img src="images/icons_default/delete{ucp.delete}.png" width="16" height="16" /></a> -->
    </td>
  </tr>
  <!--BASIC user-->
</table>
	<div class="pagination paging-bottom">
        {divpage}
    </div>
    <div class="bottom_callAction">
	<strong>Select action:</strong><br />
    <input name="act_delete" type="submit" class="btn" id="act_delete" value="Delete" />
    <input name="act_active" type="submit" class="btn" id="act_active" value="Activate" />
	  <input name="act_inactive" type="submit" class="btn" id="act_inactive" value="Inactivate" />
    <!--BOX export-->
    <input name="act_exportSelect" type="submit" class="btn" id="act_exportSelect" value="Export" />
    <!--BOX export-->
    </div>
</form>
  <script type="text/javascript">
	$('a.divbox').divbox({ caption: false});
	function setActive(id){
		$.post('?mod=member&act=active&id='+id,{},function(){});
	}
  </script>
