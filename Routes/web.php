<?php

use Modules\Note\Entities\NoteContent;
use Illuminate\Http\Request;


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

Route::prefix(\App\Support\Helpers\ModuleHelper::current_config('web.prefix'))->group(function () {
    // Route::get('/', 'NoteController@index');
    Route::get('/', function (Request $request) {
        $return = [
            'view' => 'note::web.index',
            'readonly' => true,
            'paginator' => NoteContent::paginate(10),
        ];
        return view($return['view'], $return);
    });
});

Route::prefix('admin')->group(function () {
    Route::prefix(\App\Support\Helpers\ModuleHelper::current_config('web.prefix'))->group(function () {
        Route::prefix('{table}')->where(['table' => '(metas|contents|comments|links)'])->group(function () {
            Route::get('', function (Request $request, $table) {
                $return = [
                    'view' => 'admin::admin.modules.' . $table,
                    'readonly' => true,
                    'paginator' => NoteContent::paginate(10),
                ];

                return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
            });
            Route::match(['get', 'post'], '/insert', function (Request $request, $table) {
                $return = [
                    'view' => 'admin::admin.modules.' . substr($table, 0, -1),
                    'readonly' => true,
                    'detail' => new NoteContent,
                ];

                if ($request->method() == 'POST') {
                    $return['detail'] = NoteContent::create($request->input());
                    // $return['detail']->save();
                }

                return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
            });
            Route::match(['get', 'post'], '/{id}', function (Request $request, $table, $id) {
                $return = [
                    'view' => 'admin::admin.modules.' . substr($table, 0, -1),
                    'readonly' => true,
                    'detail' => NoteContent::find($id),
                ];

                if ($request->method() == 'POST') {
                    $return['detail']->fill($request->input());
                    $return['detail']->save();
                }

                return \Modules\Admin\Http\Controllers\AdminController::view($return['view'], $return);
            });
        });
    });
});