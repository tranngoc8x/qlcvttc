<?php
class Group extends AppModel {
	var $name = 'Group';
	var $displayField = 'name';
	var $actsAs = array('Acl' =>  'requester') ;
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bạn chưa nhập tên phòng ban',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'magroup' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bạn chưa nhập tên phòng ban',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'groups_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		) 

	);
	var $hasAndBelongsToMany = array(
			'Position' => array(
				'className' => 'Position',
				'joinTable' => 'positions_groups',
				'foreignKey' => 'groups_id',
				'associationForeignKey' => 'positions_id',
				'unique' => true,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
				'deleteQuery' => '',
				'insertQuery' => ''
			)
		);
	function parentNode() {
	    return null;
	}
}
