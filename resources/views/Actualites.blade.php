@extends('layouts.menu')
@section('content')

<div class="bgimage">
  <h1 class="dami">page actualities</h1>
  <div class="container-fluid">
    <div class="row " style=" text-align: center; ">

    <!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2"> -->
    @foreach($photos as $photo)

        <div class="card col-xs-12 col-sm-6 col-md-3 col-lg-2" id="photo-{{$photo->id}}" style="  margin-left: 30px; margin-bottom: 20px;">
          <img src="{{asset('storage/'.$photo->photo ) }}" style="padding-top: 4.5%;" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center;">{{ $photo->titre }}</h5>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

          </div>
        </div>



        <script>
          var photonclick = document.getElementById('photo-{{$photo->id}}')
          photonclick.addEventListener('click', function() {
            Swal.fire({
              width: 900,
              height: 400,
              title: '{{ $photo->titre }}',
              text: 'Modal with a custom image.qdfmlkjqsflkjqsdmlkfjqsdmkfjqdsmjklfjqskmldjfmlkqsdjflkqsjdfmklqsjdflmkqjdsfmlkqjsdfmlkjqsdmlkfjqsdlmkfjqsmdlkfjsqdlmkjfqlsmkdjfqmlskdjfmqlsdjflmksqdjfmlqsdjflmsqdjflmkqsjdfmlqkjlfmqdjqmldskfj',
              imageUrl: "{{asset('storage/'.$photo->photo ) }}",
              imageWidth: 800,
              imageHeight: 500,
              imageAlt: 'Custom image',
            })
          })
        </script>


@endforeach
<!-- </div> -->


    </div>
  </div>
</div>


@endsection

<style>
  .bgimage {
    background-image: url('storage/public/images/logo/wood-1963988_960_720.jpg');
    background-size: cover;
    /* background-position: center center; */
    background-repeat: repeat-y;
    padding-bottom: 5%;

  }

  .dami {
    /* margin-top: 5%; */
    padding: 5%;
    text-align: center;
  }

  /* By default, we tilt all our images -2 degrees */
  .card {
    -webkit-transform: rotate(-2deg);
    -moz-transform: rotate(-2deg);
  }

  /* Rotate all even images 2 degrees */
  .card:nth-child(even) {
    -webkit-transform: rotate(2deg);
    -moz-transform: rotate(2deg);
  }

  /* Don't rotate every third image, but offset its position */
  .card:nth-child(3n) {
    -webkit-transform: none;
    -moz-transform: none;
    position: relative;
    top: -5px;
  }

  /* Rotate every fifth image by 5 degrees and offset it */
  .card:nth-child(5n) {
    -webkit-transform: rotate(5deg);
    -moz-transform: rotate(5deg);
    position: relative;
    right: 5px;
  }

  /* Keep default rotate for every eighth, but offset it */
  .card:nth-child(8n) {
    position: relative;
    top: 8px;
    right: 5px;
  }

  /* Keep default rotate for every eleventh, but offset it */
  .card:nth-child(11n) {
    position: relative;
    top: 3px;
    left: -5px;
  }

  .card:hover {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    position: relative;
    z-index: 5;
  }

  .card {
    -webkit-transition: -webkit-transform .15s linear;
    -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, .25);
    -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, .25);
  }

  /* On hover, darken the shadows a bit */
  .card {
    -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, .5);
    -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, .5);
  }

  .card-img-top {
    /* height: 200px; */
  }
</style>
