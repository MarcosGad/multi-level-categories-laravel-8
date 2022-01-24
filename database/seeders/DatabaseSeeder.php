<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->times(2)
            ->create(['parent_id' => null])
            ->each(
                fn (Category $category) => Category::factory()
                    ->times(2)
                    ->create(['parent_id' => $category->id])
                    ->each(
                        fn (Category $category) => Category::factory()
                            ->times(2)
                            ->create(['parent_id' => $category->id])
                            ->each(
                                fn (Category $category) => Category::factory()
                                    ->times(2)
                                    ->create(['parent_id' => $category->id])
                            )
                    )
            );
    }
}
