<?php
error_reporting(0);
?>
<!-- Add a new Store -->
<!DOCTYPE html>
    <html lang="en" class=" js cssanimations csscalc cssvhunit">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Webifiy - Add a new Store</title>
        <meta name="description" content="The ultimate platform to host your e-commerce store online.">
        <meta name="keywords" content="e-commerce, Webifiy, store, product, shop">
        <meta name="author" content="Pranav-o-Websphere">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="css/component.css">
        <link rel="stylesheet" type="text/css" href="css/cs-select.css">
        <link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <script type="text/javascript" async="" src="js/ga.js"></script>
        <script src="js/modernizr.custom.js"></script>

<body>
<div class="container">

<!--     Navigation Bar-->
<?php
session_start();
    $_SESSION['NavBar'] = [
        "title"         => "Add a new Store",
        "nextPageTitle" => "Add a new product to an existing store.",
        "nextPageLink"  => "new_product.php"
    ];
    require ( 'navigation.php' );
    session_unset();
    ?>
        <form id="addStoreForm" name="addStoreForm" action="add_store.php" method="POST" class="fs-form fs-form-full"
              autocomplete="on">
            <ol class="fs-fields">

                <li class="fs-current">
                    <label class="fs-field-label fs-anim-upper" for="storeName">Name of the Store?</label>
                    <input class="fs-anim-lower" id="storeName" name="storeName" type="text" placeholder="Store's Name"
                           required="">
                </li>


                <li>
                    <label class="fs-field-label fs-anim-upper" for="storeOwner">Name of the Owner of the Store?</label>
                    <input class="fs-anim-lower" id="storeOwner" name="storeOwner" type="text"
                           placeholder="Store's Owner"
                           required="">
                </li>


                <li>
                    <label class="fs-field-label fs-anim-upper" for="storeCategory"
                           data-info="Select the category your store belongs to.">What category does it belong
                        to?</label>
                    <select class="fs-anim-lower" id="storeCategory" name="storeCategory" required="">
                        <option value="" disabled selected>Select a Category</option>
                        <option value="Automotive">Automotive</option>
                        <option value="Business Services">Business Services</option>
                        <option value="Medical Services">Medical Services</option>
                        <option value="Software Development">Software Development</option>
                        <option value="Retail">Retail</option>
                        <option value="Wholesale">Wholesale</option>
                        <option value="Logistics">Logistics</option>
                        <option value="Other">Other</option>
                    </select>
                </li>
                <li data-input-trigger="">
                    <fieldset id="NPOcheckF">
                        <legend>
                            <label class="fs-field-label fs-anim-upper" for=""
                                   data-info="This will help us know what kind of service you need.">Is it a
                                Not-for-Profit Organization?</label>
                        </legend>
                        <div class="fs-radio-group clearfix fs-anim-lower">
                        <span><input id="NPOcheckY" name="storeNPO" type="radio" value="Y" required><label for="NPOcheckY"
                                                                                                  class="radio-conversion">Yes</label></span>
                        <span><input id="NPOcheckN" name="storeNPO" type="radio" value="N"><label for="NPOcheckN"
                                                                                                  class="radio-social">No</label></span>
                        </div>
                    </fieldset>
                </li>
                <li data-input-trigger="">
                    <label class="fs-field-label fs-anim-upper"
                           data-info="Select the year when your awesome dream became real." for="storeEstYear">Select
                        the Year of
                        Establishment:</label>

                    <div class="cs-select cs-skin-boxes fs-anim-lower" tabindex="0">
                        <select class="cs-select cs-skin-boxes fs-anim-lower" id="storeEstYear" name="storeEstYear" required>
                            <option value="" disabled="" selected="" class="color-b0c47f">Select the Year</option>
                            <?php for ($Year = 1980; $Year <= 2016; $Year++) {
                                if (($Year % 2) === 0) {
                                    $color = "color-da645a";
                                } else {
                                    $color = "color-f3e395";
                                } ?>
                                <option value="<?= $Year ?>" data-class="<?= $color ?>"><?= $Year ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <label class="fs-field-label fs-anim-upper" for="storeDesc">Describe your awesome store
                        here:</label>
                    <textarea class="fs-anim-lower" id="storeDesc" name="storeDesc"
                              placeholder="Describe here" required></textarea>
                </li>
            </ol><!-- /fs-fields -->
            <button class="fs-submit" type="submit">Add the Store to Webifiy family</button>
        </form><!-- /fs-form -->
        <span class="fs-message-error"></span>
    </div><!-- /fs-form-wrap -->

</div><!-- /container -->
<script src="js/classie.js"></script>
<script src="js/selectFx.js"></script>
<script src="js/fullscreenForm.js"></script>
<script>
    (function () {
        var formWrap = document.getElementById('fs-form-wrap');

        [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
            new SelectFx(el, {
                stickyPlaceholder: false,
                onChange: function (val) {
                    document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                }
            });
        });

        new FForm(formWrap, {
            onReview: function () {
                classie.add(document.body, 'overview'); // for demo purposes only
            }
        });
    })();
</script>


</body>
</html>
