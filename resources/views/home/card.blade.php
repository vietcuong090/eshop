@extends('layout')

@section('content')

<table class="table">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
    <tbody>
      @php
      $total = 0;
      @endphp
      
      @foreach($cart as $item)
      @php
      $subtotal = $item['price'] * $item['quantity'];
      $total += $subtotal;
      @endphp
      <tr>
        <td> # </td>
        <td>{{ $item['name'] }}</td>
        <td>
          <img src="{{ $item['img'] }}" alt="Product Image" style="width: 100px;">
        </td>
        <td>{{ $item['price'] }}</td>
  
        <form action="{{ route('update-card', $item['id']) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <td> <input type="number" name="quantity" max="10" min="1" value="{{ $item['quantity'] }}"></td>
          
        </form>
  
        <td>
          <form action="{{ route('delete-card', $item['id']) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Delete<i data-lucide="trash-2"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
  
  
      
    </tbody>
</table>

@endsection