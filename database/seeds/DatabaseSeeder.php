<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncateTables([
            'action__logs',
            'badge_user',
    		'users',
    		'user__infos',
    		'schools',
    		'addresses',
            'villages',
            'levels',
            'blocks',
            'roles',
            'permissions',
            'secret__file__contents',
            'secret__files',
            'files__info',
            'missions',
            'challenges',
            'challenge__types',
            'question__types',
            'questions__challenges',
            'skills',
            'challenge_skill',
            'skill_user',
            'badges',
            'be__stats',
            'answers',
            'answer__logs'
    	]);


        $this->call(LevelSeeder::class);
        $this->call(BlockSeeder::class);
        $this->call(VillagesSeeder::class);
        $this->call(MissionSeeder::class);
        $this->call(ChallengeTypeSeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(QuestionChallengeSeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UserInfoSeeder::class);
        $this->call(UserSeeder::class);


        $this->call(SecretFileContentsSeeder::class);
        $this->call(FilesInfoSeeder::class);
        $this->call(SecretFileSeeder::class);


        $this->call(BadgeSeeder::class);
        $this->call(BeStatSeeder::class);
    }

    private function truncateTables($tables){
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    	foreach ($tables as $table) {
    		DB::table($table)->truncate();
    	}
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    }
}
