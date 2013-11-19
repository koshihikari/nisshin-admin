
jQuery(document).ready(function($){
	$('#sortable').stupidtable();
	if (window.File) {
		var dropTarget = $('body');
		var DropUploader = new MYNAMESPACE.modules.helper.DropUploader(dropTarget, 'csv,html,jpg', 10, -1);
		DropUploader.setEvent(true);
		$(DropUploader)
			.on('onDragover', function(event) {
				console.log(event.type);
				dropTarget.addClass('dragover');
			})
			.on('onDragenter', function(event) {
				console.log(event.type);
			})
			.on('onDragleave', function(event) {
				dropTarget.removeClass('dragover');
				console.log(event.type);
			})
			.on('onDragend', function(event) {
				console.log(event.type);
				dropTarget.removeClass('dragover');
			})
			.on('onDrop', function(event) {
				console.log(event.type);
				dropTarget.removeClass('dragover');
			})
			.on('onErrorOverSupportFileNum', function(event) {
				console.log('数多すぎ');
			})
			.on('onErrorDifferentFileType', function(event) {
				console.log('拡張子違う');
			})
			.on('onErrorOverFileSize', function(event) {
				console.log('サイズでかい');
			})
			.on('onDropFile', function(event) {
				console.log('good');
			})
	}
});
