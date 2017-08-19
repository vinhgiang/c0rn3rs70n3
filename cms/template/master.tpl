﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include:tpl=master_header}

<link rel="stylesheet" type="text/css" href="css/style.css" />


</head>
<body>

<div class="wrapper">
	<div class="container">
		<div class="hd">
			<p class="hd-r">
				Welcome <span class="hd-username">{login_user.fullname}</span>
				<!--BOX profile-->
				,<a href="?mod=user&act=update" class="hd-profile">{lang.update_profile}</a>
				or
				<a href="?mod=user&act=reset" class="hd-resetPass">{lang.reset_password}</a>
				<!--BOX profile-->
				<span class="hd-divider">|</span>
				<a href="?mod=user&act=logout" class="hd-logout">{lang.logout}</a>
			</p>
			<a class="hd-logo" href="./">{web_client}</a>
		</div>

		<div class="ct">
			<div class="side">				
				<!--BASIC leftmenu-->
				<div class="menu {leftmenu.cls_cms}">
					<h2 id="{leftmenu.id}menu">{leftmenu.name}</h2>
					{leftmenu.links}
				</div>
				<!--BASIC leftmenu-->
			</div>

			<div class="main">
				<div class="mainInner">
					<div class="breadcrumb">{breadcrumb}</div>
					<div class="module_description">{module_description}</div>
					{include:tpl=body}
				</div>
			</div>
		</div>

		<div class="ft">
			&copy; Copyright {system_year} {web_client}.
		</div>
	</div>
</div>

<table width="5" height="100%" cellpadding="0" cellspacing="0" border="0" class="btn_expandMenu"><tr><td>&nbsp;</td></tr></table>

{include:tpl=master_footer}

</body>
</html>