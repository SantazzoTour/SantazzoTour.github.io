<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SanTazzo</title>  
<style>
    /*navbar*/
.nav-item:hover{ text-decoration:underline;}
.navbar:hover {opacity:1;}

#timer {
    font-size: 3em;
    font-weight: 100;
    color:blue;  
}

#timer div {
    display: inline-block;
    min-width: 68px;
}

#timer div span {
    color:blue;
    display: block;
    font-size: .35em;
    font-weight: 400;
}
  </style>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
</head>

<body onscroll="percentuale()">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark " >
	  <div class="container">
  	  <a class="navbar-brand" href="./index.php" >SANTAZZO</a>
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
  		    <span class="navbar-toggler-icon"></span>
  	  </button>
  	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    		<ul class="nav navbar-nav ml-auto">
    		  <li class="nav-item ">
    			    <a class="nav-link active" style="font-weight: bold;" href="./index.php">Home <span class="sr-only">(current)</span></a>
    		  </li>
    		</ul>
  		</div>
	 	</div>
	</nav>

<div style="background-image: url(./img/2.jpg);background-attachment: fixed;background-repeat:no-repeat; background-size:cover; background-position:center center;height:650px;">
<div class="container">
    <div class="row">
    <div class="col-sm-0"></div>
      <div class="col-sm-12" style="align:center;padding-top:100px;" >
        <div style="background-color:rgba(50,50,50,0.9);padding-top:8px;padding-bottom:8px;border:solid 3px black;border-radius:15px;">
            <div id="titolo" style="text-align: center;" class="text-light"></div> 
            <div id="data" class="text-light font-weight-light" style="text-align: center;"></div>    
            <div id="timer" style="text-align: center;"></div>  
        </div>
      </div> 
      <div class="col-sm-0"></div>     
    </div>  
</div>
</div>

<div class="container"><div class="row"><div class="col-md-12 col-xs-12" style="align:center;padding-top:10px" >


<div style="background-color:LightGray;display:none">
<form class="form-inline" name="FormEmail" action="javascript:AggiungiEmail()" style="padding-top:8px">
  <div class="form-group sm-3 mb-2 col-9">
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" class="form-control" style="width:100%" id="inputEmail" placeholder="Inserire l'email" required>
  </div>
    <button type="submit" class="btn btn-primary mb-2">iscriviti</button>
</form>
</div>


<?php 
//Partecipa
$conn=mysqli_connect("localhost","id14726537_santazzari","nMVfwK42Q%U_Qxt@","id14726537_santazzo");
$IP=$_SERVER["REMOTE_ADDR"];

$sql="SELECT * FROM partecipanti WHERE IP='".$IP."'";

$ris=mysqli_query($conn,$sql);
$numpart= mysqli_num_rows($ris);
if(mysqli_num_rows($ris)==0){ //non presente
   echo '<input class="btn btn-danger btn-lg btn-block" onclick="AddInputNome()" type="button" value="Vuoi partecipare?">';
  }else{
    echo '<input class="btn btn-success btn-lg btn-block" type="button" value="Grande! Stai partecipando!" disabled>';
  }
  mysqli_close($conn);
?>
</div></div>

<div id="partecipa" style="background-color:LightGray"></div>

<?php 
//Partecipa
$conn=mysqli_connect("localhost","id14726537_santazzari","nMVfwK42Q%U_Qxt@","id14726537_santazzo");

$sql="SELECT count(*) as num FROM partecipanti";

$ris=mysqli_query($conn,$sql);
while($numpart=mysqli_fetch_array($ris,MYSQLI_ASSOC)){
  $numparta=$numpart["num"];
}
?>
<div style="padding-top:10px">
<?php echo '<input class="btn btn-info btn-lg btn-block" onclick="GetPartecipanti()" type="button" value="Vedi i partecipanti! "'; ?>
</div>


<div id="partecipanti" style="padding-top:10px;"></div>

</div>

<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tappa</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Matinèe</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jet</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Fashion</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Melograno</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Playa</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Logos</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Pagani</td>
    </tr>
      <th scope="row">8</th>
      <td>Abbazzia</td>
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Mania</td>
    </tr>
  </tbody>
</table>

</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registrazione avvenuta con successo!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <b>Controlla la tua email!</b><br/>
       <b class="text-success">Ti meriti uno shot!</b> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<script language="javascript">
//core

    let dSanTazzo=new Date()        
    //ottengo santazzo di quest'anno
    dSanTazzo=getDataSanTazzo(new Date().getFullYear())
   if (dSanTazzo.toDateString()==new Date().toDateString()){
     //oggi è santazzo!
       document.getElementById("timer").innerHTML=""  
      document.getElementById("titolo").innerHTML="<h1>OGGI È SANTAZZO!!!</h1>"  
      document.getElementById("data").innerHTML="<h1>RISCALDA IL FEGATO!</h1>"
   }else if(dSanTazzo<new Date()){//santazzo superato
      dSanTazzo=getDataSanTazzo(new Date().getFullYear()+1)
      updateTimer()
      setInterval('updateTimer()', 1000);
    }else{
      updateTimer()
      setInterval('updateTimer()', 1000);
    }
    
    if (dSanTazzo.toDateString()!=new Date().toDateString()){
      //data
      document.getElementById("data").innerHTML=dSanTazzo.toLocaleDateString()
      //titolo
      document.getElementById("titolo").innerHTML="<h1>SANTAZZO "+dSanTazzo.getFullYear()+"!</h1>"
    }

    //scroll navbar
    let getpart=0
  let navbar = document.getElementsByClassName("navbar");
  let navbar_item=document.getElementsByClassName("navbar-text");
  let numR=Math.random() * 200;
  let numG=Math.random() * 200
  let numB=Math.random() * 200

  navbar[0].style="background-color:black;background: linear-gradient(to top, rgba("+numR+", "+numG+", "+numB+", 0), rgba("+numR+", "+numG+", "+numB+",0.55));"
  let btnpart=0 
  function AddInputNome(){
    if (btnpart==0){
      document.getElementById("partecipa")
    .innerHTML='<form class="form-inline" name="FormEmail" action="javascript:AddPartecipante()" style="padding-top:8px">'+
    '<div class="form-group sm-3 mb-2 col-9">'+
    '<label for="inputNominativo" class="sr-only">Nominativo</label>'+
    '<input type="text" class="form-control" style="width:100%" id="inputNominativo" placeholder="Inserire un nomiativo" required>'+
  '</div>'+
  '<div class="col-auto">'+
  '<button type="submit" class="btn btn-success mb-2">invia!</button>'+
  '</div>'+
  '</form>'
    btnpart=1
    }else{
      document.getElementById("partecipa").innerHTML=''
      btnpart=0
    }

  }

  function AddPartecipante(){
          var nome="";
          nome=document.getElementById("inputNominativo").value
          if (nome !=""){
          $.ajax({
              url: "./functions/AddPartecipante.php",
              method:'GET',
              data: {"nome":nome},

              success: function(result){
                //$("#det").html(result);
                location.href="./index.php";
              }});    
          }
  }


function AggiungiEmail(){
 let email=document.forms["FormEmail"]["inputEmail"].value
 if (email!=""){
  $.ajax({
              url: "./functions/AddEmail.php",
              method:'GET',
              data: {"email":email},

              success: function(result){
                if (result == "true"){
                   $('#exampleModalCenter').modal("show")
                }else{
                  $('#emailEs').html("&nbsp&nbsp&nbspEmail già esistente.")
                }
              }});  
 }
}

function GetPartecipanti(){
if (getpart==0){
  $.ajax({
              url: "./functions/GetPartecipanti.php",
              success: function(result){
                $("#partecipanti").html(result);
              }}); 
  getpart=1

}else{
  getpart=0
  $("#partecipanti").html("");
} 

}

    function percentuale(){
      var scrollpercent = (document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);
      if(scrollpercent>0.2){
        navbar[0].style="background-color:rgb("+numR+", "+numG+", "+numB+");transition-duration: 2s;";
      }else{
        navbar[0].style="background-color:black;background: linear-gradient(to top, rgba("+numR+", "+numG+", "+numB+", 0), rgba("+numR+", "+numG+", "+numB+",0.55));";
      }
    }
   
 function updateTimer() {
    //future=getDataSanTazzo(new Date().getFullYear())
    future=dSanTazzo
    now = new Date();
    diff = future - now;

    days = Math.floor(diff / (1000 * 60 * 60 * 24))
    hours = Math.floor(diff / (1000 * 60 * 60))
    mins = Math.floor(diff / (1000 * 60))
    secs = Math.floor(diff / 1000)

    d = days;
    h = hours - days * 24;
    m = mins - hours * 60;
    s = secs - mins * 60;
    document.getElementById("timer")
   .innerHTML =
        '<div class="text-light">' + d + '<span class="text-light">giorni</span></div>' +
        '<div class="text-light">' + h + '<span class="text-light">ore</span></div>' +
        '<div class="text-light">' + m + '<span class="text-light">minuti</span></div>' +
        '<div class="text-light">' + s + '<span class="text-light">secondi</span></div>';
}

    function getDataSanTazzo(anno) {
      let dSanTazzo=new Date()
      let fdata=false
      for (let i = 1; i < 10 && fdata==false; i++) {
        dSanTazzo.setFullYear(anno,10,i)
        if (dSanTazzo.getDay()==6){
          fdata=true
          dSanTazzo.setFullYear(anno,10,i+7)
        }
      }
      dSanTazzo.setMinutes(0)
      dSanTazzo.setSeconds(0)
      dSanTazzo.setHours(0)
      dSanTazzo.setMilliseconds(0)
      return dSanTazzo
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


  </script>

</body>
</html>