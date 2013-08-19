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
				$this->Session->setFlash('ようこそ '.$sessionKey['User']['nickname'].' さん','flash_success');
				return $this->redirect(array('controller'=>'projects','action'=>'index'));
			}
			else {
				$this->Session->setFlash('ユーザー名かパスワードを間違えています!!','flash_error');
			}
			
		}

	}
	
	public function logout() {
		$this->Auth->logout();
		$this->Session->destroy();
		$this->Session->setFlash('ログアウト完了','flash_success');
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
		   if ($this->request->data['User']['password1'] === $this->request->data['User']['password2']) {
            $this->request->data['User']['password'] = $this->request->data['User']['password1'];
            unset($this->request->data['User']['password1'],$this->request->data['User']['password2']);
            		      
						$this->User->create();
						if ($this->User->save($this->request->data)) {
							$this->Session->setFlash('新規ユーザーの登録完了','flash_success');
							$this->redirect(array('controller'=>'projects','action' => 'index'));
						} else {
							$this->Session->setFlash('新規ユーザーの追加に失敗しました','flash_error');
							$this->redirect($this->referer());
						}
						
        } else {
            $this->Session->setFlash('確認のパスワードが間違えています','flash_error');
            $this->redirect($this->referer());
            exit();
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
            $this->Session->setFlash('確認のパスワードが間違えています','flash_error');
            $this->redirect($this->referer());
            exit();
        }
        
			if ($this->User->save($this->request->data)) {
        $sessionKey = $this->User->LoginUser($this->request->data['User']['username']);
        $this->Session->write('Login.Nickname',$sessionKey['User']['nickname']);
				$this->Session->setFlash('ユーザーの設定変更を保存しました','flash_success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('ユーザーの設定変更が保存出来ませんでした','flash_error');
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
			$this->Session->setFlash('ユーザーの削除を完了しました','flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash('ユーザーの削除ができませんでした','flash_error');
    $this->redirect($this->referer());
	}
}
