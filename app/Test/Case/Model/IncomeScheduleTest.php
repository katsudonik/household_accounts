<?php
App::uses('IncomeSchedule', 'Model');

/**
 * IncomeSchedule Test Case
 */
class IncomeScheduleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.income_schedule',
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
		$this->IncomeSchedule = ClassRegistry::init('IncomeSchedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IncomeSchedule);

		parent::tearDown();
	}

}
