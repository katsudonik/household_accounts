<?php
class DelHistoriesStartEndDate extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'del_histories_start_end_date';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'drop_field' => array(
				'income_histories' => array('target_start_date', 'target_end_date'),
			),
			'alter_field' => array(
				'income_histories' => array(
					'income_date' => array('type' => 'date', 'null' => true, 'default' => null),
				),
			),
		),
		'down' => array(
			'create_field' => array(
				'income_histories' => array(
					'target_start_date' => array('type' => 'date', 'null' => true, 'default' => null),
					'target_end_date' => array('type' => 'date', 'null' => true, 'default' => null),
				),
			),
			'alter_field' => array(
				'income_histories' => array(
					'income_date' => array('type' => 'date', 'null' => false, 'default' => null),
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
