<?php
declare(strict_types=1);

namespace App\Http\Controllers\AbstractControllers;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class ActionController extends Controller
{
    protected function redirectWithAlert(string $route, string $message, string $alertType = 'success'): RedirectResponse
    {
        return \redirect()->route($route)->with('alertType', $alertType)->with('alertMessage', $message);
    }
    protected function redirectWithError(string $route, Exception $exception): RedirectResponse
    {
        return $this->redirectWithAlert($route, 'Ошибка: ' . $exception->getMessage(), 'danger');
    }
    protected function backWithError(Exception $exception, Request $request): RedirectResponse
    {
        $request->flash();
        return \back()->with('error', $exception->getMessage());
    }
    protected function getAllFromRequest(Request $request): array
    {
        return $request->except('__token');
    }

    /**
     * @throws DBRecordNotFoundException
     */
    protected function checkModelExists(Model $model): void {
        if(!$model->exists) throw new DBRecordNotFoundException('model not found');
    }
}
