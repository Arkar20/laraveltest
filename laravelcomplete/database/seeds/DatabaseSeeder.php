<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Article;
use App\Category;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 40; $i++) { 
                $comment=new Comment;

                $comment->comment=$faker->paragraph;
                $comment->article_id=rand(1,20);
                $comment->save();
        }

//category
        for ($i=0; $i < 5; $i++) { 
                $category= new Category;
                $category->name=strtoupper($faker->word); //php funtion to convert the text into uppercase
                $category->save();
        }

    
        for($i=0; $i<20; $i++) {
            $article = new Article;
            $article->title = $faker->sentence;
            $article->body = $faker->paragraph;
            $article->category_id = rand(1, 5);
            $article->save();
        }

        // $this->call(UsersTableSeeder::class);
    }
}
