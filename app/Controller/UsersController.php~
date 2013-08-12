<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	
	public $uses = array('User');
	
	public $components = array('Paginator');
	
	public function beforeFilter() {
		$this->Auth->allow('add');
	}
	
	public function login() {
      
		if ($this->request->is('Post')) {
			
			if ($this->Auth->login()) {
				$sessionKey = $this->User->LoginUser($this->request->data['User']['username']);
				$this->Session->write('Login.Id',$sessionKey['User']['id']);
				$this->Session->write('Login.Nickname',$sessionKey['User']['nickname']);
				return $this->redirect(array('controller'=>'projects','action'=>'index'));
			}
			else {
				$this->Session->setFlash('ユーザー名かパスワードを間違えています!!');
			}
			
		}

	}
	
	public function logout() {
		$this->Auth->logout();
		$this->Session->setFlash('ログアウト完了');
		$this->Session->destroy();
		return $this->redirect(array('action'=>'login'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */	
public function view($id = null) {
    $this->set('title_for_layout', 'ユーザーの設定変更');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('新規ユーザーの登録完了'));
				$this->redirect(array('controller'=>'projects','action' => 'index'));
			} else {
				$this->Session->setFlash(__('新規ユーザーの追加に失敗しました。'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
        if ($this->request->data['User']['new_password1'] === $this->request->data['User']['new_password2']) {
            $this->request->data['User']['password'] = $this->request->data['User']['new_password1'];
            unset($this->request->data['User']['new_password1'],$this->request->data['User']['new_password2']);
        } else {
            $this->Session->setFlash(__('確認のパスワードが間違えています'));
            $this->redirect($this->referer());
            exit();
        }
        
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('ユーザーの設定変更を保存しました'));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('ユーザーの設定変更が保存出来ませんでした'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('ユーザーの削除を完了しました。'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('ユーザーの削除ができませんでした。'));
    $this->redirect($this->referer());
	}
}
