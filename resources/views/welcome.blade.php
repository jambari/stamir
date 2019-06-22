
<head>
 <link href="http://geofisika.bali.bmkg.go.id/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="http://geofisika.bali.bmkg.go.id/assets/js/jquery.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         
        <link rel="stylesheet" type="text/css" href="http://geofisika.bali.bmkg.go.id/assets/css/style.css">
        <script type="text/javascript" scr="http://geofisika.bali.bmkg.go.id/assets/js/config.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.22.2/sweetalert2.min.css" />
        <link href="assets/img/logo.png" type="icon/x-image" rel="shortcut icon">
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://geofisika.bali.bmkg.go.id/assets/css/video.css"/>
        <script src="http://http://geofisika.bali.bmkg.go.id/assets/js/video.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    </head> 
<body  style="background-color: #f1f1f1; background: url('http://geofisika.bali.bmkg.go.id/assets/img/bg.jpg'); width: 100%">

           <nav class="navbar navbar-default navbar-fixed-top" style="background-color: white; margin: 0 0 0 0; box-shadow: 0px 0px 5px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand" style="padding-top: 10px;">
                        <ul>
                        <span> 
                            <a href="/">
                                <img src="http://geofisika.bali.bmkg.go.id/assets/img/logo.png" width="30px">
                            </a>
                        </span> 
                        <span class="" style="font-weight:bold; color:black; font-size: 16px" >
                            SISTEM APLIKASI DATA IKLIM TERPADU
                        </span> 
                        </ul>
                    </div> 
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="font-size: 12px; font-weight: bold;">
                        <li><a href="/admin/login">LOG IN</a></li>
                        
                    </ul>
                </div> <!-- /.navbar-collapse -->
            </div>
        </nav>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
  <style>
  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    background: white;
    padding: 10px;
  }
  #basemaps {
    margin-bottom: 5px;
  }
  
   #logo {
    position: absolute;
    bottom: 40px;
    left: 10px;
    z-index: 500;
    background: ;
    padding: 10px;
  }
  #logo {
    margin-bottom: 5px;
  }
</style>


 <style>
    body { margin:0; padding:0; }
    #map { position: absolute; top:0; bottom:0; right:0; left:0; }
  </style>
<div class="container" style="margin-bottom: 0px; margin-top: 60px">



        
    

    
        
        <div class="panel panel-warning" style="margin-top: 65px; height: 450px">
        
        <div class="panel-body">
        <div class="col-md-12" id="map" style=" margin-top:45px; box-shadow: 1px 1px 3px grey; padding: 0px 0px 0px 0px">
        <div id="basemaps-wrapper" class="leaflet-bar">
          <select name="basemaps" id="basemaps" onChange="changeBasemap(basemaps)">
            <option value="Topographic">Topographic</option>
            <option value="Streets">Streets</option>
            <option value="NationalGeographic">National Geographic</option>
            <option value="Oceans">Oceans</option>
            <option value="Gray">Gray</option>
            <option value="DarkGray">Dark Gray</option>
            <option value="Imagery" selected>Imagery</option>
            <option value="ImageryClarity">Imagery (Clarity)</option>
            <option value="ImageryFirefly">Imagery (Firefly)</option>
            <option value="ShadedRelief">Shaded Relief</option>
            <option value="Physical">Physical</option>
          </select>
        </div>
        <div id="logo" class="">
         <img src="http://geofisika.bali.bmkg.go.id/assets/img/logo.png" width="100px">
        </div>
    </div>
    <script>
                
            var markers2 = [
                                {
                         "lat1": '-8.3111963',
                         "long1": '140.565',
                         "alamat1": 'Info Gempa Mag:3.3 SR, 22-Jun-19 07:14:32 WIB, Lok:9.94 LS,118.88 BT (40 km BaratDaya KODI-SUMBABARATDAYA-NTT), Kedlmn:13 Km ::BMKG-KHK',
                         "mag1": '3.3 ',
                         "id1": 'BMKG KHK'
                            },
                            ];
            </script>
<script>
        
            var datacenter = -8.3111963;
            var latcenter = -8.3111963;
            var logcenter = 140.565;
            var parameter = datacenter.alamat1;
            // posisi default peta saat diload
            // koordinat dan zoom view peta 
            var map = L.map('map').setView([-8.3111963,140.565], 6);
            // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
             var layer = L.esri.basemapLayer('Streets').addTo(map);
  var layerLabels;

  function setBasemap(basemap) {
    if (layer) {
      map.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    map.addLayer(layer);

    if (layerLabels) {
      map.removeLayer(layerLabels);
    }

    if (basemap === 'ShadedRelief'
     || basemap === 'Oceans'
     || basemap === 'Gray'
     || basemap === 'DarkGray'
     || basemap === 'Terrain'
   ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      map.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      map.addLayer(layerLabels);
    }
  }

  function changeBasemap(basemaps){
    var basemap = basemaps.value;
    setBasemap(basemap);
  }
   

    
    var segitiga2 = new L.Icon({
    iconUrl: 'https://cdn2.iconfinder.com/data/icons/seo-flat-6/128/15_Place_Optimization-512.png',
    //shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [40, 40],
    iconAnchor: [0, 0],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });


    @if ($stasiuns->count() > 0)
        @foreach ($stasiuns as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }} , {{ $eq->bujur }}], { icon: segitiga2}).addTo(map)
            .bindPopup(
                '{{ $eq->nama_stasiun }}');
        @endforeach
    @endif
            
        
    </script>
    </div>
        
        </div>


       

        


<!-- Modal -->

 
 
</div>                          
</body> 





<script>
    function zoom() {
        document.body.style.zoom = "120%"
    }
</script>
<script>
// $(".profilevideoModal").click(function () {
//   var theModal = $(this).data("target"),
//       videoSRC = $(this).attr("data-video"),
//       videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
//   $(theModal + ' iframe').attr('src', videoSRCauto);
//   $(theModal).on('hidden.bs.modal', function () {
//     $(theModal + ' iframe').attr('src', videoSRC);
//   });
// });
</script>
        <footer class="container-fluid text-center navbar-fixed-bottom" style="background-color: #93a3bc;">
            <p style=" margin-bottom: 10px; margin-top: 10px;">
             <font color="#ffffff"> SIADIT  © 2019 | Stasiun Klimatologi Tanah Miring </font>
                <span class="hidden-xs">Hak Cipta Dilindungi</span>
            </p>
            

        </footer>
    </body>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
