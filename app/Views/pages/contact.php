<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="<?= site_url() ?>">Accueil</a></li>
                    <li>Contact</li>
                </ul>
                <h2>Contact</h2>
            </div>
        </div>
    </div>
</div>

</header>

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="section-row">
                    <h3>Information de contact</h3>
                    <p>Pour toutes vos préoccupations, veuillez nous contacter aux coordonnées ci-dessous :</p>
                    <ul class="list-style">
                        <li>
                            <p><strong>Email:</strong> <a href="#"><span class="__cf_email__"
                                        data-cfemail="1c4b797e717d7b5c79717d7570327f7371">[<?= $coords->email ?>]</span></a>
                            </p>
                        </li>
                        <li>
                            <p><strong>Téléphone:</strong> <?= $coords->phone ?></p>
                        </li>
                        <li>
                            <p><strong>Adresse:</strong> <?= $coords->address ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="section-row">
                    <h3>Envoyer un Message</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <span>Email</span>
                                    <input class="input" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <span>Object</span>
                                    <input class="input" type="text" name="subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>

                                <div class="checkbox" style="margin-left:1.5rem !important;">
                                    <label style="display:inline-block; margin-left:0.25rem !important;">
                                        <input type="checkbox" name="human_check" required style="vertical-align:middle; margin-right:0.5rem !important;"> Je confirme que je ne suis pas un robot
                                    </label>
                                </div>
                                <button class="primary-button">Soumettre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>