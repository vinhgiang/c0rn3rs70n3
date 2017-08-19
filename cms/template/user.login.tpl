<!doctype html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CMS Login - {web_client}</title>

		<link rel="icon" href="../favicon.gif" type="image/png" /> 		

		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/login.css" />
	</head>

	<body>
		<div class="wrapper">
			<div class="container">
				<div class="hd">
					<p class="hd-r">
						Welcome to CMS Administrator
					</p>
					<a class="hd-logo" href="./">{web_client}</a>
				</div>

				<h1>CMS <span>{lang.login}</span></h1>
				<div id="login">	
					<form id="form1" name="form1" method="post" action="" onsubmit="return checkLogin(this);">
						<p>
							<label>{lang.username}<br />
							<input name="username" type="text" id="login-username" class="txf" /></label>
						</p>
						<p>
							<label>{lang.password}<br />
							<input name="password" type="password" id="login-password" class="txf" /></label>
					
						</p>
						<p class="login-submit">			
							<input type="submit" class="btn btn-main1" name="Submit" value="{lang.login}" />
							<span class="msg-error">{error}</span>
						</p>
					</form>	
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/login.js"></script>
	</body>
</html>
