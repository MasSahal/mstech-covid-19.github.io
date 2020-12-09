<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <title>Covid 19</title>
</head>

<body>
    <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Persebaran Covid-19 Di Dunia - made with ❤ by sahal from mathdroid </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="country" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Cari Negara
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (isset($_GET['country']) && !empty($_GET['country'])) {

        curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api/countries/' . urlencode($_GET['country']));
        $result = curl_exec($ch);
        $data = json_decode($result, true);

        curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api');
        $MainApi = curl_exec($ch);
        $totalStatistics = json_decode($MainApi, true);
    }
    ?>
    <div class="container py-3">

        <!-- Akhir Bagian header studen dan tombol tambah -->
        <div class="row">
            <!--Awal Bagian tabel -->
            <div class="col">
                <?php if (!empty($data['confirmed'])) { ?>

                    <h3 class="text-center">Update Statistik Covid-19 di <?php echo htmlspecialchars($_GET['country'], ENT_QUOTES); ?></h3>
                    <table class="table table-bordered table-dark" id="table">
                        <thead>
                            <tr>
                                <th>Terkonfirmasi</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>


                            <!-- // $sumber = 'https://covid19.mathdro.id/api/confirmed';
                            // $konten = file_get_contents($sumber);
                            // $data = json_decode($konten, true);
                            // var_dump($data); -->

                            <tr class="text-dark">
                                <td class="table-primary ">
                                    <?= number_format($data['confirmed']['value']); ?>
                                </td>
                                <td class="table-success">
                                    <?= number_format($data['recovered']['value']); ?>
                                </td>
                                <td class="table-danger">
                                    <?= number_format($data['deaths']['value']); ?>
                                </td>
                                <td class="table-secondary">
                                    <?= $data['lastUpdate']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
                <img class='mt-2 text-center ' src='https://covid19.mathdro.id/api/og' height="500px" width="100%" />

            </div>
        </div>
        <!--Akhir Bagian tabel -->
    </div>
    <!-- Akhir Bagian Konten -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>