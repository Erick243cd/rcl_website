<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Radion Communautaire du Lualaba (RCL)</title>
    <meta name="description"
        content="Radion Communautaire du Lualaba (RCL) — Plus proche de la communauté. Émissions, interviews et mixs en direct 24/7." />
    <meta name="keywords" content="radio, rcl, musique, émission, nuit, live radio, podcast" />
    <meta name="author" content="Radion Communautaire du Lualaba (RCL)" />
    <meta name="robots" content="index,follow" />
    <meta name="theme-color" content="#0f0f1b" />

    <link href="<?= site_url('public/assets/img/favicon.png') ?>" rel="shortcut icon" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at center, #0f0f1b 0%, #050509 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.6);
        }

        .tagline {
            margin-top: 10px;
            font-size: 1.3rem;
            opacity: 0.9;
        }

        .micro-container {
            position: relative;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .micro {
            font-size: 140px;
            color: #00eaff;
            cursor: pointer;
            transition: transform 0.3s ease, text-shadow 0.3s ease;
            text-shadow: 0 0 25px rgba(0, 234, 255, 0.7);
        }

        .micro:hover {
            transform: scale(1.1);
            text-shadow: 0 0 40px rgba(0, 234, 255, 1);
        }

        .cap {
            position: absolute;
            top: -60px;
            width: 120px;
            filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.7));
        }

        .btn-listen {
            margin-top: 35px;
            padding: 12px 35px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(90deg, #00eaff, #007bff);
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0 0 15px rgba(0, 234, 255, 0.5);
            transition: all 0.3s ease;
        }

        .btn-listen:hover {
            background: linear-gradient(90deg, #007bff, #00eaff);
            box-shadow: 0 0 25px rgba(0, 234, 255, 0.9);
            transform: translateY(-3px);
        }

        .iframe-container {
            width: 100%;
            max-width: 480px;
            height: 150px;
            margin-top: 20px;
            display: none;
            border-radius: 10px;
            overflow: hidden;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>RCL TV</h1>
        <p class="tagline">Plus proche de la communauté 🎙️</p>

        <div class="micro-container">
            <img src="https://cdn-icons-png.flaticon.com/512/2891/2891628.png" class="cap" alt="Casquette">
            <i class="fa-solid fa-microphone-lines micro mt-4" id="micro"></i>

            <div class="iframe-container" id="iframeContainer">
                <iframe id="radioPlayer"
                    src=""
                    allow="autoplay"
                    allowtransparency="true">
                </iframe>
            </div>
        </div>

        <button class="btn-listen mt-4" id="btnPlay">Écouter maintenant</button>
    </div>

    <script>
        const micro = document.getElementById('micro');
        const btnPlay = document.getElementById('btnPlay');
        const player = document.getElementById('radioPlayer');
        const iframeContainer = document.getElementById('iframeContainer');
        let playing = false;

        function togglePlay() {
            playing = !playing;
            micro.classList.toggle('fa-beat-fade', playing);

            if (playing) {
                iframeContainer.style.display = "block";
                // Charger directement le flux avec autoplay
                player.src = "https://a3.asurahosting.com/public/rcl_tv/embed?theme=dark&autoplay=1";
                btnPlay.textContent = "En direct...";
                btnPlay.disabled = true;
            } else {
                player.src = "";
                iframeContainer.style.display = "none";
                btnPlay.textContent = "Écouter maintenant";
                btnPlay.disabled = false;
            }
        }

        btnPlay.addEventListener('click', togglePlay);
        micro.addEventListener('click', togglePlay);
    </script>
</body>

</html>