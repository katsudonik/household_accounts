<?php
App::uses('AppController', 'Controller');
/**
 * IncomeHistories Controller
 *
 * @property IncomeHistory $IncomeHistory
 * @property PaginatorComponent $Paginator
 */
class IncomeHistoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
          'Paginator' => array(
            'order' => array('IncomeHistory.income_date' => 'asc')
        )
);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IncomeHistory->recursive = 0;
		$this->set('incomeHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IncomeHistory->exists($id)) {
			throw new NotFoundException(__('Invalid income history'));
		}
		$options = array('conditions' => array('IncomeHistory.' . $this->IncomeHistory->primaryKey => $id));
		$this->set('incomeHistory', $this->IncomeHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IncomeHistory->create();
			if ($this->IncomeHistory->save($this->request->data)) {
				$this->Flash->success(__('The income history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The income history could not be saved. Please, try again.'));
			}
		}
		$items = $this->IncomeHistory->Item->find('list', ['conditions' => ['Item.type' => 2]]);
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
		if (!$this->IncomeHistory->exists($id)) {
			throw new NotFoundException(__('Invalid income history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IncomeHistory->save($this->request->data)) {
				$this->Flash->success(__('The income history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The income history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IncomeHistory.' . $this->IncomeHistory->primaryKey => $id));
			$this->request->data = $this->IncomeHistory->find('first', $options);
		}
		$items = $this->IncomeHistory->Item->find('list', ['conditions' => ['Item.type' => 2]]);
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
		$this->IncomeHistory->id = $id;
		if (!$this->IncomeHistory->exists()) {
			throw new NotFoundException(__('Invalid income history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IncomeHistory->delete()) {
			$this->Flash->success(__('The income history has been deleted.'));
		} else {
			$this->Flash->error(__('The income history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
