<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Leaflet CSS e JS -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Leaflet Layer Tree -->

    <link rel="stylesheet" href="./leaflet/controlLayer.css" />
    <script src="./leaflet/controlLayer.js"></script>

    <!-- Bootstrap CSS e JS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->


    <link rel="stylesheet" href="./leaflet/leaflet-sidebar.css" />

    <script src="./leaflet/leaflet-sidebar.js"></script>

    <style>
        .lorem {
            font-style: italic;
            text-align: justify;
            color: #AAA;
        }
    </style>


</head>
<body>
    

    <div id="map" style="width: 100%; height: 100vh;"></div>

    <?php include 'sideBar.php'; ?>

    <?php include 'modalPopup.php'; ?>

    <script src="mapa.js"></script>

    <script src="icones.js"></script>

    <script src="addRemoveMapa.js"></script>

    <script src="baseCartografica.js"></script>

    <script src="areasInstitucionais.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>