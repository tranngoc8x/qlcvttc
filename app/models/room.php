<?php
class Room extends AppModel {
	var $name = 'Room';
	var $displayField = 'room';
	var $validate = array(
		'customers_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'room' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstdien' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstnuoc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mactodien' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mactonuoc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Phải nhập dữ liệu vào đây',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Elec' => array(
			'className' => 'Elec',
			'foreignKey' => 'rooms_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
