<?php
class IncomePurchaseSchedule extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'income_purchase_schedule';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'purchase_histories' => array(
					'store_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'modified'),
					'purchases' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'store_name'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'purchase_histories' => array('store_name', 'purchases'),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
