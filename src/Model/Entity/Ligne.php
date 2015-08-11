<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ligne Entity.
 */
class Ligne extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'station_count' => true,
        'cities' => true,
        'stations' => true,
    ];
}
