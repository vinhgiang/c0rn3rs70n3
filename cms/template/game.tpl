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
<form method="post" action="">
    <input name="version" type="text" class="txf-normal" value="{scan_version}"/>
    <input type="submit" class="btn" value="Update" />
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
    <th class="th-name">ID</th>
    <th class="th-name">Name</th>  
    <th class="th-name">img</th>
    <th class="th-name">Link</th>
    <th class="th-name">Vote</th>
    <th class="th-name">Scan</th>
    <th class="th-name">Datetime</th>
  </tr>
  <!--BASIC contact-->
  <tr id="rows{contact.id}">
  	<td class="th-checkbox firstColumn"><input type="checkbox" name="pro[]" value="{contact.id}" class="no_width" /></td>  
    <td class="th-name"><a href="?mod=game&act=detail&id={contact.id}">{contact.id}</a></td>
    <td class="th-name"><a target="_blank" href="http://facebook.com/{contact.facebook_id}">{contact.name}</a></td>
    <td class="th-name"><img src="{_UPLOAD}game/{contact.img}" style="width:200px"/></td>
      <td class="th-name"><a target="_blank" href="http://facebook.com/{contact.share_id}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=700,width=700');return false;">Link</a></td>
    <td class="th-name">
        <form action="" method="post">
            <input name="vote" type="number" value="{contact.vote}">
            <input id="privateSubmission-{contact.id}" name="private" type="checkbox" value="1">
            <label for="privateSubmission-{contact.id}">Private</label>
            <input name="id" type="hidden" value="{contact.id}">
            <input type="submit">
        </form>
    </td>
    <td class="th-name">{contact.scan_version}</td>
    <td class="th-name">{contact.date}</td>

  </tr>
  <!--BASIC contact-->
</table>
	<div class="pagination paging-bottom">
        <ul>
            {divpage}
        </ul>
    </div>
   <!--  <div class="bottom_callAction">			
	<strong>Select action:</strong><br />
    <input name="act_delete" type="submit" class="btn" id="act_delete" value="Delete" />
    <input name="act_active" type="submit" class="btn" id="act_active" value="Activate" />
	<input name="act_inactive" type="submit" class="btn" id="act_inactive" value="Inactivate" />
    </div> -->
</form>
