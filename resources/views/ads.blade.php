@extends('master')
@section('title')
Ads
@endsection
@section('content')
<main>
    <div class="container">
    <table class="table table-bordered table-striped table-active" >
        <tr class="table-secondary">
            <thead>
                <th class="text-center">#</th>
                <th>Ciudad</th>
                <th>Categoría</th>
                <th>Servicio</th>
                <th>Precio por hora</th>

            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($ads as $row)

                <tr>
                    <td class="text-center">{{$i++}}</td>

                    <td>{{$row->city}}</td>
                    <td>{{ str_replace("_"," ",$row->category) }}</td>
                    <td> @foreach(explode(',', $row->search_tag__services) as $service)
                        <span class="badge-pill special-tag">
                            <i aria-hidden="true" class="fa fa-star-o mr-1"></i> {{ str_replace("_"," ",$service) }} </span>
                        @endforeach
                    </td>
                    <td>{{ $row->hourly_price }} </td>

                </tr>
                @endforeach
            </tbody>
        </tr>
    </table>
    </div>

</main>
@endsection
