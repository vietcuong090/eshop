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
                                <th>Code</th>
                                <th>Status</th>
                                <th>User_id</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row"> {{ $loop->index + 1 }}</th>
                                <td>{{ $order->code}}</td>
                                <td class=" text-bg-primary text-wrap"> {{ $order->status }} <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>{{ $order->user_id }}</td>
                                <td>
                                    <a class="badge badge-danger" href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post">
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