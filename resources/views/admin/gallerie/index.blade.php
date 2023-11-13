@extends('layouts.admin_menu')
@section('content')



{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
        </div>
        <div class="col-10 d-flex align-items-center">
            <h2>Actualités</h2>
        </div>
    </div>
</div>



<div class="container" style="padding-top: 10px;">
    <div class="row">

        {{-- <div class="d-grid gap-1 d-md-flex justify-content-md-end" style="margin-top: 10px;margin-bottom: 10px;">

            <button class="button-add-new s-titre" onclick="window.location.href='/admin/gallerie/nouveau';">Ajouter une Actualite <i class="fa-sharp fa-solid fa-file-circle-plus hichem"></i></button>
        </div> --}}
        @foreach($photos as $photo)
        <!-- <div class="col-md-4" style="margin-bottom: 10px;"> -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">

            <!-- style="width: 18rem;" -->

            <div class="container">


                <!-- <div class="card" style="height:350px;">
    <img src="{{ asset('storage/'.$photo->photo )}}" class="card-img-top" alt="..." style="height:100%;">
    <div class="card-body">
      <label>Titre :</label>
      <h5 class="card-title">{{$photo->titre}}</h5>
      <label>date d'ajout :</label>
      <p class="card-text">{{$photo->created_at}}</p>
      <div style="text-align: center;align-items:center;">
                      <form action="{{ url('/admin/gallerie/'.$photo->id.'/delete') }}" method="POST">
                      @csrf
                      @method('DELETE')

                               <button class="btn btn-primary" ><a href="{{ url('/admin/gallerie/'.$photo->id.'/edit') }}" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i>Modifier</a></button>


                              <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>

                            </form>
                            <button id="photo-{{$photo->id}}" type="button" >afficher</button>
      </div>
    </div>
  </div> -->

                <div class="card">
                    <img src="{{ asset('storage/'.$photo->photo )}}" class="card-img-top" alt="..." style="height:100%;">
                    <h2 class="title">{{$photo->titre}}</h2>
                    <div class="card-hidden">

                        <!-- <div style="text-align: center;align-items:center;">
                      <form action="{{ url('/admin/gallerie/'.$photo->id.'/delete') }}" method="POST">
                      @csrf
                      @method('DELETE')

                               <button class="btn btn-primary" ><a href="{{ url('/admin/gallerie/'.$photo->id.'/edit') }}" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i>Modifier</a></button>


                              <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>

                            </form>
      </div> -->
                        <!-- bouton dami  -->
                        <div style="text-align: center;">
                            <form id="delete-form-{{ $photo->id }}" action="{{ url('/admin/gallerie/'.$photo->id.'/delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="bt-en-ligne">
                                    <div class="bt-en-ligne-div">


                                        <button class="btn-mdfT" id="btn-mdf-{{ $photo->id}}" type="button">
                                            <span class="text">Modifier</span>
                                            <span class="icon">
                                                <i class="bi bi-pen"></i>
                                            </span>
                                        </button>

                                    </div>

                                    <div class="bt-en-ligne-div" id="mydiv">
                                        <button class="btn-supT" id="btn-{{ $photo->id}}" type="button">
                                            <span class="text">Supprimer</span>
                                            <span class="icon">
                                                <i class="bi bi-trash3"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>


                                <!-- <div>
                        <button class="btn btn-warning" id="btn-mdf-{{ $photo->id}}" type="button">modifier</button>
                        <button class="btn btn-danger" id="btn-{{ $photo->id}}" type="button">supprimer</button>
                    </div> -->

                            </form>
                        </div>

                    </div>

                </div>

            </div>






        </div>


        <script>
            //    <!-- script pour le button supprimer  -->

            var bouton = document.getElementById("btn-{{ $photo->id }}");
            bouton.addEventListener("click", function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Vous êtes sûr !   {{ $photo->id}}',
                    text: "Voulez-vous supprimer la formation : {{ $photo->titre }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OUI, Supprimer!',
                    cancelButtonText: 'NO, Annuler!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Soumettre le formulaire de suppression
                        var form = document.getElementById("delete-form-{{ $photo->id }}");
                        form.submit();
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your file is safe :)',
                            'error'
                        )
                    }
                })
            });
            //    <!-- script pour le button modifer   -->

            var boutonmdf = document.getElementById("btn-mdf-{{ $photo->id}}");
            boutonmdf.addEventListener("click", function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'MODIFER !   {{ $photo->id}}',
                    text: "Voulez-vous faire des modifcation sur la photo : {{ $photo->titre }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OUI, Modifer!',
                    cancelButtonText: 'NO, Annuler!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/admin/gallerie/'.$photo->id.'/edit') }}"

                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {

                    }
                })
            });
        </script>


        <script>
            var photonclick = document.getElementById('photo-{{$photo->id}}')
            photonclick.addEventListener('click', function() {
                Swal.fire({
                    width: 1300,
                    height: 700,
                    title: '{{ $photo->titre }} {{$photo->emplacement}} {{$photo->dure}}',


                    text: '{{$photo->description}}',
                    imageUrl: "{{asset('storage/'.$photo->photo ) }}",
                    imageWidth: 1200,
                    imageHeight: 700,
                    imageAlt: 'Custom image',
                })
            })
        </script>
        @endforeach
    </div>
</div>

<style>
    label {
        text-transform: uppercase;
        font-weight: bold;
    }

    .card-title {
        color: var(--color5);

    }

    .head {
        text-align: center;
        color: var(--color5);
    }
</style>

<!-- style de card  -->
<style>
    .card {
        /* position: relative; */
        width: 350px;
        height: 350px;
        background: white;
        padding: 16px;
        border: 2px solid #232323;
        transition: all .5s ease-in-out;
        margin-bottom: 20px;
        box-shadow: 2px 2px 2px 2px gray;
    }

    .card-hidden {
        display: flex;
        transform: translateY(200%);
        flex-direction: column;
        gap: .5rem;
        transition: transform .5s ease-in, opacity .3s ease-in;
        opacity: 0;

    }

    .card-border {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        border: 1px dashed #232323;
        border-radius: 8px;
        z-index: -1;

    }

    /*Hovers*/
    .card:hover {
        box-shadow: 5px 5px 5px 3px gray;
        transform: translate(-15px, -15px);
        border-color: #5bc0eb;
        z-index: 999;
        width: 400px;
        height: 400px;
        cursor: pointer;
    }

    .card:hover .card-hidden {
        transform: translateY(0);
        opacity: 1;

    }

    .card:hover .title {
        transform: translateY(200%);
        opacity: 0;
        transition: transform .5s ease-in, opacity .3s ease-in;
        margin-top: 0;
    }

    /*Text*/
    .title {
        /* position: absolute; */
        bottom: 1rem;
        transition: transform .25s ease-out;
        text-align: center;
        margin-top: 50px;
    }
</style>


{{-- footer  --}}
<div class="container" id="pied-page">

@endsection
