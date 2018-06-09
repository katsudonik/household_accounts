<?php
class AddTypeToItems extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'AddTypeToItems';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'drop_field' => array(
				'budgets' => array('dalete_flag', 'daleted'),
				'items' => array('dalete_flag', 'daleted', 'indexes' => array('name')),
				'purchase_histories' => array('dalete_flag', 'daleted'),
			),
			'create_field' => array(
				'items' => array(
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false, 'after' => 'modified'),
					'indexes' => array(
						'name' => array('column' => 'name', 'unique' => 1),
					),
				),
			),
			'alter_field' => array(
				'items' => array(
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
			),
		),
		'down' => array(
			'create_field' => array(
				'budgets' => array(
					'dalete_flag' => array('type' => 'boolean', 'null' => true, 'default' => null),
					'daleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
				),
				'items' => array(
					'dalete_flag' => array('type' => 'boolean', 'null' => true, 'default' => null),
					'daleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'name' => array(),
					),
				),
				'purchase_histories' => array(
					'dalete_flag' => array('type' => 'boolean', 'null' => true, 'default' => null),
					'daleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
				),
			),
			'drop_field' => array(
				'items' => array('type', 'indexes' => array('name')),
			),
			'alter_field' => array(
				'items' => array(
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
