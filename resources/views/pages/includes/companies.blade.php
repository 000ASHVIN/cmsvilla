<!-- Trust -->
@php
    $page_home = \DB::table('page_home_items')->where('id',1)->first();
    $companies = \DB::table('companies')->get();
@endphp
<div id="trust" class="section is-medium">
    <div class="container">
      <!-- Title -->
      <div class="section-title-wrapper">
        <div class="bg-number">
          {{-- <i class="material-icons trust-bg-image">domain</i> --}}
        </div>
        <!-- <h2 class="section-title-landing has-text-centered dark-text">
            We build Trust
          </h2>
          <h4 class="has-text-centered">
            More than <b>900 Teams</b> use our product.
          </h4> -->
  
        <div class="centered-title mb-40">
          <h2>{{ $page_home->trusted_company_title }}</h2>
          <div class="title-divider"></div>
        </div>
      </div>
      <!-- Grid -->
      <div class="content-wrapper">
        <div class="grid-clients five-grid">
  
          @foreach($companies->chunk(5) as $company)
          <div class="columns is-vcentered">
            <div class="column is-hidden-mobile"></div>
  
            @foreach($company as $row)
            <!-- Client -->
            <div class="column">
              <a href="{{ $row->slug }}" target="_blank"><img class="client" id="" src="{{ asset('uploads/'.$row->photo) }}" alt="" /></a>
            </div>
            @endforeach
            <div class="column is-hidden-mobile"></div>
          </div>
          @endforeach
        </div>
        <!-- CTA -->
        <!-- <div class="has-text-centered is-title-reveal pt-40 pb-40">
            <a
              href="#"
              class="button button-cta btn-align primary-btn is-bold raised"
              >Get in Touch Now</a
            >
          </div> -->
      </div>
    </div>
</div>