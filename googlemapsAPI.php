<!DOCTYPE html>
<html>
<head>
  <title>Emerson Carvalho - Pegar Coordenadas Geográficas à partir de um endereço usando Javascript (2019)</title>
  <label for="address" class="form-label">Endereço</label>
    <input id="address" name="address"  type="text" class="form-control" placeholder="Insira o endereço">
    <button id="btn" type="button" class="btn btn-outline-dark">Consultar</button>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js" type="text/javascript"></script>
<script type="text/javascript">


$(document).ready(function() {
    $('#btn').click(function(e){

        e.preventDefault();
        const API_URL = 'https://maps.googleapis.com/maps/api/geocode/json';
        const API_KEY = 'AIzaSyDvbS7BRsiO8qQ-ikl1cJ4q6THepBkiqL4';
        var address = $("#address").val();
        console.log(address);

        const doRequest = (url) => {
            const promisseCallback = (resolve, reject) => {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: resolve,
                    error: reject,
                });
            };
            return new Promise(promisseCallback);
        }

        const getApiUrl = (address) => {
            return `${API_URL}?key=${API_KEY}&address=${encodeURI(address)}`;
        }

        //const address = '368 Broadway, New York, NY 10013, USA';

        (async () => {
            const apiUrl = getApiUrl(address);
            const data = await doRequest(apiUrl);
            
            if (!data || data.error_message) {
                const message = (data && data.error_message) ? data.error_message : 'Api Error';
                console.log(message);
                return;
            }
            
            console.log(data.results[0].geometry.location);
        })();
          
    });
});

</script>
</body>
</html>
