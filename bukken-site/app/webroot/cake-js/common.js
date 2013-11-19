$(window).load(function() {
	// console.log('start');
// $(function() {
	$('.menu-wrapper > div').tile();

	$('.return-to-top').on('click', function(event) {
		$('body, html').animate(
			{
				scrollTop: 0
			},
			500
		);
		return false;
	});




	$('div.floating-widget').exFlexFixed({
		container : 'div.content-wrapper',
		watchPosition : true,
		watchCallback : function(fixed_API){
		}
	});



	// #で始まるアンカーをクリックした場合に処理
	$('a[href^=#]').click(function() {
		// スクロールの速度
		var speed = 500;// ミリ秒
		// アンカーの値取得
		var href= $(this).attr("href");
		// 移動先を取得
		var target = $(href == "#" || href == "" ? 'html' : href);
		// 移動先を数値で取得
		var position = target.offset().top;
		// スムーススクロール
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});
	// console.log('end');
});