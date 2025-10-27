<?php $launch = date('Y-m-d\TH:i:s', strtotime('+30 days')); ?>
<style>
    .coming-soon {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        text-align: center;
        color: #222;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    .cs-card {
        max-width: 720px;
        width: 100%;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(2, 6, 23, 0.08);
        padding: 2.5rem;
    }

    .cs-title {
        font-size: 1.75rem;
        margin: 0 0 .5rem;
        color: #555;
    }

    .cs-sub {
        color: #555;
        margin-bottom: 1.25rem;
    }

    .countdown {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin: 1rem 0 1.25rem;
    }

    .countdown .item {
        background: #f7f9fb;
        padding: 12px 14px;
        border-radius: 8px;
        min-width: 72px;
    }

    .countdown .num {
        font-weight: 700;
        font-size: 1.25rem;
        display: block;
    }

    .countdown .label {
        font-size: .75rem;
        color: #666;
    }

    .notify {
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-top: 1rem;
    }

    .notify input[type="email"] {
        padding: 10px 12px;
        border: 1px solid #e1e6eb;
        border-radius: 8px;
        min-width: 220px;
    }

    .btn {
        background: #0069ff;
        color: #fff;
        border: none;
        padding: 10px 14px;
        border-radius: 8px;
        cursor: pointer;
    }

    .small {
        font-size: .85rem;
        color: #888;
        margin-top: .75rem;
    }

    @media (max-width:480px) {
        .countdown {
            gap: 8px
        }

        .countdown .item {
            min-width: 56px;
            padding: 10px
        }
    }
</style>

<div class="coming-soon">
    <div class="cs-card" style="background: linear-gradient(135deg,#0b63ff 0%,#00c2ff 100%); color:#fff; border: 1px solid rgba(255,255,255,0.12); box-shadow: 0 20px 50px rgba(11,99,255,0.25); padding: 3rem;">
        <div style="position:relative; margin-bottom: .5rem;">
            <div style="position:absolute; top:-18px; right:-18px; background:#ffdd57; color:#111; padding:8px 12px; border-radius:12px; font-weight:700; box-shadow:0 8px 20px rgba(0,0,0,0.15);">Bientôt</div>
            <h1 class="cs-title" style="font-size:3.25rem; margin:0 0 .25rem; color:#fff; letter-spacing:0.5px;">Bientôt disponible</h1>
        </div>

        <p class="cs-sub" style="color:rgba(255,255,255,0.95); font-size:2.10rem; margin-bottom:1.25rem;">
            Nous travaillons sur cette page. Revenez bientôt pour de nouvelles actualités et fonctionnalités.
        </p>

        <div id="countdown" data-launch="<?= $launch ?>" class="countdown" aria-live="polite" role="region" aria-label="Compte à rebours jusqu'au lancement" style="justify-content:center; margin:1rem 0 1.25rem;">
            <div class="item" style="background: rgba(255,255,255,0.08); padding:14px 18px; border-radius:10px; min-width:86px; border:1px solid rgba(255,255,255,0.06);">
                <span class="num" id="days" style="font-weight:800; font-size:2rem; display:block; color:#fff;">0</span>
                <span class="label" style="font-size:.85rem; color:rgba(255,255,255,0.85);">Jours</span>
            </div>
            <div class="item" style="background: rgba(255,255,255,0.08); padding:14px 18px; border-radius:10px; min-width:86px; border:1px solid rgba(255,255,255,0.06);">
                <span class="num" id="hours" style="font-weight:800; font-size:2rem; display:block; color:#fff;">0</span>
                <span class="label" style="font-size:.85rem; color:rgba(255,255,255,0.85);">Heures</span>
            </div>
            <div class="item" style="background: rgba(255,255,255,0.08); padding:14px 18px; border-radius:10px; min-width:86px; border:1px solid rgba(255,255,255,0.06);">
                <span class="num" id="mins" style="font-weight:800; font-size:2rem; display:block; color:#fff;">0</span>
                <span class="label" style="font-size:.85rem; color:rgba(255,255,255,0.85);">Minutes</span>
            </div>
            <div class="item" style="background: rgba(255,255,255,0.08); padding:14px 18px; border-radius:10px; min-width:86px; border:1px solid rgba(255,255,255,0.06);">
                <span class="num" id="secs" style="font-weight:800; font-size:2rem; display:block; color:#fff;">0</span>
                <span class="label" style="font-size:.85rem; color:rgba(255,255,255,0.85);">Secondes</span>
            </div>
        </div>

        <div style="display:flex; justify-content:center; gap:12px; align-items:center; margin-top:1rem;">
            <button id="notifyBtn" class="btn" style="background:#ffdd57; color:#0b2545; border:none; padding:14px 22px; border-radius:12px; font-weight:700; font-size:1.05rem; box-shadow:0 12px 30px rgba(255,221,87,0.18); cursor:pointer;">
                Suivez-nous en direct
            </button>
        </div>

        <p class="small" style="color:rgba(255,255,255,0.9); margin-top:.9rem;">Astuce : ajoutez cette page à vos favoris pour un accès rapide le jour du lancement.</p>
    </div>
</div>

<script>
    (function() {
        const el = document.getElementById('countdown');
        const launch = new Date(el.getAttribute('data-launch'));
        const D = id => document.getElementById(id);

        function pad(n) {
            return String(n).padStart(2, '0');
        }

        function tick() {
            const now = new Date();
            let diff = Math.max(0, Math.floor((launch - now) / 1000));
            const days = Math.floor(diff / 86400);
            diff %= 86400;
            const hours = Math.floor(diff / 3600);
            diff %= 3600;
            const mins = Math.floor(diff / 60);
            const secs = diff % 60;

            D('days').textContent = pad(days);
            D('hours').textContent = pad(hours);
            D('mins').textContent = pad(mins);
            D('secs').textContent = pad(secs);

            if (days === 0 && hours === 0 && mins === 0 && secs === 0) {
                clearInterval(timer);
                document.querySelector('.cs-sub').textContent = "C'est parti ! La page est maintenant disponible.";
            }
        }

        tick();
        const timer = setInterval(tick, 1000);

        // Remplace le comportement de notification par une redirection vers /live-radio
        document.getElementById('notifyBtn').addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = "<?= site_url('/live-radio') ?>";
        });
    })();
</script>