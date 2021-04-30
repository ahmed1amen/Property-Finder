<?php
namespace Modules\User\Controllers;

use Modules\FrontendController;

class ServiceController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = [
            'rows' =>[],
            'breadcrumbs' => [
                [
                    'name' => __('Services'),
                    'class' => 'active'
                ],
            ],
            'page_title' => __("Services"),
        ];
        return view('User::frontend.service.index', $data);
    }
}
