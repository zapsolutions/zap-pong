<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'alias' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rating' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '5,2'),
		'wins' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'losess' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'sinks' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'hits' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'tks' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'action' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '5,2'),
		'decay' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'avatar' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'avatar_dir' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'role' => array('type' => 'string', 'null' => true, 'default' => 'user', 'length' => 16, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '51a3e66b-40cc-45a4-a639-7368ead9c5e9',
			'email' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'rating' => 1,
			'wins' => 1,
			'losess' => 1,
			'sinks' => 1,
			'hits' => 1,
			'tks' => 1,
			'action' => 1,
			'decay' => 1,
			'avatar' => 'Lorem ipsum dolor sit amet',
			'avatar_dir' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum do',
			'active' => 1,
			'created' => '2013-05-27 19:04:11',
			'modified' => '2013-05-27 19:04:11'
		),
	);

}
