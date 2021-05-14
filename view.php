<!DOCTYPE html>
<html labng="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>





<style>
    .bg-black{
        background:black
    }

    .component{
        color:red;justify-content:center;text-align:center;font-size:65px;
    }

</style>
<body class="bg-black">;


    <div>

    <?php require_once("system_info.php");?>
       
        
    </div>


    <script>
        var hora = new EventSource("sse_info.php");
        var data_info;
        //var memory = new EventSource("sse.php");
        hora.onmessage = function(event) {
            //document.getElementById("label-hora").innerText = event.data;
            console.log(data_info = JSON.parse(event.data) );

            let porcentagem =  Math.round((somenteValor(data_info.memfree)/somenteValor(data_info.memtotal)) * 100);  
            document.getElementById("progress-bar-memory").style.width = `${porcentagem}%`;
            console.log(porcentagem);
            document.getElementById("progress-bar-memory").innerText = `${porcentagem}%`;
            
        }; 

        function somenteValor(valKb){
            return parseInt(valKb.replace(" kB",""));
        }
    </script>

    
</body>
</html>