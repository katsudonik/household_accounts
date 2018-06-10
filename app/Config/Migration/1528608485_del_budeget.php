<?php
class DelBudeget extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'del_budeget';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'income_schedules' => array(
					'target_date' => array('type' => 'date', 'null' => true, 'default' => null),
				),
				'purchase_schedules' => array(
					'target_date' => array('type' => 'date', 'null' => true, 'default' => null),
					'target_start_date' => array('type' => 'date', 'null' => true, 'default' => null),
					'target_end_date' => array('type' => 'date', 'null' => true, 'default' => null),
				),
			),
			'drop_table' => array(
				'budgets'
			),
		),
		'down' => array(
			'alter_field' => array(
				'income_schedules' => array(
					'target_date' => array('type' => 'date', 'null' => false, 'default' => null),
				),
				'purchase_schedules' => array(
					'target_date' => array('type' => 'date', 'null' => false, 'default' => null),
					'target_start_date' => array('type' => 'date', 'null' => false, 'default' => null),
					'target_end_date' => array('type' => 'date', 'null' => false, 'default' => null),
				),
			),
			'create_table' => array(
				'budgets' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'price' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'item_id' => array('column' => 'item_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
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
