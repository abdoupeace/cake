<?php
namespace App\Model\Table;

use App\Model\Entity\Station;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsToMany $Lignes
 */
class StationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('stations');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('LignesStations',[
            'foreignKey' => 'station_id'
        ]);
        $this->belongsToMany('Lignes', [
            'foreignKey' => 'station_id',
            'targetForeignKey' => 'ligne_id',
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
            ->requirePresence('direction', 'create')
            ->notEmpty('direction');
            
        $validator
            ->add('has_twin', 'valid', ['rule' => 'numeric'])
            ->requirePresence('has_twin', 'create')
            ->notEmpty('has_twin');
            
        $validator
            ->add('r', 'valid', ['rule' => 'numeric'])
            ->requirePresence('r', 'create')
            ->notEmpty('r');
            
        $validator
            ->add('lon', 'valid', ['rule' => 'numeric'])
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');
            
        $validator
            ->add('lat', 'valid', ['rule' => 'numeric'])
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        return $rules;
    }
}
