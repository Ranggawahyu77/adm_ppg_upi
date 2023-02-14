{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- jQuery UI-->
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery Signature -->
    <link href="/css/jquery.signature.css" rel="stylesheet">
    <style>
      .kbw-signature { width: 300px; height: 150px;}
      #sig canvas{
          width: 100% !important;
          height: auto;
      }
  </style>

  <!-- jQuery Signature Script-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="/js/jquery.signature.js"></script>
  <script>
  $(function() {
    var sig = $('#sig').signature();
    
    $('#clear').click(function() {
      sig.signature('clear');
    });
  });
  </script>

  </head>
  <body>

    <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4 m-auto shadow">

          <form action="{{ route('kehadiran.ttd.store', [$kegiatan->id_kegiatan, $participant->nik]) }}" method="POST">
            @csrf
            
            <div class="p-5">
              <label class="form-label" for="nik">Silahkan Tanda Tangan</label>
              <br/>
              <div id="sig" ></div>
              <br/>
              <button id="clear" class="btn btn-success my-2">Ulangi Tanda Tangan</button>
              <textarea id="signature64" name="signed" style="display: none"></textarea>
              <br>
              <button type="submit" class="btn btn-danger mt-3">Submit</button>
              
            </div>
          </form>
          
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Convert PNG-->
    <script type="text/javascript">
      var sig = $('#sig').signature({
        syncField: '#signature64', 
        syncFormat: 'PNG'
      });
      $('#clear').click(function(e) {
          e.preventDefault();
          sig.signature('clear');
          $("#signature64").val('');
      });
  </script>
  </body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peserta</title>

      <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">-->

      <link rel="stylesheet" href="/css/signature-pad.css">

      <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="css/ie9.css">
      <![endif]-->
    
      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-39365077-1']);
        _gaq.push(['_trackPageview']);
    
        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
      </script>

  </head>
  <body>

    <div id="signature-pad" class="signature-pad">
      <div class="signature-pad--body">
        <canvas></canvas>
      </div>
      <div class="signature-pad--footer">
        <div class="description">Sign above</div>
  
        <div class="signature-pad--actions">
          <div>
            <button type="button" class="button clear" data-action="clear">Clear</button>
            <button type="button" class="button" data-action="change-color">Change color</button>
            <button type="button" class="button" data-action="undo">Undo</button>
  
          </div>
          <div>
            <button type="button" class="button save" data-action="save-png">Save as PNG</button>
            <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
            <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
          </div>
        </div>
      </div>
    </div>




    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>-->

    <script src="/js/signature_pad.js"></script>
    <script src="/js/app-sign.js"></script>

  </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>

  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }
    body{
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
      -webkit-box-align: center;
          -ms-flex-align: center;
              align-items: center;
      height: 100vh;
      width: 100%;
      -webkit-user-select: none;
        -moz-user-select: none;
          -ms-user-select: none;
              user-select: none;
      margin: 0;
      padding: 32px 16px;
    }
    .signature-pad {
      position: relative;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      font-size: 10px;
      width: 100%;
      height: 100%;
      max-width: 600px;
      max-height: 450px;
      border: 1px solid #e8e8e8;
      background-color: #fff;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
      border-radius: 4px;
      padding: 16px;
    }

    .signature-pad::before,
    .signature-pad::after {
    position: absolute;
    z-index: -1;
    content: "";
    width: 40%;
    height: 10px;
    bottom: 10px;
    background: transparent;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
    }

    .signature-pad::before {
    left: 20px;
    -webkit-transform: skew(-3deg) rotate(-3deg);
          transform: skew(-3deg) rotate(-3deg);
    }

    .signature-pad::after {
    right: 20px;
    -webkit-transform: skew(3deg) rotate(3deg);
          transform: skew(3deg) rotate(3deg);
    }

    .signature-pad--body {
    position: relative;
    -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
    border: 1px solid #f4f4f4;
    }

    .signature-pad--body
    canvas {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
    }

    .signature-pad--footer {
    color: #C3C3C3;
    text-align: center;
    font-size: 1.2em;
    margin-top: 8px;
    }

    .signature-pad--actions {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
    margin-top: 8px;
    }
  </style>

  {{-- <link rel="stylesheet" href="/css/signature-pad.css"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <body class="bg-light">
    <form id="UploadForm" name="UploadForm" method="POST" action="{{ route('kehadiran.ttd.store', [$kegiatan->id_kegiatan, $participant->nik]) }}" enctype="multipart/form-data">
      <div>
      @csrf
      <input type="hidden" name="anotherinputfield" value="some value" />
      <input type="file" name="ttd_online" id="file_input" style="visibility: hidden; margin-left:-400px;">
      </div>
    </form>
    <div id="signature-pad" class="signature-pad">
      <div class="signature-pad--body">
        <canvas></canvas>
      </div>
      <div class="signature-pad--footer">
        <div class="description">Sign above</div>
  
        <div class="signature-pad--actions">
          <div>
            <button type="button" class="button clear btn btn-outline-danger btn-sm m-1" data-action="clear">Clear</button>
            <button type="button" class="button btn btn-outline-danger btn-sm m-1" data-action="change-color">Change color</button>
            <button type="button" class="button btn btn-outline-danger btn-sm m-1" data-action="undo">Undo</button>
  
          </div>
          <div>
            <button type="button" class="button save btn btn-outline-danger btn-sm m-1" data-action="save-png">Save as PNG</button>
            <button type="button" class="button save btn btn-outline-danger btn-sm m-1" data-action="save-jpg">Save as JPG</button>
            <button type="button" class="button save btn btn-outline-danger btn-sm m-1" data-action="save-svg">Save as SVG</button>
          </div>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="button btn btn-primary m-3" data-action="save-server">Submit</button>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.4/dist/signature_pad.umd.min.js" integrity="sha256-9WcA0fSt3eVJuMgyitGmuRK/c86bZezvLcAcVMWW42s=" crossorigin="anonymous"></script>

    <script src="/js/app-sign.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
      function dataURLtoBlob(dataurl) {
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while(n--){
          u8arr[n] = bstr.charCodeAt(n);
        }
        return new Blob([u8arr], {type:mime});
      }

      function uploadSignature(mimetype) {
        var dataurl = signaturePad.toDataURL(mimetype);
        var blobdata = dataURLtoBlob(dataurl);

        var fd = new FormData(document.getElementById("UploadForm"));
        fd.append("data[signature]", blobdata, "filename");

        /** will result in normal file upload with post name "signature" on target url **/
        $.ajax({
          url: "{{ route('kehadiran.ttd.store', [$kegiatan->id_kegiatan, $participant->nik]) }}",
          type: 'POST',
          data: fd,
          processData: false,
          contentType: false,
          dataType: 'html',
          success: function (response) {
            alert("AJAX OK: uploadSignature() ok");
            console.log(response);
          },
          error: function (e) {
            alert("AJAX ERROR: uploadSignature() fehlgeschlagen");
            console.log(e);
          }
        });
      }
    </script>

  </body>
</html>