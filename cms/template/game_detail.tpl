<div class="form">
  <!--BOX msg-->
  <div class="info">Email sent.</div>
  <!--BOX msg-->
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
      <tr>
        <td class="textLabel">Email</td>
        <td><label class="borders" style="width:500px; display:block">{email} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Name</td>
        <td><label class="borders" style="width:500px; display:block">{name} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Child's name</td>
        <td><label class="borders" style="width:500px; display:block">{child_name} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">Letter</td>
        <td><label class="borders" style="width:500px; display:block">{header_letter} </br> {body_letter} <br/> {footer_letter} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">Bag color</td>
        <td><label class="borders" style="width:500px; display:block">{bag_color} &nbsp</label></td>
      </tr>
      <tr>
        <td class="textLabel">Patches</td>
        <td>
          <img src="{_UPLOAD}{patches.0}" alt="">
          <img src="{_UPLOAD}{patches.1}" alt="">
          <img src="{_UPLOAD}{patches.2}" alt="">
          <img src="{_UPLOAD}{patches.3}" alt="">
          <img src="{_UPLOAD}{patches.4}" alt="">
        </td>
      </tr>
      <tr>
        <td class="textLabel">Code</td>
        <td><label class="borders" style="width:500px; display:block">{code} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Full name:</td>
        <td><label class="borders" style="width:500px; display:block">{full_name} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">IC:</td>
        <td><label class="borders" style="width:500px; display:block">{ic} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Passport:</td>
        <td><label class="borders" style="width:500px; display:block">{passport} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Phone:</td>
        <td><label class="borders" style="width:500px; display:block">{phone} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Address:</td>
        <td><label class="borders" style="width:500px; display:block">{address} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Postcode:</td>
        <td><label class="borders" style="width:500px; display:block">{postcode} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">State:</td>
        <td><label class="borders" style="width:500px; display:block">{state} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">Bag Img</td>
        <td><img src="{_UPLOAD}{upload_folder}/{bag_img}" alt=""></td>
      </tr>
      <tr>
        <td class="textLabel">Subscribe</td>
        <td><label class="borders" style="width:500px; display:block">{subscribe} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">IP:</td>
        <td><label class="borders" style="width:500px; display:block">{ip} &nbsp </label></td>
      </tr>
      <tr>
        <td class="textLabel">date</td>
        <td><label class="borders" style="width:500px; display:block">{date}</label></td>
      </tr>
      <tr>
        <td class="textLabel">Log</td>
        <td><textarea rows="7" disabled="">{log}</textarea></td>
      </tr>
      <tr>
        <td class="textLabel">Send Email</td>
        <td><button onclick="window.location.href = '?mod={module}&act=send&id={id}'; return false;">Send</button> &nbsp;&nbsp;&nbsp;&nbsp; <img src="images/icons_default/status{sent}_d.gif" /></td>
      </tr>
    </table>
  </form>
</div>