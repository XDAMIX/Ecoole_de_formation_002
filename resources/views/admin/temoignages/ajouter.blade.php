@extends('layouts.admin_menu')
@section('content')

<div class="container" style="margin-top: 10px;" >
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->
                    <h1>Nouveau témoin <i class="fa-solid fa-file-pen"></i></h1>
                </div>
                <div class="card-body">
                <form action="{{url('/admin/temoignages/save')}}"  id="enr-tem" method="POST" enctype="multipart/form-data">
                @csrf


                    <!-- div globale input & photo  -->

    <div class="container-group">

                    <!-- div input  -->

        <div class="input-div" >


                    <!-- nom et prenom  -->

            <div class="form__group field" >
                <input required="" placeholder="nom" name="nom" class="form__field @if($errors->get('nom')) is-invalid @endif" type="text" value="{{ old('nom') }}" id="validationServer01">
                <label class="form__label" for="name">Nom et Prénom</label>
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('nom'))
                          @foreach($errors->get('nom') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
           </div>
                    <!-- Poste -->

            <div class="form__group field" >
                <input required="" placeholder="poste" name="poste" class="form__field @if($errors->get('Poste')) is-invalid @endif" type="text" value="{{old('poste')}}" id="validationServer02">
                <label class="form__label" for="poste">Poste</label>
                <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('poste'))
                          @foreach($errors->get('poste') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
           </div>
                    <!-- mot  -->

                 <div class="form__group  field">
                         <textarea required=""
                                placeholder="mot"
                                name="mot"
                                class="form__field_text @if($errors->get('mot')) is-invalid @endif"
                                type="text"
                                value="{{ old('mot') }}"
                                id="validationServer03">{{old('mot') }}</textarea>
                         <label class="form__label" for="mot">Mot :</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('mot'))
                                @foreach($errors->get('mot') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                             </div>
                    </div>

                </div>


                   <!-- div photo -->
 <div class="photo-div" style="margin-top : 10px;">
        <h6 style="text-align: center;"> Taille de l'image  : 200px X 100px</h6>
        <div class="card col-xs-12 col-sm-6 col-md-3 col-lg-12" id="uploadphoto" style="margin-left: 5px; height: 100%;">
          <img src="{{old('photo') }}" style="height: 400px;" id="imagePreview" class="card-img-top okok" alt="...">
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


        </div >


                    </div>



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
                                                        text: "Voulez-vous annuler sans enregistrer ?",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI',
                                                        cancelButtonText: 'NO',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='/admin/temoignages';

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
                                                                title: 'Voulez-vous enregistrer ',
                                                                showDenyButton: true,
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Enregistrer',
                                                                denyButtonText: `Annuler`,
                                                                }).then((result) => {

                                                                if (result.isConfirmed) {

                                                                    var form = document.getElementById("enr-tem");
                                                                    form.submit();
                                                                } else if (result.isDenied) {
                                                                    Swal.fire('rien na ete enregistrer ', '', 'info')
                                                                    window.location.href='/admin/temoignages';
                                                                }
                                                                })
                                                })

	</script>

</form>

<style>

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
</style>


@endsection
