@extends('site.base')

@section('content')
    <!-- Showcase -->
    <section id="showcase">
        <div class="container text-center">
            <div class="home-search p-5">
                <div class="overlay p-5">
                    <h1 class="display-4 mb-4">
                        Ngerantau dan Tidak Tahu Dimana?
                    </h1>
                    <p class="lead">Kami Punya Beberapa Pilihan Untuk Anda !!!</p>
                    <div class="search">
                        <form method="GET" action="{{ route('search') }}">
                            <!-- Form Row 2 -->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="sr-only">Bedrooms</label>
                                    <select name="bedroom" class="form-control">
                                        <option selected="true" disabled="disabled">Beds (All)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>

                            </div>
                            <button class="btn btn-secondary btn-block mt-4" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listings -->
    <section id="listings" class="py-5">
        <div class="container">
            <h3 class="text-center mb-3">Latest Listings</h3>
            <div class="row">
                <!-- Listings -->
                <!-- for listing in listings -->
                @foreach ($latest_listings as $listing)
                    
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card listing-preview">
                      <img class="card-img-top" src="assets/img/homes/home-1.jpg" alt="">
                      <div class="card-img-overlay">
                        <h2>
                          <span class="badge badge-secondary text-white">@currency($listing -> price)</span>
                        </h2>
                      </div>
                      <div class="card-body">
                        <div class="listing-heading text-center">
                          <h4 class="text-primary">{{ $listing -> title }}</h4>
                          <p>
                            <i class="fas fa-map-marker text-secondary"></i>
                            {{ $listing -> city }} {{ $listing -> country }}
                        
                        </p>
                        </div>
                        <hr>
                        <div class="row py-2 text-secondary">
                          <div class="col-6">
                            <i class="fas fa-car"></i> Garage: {{ $listing -> garage }}</div>
                          <div class="col-6">
                            <i class="fas fa-bed"></i> Beds: {{ $listing -> bedroom }}</div>
                        </div>
                        <div class="row py-2 text-secondary">
                          <div class="col-6">
                            <i class="fas fa-bath"></i> Bathrooms: {{ $listing -> bathroom }}</div>
                        </div>
                        <hr>
                        <div class="row text-secondary pb-2">
                          <div class="col-6">
                            <i class="fas fa-clock"></i> {{ $listing -> created_at->diffForHumans() }} 
                        </div>
                        </div>
                        <hr>
                        <a href="{{ route('single.listing', $listing->id) }}" class="btn btn-primary btn-block">More Info</a>
                      </div>
                    </div>
                  </div>
                
                @endforeach
 

            </div>
        </div>
    </section>


@endsection