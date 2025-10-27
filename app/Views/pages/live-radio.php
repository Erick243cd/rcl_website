<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 2%;!important;">
            <div class="section-title">
                <h2>Suivez la radio en direct</h2>
            </div>
        </div>
        <div class="col-md-8">
            <div class="post post-thumb rcl-embed-card" style="border-radius:12px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,0.08);background:#fff;">
                <div class="rcl-embed-header" style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid rgba(0,0,0,0.04);">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <img src="<?= site_url() ?>public/assets/img/logo.png" alt="RCL" style="width:48px;height:48px;object-fit:cover;border-radius:8px;background:#f3f4f6;">
                        <div style="line-height:1;">
                            <div style="font-weight:700;font-size:15px;color:#111827;">RCL — Radio en direct</div>
                            <div style="font-size:13px;color:#6b7280;">Diffusion en continu</div>
                        </div>
                    </div>

                    <div style="display:flex;align-items:center;gap:8px;">
                        <span style="display:inline-block;background:#ef4444;color:#fff;padding:6px 10px;border-radius:999px;font-weight:600;font-size:13px;box-shadow:0 4px 12px rgba(239,68,68,0.12);">LIVE</span>
                        <button id="rclToggle" type="button" style="background:transparent;border:1px solid #d1d5db;padding:6px 10px;border-radius:8px;cursor:pointer;font-size:13px;">Arrêter</button>
                        <a href="https://a1.asurahosting.com/public/rcl_tv/embed" target="_blank" rel="noopener" style="text-decoration:none;padding:6px 10px;background:#0ea5e9;color:#fff;border-radius:8px;font-size:13px;">Ouvrir</a>
                    </div>
                </div>

                <div style="padding:14px;">
                    <div class="rcl-iframe-container" style="width:100%;aspect-ratio:16/9;border-radius:10px;overflow:hidden;background:#000;display:block;">
                        <iframe id="rclIframe"
                            data-src="https://a1.asurahosting.com/public/rcl_tv/embed"
                            src="https://a1.asurahosting.com/public/rcl_tv/embed"
                            frameborder="0"
                            allowtransparency="true"
                            style="width:100%;height:100%;border:0;display:block;">
                        </iframe>
                    </div>
                    <div style="margin-top:10px;font-size:13px;color:#6b7280;">
                        Astuce : si l'audio continue après avoir cliqué sur "Arrêter", utilisez "Ouvrir" pour écouter dans un nouvel onglet.
                    </div>
                </div>
            </div>
        </div>

        <script>
            (function() {
                var btn = document.getElementById('rclToggle');
                var iframe = document.getElementById('rclIframe');
                var playing = true;

                btn.addEventListener('click', function() {
                    if (playing) {
                        // Stop playback by removing the src (works even for cross-origin iframes)
                        iframe.setAttribute('data-src', iframe.src);
                        iframe.src = 'about:blank';
                        btn.textContent = 'Démarrer';
                        playing = false;
                    } else {
                        // Restore src to resume
                        iframe.src = iframe.getAttribute('data-src') || iframe.getAttribute('data-src') === null ? 'https://a1.asurahosting.com/public/rcl_tv/embed' : iframe.getAttribute('data-src');
                        btn.textContent = 'Arrêter';
                        playing = true;
                    }
                });
            })();
        </script>

        <?php foreach ($podcasts as $item): ?>
            <div class="col-md-4 col-sm-12">
                <div class="post">
                    <a class="post-img" href="#"><img
                            src="<?= site_url() ?>public/assets/imsg/posts/"
                            alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?= $item->category_color ?>"
                                href="#"><?= $item->name ?></a>
                            <span class="post-date"><?= date('M d, Y', strtotime($item->created_at)) ?></span>
                        </div>
                        <h3 class="post-title"><a
                                href="#"><?= $item->title ?></a>
                        </h3>
                        <audio controls preload="metadata">
                            <source src="<?= site_url() ?>public/assets/podcasts/<?= $item->audioFile ?>"
                                type="audio/ogg">
                        </audio>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?= $this->endSection() ?>