<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusesLive Entity.
 */
class BusesLive extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'ligne_id' => true,
        'station_id' => true,
        'state' => true,
        'lon' => true,
        'lat' => true,
        'at' => true,
        'ligne' => true,
        'station' => true,
    ];
}
