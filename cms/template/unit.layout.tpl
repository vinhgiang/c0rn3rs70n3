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
		}
		.frmUnitLayout .btn-submit{
			margin-left: 36%;
			margin-top: 50px;
		}
</style>
<div id="main" role="main">
	<div class="error">{msg}</div>
	<section class="page" id="pUnitLayout">
		<div class="page-wrapper">
			<h2>Unit Layout</h2>
		</div>
		<div class="unit-layout-wrapper">
			<div class="unit-layout js-unit-layout">
				<!--BASIC listCategory-->
				<div class="{listCategory.name} js-tower">
					<!--BASIC listCategory.sub-->
					<img data-id="{listCategory.sub.id}" data-image-vn="{_UPLOAD}{listCategory.sub.ln_image}" data-image-en="{_UPLOAD}{listCategory.sub.imageOther}" class="{listCategory.sub.name}" src="{_UPLOAD}{listCategory.sub.icon}" alt="" data-large="{_UPLOAD}{listCategory.sub.ln_image}" data-image-mobile-vn="{_UPLOAD}{listCategory.sub.ln_icon}" data-image-mobile-en="{_UPLOAD}{listCategory.sub.imageOtherMobile}" />
					<!--BASIC listCategory.sub-->
				</div>
				<!--BASIC listCategory-->				
				<img src="../template/Default/images/unitlayout.jpg" alt="" />
			</div>
		</div>
	</section>
</div>

<div class="unit-detail js-form-unit-layout">
	<a href="javascript:void(0)" class="btn-x" title=""><img src="../template/Default/images/btn_x.png" alt="" /></a>
	<div class="unit-detail-img">
		<form name="frmUnitLayout" class="frmUnitLayout" method="post" action="" enctype="multipart/form-data" >
			<p>
				<span>Hình ảnh VN</span>
				<a target="_blank" class="js-href-vn" href ="" ><img class="js-img-vn" src="" style="width:200px; height:200px;" /></a>
				<input type="file" name="ln_image[vn]" value="Ảnh cho desktop" /> 

				<span>hình ảnh mobile</span>
				<a target="_blank" class="js-href-mobile-vn" href ="" ></a>
				<input type="file" name="ln_icon[vn]" value="Ảnh cho mobile"/> 
			</p>
			<p>
				<span>Hình ảnh EN</span>
				<a target="_blank" class="js-href-en" href ="" ><img class="js-img-en" src="" style="width:200px; height:200px;" /></a>
				<input type="file" name="ln_image[en]" value="Ảnh cho desktop" /> 

				<span>hình ảnh mobile</span>
				<a target="_blank" class="js-href-mobile-en" href ="" ></a>
				<input type="file" name="ln_icon[en]" value="Ảnh cho mobile"/> 
			</p>
			<input type="hidden" name="contentId" class="contentId" value="0" />
			<input type="submit" name="submit" class="btn-submit" value="Gửi" />
		</form>		
	</div>
</div>
<div class="mask-layer js-mask-layer"></div>