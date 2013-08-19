<?php

App::uses('AppController', 'Controller');

/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

    public $uses = array('User', 'Project', 'Task', 'Todo');

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
        $this->Project->recursive = 0;
        $this->set('title_for_layout', 'プロジェクト一覧');
				$this->Session->write('Act_Project.id',$id);
        $this->set('projects', $this->Project->find('all'));
        if ($this->request->is('post')) {
            $this->Project->create();
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('新規にプロジェクトを追加しました'));
                $this->redirect($this->referer());
            } else {
							$this->Session->setFlash(__('新規プロジェクトの追加に失敗しました'));
            }
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Invalid project'));
        }
				$this->Session->write('Act_Project.id',$id);
        $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
        $this->set('project', $this->Project->find('first', $options));
        $this->Todo->recursive = 2;
        $options = array(
            'conditions' => array('Todo.project_id' => $id),
        );
        $this->set('todos', $this->Todo->find('all', $options));
    }

    public function tasklist($id = null) {
				$this->Session->write('Act_Project.id',$id);
        $this->view($id);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('プロジェクトの変更を保存しました'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('プロジェクトの変更を保存できませんでした。'));
            }
        } else {
            $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
            $this->request->data = $this->Project->find('first', $options);
        }
        $users = $this->Project->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('プロジェクトを削除しました'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('プロジェクトを削除できませんでした'));
        $this->redirect(array('action' => 'index'));
    }

}
