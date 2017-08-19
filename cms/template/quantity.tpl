<div class="loading"></div>
<div class="error">{msg}</div>
<div id="output">
	<br>
	<table cellpadding=0 cellspacing=0 width=100% style="border:1px soild #CCC">
		<tr>
		    <td class="header-page">Item</td>
		    <td class="header-page">Used</td>
		    <td class="header-page">Remaining</td>
		</tr>
		</tr>
			<td class="body-page">Green bag</td>
			<td class="body-page">{bagQuantity.green_bag_used}</td>
			<td class="body-page">{bagQuantity.green_bag_remaining}</td>
		</tr>
		</tr>
			<td class="body-page">Red bag</td>
			<td class="body-page">{bagQuantity.red_bag_used}</td>
			<td class="body-page">{bagQuantity.red_bag_remaining}</td>
		</tr>
		<!--BASIC patches-->
		</tr>
			<td class="body-page">{patches.name}</td>
			<td class="body-page">{patches.prices}</td>
			<td class="body-page">{patches.remaining}</td>
		</tr>
		<!--BASIC patches-->
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


