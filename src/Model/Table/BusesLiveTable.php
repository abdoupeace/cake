<?php
namespace App\Model\Table;

use App\Model\Entity\BusesLive;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusesLive Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Lignes
 * @property \Cake\ORM\Association\BelongsTo $Stations
 */
class BusesLiveTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('buses_live');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Lignes', [
            'foreignKey' => 'ligne_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('LignesStations' ,[
            'foreignKey' => 'station_id',
            'bindingKey' => 'station_id',
            //'conditions' => ['LignesStations.ligne_id' => 'BusesLive.ligne_id']
        ]);
        $this->belongsTo('Stations', [
            'foreignKey' => 'station_id',
            'joinType' => 'INNER'
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
            ->requirePresence('state', 'create')
            ->notEmpty('state');
            
        $validator
            ->add('lon', 'valid', ['rule' => 'numeric'])
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');
            
        $validator
            ->add('lat', 'valid', ['rule' => 'numeric'])
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');
            
        $validator
            ->add('at', 'valid', ['rule' => 'time'])
            ->requirePresence('at', 'create')
            ->notEmpty('at');

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
        $rules->add($rules->existsIn(['ligne_id'], 'Lignes'));
        $rules->add($rules->existsIn(['station_id'], 'Stations'));
        return $rules;
    }
}
