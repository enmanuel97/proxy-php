<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultecController extends Controller
{
    protected $categories = [
        [
            "id" => 1,
            "name" => "Accessories"
        ],
        [
            "id" => 2,
            "name" => "Top"
        ],
        [
            "id" => 3,
            "name" => "Shoes"
        ],
        [
            "id" => 4,
            "name" => "Bottoms"
        ],
    ];

    protected $products = [
        [
            "id" => 1,
            "name" => "Shooes Nikes",
            "price" => 5000,
            "category_id" => 1,
            "images" => [
                "https://cdn.shopify.com/s/files/1/0293/9277/products/02-10-22Studio4_ME_ON_09-23-21_14_68544B1_GoldPink_P_0810_KL.jpg",
                "https://picsum.photos/id/984/900/500",
                "https://picsum.photos/id/1011/900/500"
            ]
        ],
        [
            "id" => 2,
            "name" => "Bracelet Princess",
            "price" => 5000,
            "category_id" => 2,
            "images" => [
                "https://cdn.shopify.com/s/files/1/0293/9277/products/02-10-22Studio4_ME_ON_09-23-21_14_68544B1_GoldPink_P_0810_KL.jpg",
                "https://picsum.photos/id/984/900/500",
                "https://picsum.photos/id/1011/900/500"
            ]
        ],
        [
            "id" => 3,
            "name" => "Shooes Nikes",
            "price" => 5000,
            "category_id" => 2,
            "images" => [
                "https://cdn.shopify.com/s/files/1/0293/9277/products/02-10-22Studio4_ME_ON_09-23-21_14_68544B1_GoldPink_P_0810_KL.jpg",
                "https://picsum.photos/id/984/900/500",
                "https://picsum.photos/id/1011/900/500"
            ]
        ],
        [
            "id" => 4,
            "name" => "Miss Bracelet",
            "price" => 5000,
            "category_id" => 3,
            "images" => [
                "https://cdn.shopify.com/s/files/1/0293/9277/products/02-10-22Studio4_ME_ON_09-23-21_14_68544B1_GoldPink_P_0810_KL.jpg",
            ]
        ],
        [
            "id" => 5,
            "name" => "5-Little Miss Princess Bracelet",
            "price" => 5000,
            "category_id" => 1,
            "images" => [
                "https://cdn.shopify.com/s/files/1/0293/9277/products/02-10-22Studio4_ME_ON_09-23-21_14_68544B1_GoldPink_P_0810_KL.jpg",
            ]
        ],
        [
            "id" => 6,
            "name" => "7-Little Miss Princess Bracelet",
            "price" => 5000,
            "category_id" => 3
        ],
    ];

    public function getCategories()
    {
        return response()->json($this->categories);
    }

    public function getProducts(Request $request)
    {
        $category = $request->input('category_id');
        $products = [];

        if ($category) {
            foreach ($this->products as $product) {
                if ($product['category_id'] == $category) {
                    $products[] = $product;
                }
            }
        } else {
            $products = $this->products;
        }

        return response()->json($products);
    }

    public function getProduct($id)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                return response()->json($product);
            }
        }

        return response()->json(['error' => 'Product not found'], 404);
    }
}
