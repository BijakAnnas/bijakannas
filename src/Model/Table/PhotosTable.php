<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Photos Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 *
 * @method \App\Model\Entity\Photo newEmptyEntity()
 * @method \App\Model\Entity\Photo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Photo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Photo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Photo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Photo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Photo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Photo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Photo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PhotosTable extends Table
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

        $this->setTable('photos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Albums', [
            'foreignKey' => 'albums_id',
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
            ->date('Date')
            ->requirePresence('Date', 'create')
            ->notEmptyDate('Date');

        $validator
            ->scalar('Description')
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('Location_File')
            ->maxLength('Location_File', 255)
            ->requirePresence('Location_File', 'create')
            ->notEmptyFile('Location_File');

        $validator
            ->integer('users_id')
            ->notEmptyString('users_id');

        $validator
            ->integer('albums_id')
            ->notEmptyString('albums_id');

        $validator
            ->scalar('Photo')
            ->maxLength('Photo', 255)
            ->requirePresence('Photo', 'create')
            ->allowEmptyString('Photo');

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
        $rules->add($rules->existsIn(['albums_id'], 'Albums'), ['errorField' => 'albums_id']);

        return $rules;
    }
}
