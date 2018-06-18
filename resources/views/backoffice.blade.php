@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-right border-primary">
                <a href="/backoffice/create">+ add</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_item as $items)
                            <tr>
                                <th scope="row">{{$items->id}}</th>
                                <td class="img-thumbnail" style="width: 200px ; height: 200px">
                                    <img src="/storage/photo_vet/{{$items->product_img}}"
                                         class="figure-img img-fluid rounded">
                                </td>
                                <td>{{$items->product_name}}</td>
                                <td>{{$items->product_total}}</td>
                                <td>{{$items->product_price}}</td>
                                <td>
                                        <button type="button" class="btn btn-outline-danger">delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
