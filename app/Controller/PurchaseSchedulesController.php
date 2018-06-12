<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseSchedules Controller
 *
 * @property PurchaseSchedule $PurchaseSchedule
 * @property PaginatorComponent $Paginator
 */
class PurchaseSchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PurchaseSchedule->recursive = 0;
		$this->set('purchaseSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PurchaseSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid purchase schedule'));
		}
		$options = array('conditions' => array('PurchaseSchedule.' . $this->PurchaseSchedule->primaryKey => $id));
		$this->set('purchaseSchedule', $this->PurchaseSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PurchaseSchedule->create();
			if ($this->PurchaseSchedule->save($this->request->data)) {
				$this->Flash->success(__('The purchase schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase schedule could not be saved. Please, try again.'));
			}
		}
		$items = $this->PurchaseSchedule->Item->find('list', ['conditions' => ['Item.type' => 1]]);
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
		if (!$this->PurchaseSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid purchase schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseSchedule->save($this->request->data)) {
				$this->Flash->success(__('The purchase schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseSchedule.' . $this->PurchaseSchedule->primaryKey => $id));
			$this->request->data = $this->PurchaseSchedule->find('first', $options);
		}
		$items = $this->PurchaseSchedule->Item->find('list', ['conditions' => ['Item.type' => 1]]);
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
		$this->PurchaseSchedule->id = $id;
		if (!$this->PurchaseSchedule->exists()) {
			throw new NotFoundException(__('Invalid purchase schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseSchedule->delete()) {
			$this->Flash->success(__('The purchase schedule has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
