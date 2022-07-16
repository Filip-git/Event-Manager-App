@extends('layouts.master')

@section('content')
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Popis svih događaja koje ste kreirali</h6>
            <h2>Vaši oglasi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-end container pt-5">
    <a class="btn btn-lg btn-success" href="{{ route('organizer.events.create') }}" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Dodajte novi događaj
    </a>
  </div>
  <div class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="nacc">
                    <div>
                        <div class="col-lg-12">
                            <div class="owl-carousel owl-listing">
                            <?php $counter = 1; ?>
                            @if (($events->where('organizer_id', auth()->user()->id))->isEmpty())
                                <div class="alert alert-info container" role="alert">
                                    Nemate organiziranih događaja.
                                </div>
                            @endif
                            @foreach($events as $event)
                            <?php
                                    $eventDate = strtotime($event->date);
                                    $now = strtotime(date('d.m.Y H:i'));
                            ?>
                            @if ($event->organizer->id == auth()->user()->id)

                                @if($counter == 1)
                                    <div class="item">
                                    <div class="row">
                                @endif

                                        <div class="col-lg-12">
                                        <div class="listing-item">
                                            <div class="left-image">
                                            <a href="{{ route('details', $event->id) }}"><img src="{{ $event->image }}" alt=""></a>
                                            <div class="hover-content">

                                                @if($eventDate > $now)
                                                <div class="main-white-button">
                                                    <a href="{{ route('organizer.events.edit', $event->id) }}"><i class="fa fa-edit"></i> Uredite podatke&nbsp;&nbsp;</a>
                                                </div>
                                                <div class="main-white-button organizer-delete-button mt-5">
                                                    <a type="submit" onclick="event.preventDefault(); document.getElementById('delete-event-form-{{ $event->id }}').submit()"><i class="fa fa-trash"></i> Obrišite događaj</a>
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

                                            <form id="delete-event-form-{{ $event->id }}" action="{{ route('organizer.events.destroy', $event->id) }}" method="POST" style="display: none">
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
