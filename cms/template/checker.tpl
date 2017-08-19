<div class="loading"></div>
<div class="error">{msg}</div>
<form id="fcontent" class="table-Form1" name="form2" method="post" action="?mod=checker">
    <label for="code">Code:</label>
    <input id="code" class="form-control input-sm" type="text" name="code">
    <input type="submit" class="btn" id="submit" value="Submit" />
</form>
<br />

<!--BOX codeInfo-->
<div id="output">
	<table cellpadding=0 cellspacing=0 width=100% style="border:1px soild #CCC">
		<tr>
	        <td class="header-page">Code</td>
	        <td class="header-page">Type</td>
	        <td class="header-page">Status</td>
	   </tr>
	    </tr>
	        <td class="body-page">{code}</td>
	        <td class="body-page">{type}</td>
	        <td class="body-page">{used}</td>
	    </tr>
	</table>
</div>
<!--BOX codeInfo-->
<br><br><br>
<!--BOX usedCodeInfo-->
<div id="output">
	<table cellpadding=0 cellspacing=0 width=100% style="border:1px soild #CCC">
		<tr>
			<td class="header-page">Fullname</td>
			<td class="header-page">Email</td>
			<td class="header-page">IC</td>
			<td class="header-page">Contact</td>
			<td class="header-page">Date</td>
		</tr>
		</tr>
		<td class="body-page">{full_name}</td>
		<td class="body-page">{email}</td>
		<td class="body-page">{ic}</td>
		<td class="body-page">{phone}</td>
		<td class="body-page">{date}</td>
		</tr>
	</table>
</div>
<!--BOX usedCodeInfo-->

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


