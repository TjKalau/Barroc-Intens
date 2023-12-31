@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 ">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Bedrijf <span>Lijst</span></h4>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <form action="" >
                                        @csrf
                                        <input type="search" name="search" id="" class="form-control" placeholder="Zoek een bedrijf" value="{{$search}}">
                                        <button class="btn btn-default">Zoek</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Bedrijfsnaam</th>
                                <th scope="col">telefoon</th>
                                <th scope="col">straat</th>
                                <th scope="col">huisnummer</th>
                                <th scope="col">stad</th>
                                <th scope="col">landnummer</th>
                                <th scope="col">Betaald op</th>
                                <th scope="col">bkr check</th>
                                <th scope="col">laast geupdate</th>
                            </tr>
                            </thead>
                            @foreach($companies as $company)
                                <tbody>
                                <tr class="border-bottom" >
                                    <th scope="row"></th>
                                    <td><a href="{{route('company.show', $company)}}">{{$company->name}}</a></td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->street}}</td>
                                    <td>{{$company->house_number}}</td>
                                    <td>{{$company->city}}</td>
                                    <td>{{$company->country_code}}</td>
                                    <td>@if(empty($company->invoices->paid_at))
                                            Nog niet betaald
                                        @endif
                                    </td>
                                    <td>
                                        @if($company->bkr_checked_at == 'goed')
                                            <span class="badge rounded-pill text-bg-success">Goed</span>
                                        @elseif($company->bkr_checked_at == 'fout')
                                            <span class="badge rounded-pill text-bg-danger">Geweigerd</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning">Nog niet gecheckt</span>
                                        @endif
                                    </td>
                                    <td>{{$company->updated_at}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
