<?php
App::uses('Topic', 'Model');

/**
 * Topic Test Case
 *
 */
class TopicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.topic',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Topic = ClassRegistry::init('Topic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Topic);

		parent::tearDown();
	}

	public function test1(){
		$this->Topic->create(array('Topic'=>array('title'=>'')));
		$this->assertFalse($this->Topic->validates());
		$this->assertArrayHasKey('title',$this->Topic->validationErrors);
	}
	
	public function testFetchLatest5inCategory1(){
		$latests = $this->Topic->getLatest();
		$this->assertCount(5,$latests);
		$this->assertEquals('CG basic', $latests[0]['Topic']['title']);
		$this->assertEquals('first windows', $latests[1]['Topic']['title']);
		$this->assertEquals('first PHP', $latests[2]['Topic']['title']);
		$this->assertEquals('new smart phone', $latests[3]['Topic']['title']);
		$this->assertEquals('new mobile phone', $latests[4]['Topic']['title']);

	}

}
