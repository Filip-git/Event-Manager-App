@extends('layouts.master')

@section('content')

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6>DOBRODOŠLI!</h6>
            <h2>Pronađite događaje u vašoj blizini</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="{{ route('search') }}">
            <div class="row">
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="location" class="form-select" aria-label="Area" id="chooseCategory"
                    onchange="this.form.click()">
                    <option value=null selected>Sva mjesta</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{ $location->name }}</option>
                        @endforeach
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <input type="text" name="searchtext" class="searchText" placeholder="Upišite ime događaja"
                    autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="price" class="form-select" aria-label="Default select example" id="chooseCategory"
                    onchange="this.form.click()">
                    <option value=null selected>Cjenovni Rang</option>
                    <option value="250">125KM - 250KM</option>
                    <option value="500">250KM - 500KM</option>
                    <option value="1000">500KM - 1,000KM</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                  <button class="main-button"><i class="fa fa-search"></i> Pretraga</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <ul class="categories">
              @foreach($categories->take(5) as $category)
              <li><a href="{{ route('listing', $category->id) }}"><span class="icon"><img src="{{$category->icon}}" alt="Home"></span>
                {{ $category->name }}</a></li>
              @endforeach

            <!--
            <li><a href=""><span class="icon"><img src="assets/images/search-icon-01.png" alt="Home"></span>
                Koncerti</a></li>
            <li><a href=""><span class="icon"><img src="assets/images/search-icon-02.png" alt="Food"></span>
                Hrana</a></li>
            <li><a href="#"><span class="icon"><img src="assets/images/search-icon-03.png" alt="Vehicle"></span>
                Sport</a></li>
            <li><a href="#"><span class="icon"><img src="assets/images/search-icon-04.png" alt="Shopping"></span>
                Kupovina</a></li>
            <li><a href="#"><span class="icon"><img src="assets/images/search-icon-05.png" alt="Travel"></span>
                Konferencije</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="popular-categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Popularne Kategorije</h2>
            <h6></h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/search-icon-01.png" alt=""></span>
                        Koncerti
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/search-icon-02.png" alt=""></span>
                        Hrana
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/search-icon-03.png" alt=""></span>
                        Sport
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/search-icon-04.png" alt=""></span>
                        Kupovina
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/search-icon-05.png" alt=""></span>
                        Konferencije
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-9 align-self-center">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Raznovrsni koncerti svuda oko vas!</h4>
                                <p>Opis kateogrije</p>
                                <div class="main-white-button"><a href="/category"><i class="fa fa-eye"></i> Saznajte više</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/tabs-image-01.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Restorani u vašoj blizini!</h4>
                                <p>Opis kategorije</p>
                                <div class="main-white-button"><a href="/category"><i class="fa fa-eye"></i> Saznajte više</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/tabs-image-02.jpg" alt="Foods on the table">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Aktualna sportska događanja!</h4>
                                <p>Opis kategorije</p>
                                <div class="main-white-button"><a href="/category"><i class="fa fa-eye"></i> Saznajte više
                                    </a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/tabs-image-03.jpg" alt="cars in the city">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Posjetite trgovine u svojoj blizini!</h4>
                                <p>Opis proizvoda</p>
                                <div class="main-white-button"><a href="/category"><i class="fa fa-eye"></i> Saznajte više</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/tabs-image-04.jpg" alt="Shopping Girl">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Razne konfrencije u vašoj blizini!</h4>
                                <p>Opis proizvoda
                                </p>
                                <div class="main-white-button"><a href="/category"><i class="fa fa-eye"></i> Saznajte više</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/tabs-image-05.jpg" alt="Traveling Beach">
                              </div>
                            </div>
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


  <div class="recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Nedavno Dodani Događaji</h2>
            <h6>Razgledajte ih</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            @foreach($events as $event)
            <div class="item">
              <div class="row">

                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="{{ route('details', $event->id) }}"><img src="{{ $event->image }}" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="{{ route('details', $event->id) }}">
                        <h4>{{ Str::of($event->name)->limit(35) }}</h4>
                      </a>
                      <h6>Organizator: {{ $event->organizer->name }}</h6>
                    <!--  <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(18) Recenzije</li>
                      </ul> -->
                      <span class="price">
                        <div class="icon"><img src="assets/images/listing-icon-01.png" alt=""></div> {{ $event->price }} KM

                      </span>
                      <span class="details">Detalji: <em>{{ Str::of($event->description)->limit(50) }}</em></span>
                      <ul class="info">
                        <i class="fa fa-ticket icon-event"></i> Broj prijava: {{ $event->users->count()}}<br>
                        <i class="fa fa-clock-o icon-event"></i> Datum: {{ date('d.m.Y H:i', strtotime($event->date)) }}</span>
                        <!-- <li><img src="assets/images/listing-icon-03.png" alt=""> 4 Kupatila</li> -->
                      </ul>
                      <div class="main-white-button">
                        <a href="contact"><i class="fa fa-eye"></i> Kontakt</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
  @stop
