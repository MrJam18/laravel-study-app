<?php
declare(strict_types=1);

namespace App\Models\Interfaces;

use App\Models\News\News;

interface FakeNewsInterface
{
    static function getFakeNews(int $id): News;
}
