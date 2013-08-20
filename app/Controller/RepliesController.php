<?php
App::uses('AppController', 'Controller');
/**
 * Replies Controller
 *
 * @property Reply $Reply
 * @property PaginatorComponent $Paginator
 */
class RepliesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reply->create();
			if ($this->Reply->save($this->request->data)) {
				$this->Session->setFlash(__('The reply has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reply could not be saved. Please, try again.'));
			}
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
		$this->Reply->id = $id;
		if (!$this->Reply->exists()) {
			throw new NotFoundException(__('Invalid reply'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reply->delete()) {
			$this->Session->setFlash(__('Reply deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reply was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
