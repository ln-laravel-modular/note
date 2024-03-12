<?php

use Modules\Note\Entities\NoteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Note\Entities\NoteMeta;
use Nwidart\Modules\Laravel\Module;

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

Route::prefix(Module::currentConfig('web.prefix'))->group(function () {
    // Route::get('/', 'NoteController@index');
    Route::get('/', function (Request $request) {
        $return = [
            'view' => 'note::web.index',
            'readonly' => true,
            'contentPaginator' => NoteContent::paginate(10),
            'metaPaginator' => NoteMeta::paginate(10),
        ];
        return view($return['view'], $return);
    });
});

// Route::prefix('admin')->group(function () {
//     Route::prefix(Module::currentConfig('web.prefix'))->group(function () {
//         Route::prefix('{table}')->where(['table' => '(metas|contents|comments|links)'])->group(function () {
//             Route::get('', function (Request $request, $table) {
//                 NoteContent::insert(['title' => '123']);
//                 $return = [
//                     'view' => 'admin::admin.modules.' . $table,
//                     'readonly' => true,
//                     'paginator' => NoteContent::paginate(15),
//                 ];

//                 return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
//             });
//             Route::match(['get', 'post'], '/insert', function (Request $request, $table) {
//                 $return = [
//                     'view' => 'admin::admin.modules.' . substr($table, 0, -1),
//                     'readonly' => true,
//                     'detail' => new NoteContent,
//                 ];

//                 if ($request->method() == 'POST') {
//                     // $id = NoteContent::insertGetId($request->input());
//                     $return['detail']->fill($request->input());
//                     $return['detail']->save();
//                     $id = $return['detail']->{$return['detail']->getKeyName()};
//                     // var_dump($return['detail']->getPrimary());
//                     // var_dump($return['detail']->{$return['detail']->getKeyName()});
//                     return redirect("/admin/" . Module::currentConfig('web.prefix') . "/" . $table . '/' . $id);
//                 }

//                 return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
//             });
//             Route::match(['get', 'post'], '/{id}', function (Request $request, $table, $id) {
//                 // var_dump(Route::current()->compiled);
//                 // var_dump(request()->route()->compiled->getRegex());
//                 // var_dump($request->path());
//                 // var_dump(preg_match(request()->route()->compiled->getRegex(), '/' . $request->path()));
//                 $return = [
//                     'view' => 'admin::admin.modules.' . substr($table, 0, -1),
//                     'readonly' => true,
//                     'detail' => NoteContent::find($id),
//                 ];
//                 if ($request->method() == 'POST') {
//                     $return['detail']->fill($request->input());
//                     $return['detail']->save();
//                 }

//                 return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
//             });
//         });
//         Route::match(['get', 'post'], '/config', '\\Modules\\Admin\\Http\\Controllers\\AdminController@view_admin_modules_config');
//     });
// });