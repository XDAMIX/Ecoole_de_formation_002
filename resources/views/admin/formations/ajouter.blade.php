@extends('layouts.admin_menu')
@section('content')



<div class="container" style="margin-top: 10px;" >
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->
                    <h1>Ajouter une nouvelle formation <i class="fa-solid fa-file-pen"></i></h1>
                </div>
                <div class="card-body" >

                <form action="{{ url('/admin/formation/save') }}" id="enr-form" method="POST" enctype="multipart/form-data">
                @csrf


                    <!-- div globale input & photo  -->

    <div class="container-group">

                    <!-- div input  -->

        <div class="input-div"  >

                    <!-- titre -->
        
            <div class="form__group field" >
                <label class="form__label" for="name"  style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">Titre</label>
                <input required=""  name="titre" class="input" type="text" value="" id="validationServer01">
                <div id="validationServer01Feedback" class="divepo">
                    @if($errors->get('titre'))
                          @foreach($errors->get('titre') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
           </div>

                    <!-- dure -->

              <div class="form__group field">
                  <label class="form__label" for="name" style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">Duré</label>
                     <input required=""  name="dure" class="form__field @if($errors->get('dure')) is-invalid @endif input" type="text" value="" id="validationServer02">
                          <div id="validationServer02Feedback" class="divepo">
                                @if($errors->get('dure'))
                                @foreach($errors->get('dure') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                          </div>
                </div>

                    <!-- description  -->

                 <div class="form__group  field">
                    <label class="form__label" for="name" style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">description</label>

                         <textarea required=""
                               
                                name="description"
                                class="form__field_text @if($errors->get('description')) is-invalid @endif input"
                                type="text"
                                value=""
                                id="validationServer03"></textarea>
                        
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('description'))
                                @foreach($errors->get('description') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                             </div>
                    </div>

                    <!-- publique concerné -->

                    <div class="form__group field">
                        <label class="form__label" for="name" style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">Public conçerné:</label>
                             <textarea required=""  name="publique" class="form__field_text @if($errors->get('publique')) is-invalid @endif input" type="text" value="" id="validationServer04"></textarea>
                                  <div id="validationServer04Feedback" class="invalid-feedback">
                                        @if($errors->get('publique'))
                                        @foreach($errors->get('publique') as $message)
                                        {{ $message }}
                                        @endforeach
                                        @endif
                                 </div>
                    </div>

                    <!--  objectifs  -->

                    <div class="form__group field">
                        <label class="form__label" for="name" style="color: rgb(14, 10, 10) ; font-size: 20px;font-weight: bold">Objectifs</label>
                        <textarea required=""  name="objectifs" class="form__field_text @if($errors->get('objectifs')) is-invalid @endif input" type="text" value="" id="validationServer05"></textarea>

                               <div id="validationServer05Feedback" class="invalid-feedback">
                                            @if($errors->get('objectifs'))
                                                @foreach($errors->get('objectifs') as $message)
                                                    {{ $message }}
                                                @endforeach
                                            @endif
                                </div>
                     </div>

                        </div>
                   <!-- fin group input  -->
                   <!-- div photo -->
 <div class="photo-div" style="margin-top : 90px;">
    <div class="flip-card col-lg-12 ">

    <div class="flip-card-front image_size" id="uploadphoto" style="background-image: url(../../ecole-formations/public/storage/public/images/logo/png-transparent-add-image-icon-thumbnailffff.png);">

            <img id="imagePreview" class="flip-card-front image_size" src="">

        <input type="file" name="photo" class="in form-control @if($errors->get('photo')) is-invalid @endif" id="imageUpload" accept="image/*" onchange="previewImage();" value="">

        <div id="validationServer06Feedback" class="invalid-feedback">
            @if($errors->get('photo'))
                @foreach($errors->get('photo') as $message)
                         {{ $message }}
                @endforeach
            @endif
        </div>

    </div>

</div>

    <div class="bt-en-ligne" style="padding : 60px;" >
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
</div>
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
                                                        text: "Voulez-vous annuler sans enregistrer ?",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI',
                                                        cancelButtonText: 'NO',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='/admin/formations';

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
                                                                title: 'Voulez-vous enregistrer cette formation ',
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
                                                                    window.location.href='/admin/formations';
                                                                }
                                                                })
                                                })

	</script>


<style>
        .divepo{
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; 100% de la hauteur de la vue */
        margin: 0;
    }
    
.input {
  padding: 5px;
  /* margin-bottom: 3px; */
  margin-left: 20px ;
  width: 350px;
  font-size: 1rem;
  color: #4a5568;
  outline: none;
  border: 1px solid transparent;
  border-radius: 4px;
  transition: all 0.2s ease-in-out;
  text-align: center;
 


}

.input:focus {
  background-color: #fff;
  box-shadow: 0 0 0 2px #cbd5e0;
}

.input:valid {
  border: 1px solid green;
}

.input:invalid {
  border: 1px solid rgba(14, 14, 14, 0.205);
}

</style>


@endsection
