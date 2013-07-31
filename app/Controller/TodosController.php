<?php
App::uses('AppController', 'Controller');
/**
 * Todos Controller
 *
 * @property Todo $Todo
 * @property PaginatorComponent $Paginator
 */
class TodosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $uses = array('Todo','Task');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Todo->recursive = 0;
		$this->set('todos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($project_id,$id) {
		if (!$this->Todo->exists($id)) {
			throw new NotFoundException(__('Invalid todo'));
		}
		$options = array(
			'conditions' => array(
				'Todo.id' => $id,
				'Todo.Project_id' =>$project_id,
			)
		);
		$this->set('todo', $this->Todo->find('first', $options));
		$options = array(
				'conditions' => array('Task.todo_id' => $id),
		);
		$this->Task->recursive = 2;
		$this->set('tasks',$this->Task->find('all', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Todo->create();
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('The todo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Todo->exists($id)) {
			throw new NotFoundException(__('Invalid todo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('The todo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
			$this->request->data = $this->Todo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Todo->id = $id;
		if (!$this->Todo->exists()) {
			throw new NotFoundException(__('Invalid todo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Todo->delete()) {
			$this->Session->setFlash(__('Todo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Todo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
