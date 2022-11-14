<!--SLRS key generation page -->

<?php 
  session_start();
  $id = $_SESSION["Id"];
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keys</title>
    <link rel="stylesheet" href="css/votgenerate.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/contractmethods.js"></script>
    <script language="javascript" type="text/javascript" src="js/ContractABI.js"></script>
</head>

<body>
    <div class="container">
        <form class="form">
            <div class="form-group">
                <h3 style="color: red;">These Keys will be used for Voting.</h3>
                <label for="klen" class="form-label">ID</label>
                <input type="number" class="form-control" value="<?php echo $id?>" id="klen" name="klen" placeholder="Enter Id" tabindex="1" required>
            </div>
            <div class="form-group" style="float: left;">
                <label for="private" class="form-label">Private Key</label>
                <textarea class="form-control" rows="5" cols="50" id="private" name="private" placeholder="Private Key" tabindex="4" readonly></textarea>
                <h3 style="color: red;">Please Save your Private key.</h3>
            </div>
            <div class="form-group" style="float: left;">
                <label for="public" class="form-label">Public Key</label>
                <textarea class="form-control" rows="5" cols="50" id="public" name="public" placeholder="Public Key" tabindex="4" readonly></textarea>
            </div>
            <div>
                <button type="button" class="btn" onclick="Upload()">Upload</button>
                <button type="button" id="genkey" onclick="generate()" class="btnpass"> Generate Keys </button> 
    <br> 
      
            </div>
        </form>
    </div>
    <button type="button" id="proceed2" class="btnp" onclick="location.href='votVoting.php'"><b>Finish</b></button>
<script type="text/javascript">
    
    function generate() {
             generateSLRSKeys();
        }   

    function Upload()
    {
        verify();
    }

</script>
</body>
</html>
   