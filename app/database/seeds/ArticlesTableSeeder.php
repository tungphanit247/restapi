<?php

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('articles')->truncate();

		$articles = array(
		 	array(
		        'title'    => 'Test Post',
		        'content'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
		        'author_name' => 'Conar Welsh',
		        'created_at' => date('Y-m-d H:i:s'),
		        'updated_at' => date('Y-m-d H:i:s'),
		      ),
		      array(
		        'title'    => 'Another Test Post',
		        'content'   => 'Lorem ipsum Reprehenderit velit est irure in enim in magna aute occaecat qui velit ad.',
		        'author_name' => 'Conar Welsh',
		        'created_at' => date('Y-m-d H:i:s'),
		        'updated_at' => date('Y-m-d H:i:s'),
		      ),

		);

		// Uncomment the below to run the seeder
		DB::table('articles')->insert($articles);
	}

}
