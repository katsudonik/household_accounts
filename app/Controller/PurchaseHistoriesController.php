<?php
App::uses('AppController', 'Controller');
App::uses('PurchaseHistory', 'Model');
App::uses('Item', 'Model');

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
	public $components = array('Paginator');

	public $uses = array(
		'PurchaseHistory',
    	'Item',
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PurchaseHistory->recursive = 0;
		$ym = $this->request->query('ym') ? $this->request->query('ym') : date('Y-m');
		$this->set('purchaseHistories', $this->PurchaseHistory->find_monthly($ym));
		$aggregateItemHistories = $this->Item->aggregate_monthly_purchase_by_item($ym);
		$this->set('aggregateItemHistories', $aggregateItemHistories);
		$this->set('aggregateSumHistory', $this->Item->aggregate_monthly_purchase($aggregateItemHistories));
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PurchaseHistory->id = $id;
		if (!$this->PurchaseHistory->exists()) {
			throw new NotFoundException(__('Invalid purchase history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseHistory->delete()) {
			$this->Flash->success(__('The purchase history has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
