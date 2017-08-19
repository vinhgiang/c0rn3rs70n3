<div class="top_callFunc">
	<a href="{http_referer}" class="btn r">< Back</a>
</div>
{strMSG}
<form action="#" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">   
    <tr>
      <td class="textLabel">Họ tên </td>
      <td><input type="text"  value="{user.fullname}" name="detail[fullname]" style="width:500px">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">Email</td>
       <td><input type="text"  value="{user.email}" name="detail[email]" style="width:500px">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">New Password</td>
       <td><input type="password"  value="" name="txtPass" style="width:500px">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">Ngày tháng năm sinh</td>
       <td><input type="text"  value="{user.dob}" name="{user.dob}" style="width:500px">&nbsp; (YYYY-mm-dd)</td>
    </tr>
    <tr>
      <td class="textLabel">Số điện thoại:</td>
	  <td><input type="text"  value="{user.tel}" name="detail[tel]" style="width:500px">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">Địa chỉ</td>
	  <td><input type="text"  value="{user.address}" name="detail[address]" style="width:500px">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">Tỉnh thành</td>
	  <td><input type="text"  value="{user.city}" name="detail[city]" style="width:500px">&nbsp;</td>
    </tr>
    <!-- <tr>
      <td class="textLabel">Active</td>
      <td><input type="checkbox" {user.active} value="1" name="detail[active]" /></td>
    </tr> -->
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-Form1">
    <tr>
      <td class="textLabel">&nbsp;</td>
		<td>
			<div class="l">
				<span>
					<select name="back" id="back" class="submit_action">
						<option value="1" {back_list_1}>{lang.back_to_list}</option>
						<option value="0" {back_list_0}>{lang.keep_me_here}</option>
					</select>
				</span>
			</div>
			<input type="submit" class="btn" name="Submit" value="{lang.save}">
			<input type="button" class="btn btn_cancel" id="reset" onclick="location.href='{http_referer}';" value="{lang.cancel}">
		</td>
      </tr>
    </table>
</form>