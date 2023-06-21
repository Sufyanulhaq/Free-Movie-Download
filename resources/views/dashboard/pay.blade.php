@extends('layouts.main')
@section('content')
<style>
    .max-width{
        max-width: fit-content;
    }
    .border.text-center{
        padding: 50px;
    }
    section.payment-section {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.name,.id{
    border:none;
    background: white;
}
form{
    text-align-last: center;

}
</style>
    <section class="payment-section">
        <div class="max-width">
            <div class="border text-center">
                <h4>Confirm!</h4>
                Just Click on the Check Out If You confirm the Payment
            <form action="https://perfectmoney.com/api/step1.asp"  method="post">
                    @csrf
                    <input type="hidden" name="PAYEE_ACCOUNT" value="U22178145">
                    <input type="text" class="form-control name"  name="PAYEE_NAME" value="{{$data->name}}">
                    <input type="hidden" class="id" name="PAYMENT_ID" value="2023{{$data->id}}">
                    <input type="text" class="form-control name mt-2" name="PAYMENT_AMOUNT" value="{{$content->price}}"><BR>
                    <input type="hidden" name="PAYMENT_UNITS" value="USD">
                    <input type="hidden" name="STATUS_URL" value="http://127.0.0.1:8000/data">
                    <input type="hidden" name="PAYMENT_URL" value="http://127.0.0.1:8000/success">
                    <input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
                    <input type="hidden" name="NOPAYMENT_URL" value="http://127.0.0.1:8000/no-payment">
                    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">
                    <input type="hidden" name="SUGGESTED_MEMO" value="">
                    <input type="hidden" name="BAGGAGE_FIELDS" value="">
                    <input type="submit" class="btn btn-success mt-3" name="PAYMENT_METHOD" value="Confirm Payment">
                </form>
            </div>
        </div>
        <a href="{{route('user.home')}}" class="btn btn-danger w-100 mt-3" >Cancel</a>
    </section>
@endsection
<!-- http://localhost/home -->