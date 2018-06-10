<?php
App::uses('AppModel', 'Model');
/**
 * IncomeSchedule Model
 *
 * @property Item $Item
 */
class IncomeSchedule extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'item_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function save($data = null, $validate = true, $fieldList = []){
	    if(empty($data['IncomeSchedule']['target_start_date'])
	        && empty($data['IncomeSchedule']['target_date'])){
	            return false;
	    }

	    $result = parent::save($data, $validate, $fieldList);
	    if(!$result){
	        return false;
	    }

	    if(empty($data['IncomeSchedule']['target_start_date']) && empty($data['IncomeSchedule']['target_end_date']) && empty($record)){
	        return $result;
	    }

	    parent::create();
	    $record = $this->find('first', [
	        'conditions' => [
	            'NOT' => ['IncomeSchedule.id' => $this->getLastInsertID()],
	            'target_date IS NULL',
	            'target_end_date IS NULL',
	            'item_id' => $data['IncomeSchedule']['item_id']
	        ],
	    ]);

	    if(empty($record)){
	        return true;
	    }

	    $record['IncomeSchedule']['target_end_date'] = date('Y-m-d', strtotime("{$data['IncomeSchedule']['target_start_date']} -1 day"));
	    $this->set($record);
	    return parent::save($record);
	}
}
