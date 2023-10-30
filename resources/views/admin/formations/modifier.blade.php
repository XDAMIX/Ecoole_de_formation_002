@extends('layouts.admin_menu')
@section('content')

<script>
    function previewImage(){
        var file = document.getElementById("validationServer06").files;
        if ( file.length > 0 ) {
            var fileReader = new FileReader();

            fileReader.onload = function (event){
                document.getElementById("preview").setAttribute("src", event.target.result)
            };
            fileReader.readAsDataURL(file[0]);
        }
    }
    </script>

 <div class="container" style="margin-top: 10px;" >
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                            <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->

                            <h1>Modifier les informations de la Formation <i class="fa-solid fa-file-pen"></i></h1>
                </div>
                <div class="card-body" >

     <form action="{{ url('/admin/formation/'.$formation->id.'/update') }}" id="enr-form" method="post" enctype="multipart/form-data">
           @csrf
           @method('PUT')

                    <!-- div globale input & photo  -->

    <div class="container-group">

                    <!-- div input  -->

    <div class="input-div" >

                    <!-- titre -->

    <div class="form__group field" >
    <input required="" placeholder="titre" name="titre" class="form__field @if($errors->get('titre')) is-invalid @endif" type="text" value="{{ $formation->titre }}" id="validationServer01">
    <label class="form__label" for="name">Titre de la formation</label>
    <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('titre'))
                          @foreach($errors->get('titre') as $message)
                             {{ $message }}
                        @endforeach
                    @endif
                </div>
    </div>

                    <!-- dure -->

    <div class="form__group field">
    <input required="" placeholder="Duré" name="dure" class="form__field @if($errors->get('dure')) is-invalid @endif" type="text" value="{{ $formation->dure }}" id="validationServer02">
    <label class="form__label" for="name">Duré</label>
    <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('dure'))
                    @foreach($errors->get('dure') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

                    <!-- description  -->

    <div class="form__group  field">
    <textarea required="" placeholder="description" name="description" class="form__field_text @if($errors->get('description')) is-invalid @endif" type="text" value="" id="validationServer03">{{$formation->description}}</textarea>
    <label class="form__label" for="name">description</label>
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
    <textarea required="" placeholder="description" name="publique" class="form__field_text @if($errors->get('publique')) is-invalid @endif" type="text" value="" id="validationServer04">{{$formation->publique}}</textarea>
    <label class="form__label" for="name">Public conçerné:</label>
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
    <textarea required="" placeholder="Objectifs" name="objectifs" class="form__field_text @if($errors->get('objectifs')) is-invalid @endif" type="text" value="" id="validationServer05">{{$formation->objectifs}}</textarea>

    <label class="form__label" for="name">Objectifs</label>

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
 <div class="photo-div" style="margin-top: 90px;">
    <div class="flip-card col-lg-12 ">
    <!-- style="background-image: url({{asset('storage/'.$formation->photo ) }});" -->
    <div class="flip-card-front image_size" id="uploadphoto">

            <img id="imagePreview" class="flip-card-front image_size" src="{{asset('storage/'.$formation->photo)}}">

        <input type="file" name="photo" class="in form-control @if($errors->get('photo')) is-invalid @endif" id="imageUpload" accept="image/*" onchange="previewImage();" value="{{ $formation->photo }}">

        <div id="validationServer06Feedback" class="invalid-feedback">
            @if($errors->get('photo'))
                @foreach($errors->get('photo') as $message)
                         {{ $message }}
                @endforeach
            @endif
        </div>

    </div>

</div>
<div class="bt-en-ligne" style="padding : 60px;"  >
                    <div class="bt-en-ligne-div">

                                        <button class="button_enr" id="btnenr" type="button">
                                            <span class="text">Enregister</span>
                                            <span class="icon">
                                            <i class="fa-solid fa-check" style="color: white;"></i>
                                            </span>
                                        </button>

                    </div>

                    <div class="bt-en-ligne-div ">

                                        <button class="button_ok"  id="btn-anl" type="button" >
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
	</script>

        <!-- script pour enregistrer ou annuler les modifiction sur la formation  -->
        <script>
            var boutonenr = document.getElementById("btnenr");
            boutonenr.addEventListener('click',function(){
                Swal.fire({
                    title: 'Voulez-vous enregistrer les modifications ?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Enregistrer',
                    denyButtonText: `Annuler`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        var form = document.getElementById("enr-form");
                        form.submit();
                        Swal.fire('Les modifications ont bien été enregistrées.!', '', 'success')
                    } else if (result.isDenied) {

                        Swal.fire('Les modifications ne sont pas enregistrées', '', 'info')

                        window.location.href='/admin/formations';
                    }
})
            })

        //  bouton annuler
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
                                                        title: 'Annuler les modification !',
                                                        text: "Voulez-vous annuler sans enregistrer les modifications ?",
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


        </script>





@endsection
