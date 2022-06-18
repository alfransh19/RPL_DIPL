<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'superuser',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'isAdmin' => true
        ]);
        User::create([
            'name' => 'test',
            'username' => 'test',
            'password' => Hash::make('password'),
        ]);

        Book::create([
            'title' => 'Harry Potter: And The Goblet of Fire',
            'synopsis' => "Harry Potter, a wizard in his fourth year at Hogwarts School of Witchcraft and Wizardry, and the mystery surrounding the entry of Harry's name into the Triwizard Tournament, in which he is forced to compete. The book was published in the United Kingdom by Bloomsbury and in the United States by Scholastic.",
            'bookImage' => 'https://i2.wp.com/universe.byu.edu/wp-content/uploads/2015/01/HP4cover.jpg',
            'price' => 13.99
        ]);

        Book::create([
            'title' => 'The Old Man And The Sea',
            'synopsis' => "The Old Man and the Sea is the story of an epic struggle between an old, seasoned fisherman and the greatest catch of his life. For eighty-four days, Santiago, an aged Cuban fisherman, has set out to sea and returned empty-handed.",
            'bookImage' => 'https://i.pinimg.com/originals/8a/04/ed/8a04ed1684c427daeed111a6d5964249.jpg',
            'price' => 8.99
        ]);

        Book::create([
            'title' => 'The King of Drugs',
            'synopsis' => "They do drugs innit",
            'bookImage' => 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg?ts=1637008457',
            'price' => 7.99
        ]);

        Book::create([
            'title' => 'National Geographic: Yellowstone Supervolcano',
            'synopsis' => "What lies benethe the Yellowstone park?",
            'bookImage' => 'https://i.natgeofe.com/n/cfb0d35b-e381-4304-ac5d-bed69a7459d6/86641.jpg?w=636&h=925',
            'price' => 10.99
        ]);

        Book::create([
            'title' => 'The Return of Sherlock Holmes',
            'synopsis' => "Sherlock and Watson is back",
            'bookImage' => 'https://ebooks.gramedia.com/ebook-covers/50217/image_highres/ID_KSH2019MTH12SH.jpg',
            'price' => 11.99
        ]);

        Book::create([
            'title' => 'Little Red Riding Hood',
            'synopsis' => "The adventure of little red riding hood",
            'bookImage' => 'https://sequoiakidsmedia.com/wp-content/uploads/2020/11/Little_Red_Riding_Hood_Cover2.jpg',
            'price' => 8
        ]);
    }
}
