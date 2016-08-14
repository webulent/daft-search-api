<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src='http://code.jquery.com/jquery-latest.min.js'></script>
</head>
<body>


<div class="container">

    <div class="header">
        <h3 class="title">Daft.ie Search API</h3>
        <!-- /.title -->
    </div>
    <!-- /.header -->

    <div class="jumbotron">
        <form class="form-horizontal" method="post" action="index.php" id="search_form">
            <div class="form-group">
                <label for="text" class="col-sm-2 control-label">Search</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="text" name="text"
                           placeholder="1 or 2 bed house for rent"
                           value="<?= isset($_POST['text']) ? $_POST['text'] : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </div>
        </form>

        <h3>Example searches;</h3>
        <ul class="examples">
            <li><a href="#">5 bed rent</a></li>
            <li><a href="#">Castleknock 3 bedroom for sale</a></li>
            <li><a href="#">2 bed apartment to let Dublin</a></li>
            <li><a href="#">3 or 4 bed house to sell in Dundrum for 1000 per month</a></li>
        </ul>
    </div>
    <!-- /.jumbotron -->

    <div class="row">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Request & Response</a></li>
            <li><a data-toggle="tab" href="#tab2">Styled Response</a></li>
        </ul>

        <div class="tab-content">
            <div id="tab1" class="tab-pane fade in active">
                <h2>Request & Response</h2>
                <div class="col-md-12">
                    <h3>Ad Type</h3>
                    <pre><?php
                        if (isset($ad_type)) print_r($ad_type);
                        ?>
                    </pre>

                    <h3>Query</h3>
                    <pre><?php
                        if (isset($query)) print_r($query);
                        ?>
                    </pre>

                    <h3>Response</h3>
                    <pre><?php
                        if (isset($response)) print_r($response);
                        ?>
                    </pre>
                </div>
            </div>
            <div id="tab2" class="tab-pane fade">
                <h2>Styled Response</h2>
                <div class="col-md-12">
                    <?php
                    if (isset($response) && isset($response->ads)) {

                        $ads = is_array($response->ads) ? $response->ads : array($response->ads);

                        foreach ($ads as $ad) {
                            ?>
                            <h4><?= $ad->full_address; ?> <span
                                    class="label label-default">BER <?= $ad->ber_rating; ?></span></h4>
                            <hr/>
                            <p>
                                <strong><?= isset($ad->price) ? $ad->price : $ad->rent; ?></strong>
                                <small><?= isset($ad->house_type) ? $ad->house_type : ''; ?> <?= $ad->property_type; ?>
                                    | <?= $ad->bedrooms; ?> Beds | <?= $ad->bathrooms; ?> Baths
                                </small>
                            </p>

                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?= $ad->large_thumbnail_url; ?>"/>
                                </div>
                                <!-- /.col-md-4 -->
                                <div class="col-md-9"><?= $ad->description; ?></div>
                                <!-- /.col-md-8 -->
                            </div>
                            <!-- /.row -->
                            <hr/>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<script>
    jQuery(function ($) {
        $('.examples').on('click', 'li>a', function () {
            $("#text").val($(this).html());
        });
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>