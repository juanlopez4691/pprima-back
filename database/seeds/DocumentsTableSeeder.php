<?php

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::insert([
            'document'    => 'First document',
            'description' => 'First document in the list',
            'content'     => '',
        ]);

        Document::insert([
            'document'    => 'Second document',
            'description' => 'Second document in the list',
            'content'     => '',
        ]);

        Document::insert([
            'document'    => 'Third document',
            'description' => 'Third document in the list',
            'content'     => '',
        ]);
    }
}
