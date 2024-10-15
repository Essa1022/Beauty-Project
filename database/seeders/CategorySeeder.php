<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'خدمات لیزر موهای زائد',
            'خدمات انواع تزریقات زیبایی',
            'خدمات انواع کاشت',
            'خدمات انواع آبرسانی پوست و مو'
        ];
        foreach ($names as $name)
        {
            Category::create(['name' => $name]);
        }
    }
}
