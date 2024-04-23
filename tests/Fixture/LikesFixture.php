<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikesFixture
 */
class LikesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'Date' => '2024-04-22',
                'users_id' => 1,
                'photos_id' => 1,
            ],
        ];
        parent::init();
    }
}
