<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $Date
 * @property string $Description
 * @property string $title
 * @property string $Location_File
 * @property int $users_id
 * @property int $albums_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Album $album
 */
class Photo extends Entity
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
        'Description' => true,
        'title' => true,
        'Location_File' => true,
        'users_id' => true,
        'albums_id' => true,
        'user' => true,
        'album' => true,
    ];
}
