<?php

App::uses('AppController', 'Controller');

/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $uses = array('Task', 'Project');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Task->recursive = 0;
        $this->set('tasks', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('このタスクは存在しません'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('The task has been saved'));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
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
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('The task has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
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
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Task->delete()) {
            $this->Session->setFlash('タスクを削除しました');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash('タスクを削除できませんでした');
        $this->redirect($this->referer());
    }

    /*
    public function chk($id) {

        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }

        $this->request->onlyAllow('post', 'save');

        if ($this->request->is('ajax')) {
            if ($this->Task->saveField('status', 1)) {
                $this->autoRender = FALSE;
                $this->autoLayout = FALSE;
                $response = array('id' => $id);
                $this->Session->setFlash('サブタスクを完了しました');
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
    }
     
    */

    public function unchk($id = null) {
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->onlyAllow('post', 'save');
        if ($this->Task->saveField('status',0)) {
            $this->Session->setFlash('タスクを未完了状態に変更しました');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash('タスクの状態を変更できませんでした');
        $this->redirect($this->referer());
    }
    
    
    public function chk($id = null) {
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        
        $this->request->onlyAllow('post', 'save');
        if ($this->Task->saveField('status',1)) {
            $this->Session->setFlash('タスクを完了状態に変更しました');
            $this->redirect($this->referer());
        }
        
        $this->Session->setFlash('タスクの状態を変更できませんでした');
        $this->redirect($this->referer());
    }

}
