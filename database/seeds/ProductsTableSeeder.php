<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *'name' => 'MacBook Pro';
     * @return void
     */
    public function run()
    {
        //Laptops
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Laptop'.$i,
                'slug' => 'laptop'  .$i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])] . 'inch,' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(14999, 249999),
                'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(1);
        }


        $product = Product::find(1);
        $product->categories()->attach(2);
        //Desktops
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Desktop' .$i,
                'slug' => 'desktop' .$i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . 'inch,' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(249999, 449999),
                'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(2);
        }

        

        //Mobile Phones
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Mobile Phones' .$i,
                'slug' => 'mobile-phones' .$i,
                'details' => 'Full Frame DSLR, with 18-55 kits lens.',
                'price' => rand(799999, 24999),
                'description' => 'Lorem' .$i . 'est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(3);
        }

        //Tablets
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Tablet' .$i,
                'slug' => 'tablet' .$i,
                'details' => [7.5, 8, 9][array_rand([7.5, 8, 9])] . 'inch,' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(89999, 169999),
                'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(4);
        }

        //TVs
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'TVs' .$i,
                'slug' => 'tvs' .$i,
                'details' => [32, 44, 57][array_rand([32, 44, 67])] . 'inch,' . [1, 2, 3][array_rand([1, 2, 3])] . 'SMART TV FLAT screen',
                'price' => rand(249999, 449999),
                'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(5);
        }

        

        //Cameras
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Camera' .$i,
                'slug' => 'camera' .$i,
                'details' => 'Full Frame DSLR, with 18-55 kits lens.',
                'price' => rand(799999, 24999),
                'description' => 'Lorem' .$i . 'est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(6);
        }

        //Appliance
        for ($i = 1; $i < 15; $i++){
            Product::create([
                'name' => 'Appliance' .$i,
                'slug' => 'appliance' .$i,
                'details' => 'Full Frame DSLR, with 18-55 kits lens.',
                'price' => rand(799999, 24999),
                'description' => 'Lorem' .$i . 'est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        ])->categories()->attach(7);
        }
        
        // Product::create([
        //     'name' => 'MacBook Pro',
        //     'slug' => 'macbook-pro',
        //     'details' => '15 inc, 1TB SSD, 32GB RAM',
        //     'price' => 2499999,
        //     'details' => '15 inc, 1TB SSD, 32GB RAM',
        //     'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        // ]);

        // Product::create([
        //     'name' => 'Laptop 2',
        //     'slug' => 'laptop-2',
        //     'details' => '15 inc, 1TB SSD, 32GB RAM',
        //     'price' => 149999,
        //     'details' => '15 inc, 1TB SSD, 32GB RAM',
        //     'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
            
        // ]);
    }
}
