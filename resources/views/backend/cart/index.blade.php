@extends('backend.layouts.master')

@section('title', 'Abandoned Carts')

@section('content')
    @use('App\Helpers\Helpers')
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5>Abandoned Carts</h5>
                </div>
                <div class="card-body common-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex char-name">
                                                <div class="char-img">
                                                    <img src="{{ $cart->customer?->getFirstMediaUrl('image') ?: asset('admin/images/avatar/1.jpg') }}" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                                                </div>
                                                <div class="char-content ms-2">
                                                    <h6>{{ $cart->customer?->name }}</h6>
                                                    <span>{{ $cart->customer?->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $cart->service?->title }}</td>
                                        <td>
                                            {{ Helpers::getDefaultCurrencySymbol() }}{{ number_format($cart->service?->price, 2) }}
                                        </td>
                                        <td>{{ $cart->created_at->format('d M, Y H:i A') }}</td>
                                        <td>
                                            <a href="{{ route('backend.cart.reminder', $cart->id) }}" class="btn btn-primary btn-sm">Send Reminder</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No abandoned carts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
