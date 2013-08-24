<?php
App::uses('AppController', 'Controller');
/**
 * Threads Controller
 *
 * @property Thread $Thread
 * @property PaginatorComponent $Paginator
 */
class ThreadsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Thread','Reply');
	public $components = array('Paginator');
/**
 * index method
 *
 * @return void
 */
	public function index($project_id = null) {
		$this->Thread->recursive = 0;
		$this->paginate = $this->Thread->findThread($project_id);
		$this->set('threads', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($project_id = null,$id = null) {
		if (!$this->Thread->exists($id)) {
			throw new NotFoundException(__('Invalid thread'));
		}
		$options = array('conditions' => array('Thread.id'=>$id));
		$this->set('thread', $this->Thread->find('first', $options));
		$this->paginate = $this->Reply->findReplies($id);
		$this->set('replies', $this->paginate('Reply'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Thread->create();
			if ($this->Thread->save($this->request->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array(
					'controller'=>'threads','action'=>'index','project_id'=>$this->request->data['Thread']['project_id']));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
				$this->redirect($this->referer());
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
	public function edit($project_id = null,$id = null) {
		if (!$this->Thread->exists($id)) {
			throw new NotFoundException(__('Invalid thread'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Thread->save($this->request->data)) {
				$this->Session->setFlash(__('The thread has been saved'));
				$this->redirect(array('action' => 'view','project_id'=>$project_id,'id'=>$id));
			} else {
				$this->Session->setFlash(__('The thread could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Thread.' . $this->Thread->primaryKey => $id));
			$this->request->data = $this->Thread->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($project_id,$id = null) {
		$this->Thread->id = $id;
		if (!$this->Thread->exists()) {
			throw new NotFoundException(__('Invalid thread'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Thread->delete()) {
			$this->Session->setFlash(__('Thread deleted'));
      $this->redirect(array('controller'=>'threads','action' => 'index','project_id'=>$project_id));
		}
		$this->Session->setFlash(__('Thread was not deleted'));
		$this->redirect(array('controller'=>'threads','action' => 'index','project_id'=>$project_id));
	}
}
