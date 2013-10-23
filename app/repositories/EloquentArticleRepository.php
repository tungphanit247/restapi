<?php

class EloquentArticleRepository implements ArticleRepositoryInterface {

	public function findById( $id ) {
		$article = Article::with( array(
				'comments' => function( $q ) {
					$q->orderBy( 'created_at' , 'desc' );
				}
			) )
		->where( 'id', $id )
		->first();

		if ( !$article ) throw new NotFoundException( 'Article Not Found' );
		return $article;
	}

	public function findAll() {
		return Article::with( array(
				'comments' => function( $q ) {
					$q->orderBy( 'created_at', 'desc' );
				}
			) )
		->orderBy( 'created_at', 'desc' )
		->get();
	}

	public function paginate( $limit = null ) {
		return Article::paginate( $limit );
	}

	public function store( $data ) {
		$this->validate( $data );
		return Article::create( $data );
	}

	public function update( $id, $data ) {
		$article = $this->findById( $id );
		$article->fill( $data );
		$this->validate( $article->toArray() );
		$article->save();
		return $article;
	}

	public function validate( $data ) {
		$validator = Validator::make( $data, Article::$rules );
		if ( $validator->fails() ) throw new ValidationException( $validator );
		return true;
	}

	public function instance( $data = array() ) {
		return new Article( $data );
	}

	public function destroy( $id ) {
		$article = $this->findById( $id );
		$article->delete();
		return true;
	}
}