<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Imko Barber</title>
    <meta charset="utf-8">

    @vite('resources/css/style.css')

    <h1>Bienvenue sur le site du barber !</h1>
</head>

<body>
    <p>Que voulez-vous faire ?</p>
    <main>
        <select id="choix">
            <option value="1">Sélectionnez une option</option>
            <option value="2">Prendre rendez-vous</option>
            <option value="3">Annuler un rendez-vous</option>
            <option value="4">Déposer un avis</option>
        </select>
    </main>
</body>