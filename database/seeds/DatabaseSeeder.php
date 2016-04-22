<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Chatty\Models\User;
use Chatty\Models\Product;
use Chatty\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


         $this->call('ProductCategory');
         $this->command->info('ProductCategory seeds finished.'); // show information in the c

        Model::reguard();
    }
}

class ProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->delete();
      DB::table('categories')->delete();

    //Add Products

       $product1 = Product::create(array(
            'product_name'         => 'Lawly',
            'product_description'         => 'Ecommerce manager and online store owners often ask about product descriptions. ... Therefore, I like to think of product descriptions as storytelling, incorporating the elements of both prose writing and journalism.',
            'base_image'         => 'uploads/tindotindo@gmail.com/samsung-a3-1.jpg',
            'price'         => '20',
            'user_id' => 4
        ));

        $product2= Product::create(array(
             'product_name'         => 'Bawly',
             'product_description'         => 'Ecommerce manager and online store owners often ask about product descriptions. ... Therefore, I like to think of product descriptions as storytelling, incorporating the elements of both prose writing and journalism.',
             'base_image'         => 'uploads/tindotindo@gmail.com/samsung-a3-1.jpg',
             'price'         => '20',
             'user_id' => 1
         ));

         $product3 = Product::create(array(
              'product_name'         => 'Cawly',
              'product_description'         => 'Ecommerce manager and online store owners often ask about product descriptions. ... Therefore, I like to think of product descriptions as storytelling, incorporating the elements of both prose writing and journalism.',
              'base_image'         => 'uploads/tindotindo@gmail.com/samsung-a3-1.jpg',
              'price'         => '20',
              'user_id' => 2
          ));

          $product4 = Product::create(array(
               'product_name'         => 'Dawly',
               'product_description'         => 'Ecommerce manager and online store owners often ask about product descriptions. ... Therefore, I like to think of product descriptions as storytelling, incorporating the elements of both prose writing and journalism.',
               'base_image'         => 'uploads/tindotindo@gmail.com/samsung-a3-1.jpg',
               'price'         => '200',
               'user_id' => 4
           ));

           $product5 = Product::create(array(
                'product_name'         => 'Lawly',
                'product_description'         => 'Ecommerce manager and online store owners often ask about product descriptions. ... Therefore, I like to think of product descriptions as storytelling, incorporating the elements of both prose writing and journalism.',
                'base_image'         => 'uploads/tindotindo@gmail.com/samsung-a3-1.jpg',
                'price'         => '20',
                'user_id' => 4
            ));



        $this->command->info('The products are added!');

      //Add Categories
        $category1 = Category::create(array(
         'category_name'        => 'Phones',
         'category_slug' => 'phones'
     ));
     $category2 = Category::create(array(
      'category_name'        => 'Apparel',
      'category_slug' => 'app'
  ));


  $product1->categories()->attach($category1->id);
  $product2->categories()->attach($category1->id);
  $product2->categories()->attach($category2->id);
  $product3->categories()->attach($category1->id);
  $product4->categories()->attach($category2->id);
  $product5->categories()->attach($category2->id);


    $this->command->info('Products Assigned to Categories');

    }
}
