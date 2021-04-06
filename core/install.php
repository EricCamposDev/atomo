<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css ">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c2f9e8ac52.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
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

            <nav class="navbar navbar-light bg-dark fixed-top justify-content-center">
                <a class="navbar-brand font-weight-bold text-white" href="#">
                    <img src="https://images.vexels.com/media/users/3/153024/isolated/preview/b954f58d35c3eb88de83550322d3ff53-ilustra-ccedil-atilde-o-da-escola-atom-by-vexels.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Atomo Framework - 4.0.1
                </a>
            </nav>

            <br><br><br>

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
                                <b>SQL</b>
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

                    <form method="post">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                                <!-- modulos e base applications -->
                                <div class="card">
                                    <div class="card-header">
                                        
                                        <div class="row">
                                            <div class="col-11">
                                                <h4 class="card-title font-weight-bold text-center">Controle de Módulos</h4>
                                            </div>
                                            <div class="col-1">
                                                <button type="button" id="new-module" class="btn btn-primary font-weight-bold float-right"><i class="fas fa-plus-circle"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row card-body modules">

                                        <div class="col-6 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <small class="font-weight-bold">Nome do módulo</small>
                                                    <input required type="text" class="form-control tit-mod" name="title[]">
                                                </div>
                                                <div class="card-body">
                                                    <small class="font-weight-bold">base application</small>
                                                    <select required class="form-control base-application" name="app[]">
                                                    </select>
                                                    <small class="font-weight-bold">Versão</small>
                                                    <input required type="text" class="form-control" placeholder="v1.0.0" name="version[]">
                                                    <p class="text-center font-weight-bold mt-2">controle de acesso <input type="checkbox" placeholder="v1.0.0" name="use_session[]"></p>
                                                    <p class="text-center font-weight-bold"><a href="javascript:void(0);" class="remove-module text-dark"><i class="fas fa-times"></i> remover este modulo</a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-9">
                                                <p>Caso precise, crie e gerencie os arquivos <b>Base Applications</b> clicando no botão cinza escuro a direita <i class="fas fa-arrow-right"></i></p>
                                            </div>
                                            <div class="col-3">
                                                <button type="button" class="btn btn-dark btn-sm refresh-apps" data-toggle="modal" data-target=".ba-manager"><b>Base Application<br><i class="fas fa-cogs"></i> Gerenciar</b></button>
                                            </div>
                                        </div>

                                        <div class="modal fade ba-manager" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Base Application - Gerenciar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="card-header">
                                                        <div class="row add-app">
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" name="" placeholder="ex: authenticate" />
                                                                <small>Nome do arquivo base-application, obs: não utilize .php no fim do nome</small>
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" class="btn btn-primary float-right font-weight-bold">Add</button>
                                                            </div>
                                                        </div>                                              
                                                    </div>
                                                    <div class="modal-body ba-body">
                                                        <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>base application</th>
                                                                    <th>ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- ./ -->

                            </div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                
                                <!-- banco -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title font-weight-bold">Configuração Mysql</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                            $db = $install->dbConfig();
                                        ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Servidor</b></span>
                                            </div>
                                            <input type="text" name="folder" value="<?=$db->dbhost; ?>" class="form-control" placeholder="ex: localhost" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Banco</b></span>
                                            </div>
                                            <input type="text" name="folder" value="<?=$db->dbname; ?>" class="form-control" placeholder="ex: banco_teste" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Usuário</b></span>
                                            </div>
                                            <input type="text" name="folder" value="<?=$db->dbuser; ?>" class="form-control" placeholder="ex: root" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Senha</b></span>
                                            </div>
                                            <input type="text" name="folder" value="<?=$db->dbpass; ?>" class="form-control" placeholder="ex: ********" />
                                        </div>
                                    </div>
                                </div>
                                <!-- ./ -->

                            </div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                               
                                <!-- sessão -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title font-weight-bold text-center">Controle de acesso/sessão</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>nome de sessão</b></span>
                                            </div>
                                            <input type="text"  value="<?=$config->login_access_name; ?>" name="login_access_name" class="form-control" placeholder="ex: user" />
                                        </div>

                                        <!-- modulo padrão -->
                                        <?php if($modules): ?>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="width: 30%;">
                                                    <span class="input-group-text" id="basic-addon1"><b>Módulo de controle</b></span>
                                                </div>
                                                <select class="form-control df-module" name="login_access_module">
                                                </select>
                                            </div>
                                        <?php endif; ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>View de autenticação</b></span>
                                            </div>
                                            <input type="text" value="<?=$config->login_access_view; ?>" class="form-control" name="login_access_view" placeholder="ex: entrar-no-sistema" />
                                        </div>

                                    </div>
                                </div>
                                <!-- ./ -->

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
                                            <input type="text" value="<?=$config->folder; ?>" name="folder" class="form-control" placeholder="ex: sistema" required />
                                        </div>

                                        <!--  versão -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Versão</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?=$config->version; ?>" name="version" placeholder="ex: 1.0" required />
                                        </div>

                                        <!--  porta -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Porta</b></span>
                                            </div>
                                            <input type="number" class="form-control" value="<?=$config->listen; ?>" name="listen" placeholder="Ex: 80" required />
                                        </div>

                                        <!-- protocolo -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Protocolo</b></span>
                                            </div>
                                            <select class="form-control" name="protocol" required>
                                                <option <?=($config->protocol=='http')?'selected':''; ?>>http</option>
                                                <option <?=($config->protocol=='https')?'selected':''; ?>>https</option>
                                            </select>
                                        </div>

                                        <!-- db-engine -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>DB Engine</b></span>
                                            </div>
                                            <select class="form-control" name="engine_db" required>
                                                <option <?=($config->engine_db=='pdo-mysql')?'selected':''; ?>>pdo-mysql</option>
                                            </select>
                                        </div>

                                        <!-- debug -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width: 30%;">
                                                <span class="input-group-text" id="basic-addon1"><b>Debug</b></span>
                                            </div>
                                            <select class="form-control" name="debug" required>
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
                                                <select class="form-control df-module" name="default_module" required>
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
                                <!-- ./ -->

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        <!-- loading -->
        <div class="container" hidden>

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
        <!-- ./ -->

        <ul class="nav justify-content-center fixed-bottom bg-dark" style="box-shadow: 1px 1px 4px #999;">
            <li class="nav-item">
                <a class="nav-link text-white active" target="_blank" href="https://github.com/EricCamposDev">
                    <i class="fab fa-github"></i>
                    <b>Atomo Framework on GitHub</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" target="_blank" href="https://www.instagram.com/thefuckingdev2.0/">
                    <i class="fab fa-instagram"></i>
                    <b>thefuckingdev2.0</b>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://www.facebook.com/profile.php?id=100010310170011" target="_blank">
                    <i class="fab fa-facebook"></i>
                    <b>Eric Campos</b>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" target="_blank" href="https://www.linkedin.com/in/eric-campos-8051091a9/">
                    <i class="fab fa-linkedin"></i>
                    <b>Eric Campos</b>
                </a>
            </li>
        </ul>

    </body>

    <script type="text/javascript">
        $(function(){

            // carregando bases atomo
            function getBaseApps(){

                $(".base-application").empty();
                $(".ba-body").find('tbody').empty();
                var request = $.get("core/engineInstall.php?request-ajax=base-apps").done(function(response){
                    
                    var app = $.parseJSON(response)
                    if( app.error == false ){
                        
                        $.each(app.apps, function(k,v){


                            // validate default app
                            if( v == 'app-default' ){
                                dsb = 'disabled';
                            }else{
                                dsb = '';
                            }

                            // inserindo nos selects
                            $(".base-application").append('<option>' + v + '</option>')
                            // inserindo no gerenciar
                            $(".ba-body").find('tbody').append('\
                                <tr>\
                                    <td>'+(k+1)+'</td>\
                                    <td>'+v+'</td>\
                                    <td>\
                                        <button type="button" class="btn btn-danger btn-sm delete-app" data-app="'+v+'" '+dsb+'><i class="fas fa-trash"></i></button>\
                                    </td>\
                                 </tr>\
                            ')

                            // delete apps...
                            $(".delete-app").click(function(){
                                var del = $.post("core/engineInstall.php?request-ajax=delete-app",{name: $(this).attr("data-app")}).done(function(statDel){
                                    
                                    if( statDel ){
                                        // loading apps
                                        getBaseApps()

                                        $.notify(
                                          "Application deletado com sucesso",
                                          "success"
                                        );

                                        $(this).parent().parent().remove()

                                    }else{
                                        // fail
                                        $.notify(
                                          "Falha ao deletar application...",
                                          "error"
                                        );
                                    }

                                }).fail(function(err){
                                    console.log(err)
                                })
                            })
                        })
                        
                    }else{
                        // nao tem
                    }

                }).fail(function(err){
                    console.log(err)
                    // deu erro
                })
            }

            // carregando base apps
            getBaseApps()

            // criando novo app
            $(".add-app").find("button").click(function(){
                var Appname = $(this).parent().parent().find("input").val()
                var request = $.post("core/engineInstall.php?request-ajax=new-app", {name: Appname}).done(function(response){
                    if( response == true ){
                        // recarregando apps
                        getBaseApps()

                        $.notify(
                          "base application criado!",
                          "success"
                        );

                    }else{
                        $.notify(
                          "falha ao criar novo base app..",
                          "error"
                        );
                    }
                    
                    // fechando modal
                    //$(".ba-manager").modal('hide');

                }).fail(function(err){
                    console.log(err)
                })
            })

            // carregand modulo padrão
            const default_module = $(".modules").html()
            // limpando todos os modulos, ate o padrão
            $(".modules").empty()

            $("#new-module").click(function(){
                $(".modules").append(default_module)
                getBaseApps()

                // removendo modulo
                $(".remove-module").click(function(){
                    $(this).parent().parent().parent().remove()
                })
            })

            // autoload de modulos no ultimo tab
            $("#list-settings-list").click(function(){
                $(".df-module").empty()
                $(".tit-mod").each(function(){
                    if( $(this).val() != "" ){
                        $(".df-module").append('<option>' + $(this).val() + '</option>')
                    }
                })
            })

            $("#list-messages-list").click(function(){
                $(".df-module").empty()
                $(".tit-mod").each(function(){
                    if( $(this).val() != "" ){
                        $(".df-module").append('<option>' + $(this).val() + '</option>')
                    }
                })
            })


            // se a modal for ativada, refresh nos apps
            $(".refresh-apps").click(function(){
                getBaseApps()
            })

            // submit geral
            $("form").submit(function(e){
                e.preventDefault()
                dataRequest = $(this).serialize()
                var request = $.post("core/engineInstall.php?request-ajax=install", dataRequest).done(function(response){
                    console.log(response)
                }).fail(function(err){
                    console.log(err)
                })
            })
        })
    </script>
</html>