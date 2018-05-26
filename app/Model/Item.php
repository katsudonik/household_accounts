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

	public function aggregate_monthly_purchase($ym)
	{
	    return $this->find('all', [
	        'fields' => [
	           'Item.name',
	           'SUM(PurchaseHistory.price) AS price',
	           'Budget.price - SUM(PurchaseHistory.price) AS remain'
	        ],
	        'group' => ['Item.id'],
	        'joins' => [
	            [
	                'type' => 'LEFT',
	                'table' => 'purchase_histories',
	                'alias' => 'PurchaseHistory',
	                'conditions' => array_merge($this->conditions_this_month($ym), ['Item.id = PurchaseHistory.item_id',]),
	            ],
	            [
	                'type' => 'LEFT',
	                'table' => 'budgets',
	                'alias' => 'Budget',
	                'conditions' => ['Item.id = Budget.item_id',],
	            ],
	        ],
	    ]);
	}
}
