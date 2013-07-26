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
				),
				'Unique' => array(
					'rule' => array('isUnique'),
					'message' => '既に登録されているユーザー名です',
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
					array (
						'rule' => array('minLength',4),
						'message' =>'短すぎます',
					),
					array (
						'rule' => array('maxLength',255),
						'message' =>'長すぎます',
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
	);
	
	function beforeSave ($options = array()) {
		if(!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true ;
	}
}
