@extends('layouts.client.app')
@section('content')
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
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img style="width: 100%" src="{{ $item->image }}" alt="">
                        </div>
                        <h3>{{ Str::limit($item->name, 30,'...') }}</h3>
                        <p>{{ Str::limit($item->description, 80, '...') }}</p>
                        <a href="{{ route('rooms.show', $item->id) }}" class="book_now">Réserver maintenant</a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Styled Pagination -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <div class="custom-pagination">
                        {{ $rooms->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

            <style>
                .custom-pagination .pagination {
                    margin: 0;
                }
                .custom-pagination .page-item .page-link {
                    color: #009DFF;
                    padding: 12px 20px;
                    margin: 0 5px;
                    border-radius: 4px;
                }
                .custom-pagination .page-item.active .page-link {
                    background-color: #009DFF;
                    border-color: #009DFF;
                    color: white;
                }
                .custom-pagination .page-link:hover {
                    background-color: #e9ecef;
                }
            </style>
        </div>
    </div>
@endsection