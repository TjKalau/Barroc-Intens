@extends('layouts.app')

@section('headerName')
    <h1 class="text-black">Inkoop</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 ">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Product <span>Lijst</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                    <div class="btn_group">
                        <form action="{{route('filterStatus.store')}}" method="POST">

                                @csrf
                                <select class="form-control" id="status" name="status">
                                    <option value="1" style="color: black">alles</option>
                                    <option value="2" style="color: black">Momenteel leverbaar</option>
                                    <option value="3" style="color: black">Uit vooraad</option>
                                </select>
                            <input type="submit" value="filter opslaan" class="btn btn-primary bg-primary">
                        </form>

                        <a class="btn btn-warning mb-2" href="{{route('inkoop.create')}}" style="margin-top: 8px">Product aanmaken</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body table-responsive">
            @livewire('search-products')
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Product code</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($products as $product)
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->amount}}</td>
                    <td>{{$product->status}}</td>
                    <td class="d-flex align-items-center justify-end">
                        <a class="btn btn-warning mr-2" href="{{route('inkoop.edit' , $product)}}">Edit</a>
                        <form class="m-0" method="POST" action="{{route('inkoop.destroy', $product)}}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger bg-danger" type="submit" value="Delete">
                        </form>
                    </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    <style>

    </style>
@endsection
