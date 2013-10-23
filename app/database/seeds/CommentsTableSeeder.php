<?php

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('comments')->truncate();

		$comments = array(
			 array(
		        'content'   => 'Lorem ipsum Nisi dolore ut incididunt mollit tempor proident eu velit cillum dolore sed',
		        'author_name' => 'Testy McTesterson',
		        'article_id'   => 1,
		        'created_at' => date('Y-m-d H:i:s'),
		        'updated_at' => date('Y-m-d H:i:s'),
		      ),
		      array(
		        'content'   => 'Lorem ipsum Nisi dolore ut incididunt mollit tempor proident eu velit cillum dolore sed',
		        'author_name' => 'Testy McTesterson',
		        'article_id'   => 1,
		        'created_at' => date('Y-m-d H:i:s'),
		        'updated_at' => date('Y-m-d H:i:s'),
		      ),
		      array(
		        'content'   => 'Lorem ipsum Nisi dolore ut incididunt mollit tempor proident eu velit cillum dolore sed',
		        'author_name' => 'Testy McTesterson',
		        'article_id'   => 2,
		        'created_at' => date('Y-m-d H:i:s'),
		        'updated_at' => date('Y-m-d H:i:s'),
		      ),

		);

		// Uncomment the below to run the seeder
		DB::table('comments')->insert($comments);
	}

}
