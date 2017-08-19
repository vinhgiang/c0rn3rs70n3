<div>
	<div class="searchForm table-Form1">
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
    <th class="th-name">FullName</th>  
    <th class="th-name">Phone </th>  
	<th class="th-name">Email </th>     
    <th class="th-name">DateTime</th>
    <!--<th class="th-status">Status</th>--> 
    <th align="center"  class="th-action lastColumn">Action</th>
  </tr>
  <!--BASIC render_data-->
  <tr id="rows{render_data.id}">
  	<td class="th-checkbox firstColumn"><input type="checkbox" name="pro[]" value="{render_data.id}" class="no_width" /></td>  
    <td class="th-name"> <a href="{url_link}&act=detail&id={render_data.id}" title="Detail" class="mbajax">{render_data.fullname}</a></td>
    <td class="th-name" style="font-weight: normal;">{render_data.phone}</td>
	 <td class="th-name" style="font-weight: normal;">{render_data.email}</td>
    <td class="th-name" style="font-weight: normal;">{render_data.timestamp}</td>    
    <!--<td class="th-status">
	 <a href="{url_link}&act=active&id={render_data.id}"><img src="images/icons_default/status{render_data.active}.gif" /></a>
	</td>-->    
    <td class="th-status lastColumn">
     <a href="{url_link}&act=detail&id={render_data.id}" title="Detail" class="mbajax"><img src="images/icons_default/view.gif" width="16" height="16" /></a>&nbsp;&nbsp;     
   	 <a href="{url_link}&act=delete&id={render_data.id}" title="Delete" onClick="deleteConfirm(this); return false;"><img src="images/icons_default/delete{ucp.delete}.png" width="16" height="16" /></a>
    </td>
  </tr>
  <!--BASIC render_data-->
</table>
	<div class="pagination paging-bottom">
        {divpage}
    </div>    
</form>
  <script type="text/javascript">
	$('a.divbox').divbox({ caption: false});
	function setActive(id){
		$.post('?mod=member&act=active&id='+id,{},function(){});
	}	
  </script>
