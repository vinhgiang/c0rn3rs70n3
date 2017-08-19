<link rel="stylesheet" href="../template/Default/css/plugin.css" />
<link rel="stylesheet" href="../template/Default/css/reset.css" />
<link rel="stylesheet" href="../template/Default/css/style.css" />
<style type="text/css">
	.frmUnitLayout p{
		width: 50%;
		float: left;
		padding-left: 20px;
	}
		.frmUnitLayout p span{
			display: block;
			text-align: center;
			font-size: 18px;
			margin-bottom: 20px;
			margin-top: 20px;
		}
		.frmUnitLayout p input{
			margin-top: 20px;
			width: 80%;
			height: 25px;
		}
		.frmUnitLayout .btn-submit{
			margin-left: 36%;
			margin-top: 35px;
		}
	.hide {
		display: none;
	}
</style>
<div id="main" role="main">
	<div class="error">{msg}</div>
	<section class="page" id="pSitePlan">
		<div class="page-wrapper">
			<p class="breadcrumbs">Facilities</p>
			<h2>Site Plan</h2>
		</div>
		<div class="site-plan-wrapper js-site-plan">
			<!--BASIC listSitePlan-->
			<div class="js-tower {listSitePlan.name}" data-id="{listSitePlan.id}">
				<!--BASIC listSitePlan.sub-->
				{listSitePlan.sub.htmlTemplate}
				<!--BASIC listSitePlan.sub-->	
			</div>
			<!--BASIC listSitePlan-->		
			<div class="site-plan">
				<img src="../template/Default/images/siteplan.jpg" alt="" />
			</div>
		</div>
		<div class="legends">
			<div class="col-left">
				<img src="../template/Default/images/legend_left.png" alt="" />
			</div>
			<div class="col-middle">
				<img src="../template/Default/images/legend_middle.png" alt="" />
			</div>
			<div class="col-right">
				<img src="../template/Default/images/legend_right.png" alt="" />
			</div>
		</div>
	</section>
</div>

<div class="unit-detail js-form-site-plan">
	<a href="javascript:void(0)" class="btn-x" title=""><img src="../template/Default/images/btn_x.png" alt="" /></a>
	<div class="unit-detail-img">
		<form name="frmUnitLayout" class="frmUnitLayout" method="post" action="" enctype="multipart/form-data" >
			<p>
				<span>Việt Nam</span>
				<img class="js-img js-img-vn hide" src="" style="width:300px; height:300px;" />
				<input class="js-title js-title-vn hide" type="text" name="intro[vn]" value="" placeholder="Please enter title..." />  <br />
				<input class="js-file js-file-vn hide" type="file" name="ln_image[vn]" /> 
			</p>
			<p>
				<span>English</span>
				<img class="js-img js-img-en hide" src="" style="width:300px; height:300px;" />
				<input class="js-title js-title-en hide" type="text" name="intro[en]"  placeholder="Please enter title..." /> <br />
				<input class="js-file js-file-vn hide" type="file" name="ln_image[en]" /> 
			</p>
			<input type="hidden" name="contentId" class="contentId" value="0" />
			<input type="hidden" name="catId" class="catId" value="0" />
			<input type="submit" name="submit" class="btn-submit" value="Gửi" />
		</form>		
	</div>
</div>
<div class="mask-layer js-mask-layer"></div>