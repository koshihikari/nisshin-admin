<?php

class ConceptController extends AppController {
	var $layout = 'nisshin-bukken-0.0.1';

	public function beforeFilter() {
		// $this->Auth->allow('login', 'logout', 'add');
	}

	public function concept() {
		$this->set(
			array(
				'title_for_layout'			=> 'コンセプト｜日神不動産の住まい',
				'keywords'					=> 'マンション,新築マンション,新築分譲マンション,日神不動産,パレステージ',
				'description'				=> '日神不動産のブランドコンセプトページです。私たちは常に、その空間に住まう家族のライフシーンを思い描くことから、新しいマンションの在り方を構想します。日常的な視点から暮らしを見据え、家族をテーマにした永住空間として資質の向上を図っています。',
				'h1'						=> 'コンセプト｜日神不動産の新築分譲マンション'
			)
		);
		$this->render("../Contents/Concept/conceptInConcept");
	}
}
