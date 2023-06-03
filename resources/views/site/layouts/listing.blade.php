@extends('site.base')
@section('title'){{ $listing ->title }} | @endsection

@section('content')

  <!-- Breadcrumb -->
  <section id="bc" class="mt-3">
    <div class="container">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('index') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('listings')}}">Listings</a>
          </li>
          <li class="breadcrumb-item active">{{ $listing ->title }}</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Listing -->
  <section id="listing" class="py-4">
    <div class="container">
      <a href="{{route('listings')}}" class="btn btn-light mb-4">Back To Listings</a>
      <div class="row">
        <div class="col-md-9">
          <!-- Home Main Image -->
          <img src="{{ url($listing -> thumbnail_0) }}" alt="" class="img-main img-fluid mb-3">
          <!-- Thumbnails -->
          <div class="row mb-5 thumbs">
            @if ($listing ->thumbnail_1)
            <div class="col-md-2">
            <a href="{{ url($listing ->thumbnail_1) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_1) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif
            @if ($listing ->thumbnail_2)
            <div class="col-md-2">
              <a href="{{ url($listing ->thumbnail_2) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_2) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif
            @if ($listing ->thumbnail_3)
            <div class="col-md-2">
              <a href="{{ url($listing ->thumbnail_3) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_3) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif
            @if ($listing ->thumbnail_4)
            <div class="col-md-2">
              <a href="{{ url($listing ->thumbnail_4) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_4) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif
            @if ($listing ->thumbnail_5)
            <div class="col-md-2">
              <a href="{{ url($listing ->thumbnail_5) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_5) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif
            @if ($listing ->thumbnail_6)
            <div class="col-md-2">
              <a href="{{ url($listing ->thumbnail_6) }}" data-lightbox="home-images">
                <img src="{{ url($listing ->thumbnail_6) }}" alt="" class="img-fluid">
              </a>
            </div>
            @endif

          </div>
          <!-- Fields -->
          <div class="row mb-5 fields">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-secondary" id="price">
                  <i class="fas fa-money-bill-alt"></i> Asking Price:
                  <span class="float-right"> @currency( $listing ->price )</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-bed"></i> Bedrooms:
                  <span class="float-right">{{ $listing ->bedroom }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-bath"></i> Bathrooms:
                  <span class="float-right">{{ $listing ->bathroom }}</span>
                </li>
                <li class="list-group-item text-secondary">
                  <i class="fas fa-car"></i> Garage:
                  <span class="float-right">{{ $listing ->garage }}
                  </span>
                </li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-secondary">
                  <i class="fas fa-calendar"></i> Listing Date:
                  <span class="float-right">{{ $listing -> created_at->diffForHumans() }}</span>
                </li>
               </ul>
            </div>
          </div>

          <!-- Description -->
          <div class="row mb-5">
            <div class="col-md-12">
              {{ $listing ->description }}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <button class="btn-primary btn-block btn-lg" data-toggle="modal" data-target="#inquiryModal">Make An Inquiry</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Inquiry Modal -->
  <!-- Inquiry Modal -->
  <div class="modal fade" id="inquiryModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inquiryModalLabel">Make An Inquiry</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('send-message') }}" method="POST">
            @csrf
              <input type="hidden" name="listing_id" value="{{ $listing ->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <div class="form-group">
                <label for="property_name" class="col-form-label">Property:</label>
                <input type="text" name="listing" class="form-control" value="{{ $listing ->title }}" disabled="">
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control"   @auth value="{{ Auth::user()->get_full_name() }}"@endif required>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" class="form-control"  @auth value="{{ Auth::user()->email }}" @endif required>
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Phone:</label>
                <input type="text" name="contact_number" class="form-control">
              </div>
              <div class="form-group">
                <label for="message" class="col-form-label">Message:</label>
                <textarea name="message" class="form-control" required></textarea>
              </div>
              <hr>
              <input type="submit" value="Send" class="btn btn-block btn-secondary">
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('child-scripts')
<script>
var dengan_rupiah = document.getElementById('price');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endpush