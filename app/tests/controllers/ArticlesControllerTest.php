<?php

class ArticlesControllerTest extends TestCase {

	public function setUp() {
		parent::setUp();

		Artisan::call('migrate:refresh');

		$this->mock = Mockery::mock( 'ArticleRepositoryInterface' );
	}

	/**
	 * Test Basic Route Responses
	 */
	public function testIndex() {
		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertTrue( $response->isOk() );
	}

	public function testIndexValidJsonReturn() {
		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertJson( $response->getContent() );
	}

	public function testIndexShouldCallFindAllMethod() {

		$this->mock->shouldReceive( 'findAll' )->once()->andReturn( 'foo' );
		App::instance( 'ArticleRepositoryInterface', $this->mock );

		$response = $this->call( 'GET', route( 'v1.articles.index' ) );
		$this->assertTrue( !! $response->original );
	}
}