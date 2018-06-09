<?php
class ForeignKey extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'foreign_key';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'drop_field' => array(
				'purchase_histories' => array('indexes' => array('item_id')),
			),
			'create_field' => array(
				'purchase_histories' => array(
					'indexes' => array(
						'item_id_idx' => array('column' => 'item_id', 'unique' => 0),
						'item_id_p_idx' => array('column' => 'item_id', 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'create_field' => array(
				'purchase_histories' => array(
					'indexes' => array(
						'item_id' => array('column' => 'item_id', 'unique' => 0),
					),
				),
			),
			'drop_field' => array(
				'purchase_histories' => array('indexes' => array('item_id_idx', 'item_id_p_idx')),
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
