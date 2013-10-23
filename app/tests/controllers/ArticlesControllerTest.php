<?php

class ArticlesControllerTest extends TestCase {

	public function setUp() {
		parent::setUp();

		Artisan::call('migrate');
		$this->seed();

		$this->mock = Mockery::mock( 'ArticleRepositoryInterface' );
	}

	/**
	 * Test Basic Route Responses
	 */
	public function testIndex() {
		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertTrue( $response->isOk() );
	}

	public function testShow(){
		$response = $this->call('GET', route('v1.articles.show', array(1)));
		$this->assertTrue($response->isOk());
	}

	public function testCreate(){
		$response = $this->call('GET', route('v1.articles.create'));
		$this->assertTrue($response->isOk());
	}

	public function testEdit(){
		$response = $this->call('GET', route('v1.articles.edit',array(1)));
		$this->assertTrue($response->isOk());
	}

	public function testIndexValidJsonReturn() {
		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertJson( $response->getContent() );
	}

	public function testShowValidJsonReturn() {
		$response = $this->call( 'GET', route( 'v1.articles.show',array(1) ) );
		$this->assertJson( $response->getContent() );
	}

	/**
	 * Test controller calls repo as we expect
	 */
	public function testIndexShouldCallFindAllMethod() {

		$this->mock->shouldReceive( 'findAll' )->once()->andReturn( 'foo' );
		App::instance( 'ArticleRepositoryInterface', $this->mock );

		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertTrue( !! $response->original );
	}
}