<?= $this->extend("layouts/app") ?>
<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>

<section class="text-center py-5" style="background: radial-gradient(circle at center, #0f0f1b 0%, #050509 100%); color: #fff; min-height: 90vh; display: flex; flex-direction: column; justify-content: center; align-items: center; font-family: 'Poppins', sans-serif;">

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
    </div>

</section>

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

<?= $this->endSection() ?>