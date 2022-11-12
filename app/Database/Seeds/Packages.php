<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Packages extends Seeder
{
    public function run()
    {
        $data = [
            [
            'package_id' => '1',
            'title' => 'Taj Mahal',
            'location' => 'Taj Mahal, Agra, Uttar Pradesh, India',
            'image' => 'img-1.jpg',
            'price' => '15000000'
            ],
            [
            'package_id' => '2',
            'title' => 'Lake Toba',
            'location' => 'Lake Toba, North Sumatra, Indonesia',
            'image' => 'img-2.jpg',
            'price' => '4500000',
            ],
            [
            'package_id' => '3',
            'title' => 'Lake Pukaki',
            'location' => 'Lake Pukaki, New Zealand',
            'image' => 'img-3.jpg',
            'price' => '106000000',
            ],
            [
            'package_id' => '4',
            'title' => 'Nijo Castle',
            'location' => 'Nijo Castle, Kyoto, Japan',
            'image' => 'img-4.jpg',
            'price' => '4500000',
            ],
            [
            'package_id' => '5',
            'title' => 'Central Park',
            'location' => 'Central Park, New York City, USA',
            'image' => 'img-5.jpg',
            'price' => '29000000',
            ],
            [
            'package_id' => '6',
            'title' => 'Hawaii',
            'location' => 'Hawaii, US',
            'image' => 'img-6.jpg',
            'price' => '28000000',
            ],
            [
            'package_id' => '7',
            'title' => 'Church of the Holy Sepulchre',
            'location' => 'Jerusalem, Israel',
            'image' => 'img-7.jpg',
            'price' => '35000000',
            ],
            [
            'package_id' => '8',
            'title' => 'Gokarna Beach',
            'location' => 'Gokarna, India',
            'image' => 'img-8.jpg',
            'price' => '23000000',
            ],
            [
            'package_id' => '9',
            'title' => 'Panak Island',
            'location' => 'Panak Island, Krasom, Thailand',
            'image' => 'img-9.jpg',
            'price' => '8450000',
            ],
            [
            'package_id' => '10',
            'title' => 'Sahara Desert',
            'location' => 'Sahara Desert, Nile Valley, Egypt',
            'image' => 'img-10.jpg',
            'price' => '37000000',
            ],
            [
            'package_id' => '11',
            'title' => 'Bintan Island',
            'location' => 'Bintan Island, Riau, Indonesia',
            'image' => 'img-11.jpg',
            'price' => '23000000',
            ],
            [
            'package_id' => '12',
            'title' => 'Coconuttree Farm House',
            'location' => 'Tamil Nadu, India',
            'image' => 'img-12.jpg',
            'price' => '23000000',
            ],
        ];

        $this->db->table('packages')->insertBatch($data);
    }
}