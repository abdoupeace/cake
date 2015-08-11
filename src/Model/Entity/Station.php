<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Station Entity.
 */
class Station extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'direction' => true,
        'has_twin' => true,
        'r' => true,
        'lon' => true,
        'lat' => true,
        'city_id' => true,
        'city' => true,
        'lignes' => true,
        'lignes_stations' => true,
    ];
}
