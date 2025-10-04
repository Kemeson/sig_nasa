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

                $sql = "SELECT *, ST_AsGeoJSON(geom) as geom_json FROM nasa2025.nasa_agua WHERE fk_user=2";
                $result = pg_query($connPg, $sql);
                if (pg_num_rows($result)) {
                    while ($row = pg_fetch_assoc($result)) {

                ?>

                <input class="input" type="checkbox" onclick="addRemoverLayer2(nasa_options, map, <?php echo $row['gid']; ?>, nasa_conteudo, '<?php echo $row['titulo'] ?>')" id="<?php echo $row['gid'] ?>"> <?php echo $row['titulo'] ?>
                
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#geoModal<?php echo $row['gid'] ?>"><i class="bi bi-pencil"></i></button>


<!-- Modal -->
<div class="modal fade" id="geoModal<?php echo $row['gid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="geoModalLabel<?php echo $row['gid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="geoModalLabel<?php echo $row['gid'] ?>">Editar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="polygonEditForm<?php echo $row['gid'] ?>">
                    <!-- Título -->
                    <div class="mb-3">
                        <label for="title<?php echo $row['gid'] ?>" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title<?php echo $row['gid'] ?>" name="title" required maxlength="255" value="<?php echo htmlspecialchars($row['titulo']); ?>">
                    </div>

                    <!-- Conteúdo (Quill) -->
                    <div class="mb-3">
                        <label class="form-label">Conteúdo</label>
                        <div id="editor<?php echo $row['gid'] ?>"><?php echo $row['descricao']; ?></div>
                        <textarea name="content" id="content<?php echo $row['gid'] ?>" hidden><?php echo $row['descricao']; ?></textarea>
                    </div>

                    <!-- Categoria -->
                    <div class="mb-3">
                        <label for="categoria<?php echo $row['gid'] ?>" class="form-label">Categoria</label>
                        <select name="categoria" id="categoria<?php echo $row['gid'] ?>" class="form-select">                          
                            <option value="">-- Selecione a categoria --</option>
                            <option value="desmatamento" <?php if($row['categoria']=='desmatamento') echo 'selected'; ?>>Desmatamento e Perda de Cobertura Vegetal</option>
                            <option value="poluicao" <?php if($row['categoria']=='poluicao') echo 'selected'; ?>>Poluição Atmosférica e Industrial</option>
                            <option value="enchentes" <?php if($row['categoria']=='enchentes') echo 'selected'; ?>>Enchentes e Inundações</option>
                            <option value="ilhas_calor" <?php if($row['categoria']=='ilhas_calor') echo 'selected'; ?>>Ilhas de Calor e Falta de Áreas Verdes</option>
                            <option value="erosao_assoreamento" <?php if($row['categoria']=='erosao_assoreamento') echo 'selected'; ?>>Erosão, Assoreamento e Impacto em Rios</option>
                            <option value="urbanizacao" <?php if($row['categoria']=='urbanizacao') echo 'selected'; ?>>Saneamento e Urbanização Desordenada</option>
                            <option value="riscos_geologicos" <?php if($row['categoria']=='riscos_geologicos') echo 'selected'; ?>>Riscos Geológicos e Geotécnicos</option>
                            <option value="escassez_hidrica" <?php if($row['categoria']=='escassez_hidrica') echo 'selected'; ?>>Escassez e Contaminação Hídrica</option>
                        </select>
                    </div>

                    <!-- Imagem -->
                    <div class="mb-3">
                        <label for="featured_image<?php echo $row['gid'] ?>" class="form-label">Imagem em Destaque</label>
                        <?php if($row['imagem_dest']): ?>
                            <div class="mb-2">
                                <img src="./imagens/<?php echo htmlspecialchars($row['imagem_dest']); ?>" style="max-height:150px;">
                                <div class="form-text">Imagem atual</div>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="featured_image<?php echo $row['gid'] ?>" name="featured_image" accept="image/*">
                        <div class="form-text">Máx 5MB. JPG, PNG ou GIF.</div>
                    </div>

                    <!-- Geometria -->
                    <input type="hidden" name="geom" value='<?php echo $row['geom_json']; ?>'>

                     <!-- Geometria -->
                    <input type="hidden" name="gid" value='<?php echo $row['gid']; ?>'>

                    <!-- Mensagem -->
                    <div id="polygonEditMessage<?php echo $row['gid'] ?>" class="mb-3" style="display:none;"></div>

                    <!-- Botão -->
                    <button type="button" id="polygonEditBtn<?php echo $row['gid'] ?>" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // --- Quill JS ---
var toolbarOptions = [
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['blockquote', 'code-block'],
  [{ 'direction': 'rtl' }],
  [{ 'align': [] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ 'color': [] }, { 'background': [] }],
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  ['link', 'image', 'video'],
  ['clean']
];

    var quill<?php echo $row['gid'] ?> = new Quill('#editor<?php echo $row['gid'] ?>', {
        theme: 'snow',
        placeholder: 'Escreva o conteúdo da postagem...',
        modules: {
            toolbar: { container: toolbarOptions, handlers: { image: imageHandler } },
            imageResize: { displaySize: true }
        }
    }); 

    
// Ajusta altura do editor via JS
document.querySelector('#editor<?php echo $row['gid'] ?> .ql-editor').style.minHeight = '200px';

    // Função upload de imagem
    async function imageHandler() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.click();

        input.onchange = async () => {
            const file = input.files[0];
            if (!file) return;
            if(file.size>5*1024*1024){ alert('Máx 5MB'); return; }
            if(!['image/jpeg','image/png','image/gif'].includes(file.type)){ alert('Formato inválido'); return; }

            try {
                const formData = new FormData();
                formData.append('image', file);

                const res = await fetch('upload_image.php', { method:'POST', body:formData });
                if(!res.ok) throw new Error('Falha upload');

                const data = await res.json();
                if(data.success && data.url){
                    const range = quill<?php echo $row['gid'] ?>.getSelection(true);
                    quill<?php echo $row['gid'] ?>.insertEmbed(range.index, 'image', data.url);
                    quill<?php echo $row['gid'] ?>.setSelection(range.index + 1);
                } else {
                    alert(data.error || 'Erro desconhecido');
                }
            } catch(e){
                console.error(e); alert('Erro no upload');
            }
        };
    }

    // Botão salvar
    var form<?php echo $row['gid'] ?> = document.getElementById("polygonEditForm<?php echo $row['gid'] ?>");
    var btn<?php echo $row['gid'] ?> = document.getElementById("polygonEditBtn<?php echo $row['gid'] ?>");
    var msgDiv<?php echo $row['gid'] ?> = document.getElementById("polygonEditMessage<?php echo $row['gid'] ?>");

    btn<?php echo $row['gid'] ?>.addEventListener("click", async () => {
        // Salva conteúdo Quill
        document.getElementById("content<?php echo $row['gid'] ?>").value = quill<?php echo $row['gid'] ?>.root.innerHTML;

        var formData = new FormData(form<?php echo $row['gid'] ?>);

        try {
            var response = await fetch("./addEditPoly.php", { method:"POST", body:formData });
            var result = await response.json();

            msgDiv<?php echo $row['gid'] ?>.style.display = "block";
            msgDiv<?php echo $row['gid'] ?>.className = "mb-3 alert " + (result.success ? "alert-success":"alert-danger");
            msgDiv<?php echo $row['gid'] ?>.textContent = result.success ? "✅ "+result.message : "❌ "+result.message;

            if(result.success){
                setTimeout(()=>{ 
                    var modalEl = document.getElementById("geoModal<?php echo $row['gid'] ?>");
                    var bootstrapModal = bootstrap.Modal.getInstance(modalEl);
                    bootstrapModal.hide();
                    location.reload();
                },1000);
            }
        } catch(e){
            msgDiv<?php echo $row['gid'] ?>.style.display = "block";
            msgDiv<?php echo $row['gid'] ?>.className = "mb-3 alert alert-warning";
            msgDiv<?php echo $row['gid'] ?>.textContent = "⚠️ Erro na requisição";
            console.error(e);
        }
    });
});
</script>


                

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