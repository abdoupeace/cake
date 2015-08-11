<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CitiesLigne Entity.
 */
class CitiesLigne extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'ligne_id' => true,
        'city_id' => true,
        'ordonation' => true,
        'ligne' => true,
        'city' => true,
    ];
}
