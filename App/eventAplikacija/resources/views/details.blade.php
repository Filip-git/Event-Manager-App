@extends('layouts.master')

@section('content')
  <div class="page-heading page-heading-details">
    <div class="container details-header">
      <div class="row justify-content-end">

        <div class="details-image col-lg-5 col-sm-12">
            <a href="#"><img src="{{ $event->image }}" alt=""></a>
        </div>

        <div class="col-lg-7 col-sm-12">
          <div class="top-text header-text text-end">
            <h6></h6>
            <h2 class="details-event-heading">{{ $event->name }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="recent-listing details-recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="right-content align-self-center">
                      <h6>Organizator: {{ $event->organizer->name }}</h6>
                     <!-- <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(18) Recenzije</li>
                      </ul> -->
                      <span class="price">
                        <div class="icon"><img src="/assets/images/listing-icon-01.png" alt=""></div> {{ $event->price }} KM
                      </span>
                      <span class="details">Detalji: <em>{{ $event->description }}</em></span>
                      <span class="details"><i class="fa fa-clock-o icon-event"></i>Datum: <em>{{ date('d.m.Y H:i', strtotime($event->date)) }}</em></span>
                      <span class="details"><i class="fa fa-list-alt icon-event"></i>Kategorije: <em>@foreach($event->categories as $category){{ $category->name}}@if ( !($loop->last) ),@endif
                                                            @endforeach</em></span>
                      <span class="details"><i class="fa fa-map-marker icon-event"></i>Lokacija: <em>{{ $event->location->name}}</em></span>

                      <ul class="info">
                        <li><i class="fa fa-ticket icon-event"></i> Broj prijava: {{ $event->users->count()}}</li>
                        <!-- <li><img src="/assets/images/listing-icon-03.png" alt=""> 4 Kupatila</li> -->
                      </ul>

                     @auth
                     @can('is-user')
                     @if($event->organizer_id != $user->id)
                     @if($event->users->contains('id', $user->id))
                     <?php
                        $eventDate = strtotime($event->date);
                        $now = strtotime(date('d.m.Y H:i'));
                     ?>
                     @if($eventDate > $now)
                     <div class="main-white-button details-main-button-cancel">
                        <a type="submit" onclick="event.preventDefault(); document.getElementById('detach-event-form-{{ $event->id }}').submit()"><i class="fa fa-trash"></i> Otkažite rezervaciju</a>
                      </div>
                      <form id="detach-event-form-{{ $event->id }}" action="{{ route('user.events.destroy', $event->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                      </form>
                     @endif
                     @else
                      <div class="main-white-button details-main-button">
                        <a type="submit" onclick="event.preventDefault(); document.getElementById('attach-event-form-{{ $event->id }}').submit()"><i class="fa fa-check"></i> Prijavite se na događaj</a>
                      </div>
                      <form id="attach-event-form-{{ $event->id }}" action="{{ route('user.events.store', $event->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("POST")
                        <input name="id" type="hidden" value="{{ $event->id }}">
                      </form>
                    @endif
                    @endif
                    @endcan
                    @endauth

                    @guest
                    <div class="main-white-button details-main-button">
                        <a href="/login" type="submit"><i class="fa fa-check"></i> Prijavite se na događaj</a>
                      </div>
                    @endguest


                    </div>
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
