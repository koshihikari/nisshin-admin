<?php

class Uploader_GetItemsAction extends AppModel {
	public $useTable = false;

	/*
	 * アイテム取得メソッド
	 * @param	$request		ブラウザから送信されたデータ
	 * @return	json
	 */
	public function getItems($path) {
		// return array(
		// 	array('fileName' => 'aaa', 'date' => '2012/03/13'),
		// 	array('fileName' => 'ccc', 'date' => '2012/03/12'),
		// 	array('fileName' => 'bbb', 'date' => '2012/03/11')
		// );
		$filesInfo = $this->getFiles($path);

		// $directories = array();
		$files = array();
		$searches = array();
		$keies = array('directories', 'files');
		foreach ($keies as $index => $key) {
			foreach ($filesInfo[$key] as $val) {
				$searches[$key][] = $val['name'];
			}
		}
		if (isset($searches['directories'])) {
			array_multisort($searches['directories'], $filesInfo['directories']);
		}
		if (isset($searches['files'])) {
			array_multisort($searches['files'], $filesInfo['files']);
		}

		// ob_start();//ここから
		// var_dump($filesInfo);
		// $out=ob_get_contents();//ob_startから出力された内容をゲットする。
		// ob_end_clean();//ここまで
		// error_log('-----------------' . "\n", 3, 'log.txt');
		// error_log($out . "\n", 3, 'log.txt');
		// error_log('-----------------' . "\n", 3, 'log.txt');
		return $filesInfo;
	}

	function getFiles($dir) {
		$data = array('directories'=>array(), 'files'=>array());
		$files = scandir($dir);
		for ($i=0,$len=count($files); $i<$len; $i++) {
			if ($files[$i] === '.' || $files[$i] === '..' || strpos($files[$i], '.') === 0) {
				continue;
			}
			$path = $dir . $files[$i];
			// if (preg_match('/\/$/', $files[$i]) !== 1) {
			// 	$linkPath = $files[$i] . '/';
			// } else {
			// 	$linkPath = $files[$i];
			// }
			if(is_dir($path)) {
				if (preg_match('/\/$/', $path) !== 1) {
					$linkPath = $path . '/';
				}
				$linkPath = str_replace('../../data/', '', $linkPath);
				$tmp = array('name'=>$files[$i], 'linkPath'=>$linkPath, 'date'=>date('Y年m月d日 H時i分s秒', filemtime($path)));
				array_push($data['directories'], $tmp);
				// $fileInfo = $this->getFiles($path);
				// $data['directories'] = array_merge($data['directories'], $fileInfo['directories']);
				// $data['files'] = array_merge($data['files'], $fileInfo['files']);
			} else {
				$tmp = array('name'=>$files[$i], 'linkPath'=>$path, 'date'=>date('Y年m月d日 H時i分s秒', filemtime($path)));
				array_push($data['files'], $tmp);
			}
		}
		return $data;
	}
}
