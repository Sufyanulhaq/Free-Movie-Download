@extends('layouts.main')
@section('content')

<section class="payment-section">
    <h1 class="mx-5 mt-5">Detail Description</h1>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 p-5">
            <div class="card p-5 shadow">
                <img src="{{ asset('storage/app/'.$content->image->url) }}" alt="Product Image" class="product-image">
                <div class="row mt-5">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <h4 class="product-title">{{ $content->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <p class="text-success product-price">Price: ${{ $content->price }}</p>
                    </div>
                </div>
                <h6 class="product-section-heading">Description:</h6>
                <p class="product-description">{{ $content->description }}</p>
                <p class="product-recommendation">Recommendation: {{ $content->recommendation }}</p>
                <p class="product-format">Format: {{ $content->format }}</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="w-75 payment-form" action="{{ route('checkout') }}" method="post">
                    <h4 class="form-heading">Confirmation Form</h4>
                    @csrf
                    <div class="border p-3 shadow form-container">
                        <div class="form-group my-3">
                            <label class="form-label">Order ID</label>
                            <input type="text" name="PAYMENT_ID" class="form-control" value="2023{{ $data->id }}">
                        </div>
                        <div class="form-group my-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="PAYEE_NAME" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group my-3">
                            <label class="form-label">Amount</label>
                            <input type="text" name="PAYMENT_AMOUNT" class="form-control"
                                value="{{ $content->price }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Currency</label>
                            <input type="text" name="PAYMENT_UNITS" class="form-control" value="USD">
                        </div>
                        <label class="form-label mt-3">Payment Method</label>
                        <select name="payment_method" class="form-select" required
                            aria-label="Default select example">
                            <option selected>Select Method</option>
                            <option value="1">Perfect Money</option>
                            <option value="2">BTC</option>
                            <option value="2">LTC</option>
                            <option value="2">ETH</option>
                            <option value="2">USDT</option>
                        </select>
                        <p class="mt-4">If you want to buy this product, click on the Check out Button</p>
                        <button class="btn btn-primary my-3" type="submit">Buy Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
