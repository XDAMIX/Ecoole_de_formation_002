@extends('layouts.admin_menu')
@section('content')

<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header"style="text-align:center;">
                  <a style="font-size: 20px;"><i class="bi bi-person"></i>Formulaire d'inscription:</a>
                </div>
                <div class="card-body">

<form action="{{url('/admin/inscriptions/save')}}" method="post">
@csrf
<h3>vous informations</h3>
    <div class="col form-group">
        <!-- <label for="">Sexe:</label><br> -->
        <select name="sexe" >
        <option value="H">Homme</option>
        <option value="F">Femme</option>
        {{-- <option value="Madame">Madame</option> --}}
        </select>
    </div>

    <div class="col form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Votre Nom " value="{{ old('nom') }}">
    </div>
    <div class="col form-group">
        <label for="">prénom:</label>
        <input type="text" name="prenom" class="form-control" placeholder="Votre Prénom" value="{{ old('prenom') }}">
    </div>

    <div class="col form-group">
        <label for="">Age:</label>
        <input type="number" name="age" class="form-control" placeholder="Votre âge" value="{{ old('age') }}">
    </div>

    <div class="form-group">
        <label for="">Wilaya:</label><br>
        <select name="wilaya">

        <option value="Adrar">Adrar-01 </option>
        <option value="Chlef">Chlef-02 </option>
        <option value="Laghouat">Laghouat-03</option>
        <option value="Oum El Bouaghi">Oum El Bouaghi-04 </option>
        <option value="Batna">Batna-05 </option>
        <option value="Béjaïa">Béjaïa-06 </option>
        <option value="Biskra">Biskra-07 </option>
        <option value="Béchar">Béchar-08 </option>
        <option value="Blida">Blida-09 </option>
        <option value="Bouira">Bouira-10 </option>

        <option value="Tamanrasset">Tamanrasset-11 </option>
        <option value="Tébessa">Tébessa-12 </option>
        <option value="Tlemcen">Tlemcen-13 </option>
        <option value="Tiaret">Tiaret-14 </option>
        <option value="Tizi Ouzou">Tizi Ouzou-15</option>
        <option value="Alger" selected>Alger-16 </option>
        <option value="Djelfa">Djelfa-17 </option>
        <option value="Jijel">Jijel-18</option>
        <option value="Sétif">Sétif-19 </option>
        <option value="Saïda">Saïda-20 </option>

        <option value="Skikda">Skikda-21 </option>
        <option value="Sidi Bel Abbès">Sidi Bel Abbès-22 </option>
        <option value="Annaba">Annaba-23 </option>
        <option value="Guelma">Guelma-24 </option>
        <option value="Constantine">Constantine-25 </option>
        <option value="Médéa">Médéa-26 </option>
        <option value="Mostaganem">Mostaganem-27</option>
        <option value="M'Sila">M'Sila-28 </option>
        <option value="Mascara">Mascara-29 </option>
        <option value="Ouargla">Ouargla-30 </option>

        <option value="Oran">Oran-31 </option>
        <option value="El Bayadh">El Bayadh-32 </option>
        <option value="Illizi">Illizi-33</option>
        <option value="Bordj Bou Arreridj">Bordj Bou Arreridj-34 </option>
        <option value="Boumerdès">Boumerdès-35 </option>
        <option value="El Tarf">El Tarf-36 </option>
        <option value="Tindouf">Tindouf-37 </option>
        <option value="Tissemsilt">Tissemsilt-38 </option>
        <option value="El Oued">El Oued-39 </option>
        <option value="Khenchela">Khenchela-40 </option>

        <option value="Souk Ahras">Souk Ahras-41 </option>
        <option value="Tipaza">Tipaza-42 </option>
        <option value="Mila">Mila-43 </option>
        <option value="Aïn Defla">Aïn Defla-44 </option>
        <option value="Naâma">Naâma-45 </option>
        <option value="Aïn Témouchent">Aïn Témouchent-46 </option>
        <option value="Ghardaïa">Ghardaïa-47 </option>
        <option value="Relizane">Relizane-48 </option>
        <option value="Timimoun">Timimoun-49 </option>
        <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar-50 </option>

        <option value="Ouled Djellal">Ouled Djellal-51</option>
        <option value="Béni Abbès">Béni Abbès-52</option>
        <option value="In Salah ">In Salah-53</option>
        <option value="In Guezzam">In Guezzam-54</option>
        <option value="Touggourt ">Touggourt-55</option>
        <option value="Djanet">Djanet-56 </option>
        <option value="El M'Ghair">El M'Ghair-57 </option>
        <option value="El Meniaa">El Meniaa-58 </option>

        </select>
    </div>

    <div class="col form-group">
        <label for="">Profession </label>
        <input type="text" name="profession" class="form-control" placeholder="Votre profession " value="{{ old('profession') }}">
    </div>
<hr>
<h3>contact</h3>
    <div class="col form-group">
        <label for="">N° de téléphone:</label>
        <input type="text" name="tel" class="form-control" placeholder="Votre N° de téléphone" value="{{ old('tel') }}">
    </div>
    <div class="col form-group">
        <label for="">Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Votre Email" value="{{ old('email') }}">
    </div>

<hr>

    <div class="col form-group">
        <label for="">Formation:</label><br>
        <select name="formation">
         @foreach($formations as $formation)
        <option value="{{ $formation->titre }}">{{ $formation->titre }}</option>
        @endforeach
        </select>
    </div>
<br>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-success" value="Enregistrer">
    </div>
    <br>
    <div class="">
        <a href="{{ url('/admin/inscriptions') }}" class="btn btn-secondary">Annuler</a>
    </div>
</form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
