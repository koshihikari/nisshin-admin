<?php

class IndexController extends AppController {
	var $layout = 'nisshin-bukken-0.0.1';

	public function beforeFilter() {
		// $this->Auth->allow('login', 'logout', 'add');
	}

	public function index() {
		$data = $this->getResidenceData('top');
		// $data = $this->getResidenceData('tokyo');
		// $data = $this->by_str_getcsv_explode('../../csv/tokyo(excel).csv');
			/*
			ob_start();//ここから
			var_dump($data);
			$out=ob_get_contents();//ob_startから出力された内容をゲットする。
			ob_end_clean();//ここまで
			error_log('-----------------' . "\n", 3, 'log.txt');
			error_log($out . "\n", 3, 'log.txt');
			error_log('-----------------' . "\n", 3, 'log.txt');
			*/
		$this->set(
			array(
				'title_for_layout'			=> '【公式】日神不動産の住まい-新築分譲マンション',
				'keywords'					=> 'マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '日神不動産の住まい情報総合サイトです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '【公式】日神不動産の住まい情報-首都圏の新築分譲マンション',
				'residence_data'			=> $data,
				'is_partner_company'		=> $this->params['isPartnerCompany'] ? true : false
			)
		);
		$this->render("../Contents/Index/indexInIndex");
	}
}
