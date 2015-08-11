<?php
namespace App\Model\Table;

use App\Model\Entity\City;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \Cake\ORM\Association\HasMany $Stations
 * @property \Cake\ORM\Association\BelongsToMany $Lignes
 */
class CitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cities');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Stations', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsToMany('Lignes', [
            'foreignKey' => 'city_id',
            'targetForeignKey' => 'ligne_id',
            'joinTable' => 'cities_lignes'
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
            ->add('type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('type', 'create')
            ->notEmpty('type');
            
        $validator
            ->add('code_postal', 'valid', ['rule' => 'numeric'])
            ->requirePresence('code_postal', 'create')
            ->notEmpty('code_postal');
            
        $validator
            ->add('ligne_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ligne_count', 'create')
            ->notEmpty('ligne_count');

        return $validator;
    }
}
