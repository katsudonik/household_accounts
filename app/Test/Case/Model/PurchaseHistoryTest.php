<?php
App::uses('PurchaseHistory', 'Model');

/**
 * PurchaseHistory Test Case
 */
class PurchaseHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.purchase_history',
		'app.item',
		'app.budget'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PurchaseHistory = ClassRegistry::init('PurchaseHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PurchaseHistory);

		parent::tearDown();
	}

}
