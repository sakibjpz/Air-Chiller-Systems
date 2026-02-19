<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class MigrateProductCategories extends Command
{
    protected $signature = 'migrate:product-categories';
    protected $description = 'Migrate product string categories to category_id foreign key';

    public function handle()
    {
        $this->info('Starting product category migration...');
        
        $products = Product::all();
        $count = 0;
        $errors = 0;

        foreach ($products as $product) {
            if ($product->category) {
                // Find category by slug
                $category = Category::where('slug', $product->category)->first();
                
                if ($category) {
                    $product->category_id = $category->id;
                    $product->save();
                    $count++;
                    $this->line("✓ Updated: {$product->name} -> {$category->name}");
                } else {
                    $errors++;
                    $this->error("✗ Category not found for slug: {$product->category} (Product: {$product->name})");
                }
            }
        }

        $this->info("Migration completed! Updated: {$count} products, Errors: {$errors}");
        
        return Command::SUCCESS;
    }
}