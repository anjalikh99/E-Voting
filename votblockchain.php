<!-- SLRS parameter getting page -->

<?php 
  session_start();
  $id = $_SESSION['Id'];
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLRS</title>
    <link rel="stylesheet" href="css/votblockchain.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <meta name="viewport" content = "width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script language="javascript" type="text/javascript" src="js/ContractABI.js"></script>
    
</head>

<body>
    <div class="container">
        <form  class="form">
            <div class="form-group">
                <label for="klen" class="form-label">ID</label>
                <input type="number" class="form-control" value="<?php echo $id?>" id="klen" name="klen" placeholder="Enter Key Length" tabindex="1" required><br>

                <h4 style="color: red;">These parameters will be used to generate keys.</h4>

                <label for="k" class="form-label">K</label>
                <textarea class="form-control" rows="5" cols="50" id="k" name="k" placeholder="Value of parameter K" tabindex="2" readonly></textarea>

                <label for="l" class="form-label">L</label>
                <textarea class="form-control" rows="5" cols="50" id="l" name="l" placeholder="Value of parameter L" tabindex="3" readonly></textarea>

                <label for="N" class="form-label">N</label>
                <textarea class="form-control" rows="5" cols="50" id="n" name="n" placeholder="Value of parameter N" tabindex="4" readonly></textarea>

                <label for="e" class="form-label">e</label>
                <textarea class="form-control" rows="5" cols="50" id="e" name="e" placeholder="Value of parameter e" tabindex="5" readonly></textarea>

                <label for="H1" class="form-label">H1</label>
                <textarea class="form-control" rows="5" cols="50" id="h1" name="h1" placeholder="Value of parameter H1" tabindex="6" readonly></textarea><br><br>

                <label for="pailkey" class="form-label">Paillier Public Key</label>
                <textarea class="form-control" rows="5" cols="50" id="pailpub" name="pailpub" placeholder="Value of Paillier Public Key" tabindex="8" readonly></textarea><br><br>
                
                <h4 style="color: red;">Please save the Paillier Public Key.</h4>
            </div>
            <div>
                <button type="button" id="genkey" onclick="get()" class="btnpass"> Get Parameters </button> 
    <br> 
      
            </div>
        </form>

        
    </div>
      <button type="button" id="proceed1" class="btn" onclick="location.href='votgenerate.php'"><b>Proceed</b></button>


<script type="text/javascript">    

        function get() {
            var id = document.getElementById("klen").value;
            CandContract = initializeContract();
            CandContract.methods.voterdetail(id).call().then(function(result)
            {
                   console.log(result);
                   if(result[0] != 0)
                   {
                     alert("Voter Already Exists");
                     getParameters();
                   }
                   else
                   {
                     createVoter();
                   }

            });      
        }


</script>
</body>
</html>