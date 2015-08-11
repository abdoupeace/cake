<?php
namespace App\Model\Table;

use App\Model\Entity\LignesStation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LignesStations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Lignes
 * @property \Cake\ORM\Association\BelongsTo $Stations
 */
class LignesStationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('lignes_stations');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Lignes', [
            'foreignKey' => 'ligne_id',
            'joinType' => 'INNER'
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
            ->add('ordonation', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ordonation', 'create')
            ->notEmpty('ordonation');

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
