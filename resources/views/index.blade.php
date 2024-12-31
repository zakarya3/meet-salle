@extends('layouts.client.app')
@section('content')


    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>À propos de nous</span>
                            <h3>Des salles de réunion modernes à portée de main</h3>
                        </div>
                        <p>Réservez la salle parfaite pour vos réunions d'affaires, séminaires ou événements professionnels. Profitez de notre plateforme facile à utiliser pour découvrir des espaces adaptés à vos besoins.</p>
                        <a href="#" class="line-button">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex">
                        <div class="img_1">
                            <img src="img/about/racinea-notre-salle-de-reunion-modulable.jpg" alt="">
                        </div>
                        <div class="img_2">
                            <img src="img/about/racinea-salle-de-reunion-sur-mesure.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- offers_area_start -->
    <div class="offers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Our Offers</span>
                        <h3>Salles de réunion en vedette</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($rooms as $item)
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                        <h3>{{ Str::limit($item->name, 30,'...') }}</h3>
                        <p>{{ Str::limit($item->description, 80, '...') }}</p>
                        <a href="#" class="book_now">Réserver maintenant</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb2 d-flex">
                        <div class="img_1">
                            <img src="img/about/lpa-kareo-office-design-3.jpeg" alt="">
                        </div>
                        <div class="img_2">
                            <img src="img/about/salle-de-reunion-graffiti-2.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Services Inclus</span>
                            <h3>Des services de classe mondiale</h3>
                        </div>
                        <p>Nous proposons des équipements modernes pour vos réunions : connectivité haut débit, projecteurs HD,
                            services de restauration, et bien plus encore. Profitez d'un environnement de travail exceptionnel.</p>
                        <a href="#" class="line-button">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- features_room_startt -->
    <div class="features_room">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span>Salles de Réunion en Vedette</span>
                        <h3>Trouvez l’Espace Parfait pour Votre Prochaine Réunion</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_here">
            @foreach ($rooms6 as $item)
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="{{ $item->image }}" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>{{ $item->price }}MAD/jour</span>
                            <h3>{{ $item->capacity }} bureau</h3>
                        </div>
                        <a href="#" class="line-button">Réserver maintenant</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- features_room_end -->

    <!-- forQuery_start -->
    <div class="about_area">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Contactez-Nous</h2>
            <form action="/contact" method="POST">
              <!-- Protection CSRF (pour Laravel) -->
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
              </div>

              <div class="mb-3">
                <label for="subject" class="form-label">Sujet</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet de votre message" required>
              </div>

              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Votre message..." required></textarea>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </div>
            </form>

            <!-- Message de confirmation -->
            @if(session('success'))
              <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
              </div>
            @endif
        </div>

    </div>
    <!-- forQuery_end-->


@endsection
