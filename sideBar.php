<?php
include('./db.php');
?>

<!-- optionally define the sidebar content via HTML markup -->
<div id="sidebar" class="leaflet-sidebar collapsed">

    <!-- nav tabs -->
    <div class="leaflet-sidebar-tabs">
        <!-- top aligned tabs -->
        <ul role="tablist">
            <li><a href="#home" role="tab"><i class="bi bi-list active"></i></a></li>
            <li><a href="#autopan" role="tab"><i class="bi bi-arrows-move"></i></a></li>
            <li><a href="#editar" role="tab"><i class="bi bi-arrows-move"></i></a></li>
            <li><a href="#login" role="tab"><i class="bi bi-person"></i></a></li>
            <!-- <li><a href="#autopan2" role="tab"><i class="bi bi-arrows-move"></i></a></li> -->
        </ul>

        <!-- bottom aligned tabs -->
        <ul role="tablist">
            <li><a href="https://github.com/nickpeihl/leaflet-sidebar-v2"><i class="bi bi-github"></i></a></li>
        </ul>
    </div>

    <!-- panel content -->
    <div class="leaflet-sidebar-content">
        <div class="leaflet-sidebar-pane" id="home">

            <h1 class="leaflet-sidebar-header">
                sidebar-v2
                <span class="leaflet-sidebar-close"><i class="fa fa-caret-left"></i></span>
            </h1>


            <ul>

                <!-- Mapas - Início -->

                <li>
                    <span class="tree-toggle expanded" onclick="toggleSubmenu(this)"><b>Mapas</b></span>
                    <ul class="tree-submenu show">
                        <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(osm)" checked> OMS
                        </li>
                        <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(satelite)"> Satélite
                        </li>
                        <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(googleSat)"> Google
                            Satélite</li>
                        <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(googleTerrain)">
                            Google Terrain</li>
                    </ul>
                </li>

                <!-- Mapas - Fim  -->

                <!-- CAR Analisado - Início -->

                <li>
                    <span class="tree-toggle expanded" onclick="toggleSubmenu(this)"><b>CAR Analisado</b></span>
                    <ul class="tree-submenu show">

                        <!-- Base Cartográfica - Início -->

                        <li>
                            <span class="tree-toggle expanded" onclick="toggleSubmenu(this)">Base Cartográfica</span>
                            <ul class="tree-submenu show" id="geo_externo">

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('municipios_sedes', sedesMun_options, map, 'sedesMun', sedesMun_conteudo, 'Sedes Municipais')"
                                        id="sedesMun"> Sedes Municipais
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('localidades', localidade_options, map, 'localidade', localidade_conteudo, 'Localidades')"
                                        id="localidade"> Localidades
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('municipios_limites', limitesMun_options, map, 'limitesMun', limitesMun_conteudo, 'Limites Municipais')"
                                        id="limitesMun" checked> Limites Municipais
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('estado_limites', limitesEst_options, map, 'limitesEst', limitesEst_conteudo, 'Limites do Estado')"
                                        id="limitesEst" checked> Limites do Estado
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('rodovias', rodovias_options, map, 'rodovias', rodovias_conteudo, 'Rodovias')"
                                        id="rodovias"> Rodovias
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('hidro_massadagua', trechoMassa_options, map, 'trechoMassa', trechoMassa_conteudo, `Trecho de Massa D'Água`)"
                                        id="trechoMassa"> Trecho de Massa D'Água
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('projetos_assentamentos', projetoAss_options, map, 'projetoAss', projetoAss_conteudo, 'Projetos de Assentamento')"
                                        id="projetoAss"> Projetos de Assentamento
                                </li>

                                <li>
                                    <input class="input" type="checkbox"
                                        onclick="addRemoverLayer('glebas', gleba_options, map, 'gleba', gleba_conteudo, 'Glebas')"
                                        id="gleba"> Glebas
                                </li>

                            </ul>
                        </li>

                        <!-- Base Cartográfica - Fim -->
                    </ul>
                </li>
                    

            </ul>



        </div>

        <div class="leaflet-sidebar-pane" id="autopan">
            <h1 class="leaflet-sidebar-header">
                Cadastrar Geometria
                <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
            </h1>
            <div id="texto"></div>
        </div>


        <div class="leaflet-sidebar-pane" id="editar">
            <h1 class="leaflet-sidebar-header">
                Editar Geometria
                <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
            </h1>
            <div id="texto2">

                <?php

                $sql = "SELECT * FROM nasa2025.nasa_agua WHERE fk_user=2";
                $result = pg_query($connPg, $sql);
                if (pg_num_rows($result)) {
                    while ($row = pg_fetch_assoc($result)) {

                ?>

                <input class="input" type="checkbox" onclick="addRemoverLayer2(nasa_options, map, <?php echo $row['gid']; ?>, nasa_conteudo, '<?php echo $row['titulo'] ?>')" id="<?php echo $row['gid'] ?>"> <?php echo $row['titulo'] ?>
                
                <button class="btn btn-info"><i class="bi bi-pencil"></i></button>

                <br>

                <?php
                    }
                }

                ?>



            </div>
        </div>


<div class="leaflet-sidebar-pane" id="login">
    <h1 class="leaflet-sidebar-header">
        Login
        <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
    </h1>
    
    <p>
        Please log in to continue.  
        Click the button below to open the login form.
    </p>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Open Login Form
    </button>
</div>




        <!-- 

            <form action="save_post.php" method="post" enctype="multipart/form-data" onsubmit="return prepareForm();">
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" id="title" name="title" required maxlength="255">
    </div>

    <div class="mb-3">
      <label class="form-label">Conteúdo</label>
      <div id="editor"></div>
      <textarea name="content" id="content" hidden></textarea>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Categoria</label>
      <select class="form-select" id="category" name="category" required>
        <option value="" disabled selected>Selecione uma categoria</option>
        <?php
        // $stmt = $ConnPdoPg->query("SELECT * FROM categories ORDER BY name");
        // while ($row = $stmt->fetch()) {
        //   echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
        // }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="featured_image" class="form-label">Imagem em Destaque</label>
      <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
      <div class="form-text">Tamanho máximo: 5MB. Formatos: JPG, PNG, GIF</div>
    </div>

    <div class="mb-3">
      <label for="tags" class="form-label">Tags</label>
      <input type="text" class="form-control" id="tags" name="tags" placeholder="Ex: meio ambiente, fiscalização">
      <div class="form-text">Separe as tags por vírgula</div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Postagem</button>
    <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
  </form>
        </div> -->


        <div class="leaflet-sidebar-pane" id="messages">
            <h1 class="leaflet-sidebar-header">
                Messages
                <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
            </h1>
        </div>
    </div>
</div>