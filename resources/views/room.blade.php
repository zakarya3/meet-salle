@extends('layouts.client.app')
@section('content')
<div class="room_details_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="room_thumb">
                    <img src="{{ $room->image }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="room_details_info">
                    <h3>{{ $room->name }}</h3>
                    <div class="price_per_night">
                        <span>{{ number_format($room->price) }} DH<small>/heure</small></span>
                    </div>
                    <p>{{ $room->description }}</p>
                    
                    <div class="room_features mt-4">
                        <h4>Caractéristiques</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-users"></i> Capacité: {{ $room->capacity }} personnes</li>
                            <li><i class="fa fa-vector-square"></i> Surface: {{ $room->surface }} m²</li>
                            @if($room->has_projector)
                                <li><i class="fa fa-projector"></i> Projecteur</li>
                            @endif
                            @if($room->has_wifi)
                                <li><i class="fa fa-wifi"></i> Wifi</li>
                            @endif
                            @if($room->has_ac)
                                <li><i class="fa fa-snowflake"></i> Climatisation</li>
                            @endif
                        </ul>
                    </div>

                    <div class="booking_form mt-4">
                        <h4>Réserver cette salle</h4>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Heure</label>
                                        <input type="time" name="time" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Durée (heures)</label>
                                        <input type="number" name="duration" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="client_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="client_email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="text" name="client_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="book_now_btn">Réserver maintenant</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.room_details_area {
    padding: 100px 0;
}
.room_thumb img {
    width: 100%;
}
.price_per_night {
    font-size: 24px;
    color: #009DFF;
    margin: 15px 0;
}
.room_features ul li {
    margin-bottom: 10px;
    font-size: 16px;
}
.room_features ul li i {
    margin-right: 10px;
    color: #009DFF;
}
.book_now_btn {
    background: #009DFF;
    color: #fff;
    padding: 12px 30px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.book_now_btn:hover {
    background: #0056b3;
}
</style>
@endsection