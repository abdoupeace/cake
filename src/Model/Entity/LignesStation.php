<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LignesStation Entity.
 */
class LignesStation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'ligne_id' => true,
        'station_id' => true,
        'ordonation' => true,
        'ligne' => true,
        'station' => true,
    ];
}
