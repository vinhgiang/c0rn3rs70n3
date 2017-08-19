$(document).ready(function(){
	CMS.init();
});


var CMS = {
	init : function(){
		CMS.menu.init();
		CMS.tagTable.init();
	},
	menu : {

		init : function(){
			/*$('.side .menu h2').toggle(function(){
				save_status_menu(this.id,$(this).parent().find('a').css('display'));
				$(this).parent().find('a').stop(true, true).animate({
					height: 'toggle'
				},250);		
				
			},function(){
				save_status_menu(this.id,$(this).parent().find('a').css('display'));
				$(this).parent().find('a').stop(true, true).animate({
					height: 'toggle'
				},250);	
				
			});*/
		}
	},
	tagTable : {
		init : function(){
			$('.table_list tr').hover(
				function(){
					$(this).addClass('tr_hover').find('.th-actions').show();
				},
				function(){
					$(this).removeClass('tr_hover').find('.th-actions').hide();
				}
			);
		}
	}	
};





$('.js-unit-layout .js-tower img').click(function(evt){
	$('.js-form-unit-layout').show();
	$('.js-mask-layer').show();
	$('.js-form-unit-layout .unit-detail-img').css('background-color' , 'white');

	$('.js-form-unit-layout .contentId').val($(this).attr('data-id'));
	$('.js-form-unit-layout .js-img-vn').attr( 'src' , $(this).attr('data-image-vn'));
	$('.js-form-unit-layout .js-img-en').attr( 'src' , $(this).attr('data-image-en'));

	$('.js-form-unit-layout .js-href-vn ').attr( 'href' , $(this).attr('data-image-vn'));
	$('.js-form-unit-layout .js-href-en').attr( 'href' , $(this).attr('data-image-en'));

	$('.js-form-unit-layout .js-href-mobile-vn').attr( 'href' , $(this).attr('data-image-mobile-vn'));
	$('.js-form-unit-layout .js-href-mobile-en').attr( 'href' , $(this).attr('data-image-mobile-en'));

	$('.js-form-unit-layout .js-href-mobile-vn ').text( $(this).attr('data-image-mobile-vn'));
	$('.js-form-unit-layout .js-href-mobile-en').text($(this).attr('data-image-mobile-en'));
});


$('.js-form-unit-layout .btn-x , .js-mask-layer , .js-form-site-plan .btn-x').click(function(evt){
	$('.js-form-unit-layout').hide();
	$('.js-form-site-plan').hide();
	$('.js-mask-layer').hide();

	$('.js-form-site-plan .js-title').hide();
	$('.js-form-site-plan .js-img').hide();	
	$('.js-form-site-plan .js-file').hide();		
});



$('.js-site-plan .title-dots p').click(function(evt){
	$('.js-form-site-plan').show();
	$('.js-mask-layer').show();	
	$('.js-form-site-plan .unit-detail-img').css('background-color' , 'white');
	$('.js-form-site-plan .js-img').hide();	
	$('.js-form-site-plan .js-file').hide();	

	$('.js-form-site-plan .js-title-vn').val($(this).attr('data-title-vn'));
	$('.js-form-site-plan .js-title-en').val($(this).attr('data-title-en'));

	$('.js-form-site-plan .contentId').val($(this).attr('data-id'));
	$('.js-form-site-plan .catId').val('addTitle');
	$('.js-form-site-plan .js-title').show();
});


$('.js-site-plan .content-dots p').click(function(evt){
	$('.js-form-site-plan').show();
	$('.js-mask-layer').show();	
	$('.js-form-site-plan .unit-detail-img').css('background-color' , 'white');	


	$('.js-form-site-plan .contentId').val($(this).attr('data-id'));
	$('.js-form-site-plan .catId').val('addContent');
	$('.js-form-site-plan .js-img-vn').attr( 'src' , $(this).attr('data-image-vn'));
	$('.js-form-site-plan .js-img-en').attr( 'src' , $(this).attr('data-image-en'));
	$('.js-form-site-plan .js-title-vn').val($(this).attr('data-title-vn'));
	$('.js-form-site-plan .js-title-en').val($(this).attr('data-title-en'));
	
	$('.js-form-site-plan .js-title').show();
	$('.js-form-site-plan .js-img').show();	
	$('.js-form-site-plan .js-file').show();	
});