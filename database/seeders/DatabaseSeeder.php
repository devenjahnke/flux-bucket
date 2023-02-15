<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\ValueObjects\Money;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Deven Jahnke',
            'email' => 'hello@devenjahnke.com',
            'password' => bcrypt('password'),
            'favorite_product_id' => null,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Josh Dockery',
            'email' => 'josh@fluxbucket.com ',
            'password' => bcrypt('password'),
            'favorite_product_id' => null,
        ]);

        if (! Storage::exists('products')) {
            Storage::disk('public')->put(
                'products/burger.jpg',
                file_get_contents('resources/images/products/burger.jpg')
            );
            Storage::disk('public')->put(
                'products/burrito.jpg',
                file_get_contents('resources/images/products/burrito.jpg')
            );
            Storage::disk('public')->put(
                'products/chicken-wings.jpg',
                file_get_contents('resources/images/products/chicken-wings.jpg')
            );
            Storage::disk('public')->put(
                'products/french-fries.jpg',
                file_get_contents('resources/images/products/french-fries.jpg')
            );
            Storage::disk('public')->put(
                'products/nachos.jpg',
                file_get_contents('resources/images/products/nachos.jpg')
            );
            Storage::disk('public')->put(
                'products/pizza.jpg',
                file_get_contents('resources/images/products/pizza.jpg')
            );
        }

        Product::factory()->create([
            'name' => 'Cheese Burger',
            'description' => "Our signature cheeseburger features a juicy all-beef patty, topped with melted cheddar cheese and served on a toasted sesame seed bun. Served with crispy lettuce, ripe tomato, and tangy pickles, it's a classic American favorite that's sure to satisfy.",
            'price' => Money::dollars(15.99),
            'image' => 'products/burger.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Steak Burrito',
            'description' => "Indulge in our hearty steak burrito, packed with tender strips of seasoned sirloin, savory Spanish rice, and flavorful black beans. Wrapped in a warm flour tortilla and topped with fresh pico de gallo and creamy guacamole, it's a satisfying and delicious meal that will transport your taste buds to Mexico.",
            'price' => Money::dollars(13.99),
            'image' => 'products/burrito.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Chicken Wings',
            'description' => "Get ready to feast on our succulent chicken wings, served crispy and coated with your choice of zesty buffalo, tangy BBQ, or sweet teriyaki sauce. Perfect as a snack or a meal, our wings are sure to satisfy your cravings and leave you wanting more.",
            'price' => Money::dollars(18.99),
            'image' => 'products/chicken-wings.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Home-Cut Fries',
            'description' => "Savor the crispy goodness of our hand-cut French fries, made with the freshest, highest-quality potatoes available. Served hot and perfectly salted, these fries are the ultimate side dish to complement any meal.",
            'price' => Money::dollars(6.99),
            'image' => 'products/french-fries.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Loaded Nachos',
            'description' => "Indulge in a mountain of our loaded nachos, piled high with crisp tortilla chips, savory ground beef, gooey melted cheese, and all the classic fixings like diced tomatoes, jalapenos, and sour cream. Perfect for sharing or as a meal on their own, our nachos are a fiesta in every bite.",
            'price' => Money::dollars(12.99),
            'image' => 'products/nachos.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Meat Lovers Pizza',
            'description' => "Our meat lovers pizza is a carnivore's dream, piled high with savory pepperoni, spicy Italian sausage, crispy bacon, and juicy chunks of ham. Topped with melted mozzarella cheese and our tangy tomato sauce, it's a classic favorite that's sure to satisfy your appetite.",
            'price' => Money::dollars(16.99),
            'image' => 'products/pizza.jpg',
        ]);


    }
}
