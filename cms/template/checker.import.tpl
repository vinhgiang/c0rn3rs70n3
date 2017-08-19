<div class="form">
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="fcontent">
        <div class="error">{msg}</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
                <tr>
                    <td width="2%" colspan="2">
                        Excel File<input name="file" type="file" id="file">
                    </td>
                </tr>
            </table>
        <div class="table_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="77%">&nbsp;</td>
                    <td width="23%" align="right">
                        <input type="submit" class="btn" name="Submit" value="Import">
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <!--BOX info-->
    <div class="info">
        Exist: {exist} <br>
        Imported: {imported}
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Exist Codes</h3>
        </div>
        <div class="panel-body">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <!--BASIC existCode-->
                <tr>
                    <td width="77%">{existCode.code}</td>
                    <td width="23%">{existCode.type}</td>
                </tr>
                <!--BASIC existCode-->
            </table>
        </div>
    </div>
    <!--BOX info-->
</div>