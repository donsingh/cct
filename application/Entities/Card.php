<?php namespace App\Entities;

use CodeIgniter\Entity;

class Card extends Entity
{
    protected $card_id;
    protected $multiverseid;
    protected $name;
    protected $names;
    protected $colors;
    protected $rarity;
    protected $card_set;
    protected $cmc;
    protected $types;
    protected $subtypes;
    protected $image;
}