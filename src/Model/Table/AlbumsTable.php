<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Albums Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Album newEmptyEntity()
 * @method \App\Model\Entity\Album newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Album> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Album get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Album findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Album patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Album> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Album|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Album saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Album>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Album> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AlbumsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('albums');
        $this->setDisplayField('Name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        $validator
            ->date('Date')
            ->requirePresence('Date', 'create')
            ->notEmptyDate('Date');

        $validator
            ->scalar('Description')
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->integer('users_id')
            ->notEmptyString('users_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'), ['errorField' => 'users_id']);

        return $rules;
    }
}
