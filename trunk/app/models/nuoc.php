<?php
class Nuoc extends AppModel {
	var $name = 'Nuoc';
	var $displayField = 'Rooms_id';
	var $validate = array(		
		'rooms_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nuoc' => array(
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
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'rooms_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
