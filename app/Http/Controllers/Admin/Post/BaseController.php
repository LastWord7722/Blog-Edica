<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Service\Admin\AdminPostService;


class BaseController extends Controller
{
    public $service;

    public function __construct(AdminPostService $service)
    {
        $this->service = $service;
    }


}


