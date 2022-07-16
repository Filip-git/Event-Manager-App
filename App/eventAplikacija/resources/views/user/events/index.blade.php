@extends('layouts.master')

@section('content')
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Svi događaji na koje ste se prijavili</h6>
            <h2>Rezervirani događaji</h2>
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
                @include('partials.alerts-relative')
                <div class="col-lg-12">
                  <ul class="nacc">
                      <div>
                        <div class="col-lg-12">
                          <div class="owl-carousel owl-listing">
                            <?php $counter = 1; ?>
                            @if ($user->events->isEmpty())
                                <div class="alert alert-info container" role="alert">
                                    Nemate rezerviranih događaja.
                                </div>
                            @endif
                            @foreach($user->events->sortByDesc('date') as $event)
                                <?php
                                    $eventDate = strtotime($event->date);
                                    $now = strtotime(date('d.m.Y H:i'));
                                ?>
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
                                                <a href="{{ route('details', $event->id) }}"><i class="fa fa-edit"></i> &nbsp;Pogledajte detalje&nbsp;&nbsp;</a>
                                                </div>
                                                @if($eventDate > $now)
                                                <div class="main-white-button organizer-delete-button mt-5">
                                                    <a type="submit" onclick="event.preventDefault(); document.getElementById('detach-event-form-{{ $event->id }}').submit()"><i class="fa fa-trash"></i> Otkažite rezervaciju</a>
                                                </div>
                                                @endif
                                            </div>
                                            </div>
                                            <div class="right-content align-self-center">
                                            <a href="{{ route('details', $event->id) }}">
                                                <h4>{{ Str::of($event->name)->limit(50) }}</h4>
                                            </a>
                                            <h6>Organizator: {{ $event->organizer->name }}</h6>
                                            <span class="price">
                                                <div class="icon"><img src="/assets/images/listing-icon-01.png" alt=""></div>
                                                {{ $event->price }} KM
                                            </span>
                                            <span class="details">Detalji: <em>{{ Str::of($event->description)->limit(70) }}</em></span>
                                            <span class="info">
                                                <i class="fa fa-ticket icon-event"></i> Broj prijava: {{ $event->users->count()}}<br>
                                                @if($eventDate > $now)
                                                    <i class="fa fa-clock-o icon-event"></i> Datum:  {{ date('d.m.Y H:i', strtotime($event->date)) }}
                                                @else
                                                    <div class="event-end">Događaj završio</div>
                                                @endif
                                            </span>
                                                <!-- <img src="/assets/images/listing-icon-03.png" alt=""> 3 Kupatila </span><br> -->
                                            </span><br>

                                            <form id="detach-event-form-{{ $event->id }}" action="{{ route('user.events.destroy', $event->id) }}" method="POST" style="display: none">
                                                @csrf
                                                @method("DELETE")
                                            </form>

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

                            @endforeach
                          </div>
                        </div>


                      </div>
                    </li>
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
