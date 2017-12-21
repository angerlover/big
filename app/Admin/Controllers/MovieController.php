<?php

namespace App\Admin\Controllers;

use App\Model\Movie;
use App\Model\AdminUser;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MovieController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');


            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Movie::class, function (Grid $grid) {
            $userId =
            $grid->id('ID')->sortable();
            $grid->column('title','电影名');
            $grid->director('导演');
            $grid->rate('评分');

//            $grid->column('isReleased','是否上架')->sortable();
            // 扩展一个不存在的列
            $grid->column('导演和电影名')->display(function () {
                return $this->director. ' ' . $this->title;
            });
            $states = [
                'on'  => ['value' => '是', 'text' => '上架', 'color' => 'primary'],
                'off' => ['value' => '否', 'text' => '下架', 'color' => 'default'],
            ];
            $grid->isReleased('上架状态')->switch($states);

            // 关闭编辑和删除
//            $grid->actions(function ($actions) {
//                $actions->disableDelete();
//                $actions->disableEdit();
//            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Movie::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','电影名')->placeholder('请输入电影名字') ->rules('required|min:1');
            $form->text('director','导演');
            $form->image('logo','电影海报')->uniqueName();
            $isReleased = [
                '是' =>'是',
                '否' => '否',
            ];
            $form->select('isReleased','是否上架')->options($isReleased);
            $form->editor('desc','电影简介');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
