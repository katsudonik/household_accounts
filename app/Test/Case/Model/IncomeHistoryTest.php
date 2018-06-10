<?php
App::uses('IncomeHistory', 'Model');

/**
 * IncomeHistory Test Case
 */
class IncomeHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.income_history',
		'app.item',
		'app.budget',
		'app.purchase_history'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IncomeHistory = ClassRegistry::init('IncomeHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IncomeHistory);

		parent::tearDown();
	}

}
