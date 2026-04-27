<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\API\CartRepository;

class CartController extends Controller
{
    protected $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->index($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'consumer_id' => 'nullable|exists:users,id',
            'cart_data' => 'required|array',
            'cart_data.*.isPackage' => 'required|boolean',
        ]);

        return $this->repository->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function emptyCart()
    {
        return $this->repository->emptyCart();
    }
}
