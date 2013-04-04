<?php
class Elec extends AppModel {
	var $name = 'Elec';
	var $displayField = 'customers_id';
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
		),
		'elec' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Nhập chưa đúng kiểu dữ liệu. Hãy nhập vào số',
				//'notEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'numeric' => array(
				'rule' => 'notEmpty',
				'message' => 'Chưa chọn ngày',
				//'unique' => true,
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
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
}
