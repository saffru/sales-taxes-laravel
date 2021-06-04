@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-around">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-12 lg:px-6">

            <form role="form" method="post" action="{{ route('store') }}">
                @csrf

                <div class="form-group">
                    <p class="text-white">Select category</p>
                    <select class="form-control" id="category-button" name="category">
                        <option>Other</option>
                        <option>Book</option>
                        <option>Food</option>
                        <option>Medical prod</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input type="hidden" name="products" value="{{ serialize($products) }}">

                    <input id="product-name" name="product-name" type="text" class="form-control"
                        placeholder="Product name">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input id="price" name="price" type="text" class="decimal form-control" placeholder="10.00">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="imported" value="true" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p class="text-white">Imported</p>
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
        <div class="max-w-6xl mx-auto sm:px-12 lg:px-6">
            <form role="form" method="post" action="{{ route('purchase') }}">
                @csrf
                <div>
                    <ul class="list-group">
                        @forelse ($products as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div><strong>{{ $product['category'] }}</strong></div>
                                    {{ $product['name'] }}
                                    <p class="text-success">{{ $product['imported'] ? 'Imported' : ''}}</p>
                                </div>
                                <span class="badge">{{ $product['price'] }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">No products</li>
                        @endforelse
                    </ul>
                </div>
                <input type="hidden" name="products" value="{{ serialize($products) }}">
                <div>
                    <br>
                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.decimal').keyup(function() {
                var val = $(this).val();
                if (isNaN(val)) {
                    val = val.replace(/[^0-9\.]/g, '');
                    if (val.split('.').length > 2)
                        val = val.replace(/\.+$/, "");
                }
                $(this).val(val);
            });

            $('select').on('change', function() {
                var value = $(this).find(":selected").html();
                switch (value) {
                    case 'Book':
                        value = 'Book title';
                        break;
                    case 'Food':
                        value = 'Food name';
                        break;
                    case 'Medical prod':
                        value = 'Drug name';
                        break;
                    default:
                        'Product name'

                }
                $('#product-name').attr('placeholder', value);
            });
        });

    </script>
@stop
