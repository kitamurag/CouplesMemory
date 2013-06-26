<?php
App::uses('TopicsController', 'Controller');

/**
 * TopicsController Test Case
 *
 */
class TopicsControllerTest extends ControllerTestCase {

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
 * testIndex method
 *
 * @return void
 */
	public function testIndexVars() {
		$result = $this->testAction('/topics/index',array('return'=>'vars'));
		$topics = $result['topics'];
		$this->assertCount(7,$topics);
		$this->assertEquals('new PC',           $topics[0]['Topic']['title']);
		$this->assertEquals('new mobile phone', $topics[1]['Topic']['title']);
		$this->assertEquals('new smart phone',  $topics[2]['Topic']['title']);
		$this->assertEquals('first PHP',        $topics[3]['Topic']['title']);
		$this->assertEquals('first windows',    $topics[4]['Topic']['title']);
		$this->assertEquals('CG basic',         $topics[5]['Topic']['title']);
		$this->assertEquals('sushi',            $topics[6]['Topic']['title']);
	}

	/*QueryPath PHP Simple HTML DOM Parser*/
	public function testIndexLayout() {
		$result = $this->testAction('/topics/index',array('return'=>'view'));
		$expected = array(
			'tag'=>'div',
			'attributes'=>array('class'=>'topics index'),
			'child'=>array('tag'=>'table','children'=>array('count'=>8)),
			);
		$this->assertTag($expected,$result);
	}

/**
 * @expectedException NotFoundException
 * @expectedExceptionMessage Invalid topic
 */
	public function testViewInvalidId() {
		$this->testAction('/topics/view/999');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$data = array('Topic'=>array('title'=>'new topic'));
		$this->testAction('/topics/add',array('data'=>$data,'method'=>'post'));
		$this->assertContains('The topic has been saved',$this->controller->Session->read('Message.flash'));
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDeleteRedirect() {
		$this->testAction('/topics/delete/1',array('method'=>'post'));
		$this->assertRegExp('/topics$/',$this->headers['Location']);
	}

}
