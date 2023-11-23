@extends('layouts.admin_menu')
@section('content')



{{-- retour à l'acceuil  --}}
<div class="container" id="titre-page">
  <div class="row">
      <div class="col-2 d-flex align-items-center">
          <a href="{{ url('/admin/') }}" class="btn btn-dark"><i class="bi bi-house"></i><span class="btn-description">Acceuil</span></a>
      </div>
      <div class="col-10 d-flex align-items-center">
          <h2>Témoignages</h2>
      </div>
  </div>
</div>




<div class="container" style="">
  <div class="row">


    @foreach($temoignages as $temoignage)
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 10px;">


      <!-- <div class="card">
  <img src="{{ asset('storage/'.$temoignage->photo )}}" class="card-img-top" alt="..." style="width: 100%;height: 100%;">
  <div class="card-body" style="text-align: center;" >
    <h5 class="card-title">{{$temoignage->nom}}</h5>
    <h5 class="text-muted">{{$temoignage->poste}}</h5>
    <p class="card-text">{{$temoignage->mot}}</p>
    <div style="text-align: center;align-items:center;">
                    <form action="{{ url('/admin/temoignages/'.$temoignage->id.'/delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                            <a href="{{ url('/admin/temoignages/'.$temoignage->id.'/edit') }}" class="btn btn-primary" style="margin-bottom: 5px;" ><i class="bi bi-pen"></i>Modifier</a>
                            <button type="submit" onclick="return confirm('Êtes vous sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i>Supprimer</button>
                    </form>
    </div>
  </div>
</div> -->
      <!-- new style  -->

      <div class="carddami">
        <div class="upper-part">
          <div class="upper-part-face imag_size" style="background-image: url({{ asset('storage/'.$temoignage->photo )}}); background-size:cover;background-position:center;">
            {{-- {{ <img src="{{ asset('storage/'.$temoignage->photo)}}" class="card-img-top okok" alt="..." style="width: 100%;height: 100%;"}} --}}
          </div>
          <div class="upper-part-back">
            <p>{{$temoignage->mot}}</p>
          </div>
        </div>
        <div class="lower-part">
          <div class="lower-part-face">{{$temoignage->nom}}</div>
          <div class="lower-part-back">
            <div style="text-align: center;align-items:center;">
              <div style="text-align: center;">
                <form id="delete-form-{{ $temoignage->id }}" action="{{ url('/admin/temoignages/'.$temoignage->id.'/delete') }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="bt-en-ligne">
                    <div class="bt-en-ligne-div">


                      <button class="btn-mdf btn-r" id="btn-mdf-{{ $temoignage->id}}" type="button">
                        <span class="text">Modifier</span>
                        <span class="icon">
                          <i class="bi bi-pen"></i>
                        </span>
                      </button>

                    </div>

                    <div class="bt-en-ligne-div" id="mydiv">
                      <button class="btn-sup btn-r" id="btn-{{ $temoignage->id}}" type="button">
                        <span class="text">Supprimer</span>
                        <span class="icon">
                          <i class="bi bi-trash3"></i>
                        </span>
                      </button>
                    </div>
                  </div>




                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script>
      //    <!-- script pour le button supprimer  -->

      var bouton = document.getElementById("btn-{{ $temoignage->id }}");
      bouton.addEventListener("click", function() {
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
          title: 'Vous êtes sûr !   {{ $temoignage->id}}',
          text: "Voulez-vous supprimer le témoin : {{ $temoignage->nom }}",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'OUI, Supprimer!',
          cancelButtonText: 'NO, Annuler!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // Soumettre le formulaire de suppression
            var form = document.getElementById("delete-form-{{ $temoignage->id }}");
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

      var boutonmdf = document.getElementById("btn-mdf-{{ $temoignage->id}}");
      boutonmdf.addEventListener("click", function() {
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
          title: 'MODIFER !   {{ $temoignage->id}}',
          text: "Voulez-vous faire des modifcation sur le témoin : {{ $temoignage->nom }}",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'OUI, Modifer!',
          cancelButtonText: 'NO, Annuler!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "{{ url('/admin/temoignages/'.$temoignage->id.'/edit') }}"

          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {

          }
        })
      });
    </script>


    @endforeach
  </div>
</div>

<style>
  .head {
    text-align: center;
    color: var(--color5);
  }

  /* new style  */


  /* boutton ajouter une formation */

.button-add-new {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 15px 38px;
  border-radius: 16px;
  border: 1px solid transparent;
  color: #FFFFFF;
  background-color: #1DC9A0;
  font-size: 20px;
  letter-spacing: 1px;
  transition: all 0.15s linear;
 }
 
 .button-add-new:hover {
  background-color: rgba(29, 201, 160, 0.08);
  border-color: #1DC9A0;
  color: #1DC9A0;
  transform: translateY(-5px) scale(1.05);
 }
 
 .button-add-new:active {
  background-color: transparent;
  border-color: #1DC9A0;
  color: #1DC9A0;
  transform: translateY(5px) scale(0.95);
 }
 
 .button-add-new:disabled {
  background-color: rgba(255, 255, 255, 0.16);
  color: #8E8E93;
  border-color: #8E8E93;
 }
 /* -------------------  fin  ------------- */

 /* button modifer */

 .btn-mdf {
                              width: 150px;
                              height: 50px;
                              cursor: pointer;
                              display: flex;
                              align-items: center;
                              background: #5EB1FD;
                              border: none;
                              border-radius: 10px;
                              box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
                              background:#3165F6;
                              white-space: nowrap; 
                              
                            }
                            .in{
                              position: absolute;
                              bottom: 0;
                              left: 0;
                              width: 100%;
                              padding: 10px;
                              
                            }
                            
                            .btn-mdf span {
                              transition: 200ms;
                            }
                            
                            .btn-mdf .text {
                              transform: translateX(20px);
                              color: white;
                              font-weight: bold;
                              text-align: center;
                            }

                            
                            .btn-mdf .icon {
                              position: absolute;
                              /* border-left: 1px solid #5EB1FD; */
                              transform: translateX(110px);
                              height: 40px;
                              width: 40px;
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              padding-top: 0px;
                            }
                            
                            .btn-mdf .i {
                              /* width: 15px; */
                              fill: #eee;
                            }
                            
                            .btn-mdf:hover {
                              background: #5EB1FD;
                            }
                            
                            .btn-mdf:hover .text {
                              color: transparent;
                            }
                            
                            .btn-mdf:hover .icon {
                              width: 150px;
                              border-left: none;
                              transform: translateX(0);
                            }
                            
                            .btn-mdf:focus {
                              outline: none;
                            }
                            
                            .btn-mdf:active .icon svg {
                              transform: scale(0.8);
                            }

                            /* -------fin mdf------ */
 /* button supprimer */


                              .btn-sup {
                                        width: 150px;
                                        height: 50px;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        background: red;
                                        border: none;
                                        border-radius: 10px;
                                        box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
                                        background:#e62222;
                                        white-space: nowrap;  

                                                                          
                                      }
                                      
                                       
                                      .btn-sup span {
                                        transition: 200ms;
                                    
                                        
                                       }
                                       
                                       .btn-sup .text {
                                        transform: translateX(20px);
                                        color: white;
                                        font-weight: bold;
                                        text-align: center;
                           
                                       }
                                      
                                       
                                       .btn-sup .icon {
                                        position: absolute;
                                        /* border-left: 1px solid #5EB1FD; */
                                        transform: translateX(110px);
                                        height: 40px;
                                        width: 40px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        padding-top: 0px;
                                       }
                                       
                                       .btn-sup .i {
                                        /* width: 15px; */
                                        fill: #eee;
                                       
                                       }
                                       
                                       .btn-sup:hover {
                                        background: #ff3636;
                                       }
                                       
                                       .btn-sup:hover .text {
                                        color: transparent;
                                       }
                                       
                                       .btn-sup:hover .icon {
                                        width: 150px;
                                        border-left: none;
                                        transform: translateX(0);
                                       }
                                       
                                       .btn-sup:focus {
                                        outline: none;
                                       }
                                       
                                       .btn-sup:active .icon svg {
                                        transform: scale(0.8);
                                       }
                                       /* fin btn sup */

                                                                                       /* aligniement de bouton sur les div  */
 .bt-en-ligne{

display: flex;

justify-content: center;
/* position: fixed; */
bottom: 0;
left: 0;
right: 0;
margin: auto;
}
.bt-en-ligne-div{
margin: 1%;
}

/* fin */



  .card {
    width: 350px;
    height: 500px;
    position: relative;
    border-radius: 40px;
    transition: all 0.8s;
    perspective: 600px;
    perspective-origin: center bottom;

  }

  .carddami{
    /* width: 350px; */
    height: 500px;
    position: relative;
    border-radius: 40px;
    transition: all 0.8s;
    perspective: 600px;
    perspective-origin: center bottom;
  }

  .upper-part {
    width: 100%;
    height: 65%;
    border-radius: 40px 40px 0 0;
    position: relative;
    transform-style: preserve-3d;
    transition: all 0.9s;
  }

  .upper-part-face,
  .upper-part-back {
    text-align: center;
    background-color: lightgray;
    color: purple;
    border: 3px solid purple;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 15px;
    border-radius: 40px 40px 0 0;
    font-weight: bold;
    z-index: 2;
    backface-visibility: hidden;
    transition: all 0.6s;
  }

  .upper-part-back {
    background-color: purple;
    color: lightgray;
    transform: rotatex(180deg);
  }

  .lower-part {
    width: 100%;
    height: 20%;
    border-radius: 0 0 40px 40px;
    position: relative;
    transform-style: preserve-3d;
    transform-origin: center top;
    transition: all 0.9s;
  }

  .lower-part-face,
  .lower-part-back {
    background-color: purple;
    width: 100%;
    height: 100%;
    color: lightgray;
    font-weight: bold;
    position: absolute;
    border-radius: 0 0 40px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    transform: translate(0, -0.8px);
    backface-visibility: hidden;
    z-index: 2;
  }

  .lower-part-back {
    backface-visibility: visible;
    border-radius: 40px ;
    /* border-radius: 0  0  40px 40px ; */
    color: purple;
    background-color: lightgray;
    transform: rotateX(180deg);
    z-index: 1;
    transition: border-radius 0.6s;
  }

  .carddami:hover .upper-part {
    transform: rotatex(-0.5turn);
  }

  .carddami:hover .lower-part {
    transform: translateY(88.3px) rotateX(0.5turn);
  }

  /* .card:hover>.lower-part>.lower-part-back  */
  .carddami:hover .lower-part .lower-part-back 
  {
    border: 3px solid purple;
    border-radius: 0 0 40px 40px;

  }

  /* photo  */
  .okok {
    display: flex;
    margin: 60px auto 10px auto;
    width: 100%;
    height: 100%;
    border: 3px solid black;
    border-radius: 50%;
    font-size: 11px;
    justify-content: center;
    align-items: center;
    transition: all 0.5s;
    z-index: 99;
    padding: 5px;
  }
  .imag_size{
    
  }
</style>



{{-- footer  --}}
<div class="container" id="pied-page">
@endsection
