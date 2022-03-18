<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="blog-masthead">
    <div class="container">
        <nav class="nav" id="myTopnav">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="create-post.php">Create new post</a>
            <a class="nav-link" href="create-author.php">Create new author</a>
            <!-- <a class="nav-link" href="#">New features</a> -->
            <!-- <a class="nav-link" href="#">Press</a> -->
            <!-- <a class="nav-link" href="#">New hires</a> -->
            <!-- <a class="nav-link" href="#">About</a> -->
            <a href="javascript:void(0);" class="icon" onclick="ham()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </div>
</div>

<form action="index.php" method="post">
    <select onchange="this.form.submit();" name="logAuthor" id="" required>
        <option value='' selected disabled hidden>Choose author</option>
        <?php foreach ($authors as $author) { ?>
            <option value="<?php echo $author['id'] ?>"><?php echo "{$author['first_name']} {$author['last_name']}" ?></option>
        <?php } ?>
    </select>
</form>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
</div>

<script>
    function ham() {
        var x = document.getElementById("myTopnav");
        if (x.className === "nav") {
            x.className += " responsive";
        } else {
            x.className = "nav";
        }
    }
</script>