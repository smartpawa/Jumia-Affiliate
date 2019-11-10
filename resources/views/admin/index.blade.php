@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                        <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                <th scope="col">Prod. ID</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col">Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index=1;
                                    @endphp
                                    @foreach($products as $product)
                                  <tr>
                                    <th scope="row">{{ $index++ }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->seller }}</td>
                               
                                    <td>{{ number_format($product->current_price) }}</td>
                                    <td><a href="/new/{{ $product->id }}/edit">Edit</a></td>
                                    <td>
                                            <form action="/new/{{ $product->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button>Delete </button>
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
</div>
@endsection
