<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property PurchaseSchedule $PurchaseSchedule
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
		'PurchaseSchedule' => array(
			'className' => 'PurchaseSchedule',
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
		),
	    'IncomeSchedule' => array(
	        'className' => 'IncomeSchedule',
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
	    'IncomeHistory' => array(
	        'className' => 'IncomeHistory',
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
	    'schedule_id' => 'PurchaseSchedule.id',
	    'schedule_price' => 'SUM(PurchaseSchedule.price)',
	    'price' => 'CASE WHEN PurchaseHistory.price IS NULL THEN 0 ELSE SUM(PurchaseHistory.price) END',
	    'remain' => 'CASE WHEN PurchaseHistory.price IS NULL THEN SUM(PurchaseSchedule.price) ELSE  SUM(PurchaseSchedule.price) - SUM(PurchaseHistory.price) END',
	);

	public function agg_of_month($ym, $commonCond = [], $fields = [
	    'name',
	    'schedule_id',
	    'schedule_price',
	    'price',
	    'remain',]){
	    return $this->aggregate_purchase(
	        Query::conditions_month('PurchaseHistory.target_date', $ym),
	        $this->schedule_condition($ym, 'month'),
	        $commonCond,
	        $fields
	        );
	}

	private function schedule_condition($ymOrYear, $monthOrYear){
	    if(!in_array($monthOrYear, ['year', 'month', 'day'])){
	        return [];
	    }

	    $date = $monthOrYear == 'month' ? "{$ymOrYear}-01" : "{$ymOrYear}-01-01";
	    $targetTermDate = [
	        "PurchaseSchedule.target_start_date <= " => $date,
	        [
	          'OR' =>  [
	              "PurchaseSchedule.target_end_date >= " => $date,
	              "PurchaseSchedule.target_end_date IS NULL",
	          ]
	        ],

	    ];

	    $targetDate = [
	        "PurchaseSchedule.target_date >= " => $date,
	        "PurchaseSchedule.target_date < " => date('Y-m-d', strtotime("{$date} + 1 {$monthOrYear}")),
	    ];

	    return [
	        'OR' => [
	            $targetTermDate,
	            $targetDate,
	        ]
	    ];
	}


	public function agg_of_year($year, $commonCond = [], $fields = [
	    'name',
	    'schedule_id',
	    'schedule_price',
	    'price',
	    'remain',]){
	    return $this->aggregate_purchase(
	        Query::conditions_year('PurchaseHistory.target_date', $year),
	        $this->schedule_condition($year, 'year'),
	        $commonCond,
	        $fields
	        );
	}

	public function aggregate_purchase($historyCond = [], $scheduleCond = [], $commonCond = [], $fields = [
	    'name',
	    'schedule_id',
	    'schedule_price',
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
	                'conditions' => array_merge($historyCond, ['Item.id = PurchaseHistory.item_id',]),
	            ],
	            [
	                'type' => 'LEFT',
	                'table' => 'purchase_schedules',
	                'alias' => 'PurchaseSchedule',
	                'conditions' => array_merge($scheduleCond, ['Item.id = PurchaseSchedule.item_id'])
	            ],
	        ],
	        'conditions' => array_merge($commonCond, ['Item.type = 1']),
	    ]), '{n}.Item');
	    $this->virtualFields = [];
	    return $records;

	}

	public function aggregate_monthly_purchase($records)
	{
	    return [
	        'schedule_price' => array_sum(Hash::extract($records, '{n}.schedule_price')),
	        'price' => array_sum(Hash::extract($records, '{n}.price')),
	        'remain' => array_sum(Hash::extract($records, '{n}.remain')),
	    ];
	}

	public function sum_all(){

	    $incomeH = $this->IncomeHistory->find('first', [
	        'fields' => ['SUM(IncomeHistory.price) AS sum'],
	    ]);
	    $purchaseH = $this->PurchaseHistory->find('first', [
	        'fields' => ['SUM(PurchaseHistory.price) AS sum'],
	    ]);


	    $today = date('Y-m-d');
	    $incomeS = $this->IncomeSchedule->find('first', [
	        'fields' => ['SUM(IncomeSchedule.price) AS sum'],
	        'conditions' => [
	            "IncomeSchedule.target_date > " => $today,
	        ],
	    ]);

	    $purchaseS = $this->PurchaseSchedule->find('first', [
	        'fields' => ['SUM(PurchaseSchedule.price) AS sum'],
	        'conditions' => [
	            "PurchaseSchedule.target_date > " => $today,
	        ],
	    ]);

	    $history = $incomeH[0]['sum'] - $purchaseH[0]['sum'];
	    $schedule = $incomeS[0]['sum'] - $purchaseS[0]['sum'];
	    $toal = $history + $schedule;

	    return [
	        'incomeH' => $incomeH[0]['sum'],
	        'purchaseH' => $purchaseH[0]['sum'],
	        'incomeS' => $incomeS[0]['sum'],
	        'purchaseS' => $purchaseS[0]['sum'],
	        'history' => $history,
	        'schedule' => $schedule,
	        'toal' => $toal,
	    ];
	}
}
