<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\News;

use App\Exceptions\DBRecordNotFoundException;
use App\Http\Controllers\AbstractControllers\ActionController;
use App\Models\News\News;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsActionsController extends ActionController
{
    private string $listRoute = 'admin/news/list';
    public function create(Request $request): RedirectResponse
    {
        try{
            $newsData = $request->except(['_token']);
            $newsData['created_at'] = \date('Y-m-d');
            $news = new News($newsData);
            $news->save();
            return $this->redirectWithAlert($this->listRoute, 'Новость успешно добавлена');
        }
        catch (\Exception $e) {
            return $this->redirectWithError($this->listRoute, $e);
        }
    }
    public function destroy(News $news): RedirectResponse
    {
        try {
            $result = $news->delete();
            if(!$result) throw new DBRecordNotFoundException('запись не найдена.');
            return $this->redirectWithAlert($this->listRoute, 'Новость успешно удалена');
        } catch (\Exception $e) {
            return $this->redirectWithError($this->listRoute, $e);
        }
    }
    public function edit(News $news, Request $request): RedirectResponse
    {
        try{
            $newsData = $request->except(['_token']);
            $news->update($newsData);
            return $this->redirectWithAlert($this->listRoute, 'Новость успешно изменена');
        }
        catch (\Exception $e) {
            return $this->redirectWithError($this->listRoute, $e);
        }
    }
}
