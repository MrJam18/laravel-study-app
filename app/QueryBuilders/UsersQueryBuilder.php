<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UsersQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        $this->model = User::class;
        $this->defaultOrderBy = new OrderBy('users.created_at', OrderDirection::DESC);
        $this->tableName = 'users';
    }
    function getAdminList(): LengthAwarePaginator
    {
        return $this->getOrdered()
            ->select(['name', 'email', 'created_at', 'is_admin', 'id'])
            ->paginate(20);
    }
}

