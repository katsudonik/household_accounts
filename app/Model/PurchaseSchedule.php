<?php
App::uses('AppModel', 'Model');
/**
 * PurchaseSchedule Model
 *
 * @property Item $Item
 */
class PurchaseSchedule extends AppModel {

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

	//TODO save: if exists same item & end_date is null,

	public function save($data = null, $validate = true, $fieldList = []){
	    $result = parent::save($data);
	    if(!$result){
	        return false;
	    }

	    if(empty($data['PurchaseSchedule']['target_start_date']) && empty($data['PurchaseSchedule']['target_end_date']) && empty($record)){
	        return $result;
	    }

	    parent::create();
	    $record = $this->find('first', [
	        'conditions' => [
	            'NOT' => ['PurchaseSchedule.id' => $this->getLastInsertID()],
	            'target_date IS NULL',
	            'target_end_date IS NULL',
	            'item_id' => $data['PurchaseSchedule']['item_id']
	        ],
	    ]);

	    if(empty($record)){
	        return true;
	    }

        $record['PurchaseSchedule']['target_end_date'] = date('Y-m-d', strtotime("{$data['PurchaseSchedule']['target_start_date']} -1 day"));
        $this->set($record);
        return parent::save($record);
	}
}
