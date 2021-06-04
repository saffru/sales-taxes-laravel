@extends('layout.main')

@section('content')

    <p class="text-white">Output: </p>
    <br>
    <ol class="list-group list-group-numbered">
        @forelse ($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div><strong>{{ $product['category'] }}</strong></div>
                    {{ $product['imported'] ? 'Imported' : '' }} {{ $product['name'] }}
                </div>
                <span class="badgerounded-pill">{{ $product['price'] }}</span>
            </li>
        @empty
            <li class="list-group-item">No products</li>
        @endforelse
    </ol>
    <br>
    <p class="text-white">Total: {{ $result }}</p>
    <br>
    <p class="text-white">Sales Taxes: {{ $tot_taxes }}</p>
@stop
