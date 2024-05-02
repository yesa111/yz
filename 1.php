<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapay Zeka Botu</title>
</head>
<body>
    <h1>Yapay Zeka Botu</h1>
    
    <input type="text" id="userInput" placeholder="Soru veya girişinizi buraya yazın...">
    <button onclick="getResponse()">Gönder</button>
    
    <div id="responseArea"></div>

    <!-- TensorFlow.js Kütüphanesi -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script>
       const tf = require('@tensorflow/tfjs');
const tfn = require('@tensorflow/tfjs-node');
const tfHub = require('@tensorflow/tfjs-node');

const bertURL = 'https://tfhub.dev/tensorflow/bert_en_uncased_L-12_H-768_A-12/4';

// TensorFlow Hub üzerinden BERT modelini yükle
const bertModel = await tfHub.loadGraphModel(bertURL, { fromTFHub: true });

// Model hazır, artık BERT modelini kullanabilirsiniz


        // Sayfa yüklendiğinde çalışacak kod
        async function loadModelAndPredict() {
            // TensorFlow.js'ı yükle
            await tf.setBackend('tensorflow');
            console.log('TensorFlow.js yüklendi.');

            // Modeli yükle
            const model = await tf.loadLayersModel(`file://${modelDir}`);
            console.log('Model yüklendi.');

            // "Gönder" butonuna tıklandığında çağrılacak fonksiyon
            window.getResponse = async () => {
                const userInput = document.getElementById('userInput').value;
                const responseArea = document.getElementById('responseArea');

                // Modeli kullanarak tahmin yap
                const prediction = await model.predict(tf.tensor([userInput]));
                const output = prediction.dataSync(); // Tahmin sonucunu al

                // Tahmin sonucunu ekrana yazdır
                responseArea.innerHTML = `<p><strong>Yapay Zeka:</strong> ${output}</p>`;
            };
        }

        // Modeli yükle ve tahmin yap
        loadModelAndPredict();
    </script>
</body>
</html>
