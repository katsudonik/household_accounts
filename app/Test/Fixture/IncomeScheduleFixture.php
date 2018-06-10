<?php
/**
 * IncomeSchedule Fixture
 */
class IncomeScheduleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'target_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false),
		'memo' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'target_start_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'target_end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'item_id' => array('column' => 'item_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'target_date' => '2018-06-09',
			'price' => 1,
			'memo' => 'Lorem ipsum dolor sit amet',
			'created' => '2018-06-09 22:54:49',
			'modified' => '2018-06-09 22:54:49',
			'target_start_date' => '2018-06-09',
			'target_end_date' => '2018-06-09'
		),
	);

}
