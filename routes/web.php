<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo '<h4>Привет, мир. Новости будут позже</h4>';
});
Route::get('about', function () {
   echo '<h4>Наша компания занимается новостями, но они будут позже, так как программа в разработке.</h4>';
});
Route::get('news/{number}', static function (string $number) {
   echo "<h3>Новость под номером ${number}.</h3>";
   echo '<div>Republican congressional candidate Joe Kent’s Election Day Twitter thread listing all the evils that his Democratic opponent Marie Gluesenkamp Perez would bring to Washington’s third District was standard fare. It prominently featured a photoshopped image of Perez driving a light-rail train surrounded by pastiched images of rioting and homelessness in neighboring Portland, Oregon—suggesting with all the subtlety of a tactical nuke that her support for a TriMet light-rail extension into Vancouver would bring Armageddon. Among the most heinous passengers on Gluesenkamp-Perez’s train from hell? “Puberty blockers and ‘trans’ surgery for minors without parental consent” and “biological men competing in girl’s sports and accessing women-only spaces.</div>”';

});
