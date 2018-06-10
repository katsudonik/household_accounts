<?php
App::uses('AppController', 'Controller');
/**
 * IncomeSchedules Controller
 *
 * @property IncomeSchedule $IncomeSchedule
 * @property PaginatorComponent $Paginator
 */
class IncomeSchedulesController extends AppController {

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
		$this->IncomeSchedule->recursive = 0;
		$this->set('incomeSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IncomeSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid income schedule'));
		}
		$options = array('conditions' => array('IncomeSchedule.' . $this->IncomeSchedule->primaryKey => $id));
		$this->set('incomeSchedule', $this->IncomeSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IncomeSchedule->create();
			if ($this->IncomeSchedule->save($this->request->data)) {
				$this->Flash->success(__('The income schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The income schedule could not be saved. Please, try again.'));
			}
		}
		$items = $this->IncomeSchedule->Item->find('list');
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
		if (!$this->IncomeSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid income schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IncomeSchedule->save($this->request->data)) {
				$this->Flash->success(__('The income schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The income schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IncomeSchedule.' . $this->IncomeSchedule->primaryKey => $id));
			$this->request->data = $this->IncomeSchedule->find('first', $options);
		}
		$items = $this->IncomeSchedule->Item->find('list');
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
		$this->IncomeSchedule->id = $id;
		if (!$this->IncomeSchedule->exists()) {
			throw new NotFoundException(__('Invalid income schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IncomeSchedule->delete()) {
			$this->Flash->success(__('The income schedule has been deleted.'));
		} else {
			$this->Flash->error(__('The income schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
