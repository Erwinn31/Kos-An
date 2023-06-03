@extends('site.base')
@section('title')Search Result | @endsection
@section('content')

<section id="showcase-inner" class="showcase-search text-white py-5">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <form method="GET" action="{% url 'searchapp:search' %}">
          <!-- Form Row 2 -->
          <div class="form-row">
            <div class="col-md-12">
              <label class="sr-only">Bedrooms</label>
              <select name="bedrooms" class="form-control">
                <option selected="true" disabled="disabled">Bedrooms (Any)</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
              </select>
            </div>

          </div>
          <button class="btn btn-secondary btn-block mt-4" type="submit">Submit form</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<section id="bc" class="mt-3">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{% url 'listing:home' %}">
            <i class="fas fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('listings') }}">Browse Listings</a>
        </li>
        <li class="breadcrumb-item active"> Search Results</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Listings -->
<section id="listings" class="py-4">
  <div class="container">
    <div class="row">
      @if(count($listings) > 0)
      <!-- Listing 1 -->
      @foreach($listings as $listing)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card listing-preview">
          <img class="card-img-top" src="{{ url($listing ->thumbnail_0)}}" alt="">
          <div class="card-img-overlay">
            <h2>
              <span class="badge badge-secondary text-white">${{ $listing ->price }}</span>
            </h2>
          </div>
          <div class="card-body">
            <div class="listing-heading text-center">
              <h4 class="text-primary">{{ $listing ->title }} </h4>
              <p>
                <i class="fas fa-map-marker text-secondary"></i> {{ $listing ->city }}  {{ $listing ->state }}</p>
            </div>
            <hr>
            <div class="row py-2 text-secondary">
              <div class="col-6">
                <i class="fas fa-th-large"></i> Sqft: {{ $listing ->sqft }} </div>
              <div class="col-6">
                <i class="fas fa-car"></i> Garage: {{ $listing ->garage }}</div>
            </div>
            <div class="row py-2 text-secondary">
              <div class="col-6">
                <i class="fas fa-bed"></i> Bedrooms: {{ $listing ->bedroom }}</div>
              <div class="col-6">
                <i class="fas fa-bath"></i> Bathrooms: {{ $listing ->bathroom }}</div>
            </div>
            <hr>
            <div class="row text-secondary pb-2">
              <div class="col-6">
                <i class="fas fa-clock"></i> {{ $listing -> created_at->diffForHumans() }} </div>
            </div>
            <hr>
            <a href="{{ route('single.listing', $listing -> id) }}" class="btn btn-primary btn-block">More Info</a>
          </div>
        </div>
      </div>

      @endforeach
      @endif


    </div>
  </div>
</section>
@endsection
