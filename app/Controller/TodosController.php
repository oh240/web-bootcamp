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
                $this->Session->setFlash(__('新規メインタスクを追加しました'));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('新規メインタスクの追加に失敗しました'));
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
                $this->Session->setFlash(__('メインタスクの変更を保存しました'));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('メインタスクの変更の保存に失敗しました。'));
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
            $this->Session->setFlash(__('メインタスクを削除しました。'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('メインタスクの削除に失敗しました。'));
        $this->redirect($this->referer());
    }

}
