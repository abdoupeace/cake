<?php
namespace App\Model\Table;

use App\Model\Entity\Ligne;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lignes Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Cities
 * @property \Cake\ORM\Association\BelongsToMany $Stations
 */
class LignesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('lignes');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Cities', [
            'foreignKey' => 'ligne_id',
            'targetForeignKey' => 'city_id',
            'joinTable' => 'cities_lignes'
        ]);
        $this->belongsToMany('Stations', [
            'foreignKey' => 'ligne_id',
            'targetForeignKey' => 'station_id',
            'joinTable' => 'lignes_stations'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->add('station_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('station_count', 'create')
            ->notEmpty('station_count');

        return $validator;
    }
}
