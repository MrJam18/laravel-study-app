<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AboutController extends UsersController
{
    function index(): View
    {
        $this->view->addCss('about/index');
        return $this->view->render('about.index', 'О нас');
    }
    function createReview(Request $request): RedirectResponse
    {
        $reviewArray = [
            'id' => \time(),
            'name' => $request->input('name'),
            'text' => $request->input('text')
        ];
        $reviewJson = json_encode($reviewArray);
        Storage::put('reviews/' . $reviewArray['id'], $reviewJson);
        return \redirect()->route('main', ['alert' => 'Отзыв успешно отправлен']);
    }
    function createDataExportRequest(Request $request): RedirectResponse
    {
        $data = $request->all();
        if(\strlen($data['text']) < 20) {
            return \redirect()->route('about/dataExport', ['errorMessage' => 'Текст запроса должен содержать не менее 20 символов!'])->withInput();
        }
        $dataExportReqArray = [
            'id' => \time(),
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'text' => $data['text']
        ];
        $dataExportReqJson = json_encode($dataExportReqArray);
        Storage::put('dataExportRequests/' . $dataExportReqArray['id'], $dataExportReqJson);
        return \redirect()->route('main', ['alert' => 'Запрос на получение данных отправлен']);
    }
    function review(): View
    {
        $this->view->addCss('about/feedback');
        return $this->view->render('about.review', 'Отзыв о нас');
    }
    function dataExport(Request $request): View
    {
        $errorMessage = $request->query('errorMessage');
        $this->view->addCss('about/feedback');
        return $this->view->render('about/dataExport', 'Запрос на выгрузку данных',
        ['errorMessage' => $errorMessage]);
    }
}
