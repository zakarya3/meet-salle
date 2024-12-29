@extends('layouts.client.app')
@section('content')
// list of rooms

    <!-- offers_area_start -->
    <div class="offers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Nos offres</span>
                        <h3>Salles de réunion en vedette</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($rooms as $item)
                <div class="col-xl-4 col-md-4">
                    <div class="single_off
                    ers">
                        <div class="about_thumb">
                            <img style="width: 100%" src="{{ $item->image }}" alt="">
                        </div>
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                        <a href="#" class="book_now">Réserver maintenant</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
