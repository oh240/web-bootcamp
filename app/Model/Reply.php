<?php
App::uses('AppModel', 'Model');
/**
 * Reply Model
 *
 */
class Reply extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'thread_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between',2,500),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $belongsTo = array(
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'thread_id',
			'conditions' => '',
      'dependent' => true,
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
      'dependent' => true,
			'fields' => '',
			'order' => ''
		),
	);

	function findReplies($thread_id,$limit = 5) {

		$options = array(
			'limit' => $limit,
			'order'=>array(
				'Reply.created'=>'DESC'
			),
			'conditions' => array('Reply.thread_id'=>$thread_id),
		);

		return $options;

	}
}
