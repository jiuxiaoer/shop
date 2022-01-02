<?php

namespace App\Admin\Controllers;

use App\Models\Config;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

use Encore\Admin\Show;
use Illuminate\Support\Facades\Cache;

class ConfigsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Config';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Config());

        $grid->column('id', 'Id');
        $grid->column('name', 'key');
        $grid->column('value', 'Value');
        $grid->column('description', '描述');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
//    protected function detail($id)
//    {
//        $show = new Show(Config::findOrFail($id));
//
//        $show->field('id', __('Id'));
//        $show->field('name', __('Name'));
//        $show->field('value', __('Value'));
//        $show->field('description', __('Description'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));
//
//        return $show;
//    }





    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Config());

        $form->text('name', 'Key');
        $form->text('value', 'Value');
        $form->textarea('description', '描述');
        //保存后回调
        $form->saved(function (Form $form) {
            Cache::put('config_'.$form->name,$form->value);
        });
        return $form;
    }
}
