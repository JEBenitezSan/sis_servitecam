$(document).ready(function() {  

// Configuración de QuaggaJS para CODE_128
const config = {
  inputStream: {
    name: "Live",
    type: "LiveStream",
    target: document.querySelector("#camera"),
    constraints: {
      width: 840,
      height: 680,
      facingMode: "environment"
    }
  },
  locator: {
    patchSize: "large",
    halfSample: false
  },
  decoder: {
    readers: [
      "code_128_reader",
      "ean_reader",
      "ean_8_reader",
      "code_39_reader",
      "upc_reader",
      "upc_e_reader"
    ]
  },
  locate: true,
  frequency: 10,
  numOfWorkers: navigator.hardwareConcurrency || 4
};


  let scannerIsRunning = false;

    // Función para iniciar el escaneo
    function startScanner() {
      $("#camera").show("slow");
      if (!scannerIsRunning) {
        Quagga.init(config, function (err) {
          if (err) {
            console.error('Error al iniciar Quagga:', err);
            return;
          }
          console.log('Quagga iniciado correctamente');
          Quagga.start();
          scannerIsRunning = true;
        });
  
        // Escuchar eventos de detección de códigos de barras
        Quagga.onDetected(function (result) {
          const code = result.codeResult.code;
  
          // Enviar el código a PHP a través de Ajax
          sendBarcodeToPHP(code);
  
          // Detener el escaneo después de detectar un código
          Quagga.stop();
          scannerIsRunning = false;
          var y = document.getElementById("camera");
          y.style.display = "none";
        });
      }
    }
  
    // Función para enviar el código de barras a PHP
    function sendBarcodeToPHP(barcode) {
       console.log(barcode); // MOSTRAR ALERTA
        //  obtener_registros(valorBusqueda);
    }
  
    // Evento clic para iniciar el escaneo al hacer clic en el botón
    const startButton = document.getElementById('startButton');
    startButton.addEventListener('click', startScanner);
  

    //   const select_abordaje = document.getElementById('tipo_recorrido');
    //   select_abordaje.addEventListener('change', function() {
    //     const manualCode = busqueda_incidencia.value;
    //     const id_abordaje_bus = id_abordajebus.value;
    //     const fecha_recorrido_inci = fecha_recorridoinci.value;
  
    //     sendBarcodeToPHP(manualCode, id_abordaje_bus, fecha_recorrido_inci);
    //   });
      


  
  });
  

  