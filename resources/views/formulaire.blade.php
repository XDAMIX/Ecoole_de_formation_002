<!-- Utilisez vos styles CSS ici -->
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<div class="registration-form">
    <img src="{{ asset('images/logo.png') }}" class="logo">
    <h2>Nom de l'École</h2>

    <form action="{{ route('pdf') }}" method="post">
        @csrf
        <!-- ... Champs de formulaire: nom, prénom, âge, numéro de téléphone, etc. ... -->
        <input type="file" name="birth_certificate">
        <input type="file" name="id_card_copy">
        <input type="file" name="diploma">
        <input type="file" name="cv">
        <button type="submit">générer PDF</button>
    </form>
</div>
