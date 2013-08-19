<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'username' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					array(
						'rule' => array('isUnique'),
						'message' => '既に登録されているユーザー名です',
					),
					'between' => array(
						'rule'=> array('between',2,60),
						'message' => 'ユーザーIDは2〜60字以内で入力してください',
					),
					'alphaNumeric' => array(
						'rule'=> array('alphaNumeric'),
						'message' => 'ユーザー名は半角英数字のみ有効です',
					),
				),
			'password' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					'between' => array(
						'rule'=> array('between',2,60),
						'message' => 'パスワードは2〜60字以内で入力してください',
					),
					'alphaNumeric' => array(
						'rule'=> array('alphaNumeric'),
						'message' => 'パスワードは半角英数字のみ有効です',
					),
				),
			'nickname' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
						),
					),
					'between' => array(
						'rule'=> array('between',2,60),
						'message' => '表示名(ニックネーム)は2〜60字以内(全角30字以内)で入力してください',
					),
	);
	
	function beforeSave ($options = array()) {
		if(!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true ;
	}
	
	function LoginUser ($key) {
		$options = array(
			'conditions' => array ('User.username' => $key )
		);
		return $this->find('first',$options);
	}
	
}
