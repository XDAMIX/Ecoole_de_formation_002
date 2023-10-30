@extends('layouts.admin_menu')
@section('content')

<!--

<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;"><i class="bi bi-image"></i>Modifier</a>
                </div>
                <div class="card-body">

     <form action="{{ url('/admin/faq/'.$question->id.'/update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">La Question:</label>
        <input type="text" name="question" class="form-control @if($errors->get('question')) is-invalid @endif" id="validationServer01" placeholder="la question" value="{{ $question->question }}">
                <div id="validationServer01Feedback" class="invalid-feedback">
                    @if($errors->get('question'))
                    @foreach($errors->get('question') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>

    <div class="form-group">
        <label for="">La Réponse:</label>
        <input type="text" name="reponse" class="form-control @if($errors->get('reponse')) is-invalid @endif" id="validationServer02" placeholder="la réponse" value="{{ $question->reponse }}">
                <div id="validationServer02Feedback" class="invalid-feedback">
                    @if($errors->get('reponse'))
                    @foreach($errors->get('reponse') as $message)
                    {{ $message }}
                    @endforeach
                    @endif
                </div>
    </div>



    <br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Enregistrer">
    </div>
    <br>
    <div class="">
        <a href="{{ url('/admin/faq') }}" class="btn btn-secondary">Annuler</a>
    </div>

</form>

                </div>
            </div>

        </div>
    </div>

</div>   -->


<!-- style dami  -->


<div class="container" style="margin-top: 10px;  " >
    <div class="row" >
        <div class="col-md-12">
        <div class="card" style="background-color: #ffff;">
                <div class="card-header"style="text-align:center;">
                  <!-- <a style="font-size: 20px;"><i class="bi bi-person"></i>Modifier les informations de la Formation</a> -->
                    <h1>ModifierQuestion/Réponse<i class="fa-solid fa-file-pen"></i></h1>
                </div>
                <div class="card-body">
                <form action="{{ url('/admin/faq/'.$question->id.'/update') }}" id="enr-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <!-- div globale  -->

    <div class="container-group">

                    <!-- div input  -->

        <div class="input-div" >




            <!-- quistion -->
                <div class="form__group  field">
                         <textarea required=""
                                placeholder="description"
                                name="question"
                                class="form__field_text @if($errors->get('question')) is-invalid @endif"
                                type="text"
                                value=""
                                id="validationServer04">{{ $question->question }}</textarea>
                         <label class="form__label" for="name">Question</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('question'))
                                @foreach($errors->get('question') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                             </div>
                    </div>
                    <!-- Reponce  -->

                 <div class="form__group  field">
                         <textarea required=""
                                placeholder="reponse"
                                name="reponse"
                                class="form__field_text @if($errors->get('reponse')) is-invalid @endif"
                                type="text"
                                value=""
                                id="validationServer04">{{ $question->reponse}}</textarea>
                         <label class="form__label" for="name">reponse</label>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                @if($errors->get('reponse'))
                                @foreach($errors->get('reponse') as $message)
                                {{ $message }}
                                @endforeach
                                @endif
                             </div>
                    </div>

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

                        </div>
                   <!-- fin group input  -->


</div>


</form>
                </div>
            </div>

        </div>
    </div>
</div>


	<script>

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
                                                        text: "Voulez-vous annuler sans enregistrer les modifications?",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'OUI',
                                                        cancelButtonText: 'NO',
                                                        reverseButtons: true
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='/admin/faq';

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
                                                                title: 'Voulez-vous enregistrer les modifications !! ',
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
                                                                    window.location.href='/admin/faq';
                                                                }
                                                                })
                                                })

	</script>


@endsection
