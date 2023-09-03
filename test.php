<?php  
    require 'config/includes.php';

    require_once 'vendor/autoload.php'; // Include the Composer autoloader

    use Faker\Factory;

    // Create a Faker instance
    $faker = Factory::create();

    // Number of random records to generate
    $numRecords = 10;

    for ($i = 0; $i < $numRecords; $i++) {

        $words = [];
        for ($j = 0; $j < 20; $j++) {
            $words[] = $faker->word;
        }
        $sentence = implode(' ', $words);

        $code = $faker->ean13;
        $category = "Laptops";
        $brand = "Lenovo";
        $name = "Lenovo Legion 7";
        $description = $sentence;
        $tags = "computers, laptops, laptop, office";
        $images = "";
        $cap = $faker->numberBetween($min = 1000, $max = 100000);
        $srp = $faker->numberBetween($min = 1000, $max = 100000);
        $sold = $faker->numberBetween($min = 1, $max = 100);
        $userId = 1;

        $statement=dataConnect()->prepare("INSERT INTO 
                                        products
                                        (
                                            product_code, 
                                            product_cat, 
                                            product_brand, 
                                            product_name, 
                                            product_description, 
                                            product_tags, 
                                            product_images, 
                                            product_price_cap, 
                                            product_price_srp, 
                                            product_sold, 
                                            user_uid, 
                                            product_created, 
                                            product_updated
                                        )
                                        Values
                                        (
                                            :product_code, 
                                            :product_cat, 
                                            :product_brand, 
                                            :product_name, 
                                            :product_description, 
                                            :product_tags, 
                                            :product_images, 
                                            :product_price_cap, 
                                            :product_price_srp, 
                                            :product_sold, 
                                            :user_uid, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'product_code' => $code, 
            'product_cat' => $category, 
            'product_brand' => $brand, 
            'product_name' => $name, 
            'product_description' => $description, 
            'product_tags' => $tags, 
            'product_images' => $images, 
            'product_price_cap' => $cap, 
            'product_price_srp' => $srp, 
            'product_sold' => $sold, 
            'user_uid' => $userId
        ]);
        
    }

    if ($statement) {
        echo "data inserted successfully";
    } else {
        echo "insert failed";
    }

    // Close the database connection
    $db = null;

?>