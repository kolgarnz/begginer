$(document).ready(function(){
	if ( $(".bxslider").length>0 && $(".banner").length > 1){
		var slider = $(".bxslider").bxSlider({
			auto:true,
			onSlideAfter: function() {
				slider.stopAuto();
				slider.startAuto();
				}
		});
	}
	else
	{
		$(".bxslider").bxSlider({
			auto:false
		});
	}
})