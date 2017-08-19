<div class="top_callFunc_member" style="width: 100%;">
<div class="table_list toolbar fleft">
	<a href="?mod=contact&act=export{contact_url}" class="btn l" style="margin-right:5px;">Export Excel</a>
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
    <th class="th-name">Name</th>  
    <th class="th-name">Email</th>   
    <th class="th-name">Phone</th> 
    <th class="th-name">About</th>   
    <th class="th-name">Interested</th>   
    <th class="th-name">Message</th>  
    <th class="th-name">Datetime</th>
  </tr>
  <!--BASIC contact-->
  <tr id="rows{contact.id}">
  	<td class="th-checkbox firstColumn"><input type="checkbox" name="pro[]" value="{contact.id}" class="no_width" /></td>  
    
    <td class="th-name">{contact.fullname}</td>
    <td class="th-name">{contact.email}</td>
    <td class="th-name">{contact.phone}</td>    
    <td class="th-name">{contact.about}</td> 
    <td class="th-name">{contact.room}</td> 
    <td class="th-name">{contact.message}</td>    
    <td class="th-name">{contact.created}</td>    
     
  </tr>
  <!--BASIC contact-->
</table>
	<div class="pagination paging-bottom">
        {divpage}
    </div>
   <!--  <div class="bottom_callAction">			
	<strong>Select action:</strong><br />
    <input name="act_delete" type="submit" class="btn" id="act_delete" value="Delete" />
    <input name="act_active" type="submit" class="btn" id="act_active" value="Activate" />
	<input name="act_inactive" type="submit" class="btn" id="act_inactive" value="Inactivate" />
    </div> -->
</form>
  <script type="text/javascript">
	$('a.divbox').divbox({ caption: false});
	function setActive(id){
		$.post('?mod=member&act=active&id='+id,{},function(){});
	}	
  </script>
