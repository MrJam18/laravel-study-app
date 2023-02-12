<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\NewsSourcesRequests;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\AbstractControllers\ActionController;
use App\Models\NewsSourceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsSourcesRequestsActionsController extends ActionController
{
    private string $listRoute = 'admin/newsSourcesRequests/list';
    public function create(Request $request): RedirectResponse
    {
        try{
            $data = $request->except(['_token']);
            $sourceRequest = new NewsSourceRequest($data);
            $sourceRequest->save();
            return $this->redirectWithAlert($this->listRoute, 'Запрос успешно добавлен');
        }
        catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
    public function destroy(NewsSourceRequest $sourceRequest, Request $request): RedirectResponse
    {
        try {
            $result = $sourceRequest->delete();
            if(!$result) throw new DBRecordNotFoundException('Запись не найдена');
            return $this->redirectWithAlert($this->listRoute, 'Запрос успешно удален');
        } catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
    public function edit(NewsSourceRequest $sourceRequest, Request $request): RedirectResponse
    {
        try{
            $data = $request->except(['_token']);
            $sourceRequest->update($data);
            return $this->redirectWithAlert($this->listRoute, 'Зпрос успешно изменен');
        }
        catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
}
