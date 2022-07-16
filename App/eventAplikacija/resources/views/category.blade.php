@extends('layouts.master')

@section('content')
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Kategorije događaja</h6>
            <h2>Događaji različitih kategorija</h2>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="category-post">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                    <div class="menu">
                        @foreach($categories->take(5) as $category)
                        <div @if($loop->first)class="first-thumb active"@elseif($loop->last)class="last-thumb"@endif>
                            <div class="thumb">
                              <span class="icon"><img src="{{$category->icon}}" alt="">
                                <h4>{{$category->name}}</h4>
                              </span>
                            </div>
                          </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-lg-12">
                  <ul class="nacc">
                      @foreach($categories->take(5) as $category)
                    <li  @if($loop->first)class="active"@endif>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="top-content">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="top-icon">
                                      <span class="icon"><img src="{{ $category->icon }}" alt="">
                                        <h4>{{ $category->name }}</h4>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="main-white-button">
                                      <a href="{{ route('listing', $category->id) }}"><i class="fa fa-plus"></i> Pregledajte Događaje</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="description">
                                <div class="row">
                                  <div class="col-lg-9">
                                    <h4>Opis Kategorije {{ $category->name }}</h4>
                                    <p>{{$category->description}}</p>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="text-icon">
                                      <h4><img src="assets/images/listing-icon-heading.png" alt=""> Ukupno Oglasa</h4>
                                    </div>
                                    <?php
                                        $year = 0;
                                        $month = 0;
                                        $week = 0;
                                    ?>
                                    @foreach($events_year as $event_year)
                                        @if($category->events->contains($event_year))
                                        <?php $year++; ?>
                                        @endif
                                    @endforeach

                                    @foreach($events_month as $event_month)
                                        @if($category->events->contains($event_month))
                                        <?php $month++; ?>
                                        @endif
                                    @endforeach

                                    @foreach($events_week as $event_week)
                                        @if($category->events->contains($event_week))
                                        <?php $week++; ?>
                                        @endif
                                    @endforeach
                                    <span class="list-item">Ovaj Tjedan: {{$week}} Oglasa<br>Ovaj Mjesec: {{$month}}
                                      Oglasa<br>Ove Godine: {{$year}} Oglasa</span>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="general-info">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <h4 class="text-capitalize">Pravila za kreiranje događaja</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ak
                                      incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                      gravidat doerski. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                      accusantium doloremque.</p>
                                    <span class="list-item">* Listing should have all the proper documents before being
                                      checked in.
                                      <br>** Listing will be checked by our team members.
                                      <br>*** After being sold, it should imediately be removed from our site and
                                      properly monitored.</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                   @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
