<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Call post factory to create 100 posts.
        //factory(App\Post::class,1)->create();
        $category = new Category;
        $category->body = 'food';


        $post = Post::create([
            'title' => 'This is my new christmas cake recipe!!!',
            'body'=> 'What Makes it the Best Vanilla Cake?
Let’s count the ways!

Soft, light crumb from cake flour
Fluffy from extra egg whites
Buttery and cakey from creamed butter
Stick-to-your-fork moist from eggs & buttermilk
Extra flavor from pure vanilla extract
Not to mention its versatility: This vanilla cake batter is strong enough for shaped cakes, tiered cakes, and holds up beautifully under fondant. Use this batter for vanilla cupcakes, bundt cake, or even piñata cake. It’s classy enough for a wedding celebration, but unassuming enough for a big family dinner.',
            'user_id' => App\User::inrandomOrder()->first()->id,
        ]);

        $post->category()->save($category);
    }
}
