<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\AbstractControllers\AdminListController;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use App\View\ViewVars\AdminListViewVars;
use App\View\ViewVars\AdminSetterViewVars;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends AdminListController
{
    function getList(UsersQueryBuilder $builder, AdminListViewVars $viewVars): View
    {
        $viewVars->list = $builder->getAdminList();
        $viewVars->header = 'Список пользователей';
        $viewVars->tableHeaders = [
            'Имя пользователя',
            'Электронная почта',
            'Запись создана',
            'Администратор'
        ];
        $viewVars->properties = [
            'name',
            'email',
            'created_at',
            'getReadableIsAdmin:fn'
        ];
        $viewVars->routes = 'admin/users/';
        return $this->renderList($viewVars);
    }
    function change(User $user, AdminSetterViewVars $viewVars): View
    {
        $viewVars->header = 'Изменение пользователя';
        $viewVars->actionRoute = \route('admin/users/actions/change', ['user' => $user->id]);
        $viewVars->model = $user;
        return $this->renderSetter('admin.setters.usersSetters.usersChangeSetter', $viewVars);
    }
    function create(Request $request, AdminSetterViewVars $viewVars): View
    {
        $viewVars->model = new User($request->old());
        $viewVars->header = 'Создание пользователя';
        $viewVars->actionRoute = \route('admin/users/actions/create');
        return $this->renderSetter('admin.setters.usersSetters.usersCreateSetter', $viewVars);
    }
}
