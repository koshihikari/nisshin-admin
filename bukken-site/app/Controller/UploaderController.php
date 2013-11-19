<?php

class UploaderController extends AppController {
	var $layout = 'nisshin-bukken-admin-0.0.1';

	public function beforeFilter() {
		// $this->Auth->allow('login', 'logout', 'add');
	}

	public function index() {
		$path = '../../data/';
		// if (isset($this->params['named']['path']) && $this->params['named']['path'] !== null) {
			// $path .= $this->params['named']['path'];
		if (isset($this->request->query) && isset($this->request->query['path']) && $this->request->query['path'] !== null) {
			$path .= $this->request->query['path'];
		}
		// if (isset($this->params) && $this->params['path'] !== null) {
		// 	$path .= $this->params['path'];
		// }
		// $path = (isset($this->params) && $this->params['path'] === null) ? '../../data/' : $this->params['path'];
		ob_start();//ここから
		var_dump($this->query['path']);
		$out=ob_get_contents();//ob_startから出力された内容をゲットする。
		ob_end_clean();//ここまで
		error_log('-----------------' . "\n", 3, 'log.txt');
		error_log($path . "\n", 3, 'log.txt');
		error_log($out . "\n", 3, 'log.txt');
		error_log('-----------------' . "\n", 3, 'log.txt');

		$items = ClassRegistry::init('Uploader_GetItemsAction')->getItems($path);
		$this->set(
			array(
				'title_for_layout'			=> 'アップロード',
				'keywords'					=> '',
				'description'				=> '',
				'h1'						=> 'アップロード',
				'items'						=> $items
			)
		);
		$this->render("../Contents/Uploader/indexInUploader");
	}
}
