<?php
App::uses('AppModel', 'Model');
App::uses('PurchaseHistory', 'Model');
App::uses('PurchaseSchedule', 'Model');
/**
 * Item Model
 *
 * @property PurchaseSchedule $PurchaseSchedule
 * @property PurchaseHistory $PurchaseHistory
 */
class Item extends AppModel {


    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->PurchaseHistory = new PurchaseHistory();
        $this->PurchaseSchedule = new PurchaseSchedule();
    }

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
 	    'schedule_price' => 'PurchaseSchedule.price',
	    'price' => 'CASE WHEN PurchaseHistory.price IS NULL THEN 0 ELSE PurchaseHistory.price END',
	    'remain' => 'CASE WHEN PurchaseHistory.price IS NULL THEN PurchaseSchedule.price ELSE  PurchaseSchedule.price - PurchaseHistory.price END',
	);

	public function agg_of_month($ym, $commonCond = [], $fields = [
	    'name',
	    'schedule_price',
	    'price',
	    'remain',]){
	    return $this->aggregate_purchase(
	        Query::conditions_month('target_date', $ym),
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
	        "target_start_date <= " => $date,
	        [
	          'OR' =>  [
	              "target_end_date >= " => $date,
	              "target_end_date IS NULL",
	          ]
	        ],

	    ];

	    $targetDate = [
	        "target_date >= " => $date,
	        "target_date < " => date('Y-m-d', strtotime("{$date} + 1 {$monthOrYear}")),
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
	    'schedule_price',
	    'price',
	    'remain',]){
	    return $this->aggregate_purchase(
	        Query::conditions_year('target_date', $year),
	        $this->schedule_condition($year, 'year'),
	        $commonCond,
	        $fields
	        );
	}

	public function aggregate_purchase($historyCond = [], $scheduleCond = [], $commonCond = [], $fields = [
	    'name',
	    'schedule_price',
	    'price',
	    'remain',])
	{

	    $queryHistories = $this->getStatement($this->PurchaseHistory, 'all', ['item_id'], $historyCond, ['item_id', 'SUM(price) AS price']);
	    $querySchedules = $this->getStatement($this->PurchaseSchedule, 'all', ['item_id'], $scheduleCond, ['item_id', 'SUM(price) AS price']);

	    $this->virtualFields = $this->_virtualFields;

	    $records = Hash::extract($this->find('all', [
	        'fields' => $fields,
	        'group' => ['Item.id'],
	        'joins' => [
	            [
	                'type' => 'LEFT',
	                'table' => "({$queryHistories})",
	                'alias' => 'PurchaseHistory',
	                'conditions' => ['Item.id = PurchaseHistory.item_id',],
	            ],
	            [
	                'type' => 'LEFT',
	                'table' => "({$querySchedules})",
	                'alias' => 'PurchaseSchedule',
	                'conditions' => ['Item.id = PurchaseSchedule.item_id']
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

	public function sum_all($paramEnd){

	    $incomeH = $this->getSum($this->IncomeHistory->find('first', [
	        'fields' => ['SUM(IncomeHistory.price) AS sum'],
	    ]));
	    $purchaseH = $this->getSum($this->PurchaseHistory->find('first', [
	        'fields' => ['SUM(PurchaseHistory.price) AS sum'],
	    ]));


	    $today = date('Y-m-d');
	    $incomeS = $this->getSum($this->IncomeSchedule->find('first', [
	        'fields' => ['SUM(IncomeSchedule.price) AS sum'],
	        'conditions' => [
	            "IncomeSchedule.target_date > " => $today,
	        ],
	    ]));
	    $incomeS += $this->sumInTerm($this->IncomeSchedule, $paramEnd);


	    $purchaseS = $this->getSum($this->PurchaseSchedule->find('first', [
	        'fields' => ['SUM(PurchaseSchedule.price) AS sum'],
	        'conditions' => [
	            "PurchaseSchedule.target_date > " => $today,
	        ],
	    ]));
	    $purchaseS += $this->sumInTerm($this->PurchaseSchedule, $paramEnd);

	    $history = $incomeH - $purchaseH;
	    $schedule = $incomeS - $purchaseS;

	    return [
	        'incomeH' => $incomeH,
	        'purchaseH' => $purchaseH,
	        'incomeS' => $incomeS,
	        'purchaseS' => $purchaseS,
	        'history' => $history,
	        'schedule' => $schedule,
	        'toal' => $history + $schedule,
	    ];
	}

	private function getSum($records){
	    return $records[0]['sum'];
	}

	private function sumInTerm($model, $paramEnd){
	    $salaryDay = '10';

	    $terms = $model->find('all', [
	        'fields' => [
	            'price',
	            'target_start_date AS start',
	            'target_end_date AS end'
	        ],
	        'conditions' => [
	            "target_date IS NULL",
	            "target_start_date IS NOT NULL",
	            [
	                'OR' => [
	                    "target_end_date >=" => date('Y-m-d'),
	                    "target_end_date IS NULL",
	                ]
	            ],
	        ],
	    ]);

	    $sum = 0;
	    foreach($terms as $term){
	        $today = strtotime(date('Y-m-d'));
	        $start = strtotime($term[get_class($model)]['start']);
	        $start = $today < $start ? $start : $today;
	        $end = $term[get_class($model)]['end'];
	        $end = !empty($end) ? strtotime($end) : strtotime($paramEnd);

	        $tmp = strtotime(date('Y-m-', $start) . $salaryDay);

	        while($tmp <= $end){
	            if($start < $tmp && $tmp < $end){
	                $sum += $term[get_class($model)]['price'];
	            }
	            $tmp = strtotime('+1 month', $tmp);
	        }

	    }

	    return $sum;
	}
}
