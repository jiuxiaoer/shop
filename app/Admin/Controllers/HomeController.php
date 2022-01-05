<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('admin.index.title'))
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(view('admin.index.left'));
                });

                $row->column(4, function (Column $column) {
                    $column->append(view('admin.index.center'));
                });

                $row->column(4, function (Column $column) {
                    $column->append(view('admin.index.right'));
                });
            });
    }
}
