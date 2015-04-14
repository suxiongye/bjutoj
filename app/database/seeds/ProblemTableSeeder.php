<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProblemTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('problems')->delete();
		foreach(range(1, 10) as $index)
		{
			Problem::create([
                'title' => 'first problems',
                'content'=> $faker->paragraph($nbSentences = 5),
                'radio' => 0,
                'accepted' => 0,
                'submit' => 0,
                'inputcase' => $faker->paragraph($nbSentences = 5),
                'outputcase'=> $faker->paragraph($nbSentences = 5),
                'timelimit' => 1,
                'memorylimit'=>100
			]);
		}
	}
}