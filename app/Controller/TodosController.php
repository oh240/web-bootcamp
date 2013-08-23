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
    public $uses = array('Todo', 'Task');

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Todo->create();
            if ($this->Todo->save($this->request->data)) {
                $this->Session->setFlash('新規メインタスクを追加しました','flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash('新規メインタスクの追加に失敗しました','flash_error');
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
    public function edit($id = null) {
        if (!$this->Todo->exists($id)) {
            throw new NotFoundException(__('Invalid todo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Todo->save($this->request->data)) {
                $this->Session->setFlash('メインタスクの変更を保存しました','flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash('メインタスクの変更の保存に失敗しました。','flash_error');

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
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Todo->delete()) {
			$this->Session->setFlash('メインタスクの削除に成功しました','flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash('メインタスクの投稿に失敗しました','flash_error');
		$this->redirect($this->referer());
	}

}
