@extends('admin.layout')

@section('content')

<div class="alert alert-success">
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hoverable Table</h4>
                    <p class="card-description"> Add class <code>.table-hover</code> </p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product_id</th>
                                <th>Order_id</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                            <tr>
                                <th scope="row"> {{ $loop->index + 1 }}</th>
                                <td>{{ $orderItem->product_id}}</td>
                                <td class=" text-bg-primary text-wrap"> {{ $orderItem->order_id }} <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $orderItem->price }}</td>
                                <td>
                                    <a class="badge badge-danger" href="{{ route('admin.order-items.edit', $orderItem->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.order-items.destroy', $orderItem->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection