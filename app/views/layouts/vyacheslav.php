<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Финальный проект Вячеслав Грошев</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text">
      <img class="d-block mx-auto mb-4" src="/app/src/images/logo/passnowlogo.svg" alt="" width="150" height="150">

<?php 
  echo $vyacheslavTemplate;
?>
   <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019-2020 Финальный проект студента курса "Fullstack Web-Developer"<br/> 
       израильской высшей школы информационных технологий и безопасности "HackerU"<br/>
       Грошева Вячеслава Владимировича.
    </p>
    <img class="d-block mx-auto mb-4" src="/app/src/images/logo/hackeru-logo.png" alt="" width="100" height="auto">
<!--    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>-->
  </footer>
</div>
        <script>
function chooseService() {
    var radios=document.getElementById("radios").getElementsByTagName("INPUT"),
        radio
    for (var i=0, L=radios.length; i<L; i++) {
        radio=radios[i]
        if (radio.checked) {location.href=radio.value; break}
    }
}
</script>
</body>
</html>

