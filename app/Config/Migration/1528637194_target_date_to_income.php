<?php
class TargetDateToIncome extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'target_date_to_income';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'income_histories' => array(
					'target_start_date' => array('type' => 'date', 'null' => true, 'default' => null, 'after' => 'modified'),
					'target_end_date' => array('type' => 'date', 'null' => true, 'default' => null, 'after' => 'target_start_date'),
				),
				'purchase_histories' => array(
					'target_date' => array('type' => 'date', 'null' => false, 'default' => null, 'after' => 'item_id'),
				),
			),
			'alter_field' => array(
				'items' => array(
					'type' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 1, 'unsigned' => false),
				),
			),
			'drop_field' => array(
				'purchase_histories' => array('purchase_date'),
			),
		),
		'down' => array(
			'drop_field' => array(
				'income_histories' => array('target_start_date', 'target_end_date'),
				'purchase_histories' => array('target_date'),
			),
			'alter_field' => array(
				'items' => array(
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
				),
			),
			'create_field' => array(
				'purchase_histories' => array(
					'purchase_date' => array('type' => 'date', 'null' => false, 'default' => null),
				),
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
