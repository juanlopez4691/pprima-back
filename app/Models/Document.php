<?php

namespace App\Models;

use Moloquent;

class Document extends Moloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'documents';
}
