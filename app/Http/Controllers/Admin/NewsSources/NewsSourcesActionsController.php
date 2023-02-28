<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\NewsSources;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\AbstractControllers\ActionController;
use App\Http\Requests\Admin\Setters\NewsSourcesRequest;
use App\Models\News\NewsSource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsSourcesActionsController extends ActionController
{
    private string $listRoute = 'admin/newsSources/list';
    public function create(NewsSourcesRequest $request): RedirectResponse
    {
        try{
            $data = $request->validated();
            $source = new NewsSource($data);
            $source->save();
            return $this->redirectWithAlert($this->listRoute, 'Источник успешно добавлен');
        }
        catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
    public function destroy(NewsSource $source, Request $request): RedirectResponse
    {
        try {
            $result = $source->delete();
            if(!$result) throw new DBRecordNotFoundException('Запись не найдена');
            return $this->redirectWithAlert($this->listRoute, 'Источник успешно удален');
        } catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
    public function edit(NewsSource $source, NewsSourcesRequest $request): RedirectResponse
    {
        try{
            $data = $request->validated();
            $source->update($data);
            return $this->redirectWithAlert($this->listRoute, 'Источник успешно изменен');
        }
        catch (\Exception $e) {
            return $this->backWithError($e, $request);
        }
    }
}
