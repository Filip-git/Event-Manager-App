@extends('layouts.master')

@section('content')
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6></h6>
            <h2>Uredite događaj</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="organizer-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6">
                <div id="eventImg" style="background-image: url('{{$event->image}}')">
                    <div class="wrapper">
                        <div class="file-upload">
                            <input form="contact" type="file" name="image" id="image" class="organizer-image-input" />
                            <i class="fa fa-arrow-up"></i>
                        </div>
                        </div>
                    <!--<input type="file" name="image" class="form-control"> -->
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <form id="contact" class="organizer-form-data" method="POST" action="{{ route('organizer.events.update', $event->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Naziv" @isset($event) value="{{ $event->name }}" @endisset autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <select name="location_id" class="form-select" aria-label="Area" id="chooseCategory"
                          onchange="this.form.click()">
                              @foreach($locations as $location)
                                  <option value="{{ $location->id }}" @isset($event) @if($location->id == $event->location_id ) selected @endif @endisset>{{ $location->name }}</option>
                              @endforeach
                        </select>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="number" name="price" id="price" placeholder="Cijena"
                          required="" @isset($event) value="{{ $event->price }}" @endisset>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset>
                          <input type="datetime-local" name="date" id="date" placeholder="Datum"
                            required="" @isset($event) value="{{ $event->date }}" @endisset>
                        </fieldset>
                      </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <div class="dropdown">
                                <div class="form-select form-select-category" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kategorije
                                </div>
                                <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenuButton1">
                                  @foreach ($categories as  $category)
                                    <li class="dropdown-item"><label><input type="checkbox" name="categories[]" value={{ $category->id }}  @isset($event) @if(in_array($category->id, $event->categories->pluck('id')->toArray())) checked @endif @endisset /> {{ $category->name }} </label></li>
                                  @endforeach
                                </ul>
                              </div>
                        </fieldset>
                      <fieldset>
                        <textarea name="description" type="text" class="form-control" id="description" placeholder="Detalji"
                          required="" >@isset($event){{ $event->description }}@endisset</textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button "><i class="fa fa-users"></i>
                          Uredite događaj</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Skripta za preview slike koja je odabrana. -->
<script>
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
        let str = URL.createObjectURL(file);
        eventImg.style.backgroundImage ="url(" + str + ")";
        }
    }
</script>

<!-- Skripta za postavljanje minimalnog datuma. -->
<script>
 /*   var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //Siječanj je jednak nuli, stoga dodajemo 1 kako bi postao prvi mjesec.
    var yyyy = today.getFullYear();
    if(dd<10){
    dd='0'+dd
    }
    if(mm<10){
    mm='0'+mm
    }

    today = yyyy+'-'+mm+'-'+dd +"T00:00:00";
    document.getElementById("date").setAttribute("min", today);*/
</script>
@stop
