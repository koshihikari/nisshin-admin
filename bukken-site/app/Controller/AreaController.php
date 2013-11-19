<?php

class AreaController extends AppController {
	var $layout = 'nisshin-bukken-0.0.1';

	public function beforeFilter() {
	}

	public function tokyo() {
		$data = $this->getResidenceData('tokyo');
		$this->set(
			array(
				'title_for_layout'			=> '東京都の新築分譲マンション｜日神不動産の住まい',
				'keywords'					=> '東京,マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '東京エリアの新築分譲マンション一覧のページです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '東京都の新築マンション｜日神不動産の新築分譲マンション',
				'area'						=> 'tokyo',
				'residence_data'			=> $data
			)
		);
		$this->render("../Contents/Area/pageInArea");
	}

	public function kanagawa() {
		$data = $this->getResidenceData('kanagawa');
		$this->set(
			array(
				'title_for_layout'			=> '神奈川県の新築分譲マンション｜日神不動産の住まい',
				'keywords'					=> '神奈川神奈川,マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '神奈川エリアの新築分譲マンション一覧のページです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '神奈川県の新築マンション｜日神不動産の新築分譲マンション',
				'area'						=> 'kanagawa',
				'residence_data'			=> $data
			)
		);
		$this->render("../Contents/Area/pageInArea");
	}

	public function chiba() {
		$data = $this->getResidenceData('chiba');
		$this->set(
			array(
				'title_for_layout'			=> '千葉県の新築分譲マンション｜日神不動産の住まい',
				'keywords'					=> '千葉,マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '千葉エリアの新築分譲マンション一覧のページです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '千葉県の新築マンション｜日神不動産の新築分譲マンション',
				'area'						=> 'chiba',
				'residence_data'			=> $data
			)
		);
		$this->render("../Contents/Area/pageInArea");
	}

	public function saitama() {
		$data = $this->getResidenceData('saitama');
		$this->set(
			array(
				'title_for_layout'			=> '埼玉県の新築分譲マンション｜日神不動産の住まい',
				'keywords'					=> '埼玉,マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '埼玉エリアの新築分譲マンション一覧のページです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '埼玉県の新築マンション｜日神不動産の新築分譲マンション',
				'area'						=> 'saitama',
				'residence_data'			=> $data
			)
		);
		$this->render("../Contents/Area/pageInArea");
	}

	public function all() {
		$data = $this->getResidenceData('all');
		$this->set(
			array(
				'title_for_layout'			=> '物件一覧｜日神不動産の住まい',
				'keywords'					=> '物件一覧,マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '日神不動産の住まい情報総合サイト、物件一覧のページです。首都圏の新築分譲マンションに特化した情報をお探しの方は日神不動産にお任せください。新築分譲マンションの総合デベロッパーとして、【パレステージ】シリーズ、【デュオステージ】シリーズを展開しています。',
				'h1'						=> '物件一覧｜日神不動産の新築分譲マンション',
				'area'						=> 'all',
				'residence_data'			=> $data
			)
		);
		$this->render("../Contents/Area/pageInArea");
	}
}
