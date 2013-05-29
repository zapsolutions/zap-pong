<?php
App::uses('Smack', 'Model');

/**
 * Smack Test Case
 *
 */
class SmackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.smack',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Smack = ClassRegistry::init('Smack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Smack);

		parent::tearDown();
	}

}
