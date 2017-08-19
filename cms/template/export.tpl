<div class="top_callFunc_member">
	<div class="p-left">
		Table : <select name="table" id="table" onchange="addTable()">
			<!--BASIC listTable-->
			  <option value="{listTable.TABLE_NAME}">{listTable.TABLE_NAME}</option>
			<!--BASIC listTable-->
		</select>
	</div>
	<div class="p-right">
		List Search :
		<select name="strsql" id="strsql" onchange="appendsql()">
			<option value="0">Select</option>
			<!--BASIC listSql-->
			  <option value="{listSql.sql}">{listSql.name}</option>
			<!--BASIC listSql-->
		</select>
	</div>
</div><br />
<div class="loading"></div>
<div class="error">{msg}</div>
<form id="form2" name="form2" method="post" action="?mod=export">
    <textarea name="inputsql" id="inputsql" style="width:600px;height:130px;" >{sql.content}</textarea><br /><br />
    <input type="submit" class="btn" name="submit" id="submit" value="Submit" />
    <input type="submit" class="btn" name="submit" id="btnexport" value="Export" />
</form>
<br />

<div id="output">
	<table cellpadding=0 cellspacing=0 width=100% style="border:1px soild #CCC">
		<tr>
	        <!--BASIC listHeader-->
	        <td class="header-page">{listHeader.0}</td>
	        <!--BASIC listHeader-->   
	   </tr> 
	    <!--BASIC listBody-->
	    </tr>	
	     <!--BASIC listBody.sub-->
	        <td class="body-page">{listBody.sub.data}</td> 
	        <!--BASIC listBody.sub-->   
	    </tr>
		 <!--BASIC listBody-->
	</table>
</div>

<style type="text/css">
	.header-page{
		font-weight:bold;
		color: #333; 
		height:25px; 
		vertical-align:middle; 
		margin:0px 0px 5px 5px; 
		padding:0px 5px 0px 5px;	
		background-color: #ccc;		
		font-family: arial;	
	}
	.body-page{
		border-bottom:1px solid #CCC;
		height:25px;
		color: #333; 
		vertical-align:middle;
		margin:0px 0px 0px 5px;
		font-family: arial;
	}
</style>


