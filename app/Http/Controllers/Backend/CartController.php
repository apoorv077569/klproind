<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\CartRepository;

class CartController extends Controller
{
    public $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function reminder($id)
    {
        return $this->repository->reminder($id);
    }
}
