<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity.
 */
class City extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'type' => true,
        'parrent_id' => true,
        'code_postal' => true,
        'ligne_count' => true,
        'stations' => true,
        'lignes' => true,
    ];
}
