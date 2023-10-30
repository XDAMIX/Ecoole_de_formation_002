@extends('layouts.admin_menu')
@section('content')



<!-- la nouvelle structure  -->


<div class="container" style="margin-top: 10px;" >
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->
                    <h1>Modifier Actualites <i class="fa-solid fa-file-pen"></i></h1>
                </div>
                <div class="card-body" >
                <form action="{{ url('/admin/gallerie/'.$photo->id.'/update') }}" method="post" id="enr-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <!-- div globale input & photo  -->

    <div class="container-group">

                    <!-- div input  -->

        <div class="input-div" >


                    <!-- titre -->

            <div class="form__group field" >
                <input required="" placeholder="titre" name="titre" class="form__field @if($errors->get('titre')) is-invalid @endif" type="text" value="{{ $photo->titre }}" id="validationServer01">
                <label class="form__label" for="name">Titre</label>
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('titre'))
                          @foreach($errors->get('titre') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
           </div>
                    <!-- emplacement -->

            <div class="form__group field" >
                <input required="" placeholder="titre" name="emplacement" class="form__field @if($errors->get('emplacement')) is-invalid @endif" type="text" value="{{ $photo->emplacement }}" id="validationServer02">
                <label class="form__label" for="name">Emplacement</label>
                <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('emplacement'))
                          @foreach($errors->get('titre') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
           </div>

                    <!-- dure -->

              <div class="form__group field">
                     <input required="" placeholder="Duré" name="dure" class="form__field @if($errors->get('dure')) is-invalid @endif" type="text" value="{{ $photo->dure }}" id="validationServer03">
                     <label class="form__label" for="name">Duré</label>
                          <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('dure'))
                                @foreach($errors->get('dure') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                          </div>
                </div>

                    <!-- description  -->

                 <div class="form__group  field">
                         <textarea required=""
                                placeholder="description"
                                name="description"
                                class="form__field_text @if($errors->get('description')) is-invalid @endif"
                                type="text"
                                value=""
                                id="validationServer04">{{ $photo->description}}</textarea>
                         <label class="form__label" for="name">description</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('description'))
                                @foreach($errors->get('description') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                             </div>
                    </div>



                        </div>
                   <!-- fin group input  -->
                   <!-- div photo -->
 <div class="photo-div" style="margin-top : 10px;">
        <h6 style="text-align: center;"> taille de l'image  : 200px X 100px</h6>
        <div class="card col-xs-12 col-sm-6 col-md-3 col-lg-12" id="uploadphoto" style="margin-left: 5px; height: 100%;">
          <img src="{{ asset('storage/'.$photo->photo)}}" style="padding: 2%; height: 300px;" id="imagePreview" class="card-img-top" alt="...">
          <div class="card-body">



              <div id="validationServer06Feedback" class="invalid-feedback">
                  @if($errors->get('photo'))
                  @foreach($errors->get('photo') as $message)
                  {{ $message }}
                  @endforeach
                  @endif
                </div>

            </div>

            <input  type="file" name="photo" class="in form-control @if($errors->get('photo')) is-invalid @endif" id="imageUpload" accept="image/*" onchange="previewImage();" value="">
        </div>

<!--  la nouvelle photo -->


<!-- --- -->
    <div class="bt-en-ligne" style="padding : 10px;" >
                    <div class="bt-en-ligne-div">

                                        <button class="button_enr" id="btnsave" type="button">
                                                      <span class="text">Enregister</span>
                                            <span class="icon">
                                                 <i class="fa-solid fa-check" style="color: white;"></i>
                                            </span>
                                        </button>

                    </div>

                    <div class="bt-en-ligne-div ">

                                        <button class="button_ok" id="btn-anl" type="button">
                                            <span class="text">Annuler</span>
                                            <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                            </svg>
                                            </span>
                                        </button>
                    </div>
            </div >

                                <!-- fin div photo -->
</div >
                                  <!-- div bouton  -->

</div>


</form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- scripte pour ajoter une image et afficher  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(function() {
			$('#imageUpload').change(function() {
				var file = $(this)[0].files[0];
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#imagePreview').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			});
		});
//    bouton annuler
        var boutonanl = document.getElementById("btn-anl");
        boutonanl.addEventListener("click",function(){
                                                    const swalWithBootstrapButtons = Swal.mixin({
                                                        customClass: {
                                                            confirmButton: 'btn btn-success',
                                                            cancelButton: 'btn btn-danger'
                                                        },
                                                        buttonsStyling: false
                                                    })
                                                    swalWithBootstrapButtons.fire({
                                                        title: 'Annuler !',
                                                        text: "Voulez-vous annuler sans enregistrer les modification  ?",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI',
                                                        cancelButtonText: 'NO',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='/admin/gallerie';

                                                        } else if (
                                                            result.dismiss === Swal.DismissReason.cancel
                                                        ) {

                                                        }
                                                    })
                                                });


                                                        // bouton enregistrer
                                                var boutonsave = document.getElementById("btnsave");
                                                boutonsave.addEventListener('click',function(){
                                                    Swal.fire({
                                                                title: 'Voulez-vous enregistrer lse modification ..? ',
                                                                showDenyButton: true,
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Enregistrer',
                                                                denyButtonText: `Annuler`,
                                                                }).then((result) => {
                                                                /* Read more about isConfirmed, isDenied below */
                                                                if (result.isConfirmed) {
                                                                    // Swal.fire('Saved!', '', 'success')
                                                                    var form = document.getElementById("enr-form");
                                                                    form.submit();
                                                                } else if (result.isDenied) {
                                                                    Swal.fire('rien na ete enregistrer ', '', 'info')
                                                                    window.location.href='/admin/gallerie';
                                                                }
                                                                })
                                                })

	</script>




@endsection
