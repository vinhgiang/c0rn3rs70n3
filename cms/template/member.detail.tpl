<div class="form">
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
      <tr>
        <td class="textLabel">Tên</td>
        <td><label class="borders" style="width:500px; display:block">{user.fullname} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">FB name</td>
        <td><label class="borders" style="width:500px; display:block"><a target="_blank" href="http://facebook.com/{user.facebookid}">{user.fbname}</a> &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Email</td>
        <td><label class="borders" style="width:500px; display:block">{user.email} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">FB Email</td>
        <td><label class="borders" style="width:500px; display:block">{user.fbemail} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">DOB</td>
        <td><label class="borders" style="width:500px; display:block">{user.dob} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">Số điện thoại</td>
        <td><label class="borders" style="width:500px; display:block">{user.tel} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">Tỉnh Thành</td>
        <td><label class="borders" style="width:500px; display:block">{user.city} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Địa Chỉ:</td>
        <td><label class="borders" style="width:500px; display:block">{user.address} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Ngày đăng ký:</td>
        <td><label class="borders" style="width:500px; display:block">{user.timestamp} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Trạng thái:</td>
        <td><label class="borders" style="width:500px; display:block">{user.status} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Tổng thẻ:</td>
        <td><label class="borders" style="width:500px; display:block">{user.totalCard} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Normal:</td>
        <td><label class="borders" style="width:500px; display:block">{user.normal_card} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Captain:</td>
        <td><label class="borders" style="width:500px; display:block">{user.captain_card} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Club 100:</td>
        <td><label class="borders" style="width:500px; display:block">{user.club100_card} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Cards:</td>
        <td><label class="borders" style="width:500px; display:block">{user.cards} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Hoàn thành:</td>
        <td><label class="borders" style="width:500px; display:block">{user.completed_date} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Nhập thẻ</td>
        <td><label class="borders" style="width:500px; display:block"><a href="?mod=card&act=add&id={user.id}">Nhập thẻ</a></label></td>
      </tr>
    </table>
  </form>
</div>