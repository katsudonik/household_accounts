<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Budget $Budget
 * @property PurchaseHistory $PurchaseHistory
 */
class Item extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Budget' => array(
			'className' => 'Budget',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PurchaseHistory' => array(
			'className' => 'PurchaseHistory',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	private $_virtualFields = array(
	    'name' => 'Item.name',
	    'budget_id' => 'Budget.id',
	    'budget_price' => 'Budget.price',
	    'price' => 'CASE WHEN PurchaseHistory.price IS NULL THEN 0 ELSE SUM(PurchaseHistory.price) END',
	    'remain' => 'CASE WHEN PurchaseHistory.price IS NULL THEN Budget.price ELSE  Budget.price - SUM(PurchaseHistory.price) END',
	);

	public function aggregate_monthly_purchase_by_item($conditions, $fields = [
	    'name',
	    'budget_id',
	    'budget_price',
	    'price',
	    'remain',])
	{
	    $this->virtualFields = $this->_virtualFields;

	    $records = Hash::extract($this->find('all', [
	        'fields' => $fields,
	        'group' => ['Item.id'],
	        'joins' => [
	            [
	                'type' => 'LEFT',
	                'table' => 'purchase_histories',
	                'alias' => 'PurchaseHistory',
	                'conditions' => array_merge($conditions, ['Item.id = PurchaseHistory.item_id',]),
	            ],
	            [
	                'type' => 'LEFT',
	                'table' => 'budgets',
	                'alias' => 'Budget',
	                'conditions' => ['Item.id = Budget.item_id',],
	            ],
	        ],
	    ]), '{n}.Item');
	    $this->virtualFields = [];
	    return $records;

	}
	public function aggregate_monthly_purchase($records)
	{
	    return [
	        'budget_price' => array_sum(Hash::extract($records, '{n}.budget_price')),
	        'price' => array_sum(Hash::extract($records, '{n}.price')),
	        'remain' => array_sum(Hash::extract($records, '{n}.remain')),
	    ];
	}

}
