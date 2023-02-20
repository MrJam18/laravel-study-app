<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\AbstractControllers\ActionController;
use App\Http\Requests\Admin\Setters\UsersChangeSetterRequest;
use App\Http\Requests\Admin\Setters\UsersCreateSetterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;

class UsersActionsController extends ActionController
{
    private string $listRoute = 'admin/users/list';
    function create(UsersCreateSetterRequest $request): RedirectResponse
    {
        try{
            $user = new User($request->validated());
            $user->save();
            return $this->redirectWithAlert($this->listRoute, 'Пользователь успешно добавлен');
        }
        catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }
    function destroy(User $user): RedirectResponse
    {
        try{
            $this->checkModelExists($user);
            $user->delete();
            return $this->redirectWithAlert($this->listRoute, 'Пользователь успешно удален');
        } catch (Exception $exception) {
            return $this->redirectWithAlert($this->listRoute, 'Ошибка: ' . $exception->getMessage(), 'danger');
        }
    }
    function edit(User $user, UsersChangeSetterRequest $request): RedirectResponse
    {
        try {
            $this->checkModelExists($user);
            $data = $request->validated();
            if($request->input('reset-password')) {
                $data['password'] = \randomPassword();
            }
            $user->update($data);
            return $this->redirectWithAlert($this->listRoute, 'Пользователь успешно изменен');
        } catch (Exception $exception) {
            return $this->backWithError($exception, $request);
        }
    }


}
