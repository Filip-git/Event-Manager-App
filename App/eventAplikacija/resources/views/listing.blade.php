@extends('layouts.master')

@section('content')
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Pogledajte dostupne oglase</h6>
            <h2>Oglasi za različite kategorije</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    @foreach($categories as $category)
                        @if($category == $category_link)
                            <div id={{ $category_link->name }} class="first-thumb active">
                        @else
                            <div id={{ $category->name }} class="first-thumb">
                        @endif
                                <div class="thumb">
                                    <span class="icon"><img src="{{$category->icon}}" alt=""></span>
                                    {{ $category->name }}
                                </div>
                            </div>
                    @endforeach

                    </div>
                </div>
                <div class="col-lg-9">
                  <ul class="nacc">
                      @foreach($categories as $category)
                    <!-- first category listing of items -->
                    @if($category == $category_link)
                    <li class="active">
                    @else
                    <li class="">
                    @endif
                      <div>
                        <div class="col-lg-12">
                          <div class="owl-carousel owl-listing">
                            <?php $counter = 1; ?>
                            @foreach($events as $event)
                                @foreach ($event->categories as $event_category )
                                    @if ($event_category->id == $category->id)

                                    @if($counter == 1)
                                        <div class="item">
                                        <div class="row">
                                    @endif

                                        <div class="col-lg-12">
                                        <div class="listing-item">
                                            <div class="left-image">
                                            <a href="{{ route('details', $event->id) }}"><img src="{{ $event->image }}" alt=""></a>
                                            <div class="hover-content">
                                                <div class="main-white-button">
                                                <a href="{{ route('details', $event->id) }}"><i class="fa fa-eye"></i> Detaljnije</a>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="right-content align-self-center">
                                            <a href="{{ route('details', $event->id) }}">
                                                <h4>{{ Str::of($event->name)->limit(30) }}</h4>
                                            </a>
                                            <h6>Organizator: {{ $event->organizer->name }}</h6>
                                            <span class="price">
                                                <div class="icon"><img src="/assets/images/listing-icon-01.png" alt=""></div>
                                                {{ $event->price }} KM
                                            </span>
                                            <span class="details">Detalji: <em>{{ Str::of($event->description)->limit(35) }}</em></span>
                                            <span class="info">
                                                <i class="fa fa-ticket icon-event"></i> Broj prijava: {{ $event->users->count()}}<br>
                                                <i class="fa fa-clock-o icon-event"></i> Datum: {{ date('d.m.Y H:i', strtotime($event->date)) }}</span>
                                            </div>
                                        </div>
                                        </div>

                                    @if($counter % 3 == 0)
                                        </div>
                                        </div>
                                        <?php $counter = 1; ?>
                                    @else
                                        <?php $counter++; ?>
                                    @endif

                                    @endif
                                @endforeach
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach

                    <!-- second category listing of items -->


                  </ul>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@stop
