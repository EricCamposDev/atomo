<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <title>Guia de instalação Atomo Framework</title>
    </head>
    <body>

        <?php
            $install = new AtomoInstall();
            # configurações
            $config = $install->config();
            # modulos
            $modules = $install->modules();
        ?>

        <div class="container">

            <h1 class="font-weight-bold text-center">
                <img height="60" width="60" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.icon-icons.com%2Ficons2%2F1194%2FPNG%2F512%2F1490886336-22-atom_82489.png&f=1&nofb=1">
                Atomo Framework
            </h1>

            <div class="row">

                <div class="col-2">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                            <p class="text-center">
                                <i class="fab fa-buffer fa-5x"></i><br>
                                <b>Modulos</b>
                            </p>
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                            <p class="text-center">
                                <i class="fas fa-database fa-5x"></i><br>
                                <b>Banco SQL</b>
                            </p>
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                            <p class="text-center">
                                <i class="fas fa-user-friends fa-5x"></i><br>
                                <b>Sessão</b>
                            </p>
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                            <p class="text-center">
                                <i class="fas fa-atom fa-5x"></i><br>
                                <b>Instalação Atomo</b>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-8">


                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <!-- modulos e base applications -->
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <!-- banco -->
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <!-- sessão -->
                        </div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                            <!-- configurações princiapais -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title font-weight-bold text-center">Configuração geral</h4>
                                </div>
                                <div class="card-body">

                                    <!--  dir -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>Diretorio</b></span>
                                        </div>
                                        <input type="text" name="folder" value="<?=$config->folder; ?>" class="form-control" placeholder="Username" />
                                    </div>

                                    <!--  versão -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>Versão</b></span>
                                        </div>
                                        <input type="text" class="form-control" value="<?=$config->version; ?>" placeholder="Username" />
                                    </div>

                                    <!--  porta -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>Porta</b></span>
                                        </div>
                                        <input type="number" class="form-control" value="<?=$config->listen; ?>" placeholder="Ex: 80" />
                                    </div>

                                    <!-- protocolo -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>Protocolo</b></span>
                                        </div>
                                        <select class="form-control" name="">
                                            <option <?=($config->protocol=='http')?'selected':''; ?>>http</option>
                                            <option <?=($config->protocol=='https')?'selected':''; ?>>https</option>
                                        </select>
                                    </div>

                                    <!-- db-engine -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>DB Engine</b></span>
                                        </div>
                                        <select class="form-control" name="">
                                            <option <?=($config->engine_db=='pdo-mysql')?'selected':''; ?>>pdo-mysql</option>
                                        </select>
                                    </div>

                                    <!-- debug -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 30%;">
                                            <span class="input-group-text" id="basic-addon1"><b>Debug</b></span>
                                        </div>
                                        <select class="form-control" name="">
                                            <option value="1" <?=($config->debug==1)?'selected':''; ?>>Ativo</option>
                                            <option value="0" <?=($config->debug==0)?'selected':''; ?>>Inativo</option>
                                        </select>
                                    </div>

                                    <!-- modulo padrão -->
                                    <?php if($modules): ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Modulo Padrão</b></span>
                                            </div>
                                            <select class="form-control" name="">
                                                <?php foreach($modules as $module): ?>
                                                    <option><?=$module['title']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-secondary font-weight-bold float-left"><i class="far fa-life-ring"></i> Ajuda</button>
                                        </div>
                                        <div class="col-8">
                                            <button type="submit" class="float-right btn btn-primary btn-lg font-weight-bold"><i class="fas fa-atom"></i> Configurar Atomo</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./ -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="container">

            <!-- instalando... -->
            <h4 class="text-center" style="margin-top: 10rem;">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgifimage.net%2Fwp-content%2Fuploads%2F2017%2F09%2Fatomo-gif-animado-7.gif&f=1&nofb=1">
                <br>Instalando e configurando <br> ambiente atomo...
            </h4>

            <!-- installing -->
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <h3 class="font-weight-bold text-center">25%</h3>
                    <div class="progress" style="height: 20px;">
                      <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <!-- ./ -->
            
        </div>

        <ul class="nav justify-content-center fixed-bottom" style="box-shadow: 1px 1px 4px #999;">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fab fa-github"></i>
                    <b>Atomo Framework on GitHub</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fab fa-instagram"></i>
                    <b>thefuckingdev2.0</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fab fa-facebook"></i>
                    <b>Eric Campos</b>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fab fa-linkedin"></i>
                    <b>Eric Campos</b>
                </a>
            </li>
        </ul>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c2f9e8ac52.js"></script>
    </body>
</html>