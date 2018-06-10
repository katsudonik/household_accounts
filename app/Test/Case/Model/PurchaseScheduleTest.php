<?php
App::uses('PurchaseSchedule', 'Model');

/**
 * PurchaseSchedule Test Case
 */
class PurchaseScheduleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.purchase_schedule',
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
		$this->PurchaseSchedule = ClassRegistry::init('PurchaseSchedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PurchaseSchedule);

		parent::tearDown();
	}

}
