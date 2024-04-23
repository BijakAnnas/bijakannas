<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $Date
 * @property string $fill
 * @property int $users_id
 * @property int $photos_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Photo $photo
 */
class Comment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'Date' => true,
        'fill' => true,
        'users_id' => true,
        'photos_id' => true,
        'user' => true,
        'photo' => true,
    ];
}
