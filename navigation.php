


<div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
        <h1 class="well">Webifiy -
            <small style="font-size: 20px"><?= $_SESSION['NavBar']['title']; ?> </small>
        </h1>
        <div class="codrops-top">
            <a class="codrops-icon codrops-icon-prev"
               href="index.php"><span><br>Home</span><span class="fa fa-home"></span></a>
            <a class="codrops-icon codrops-icon-drop"
               href="stores.php"><span><br>All Stores</span><span class="fa fa-th-list"></span></a>
            <a class="codrops-icon codrops-icon-info" href="<?= $_SESSION['NavBar']['nextPageLink']; ?>"><span><br><?= $_SESSION['NavBar']['nextPageTitle']; ?></span><span
                    class="fa fa-plus"></span></a>
        </div>
    </div>