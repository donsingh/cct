<?php namespace App\Models;

use CodeIgniter\Model;

class CardModel extends Model
{
    protected $table         = 'cards';
    protected $allowedFields = [
        'name', 'cmc', 'types'
    ];
    protected $returnType    = 'App\Entities\Card';
    protected $useTimestamps = false;
    
    public function find_by_name($term = "")
    {
        return $this->like(['name' => $term]);
        
    }
}