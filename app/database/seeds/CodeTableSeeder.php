<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CodeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('codes')->delete();

		foreach(range(1, 10) as $index)
		{
			Code::create([
                'pro_id' => 1,
                'user_id'=> 1,
                'content'=> $faker->paragraph($nbSentences = 5),
                'status' => 'Waiting',
                'remarks'=> ''
			]);
		}
	}

}