// $(function() {
$(window).load(function() {
	// $('.residence-item').tile(2);
	// $('.cc_resiBox').tile(4);
	$('.cc_resiName').tile(4);
	$('.cc_resiTexts').tile(4);

	var ua = navigator.userAgent;
	if ((ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 )) {
		if(confirm('スマートフォン用のページに遷移しますか？')) {
			location.href = 'http://ns-mb.jp/';
		}
	}
});
