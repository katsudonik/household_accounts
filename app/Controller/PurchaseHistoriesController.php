<?php
App::uses('AppController', 'Controller');
App::uses('PurchaseHistory', 'Model');
App::uses('Item', 'Model');
App::uses('Query', 'Utility');

/**
 * PurchaseHistories Controller
 *
 * @property PurchaseHistory $PurchaseHistory
 * @property PaginatorComponent $Paginator
 */
class PurchaseHistoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator',
	    'RequestHandler',
	);
	public $uses = array(
		'PurchaseHistory',
    	'Item',
	);

	const API_ACTIONS = [
	    'aggregate_c3',
	    'aggregate_c3_item',
	    'aggregate_c3_all',
	    'delete_ajax',
	];

	public function beforeFilter() {
	    parent::beforeFilter();

	    if(in_array($this->action, self::API_ACTIONS)){
	        $this->RequestHandler->renderAs($this, 'json');
	    }
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->_index();
    }

	public function aggregate_c3() {
	    $ym = $this->_param('ym', date('Y-m'));
	    $aggregateItemHistories = $this->Item->agg_of_month($ym);

	    $this->set(array(
	        'aggregateItemHistories' => $aggregateItemHistories,
	        '_serialize' => array('aggregateItemHistories')
	    ));
	}


	/*
	 * 全集計
	 */
	public function sum_all(){
	    $this->PurchaseHistory->recursive = 0;

	    $resultSet = $this->Item->sum_all($this->_param('end', date('Y-m-d')));
        foreach($resultSet as $k => $v){
            $this->set($k, $v);
        }
	}

	/*
	 * 年集計一覧
	 */
	public function aggregate_by_year(){
	    $this->PurchaseHistory->recursive = 0;

	    $year = $this->_param('y', date('Y'));
	    $aggregateItemHistories = $this->Item->agg_of_year($year, [], ['name', 'price',]);
	    $this->set('aggregateItemHistories', $aggregateItemHistories);
	    $this->set('aggregateSumHistory', $this->Item->aggregate_monthly_purchase($aggregateItemHistories));
	}

	/*
	 * 月集計一覧
	 */
	public function aggregate_by_month(){
	    $ym = $this->_param('ym', date('Y-m'));

	    $aggregateItemHistories = $this->Item->agg_of_month($ym);
	    $this->set('aggregateItemHistories', $aggregateItemHistories);
	    $this->set('aggregateSumHistory', $this->Item->aggregate_monthly_purchase($aggregateItemHistories));
	    $this->set('ym', $ym);
	}


	public function aggregate_c3_item(){
	    $year = $this->_param('y', date('Y'));
	    $aggregateItemHistories = $this->Item->agg_of_year($year, [], ['name', 'price',]);
	    $this->set('aggregateItemHistories', $aggregateItemHistories);

	    $this->set(array(
	        'aggregateItemHistories' => $aggregateItemHistories,
	        '_serialize' => array('aggregateItemHistories')
	    ));
	}


	public function aggregate_c3_all() {
	    $year = $this->_param('y', date('Y'));
	    $start = strtotime($year . '-01-01');
	    $end = strtotime($year . '-12-01');
	    $ret = $this->range_month($start, $end);

	    $prices = [];
	    foreach($ret as $ym){
	        $aggregateItemHistories = $this->Item->agg_of_month($ym);
	        $namesPrice = Hash::combine($aggregateItemHistories, '{n}.name', '{n}.price');

	        foreach($namesPrice as $name => $price){
	            $_prices[$name][] = $price;
	        }
	    }
	    $c3data = [];
	    foreach($_prices as $name => $prices){
	        $c3data[] = array_merge([$name], $prices);
        }


	    $this->set(array(
	        'aggregateItemHistories' => $c3data,
	        '_serialize' => array('aggregateItemHistories')
	    ));
	}


	private function _param($key, $default = null){
	    $ym = $this->request->query($key);
	    return $ym ? $ym : $default;
	}

	private function range_month($start, $end)
	{
	    $ret=array();
	    $tmp = $start;
	    while($tmp <= $end){
	        $ret[(date('Y-m', $tmp))] = date('Y-m', $tmp);
	        $tmp = strtotime('+1 month', $tmp);
	    }
	    return $ret;
	}

	private function _index()
	{
	    $ym = $this->_param('ym', date('Y-m'));
	    $this->set('purchaseHistories', $this->PurchaseHistory->find_monthly(Query::conditions_month('target_date', $ym)));
	    $this->set('ym', $ym);
	    $items = $this->PurchaseHistory->Item->find('list');
	    $this->set(compact('items'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PurchaseHistory->exists($id)) {
			throw new NotFoundException(__('Invalid purchase history'));
		}
		$options = array('conditions' => array('PurchaseHistory.' . $this->PurchaseHistory->primaryKey => $id));
		$this->set('purchaseHistory', $this->PurchaseHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PurchaseHistory->create();
			if ($this->PurchaseHistory->save($this->request->data)) {
				$this->Flash->success(__('The purchase history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase history could not be saved. Please, try again.'));
			}
		}
		$items = $this->PurchaseHistory->Item->find('list');
		$this->set(compact('items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PurchaseHistory->exists($id)) {
			throw new NotFoundException(__('Invalid purchase history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseHistory->save($this->request->data)) {
				$this->Flash->success(__('The purchase history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseHistory.' . $this->PurchaseHistory->primaryKey => $id));
			$this->request->data = $this->PurchaseHistory->find('first', $options);
		}
		$items = $this->PurchaseHistory->Item->find('list');
		$this->set(compact('items'));
	}


	public function bulk_edit() {
	    if ($this->request->is(array('post', 'put'))) {
    	    $keys = array_keys($this->request->data('PurchaseHistory'));
    	    foreach($this->request->data('PurchaseHistory.id') as $i => $v){
    	        $records[$i] = array_combine($keys, Hash::extract($this->request->data('PurchaseHistory'), "{s}.{$i}"));
    	    }
    	    $this->PurchaseHistory->saveAll($records);
	    }
	    $this->_index();
	    $this->render('index');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_ajax() {
	    $this->PurchaseHistory->id = $this->request->data('id');
		if (!$this->PurchaseHistory->exists()) {
			throw new NotFoundException(__('Invalid purchase history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseHistory->delete()) {
		} else {
		}
		$this->set(array(
		    '_serialize' => array()
		));

	}
}
