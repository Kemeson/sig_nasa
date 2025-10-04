<!-- optionally define the sidebar content via HTML markup -->
<div id="sidebar" class="leaflet-sidebar collapsed">

    <!-- nav tabs -->
    <div class="leaflet-sidebar-tabs">
        <!-- top aligned tabs -->
        <ul role="tablist">
            <li><a href="#home" role="tab"><i class="bi bi-list active"></i></a></li>
            <li><a href="#autopan" role="tab"><i class="bi bi-arrows-move"></i></a></li>
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

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="loginForm">

         <!-- Mensagem de erro -->
          <div id="loginMessage" class="mb-3" style="display:none;">
            <!-- Aqui vai aparecer a mensagem -->
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="button" id="loginBtn" class="btn btn-success">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  const btn = document.getElementById("loginBtn");
  const msgDiv = document.getElementById("loginMessage");

  btn.addEventListener("click", async () => {
    const data = {
      email: form.email.value,
      password: form.password.value
    };

    try {
      const response = await fetch("./login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
      });

      const result = await response.json();

      msgDiv.style.display = "block";
      msgDiv.className = "mb-3 alert " + (result.success ? "alert-success" : "alert-danger");
      msgDiv.textContent = result.success
        ? "✅ " + result.message
        : "❌ " + result.message;

      if (result.success) {
        setTimeout(() => {
          const modal = bootstrap.Modal.getInstance(document.getElementById("loginModal"));
          modal.hide();

          //Recarrega a página
          location.reload();

            // Redireciona para outra página
            // window.location.href = "dashboard.php"; // coloque a página desejada aqui
        }, 1000);
      }

    } catch (error) {
      msgDiv.style.display = "block";
      msgDiv.className = "mb-3 alert alert-warning";
      msgDiv.textContent = "⚠️ Erro na requisição de login";
      console.error(error);
    }
  });
});

</script>


        <!-- <div class="leaflet-sidebar-pane" id="autopan2">
            <h1 class="leaflet-sidebar-header">
                Formulário
                <span class="leaflet-sidebar-close">
                    <i class="bi bi-chevron-left"></i>
                </span>
            </h1>
<br>
                <h5 class="card-title mb-3">Dados</h5>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-end">Campo 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" id="campo1" name="campo1" placeholder="Digite aqui">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-end">Campo2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-center" id="campo2" name="campo2"
                            placeholder="Digite aqui">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i> Salvar
                    </button>
                </div>

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