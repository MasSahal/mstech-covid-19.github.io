<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="title" content="Data statistik penyebaran virus Covid-19 di Indonesia">
    <meta name="description" content="Data statistik lengkap penyebaran virus Covid-19 di seluruh dunia update!">
    <meta name="keywords" content="Covid19, Covid, Covid-19">
    <meta name="author" content="Mas Sahal">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <style>
        /* Footer */
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

        #footer a {
            color: #ffffff;
            text-decoration: none !important;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        #footer ul.social li {
            padding: 3px 0;
        }

        #footer ul.social li a i {
            margin-right: 5px;
            font-size: 25px;
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }

        #footer ul.social li:hover a i {
            font-size: 30px;
            margin-top: -10px;
        }

        #footer ul.social li a,
        #footer ul.quick-links li a {
            color: #ffffff;
        }

        #footer ul.social li a:hover {
            color: #eeeeee;
        }

        @media (max-width:767px) {
            #footer h5 {
                padding-left: 0;
                border-left: transparent;
                padding-bottom: 0px;
                margin-bottom: 10px;
            }
        }
    </style>
    <title>Covid 19</title>
</head>

<body>
    <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://mstech-covid-19.000webhostapp.com/covid-indonesia.php">Covid-19 Indonesia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://mstech-covid-19.000webhostapp.com">World<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mstech-covid-19.000webhostapp.com/covid-indonesia.php">Indonesia</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    function http_request($url)
    {
        // persiapkan curl
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);

        // set user agent    
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);

        // tutup curl 
        curl_close($ch);

        // mengembalikan hasil curl
        return $output;
    }

    $profile = http_request("https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson");

    // ubah string JSON menjadi array
    $profile = json_decode($profile, TRUE);
    ?>
    <div class="container py-3">

        <!-- Akhir Bagian header studen dan tombol tambah -->
        <div class="row">
            <!--Awal Bagian tabel -->
            <div class="col">
                <h3 class="text-center">Persebaran Covid-19 Di Indonesia - made with ❤ by sahal from BNPB</h3>
                <hr>

                <h3 class="text-center">Update Statistik Covid-19 di Indonesia</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-dark table-hover" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Provinsi</th>
                                <th>Positif</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $no = 0;
                            $data = ($profile['features']);
                            foreach ($data as $conf => $key) {
                                # code...

                            ?>
                                <tr class="text-dark">
                                    <td class="table-secondary ">
                                        <?= $no += 1; ?>
                                    </td>
                                    <td class="table-info">
                                        <?= $key['properties']['Provinsi']; ?>
                                    </td>
                                    <td class="table-danger">
                                        <?= number_format($key['properties']['Kasus_Posi']); ?>
                                    </td>
                                    <td class="table-success">
                                        <?= number_format($key['properties']['Kasus_Semb']); ?>
                                    </td>
                                    <td class="table-warning">
                                        <?= number_format($key['properties']['Kasus_Meni']); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Akhir Bagian tabel -->
    </div>
    <section id="footer" class="bg-dark pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.facebook.com/nashiruddin.sahal"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/MasSahal5"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/abu_sahl7/"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://github.com/MasSahal"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
                <hr>
            </div>
            <div class="row">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p class="h6">Copyright © 2020<a class="text-green ml-2" href="https://www.github.com/MasSahal" target="_blank">Mas Sahal</a> - All right Reversed.</p>
            </div>
        </div>
    </section>
    <!-- Akhir Bagian Konten -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>