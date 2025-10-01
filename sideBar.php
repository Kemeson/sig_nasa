<!-- optionally define the sidebar content via HTML markup -->
<div id="sidebar" class="leaflet-sidebar collapsed">

    <!-- nav tabs -->
    <div class="leaflet-sidebar-tabs">
        <!-- top aligned tabs -->
        <ul role="tablist">
            <li><a href="#home" role="tab"><i class="bi bi-list active"></i></a></li>
            <li><a href="#autopan" role="tab"><i class="bi bi-arrows-move"></i></a></li>
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
                <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)"><b>Mapas</b></span>
                <ul class="tree-submenu">
                <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(osm)" checked> OMS</li>
                <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(satelite)"> Satélite</li>
                <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(googleSat)"> Google Satélite</li>
                <li><input class="input" type="radio" name="mapa" id="input" onclick="mapas(googleTerrain)"> Google Terrain</li>
                </ul>
            </li>

            <!-- Mapas - Fim  -->

            <!-- CAR Analisado - Início -->

            <li>
                <span class="tree-toggle expanded" onclick="toggleSubmenu(this)"><b>CAR Analisado</b></span>
                <ul class="tree-submenu show">

                <!-- Base Cartográfica - Início -->

                <li>
                    <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Base Cartográfica</span>
                    <ul class="tree-submenu show" id="geo_externo">

                        <li>
                            <input class="input" type="checkbox" onclick="addRemoverLayer('municipios_limites', limitesMun_options, map, 'limitesMun', limitesMun_conteudo, 'Limites Municipais')" id="limitesMun" checked> Limites Municipais
                        </li>

                    </ul>
                </li>

                <!-- Base Cartográfica - Fim -->

                <!-- Dados Vetores - Início -->

                <li>
                    <span class="tree-toggle expanded" onclick="toggleSubmenu(this)">Dados Vetores</span>
                    <ul class="tree-submenu show">

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Sobreposição IRs</span>
                        <ul class="tree-submenu">

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Sobreposições Outros IRs</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="td_iteraima" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:td_iteraima&outputFormat=text/javascript&format_options=callback:getJson1', 'getJson1', iteraima_layer, map, 'td_iteraima', false, 0, iteraima_leg)"> TD Iteraima
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="sigef_certificados" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:sigef_certificados&outputFormat=text/javascript&format_options=callback:getJson2', 'getJson2', sigef_layer, map, 'sigef_certificados', false, 0, sigef_leg)"> Sigef Certificados
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="sicar_car" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:sicar_car&outputFormat=text/javascript&format_options=callback:getJson3', 'getJson3', car_layer, map, 'sicar_car', false, 0, car_leg)"> CAR RR
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Terra Indígena</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="localidades_indigenas" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:localidades_indigenas&outputFormat=text/javascript&format_options=callback:getJson4', 'getJson4', locInd_layer, map, 'localidades_indigenas', true, 0, locInd_leg)"> Localidades Indígenas
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="terras_indigenas" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:terras_indigenas&outputFormat=text/javascript&format_options=callback:getJson5', 'getJson5', terInd_layer, map, 'terras_indigenas', false, 0, terInd_leg)"> Terras Indigenas
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Unidades de Conservação</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="ucs_federais" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:ucs_federais&outputFormat=text/javascript&format_options=callback:getJson6', 'getJson6', ucsFed_layer, map, 'ucs_federais', false, 0, ucsFed_leg)"> UCS Federais
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="ucs_estaduais" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:ucs_estaduais&outputFormat=text/javascript&format_options=callback:getJson7', 'getJson7', ucsEst_layer, map, 'ucs_estaduais', false, 0, ucsEst_leg)"> UCS Estaduais
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Áreas Embargadas</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="embargos_femarh" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:embargos_femarh&outputFormat=text/javascript&format_options=callback:getJson8', 'getJson8', embFem_layer, map, 'embargos_femarh', true, 0, embFem_leg)"> Embargos FEMARH
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="embargos_ibama" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:embargos_ibama&outputFormat=text/javascript&format_options=callback:getJson9', 'getJson9', embIbam_layer, map, 'embargos_ibama', false, 0, embIbam_leg)"> Embargos - IBAMA
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Assentamentos</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="projetos_assentamentos" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:projetos_assentamentos&outputFormat=text/javascript&format_options=callback:getJson10', 'getJson10', projAssent_layer, map, 'projetos_assentamentos', false, 0, projAssent_leg)"> Projetos de Assentamentos
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Outras Sobreposições</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="areas_inalienaveis_spu" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:areas_inalienaveis_spu&outputFormat=text/javascript&format_options=callback:getJson11', 'getJson11', areaInal_layer, map, 'areas_inalienaveis_spu', false, 0, areaInal_leg)"> Áreas Inalienáveis
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="areas_militares" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:areas_militares&outputFormat=text/javascript&format_options=callback:getJson12', 'getJson12', areaMil_layer, map, 'areas_militares', false, 0, areaMil_leg)"> Áreas Militares
                            </li>

                            </ul>
                        </li>

                        </ul>
                    </li>

                    <!-- Sobreposição IRs - Fim -->

                    <!-- Cobertura Solo - Início -->

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Cobertura Solo</span>
                        <ul class="tree-submenu">

                        <li>
                            <input class="input" type="checkbox" id="asv" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:asv&outputFormat=text/javascript&format_options=callback:getJson13', 'getJson13', asv_layer, map, 'asv', false, 0, asv_leg)"> ASV
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Fitofisionomias</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="fitofisionomias_flor" onclick="toggleLayerWms(fitoFlor_layer, map, 'fitofisionomias_flor', fitoFlor_leg)"> Floresta
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="fitofisionomias_cer" onclick="toggleLayerWms(fitoCer_layer, map, 'fitofisionomias_cer', fitoCer_leg)"> Cerrado
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">INPE</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Alerta de Desmatamento não Floresta
                            </li>

                            <li>
                                <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Desmatamento Acumulado não Floresta até 2000</span>
                                <ul class="tree-submenu">

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_ate_2000&outputFormat=text/javascript&format_options=callback:getJson14&CQL_FILTER=year=2000', 'getJson14', desmAcum1_layer, map, 'desmAcum1', false, 0, desmAcum1_leg)"> 2000
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum2" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_ate_2000&outputFormat=text/javascript&format_options=callback:getJson15&CQL_FILTER=year=2001', 'getJson15', desmAcum2_layer, map, 'desmAcum2', false, 0, desmAcum2_leg)"> 2001
                                </li>

                                </ul>
                            </li>

                            <li>
                                <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Desmatamento Acumulado não Floresta pós 2000</span>
                                <ul class="tree-submenu">

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum3" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson16&CQL_FILTER=year=2000', 'getJson16', desmAcum3_layer, map, 'desmAcum3', false, 0, desmAcum1_leg)"> 2000
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum4" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson17&CQL_FILTER=year=2002', 'getJson17', desmAcum4_layer, map, 'desmAcum4', false, 0, desmAcum4_leg)"> 2002
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum5" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson18&CQL_FILTER=year=2004', 'getJson18', desmAcum5_layer, map, 'desmAcum5', false, 0, desmAcum5_leg)"> 2004
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum6" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson19&CQL_FILTER=year=2006', 'getJson19', desmAcum6_layer, map, 'desmAcum6', false, 0, desmAcum6_leg)"> 2006
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum7" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson20&CQL_FILTER=year=2008', 'getJson20', desmAcum7_layer, map, 'desmAcum7', false, 0, desmAcum7_leg)"> 2008
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum8" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson21&CQL_FILTER=year=2010', 'getJson21', desmAcum8_layer, map, 'desmAcum8', false, 0, desmAcum8_leg)"> 2010
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum9" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson22&CQL_FILTER=year=2013', 'getJson22', desmAcum9_layer, map, 'desmAcum9', false, 0, desmAcum9_leg)"> 2013
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum10" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson23&CQL_FILTER=year=2014', 'getJson23', desmAcum10_layer, map, 'desmAcum10', false, 0, desmAcum10_leg)"> 2014
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum11" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson24&CQL_FILTER=year=2016', 'getJson24', desmAcum11_layer, map, 'desmAcum11', false, 0, desmAcum11_leg)"> 2016
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum12" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson25&CQL_FILTER=year=2018', 'getJson25', desmAcum12_layer, map, 'desmAcum12', false, 0, desmAcum12_leg)"> 2018
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum13" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson26&CQL_FILTER=year=2019', 'getJson26', desmAcum13_layer, map, 'desmAcum13', false, 0, desmAcum13_leg)"> 2019
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum14" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson27&CQL_FILTER=year=2020', 'getJson27', desmAcum14_layer, map, 'desmAcum14', false, 0, desmAcum14_leg)"> 2020
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum15" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson28&CQL_FILTER=year=2021', 'getJson28', desmAcum15_layer, map, 'desmAcum15', false, 0, desmAcum15_leg)"> 2021
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum16" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson29&CQL_FILTER=year=2022', 'getJson29', desmAcum16_layer, map, 'desmAcum16', false, 0, desmAcum16_leg)"> 2022
                                </li>

                                <li>
                                    <input class="input" type="checkbox" id="desmAcum17" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:inpe_desm_acumulado_nao_floresta_pos_2000&outputFormat=text/javascript&format_options=callback:getJson30&CQL_FILTER=year=2023', 'getJson30', desmAcum17_layer, map, 'desmAcum17', false, 0, desmAcum17_leg)"> 2023
                                </li>

                                </ul>
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">USO FBDS</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="usoFbds" onclick="toggleLayerWms(usoFbds_layer, map, 'usoFbds', usoFbds_leg)"> Água
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="usoFbds1" onclick="toggleLayerWms(usoFbds1_layer, map, 'usoFbds1', usoFbds1_leg)"> Área Antropizada
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="usoFbds2" onclick="toggleLayerWms(usoFbds2_layer, map, 'usoFbds2', usoFbds2_leg)"> Área Edificada
                            </li>
                            
                            <li>
                                <input class="input" type="checkbox" id="usoFbds3" onclick="toggleLayerWms(usoFbds3_layer, map, 'usoFbds3', usoFbds3_leg)"> Formação Florestal
                            </li>
                            
                            <li>
                                <input class="input" type="checkbox" id="usoFbds4" onclick="toggleLayerWms(usoFbds4_layer, map, 'usoFbds4', usoFbds4_leg)"> Formação não Florestal
                            </li>

                            </ul>
                        </li>


                        </ul>
                    </li>

                    <!-- Cobertura Solo - Fim -->

                    <!-- Servidão Administrativa - Início -->

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Servidão Administrativa</span>
                        <ul class="tree-submenu">

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Rodovias</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Federal
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Estadual
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Municipal
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Servidão Administrativa Rodovias</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Federal
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Estadual
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Vicinal / Não Pavimentada / Municipal
                            </li>

                            </ul>
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Servidão Administrativa Transmissão
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Servidão Administrativa Distribuição 69kV
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Servidão Administrativa
                        </li>

                        </ul>
                    </li>

                    <!-- Servidão Administrativa - Fim -->

                    <!-- APP / Uso Restrito - Início -->

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">APP / Uso Restrito</span>
                        <ul class="tree-submenu">

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> BC Trecho de Drenagem
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> BC Massa D'Água
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> BC Trecho de Massa D'Água
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="trecDrenFbds" onclick="toggleLayerWms(trecDrenFbds_layer, map, 'trecDrenFbds', trecDrenFbds_leg)"> FBDS Trecho de Drenagem
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">FBDS Trecho de Drenagem</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Alto Alegre
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Amajarí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Boa Vista
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Bonfim
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Canta
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caracaraí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caroebe
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Iracema
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Mucajaí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Normandia
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Pacaraima
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Rorainópolis
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São João da Baliza
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São Luiz
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Uiramutã
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">FBDS Massa D'Água</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Alto Alegre
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Amajarí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Boa Vista
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Bonfim
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Canta
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caracaraí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caroebe
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Iracema
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Mucajaí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Normandia
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Pacaraima
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Rorainópolis
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São João da Baliza
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São Luiz
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Uiramutã
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">FBDS Trecho de Massa D'Água</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Alto Alegre
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Amajarí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Boa Vista
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Bonfim
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Canta
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caracaraí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Caroebe
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Iracema
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Mucajaí
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Normandia
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Pacaraima
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Rorainópolis
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São João da Baliza
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> São Luiz
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Uiramutã
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">APP Relevo</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Encosta (Inclinação > 45°)
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Altitude Superior a 1800 metros
                            </li>

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Topo de Morro
                            </li>

                            </ul>
                        </li>

                        <li>
                            <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">AUR Relevo</span>
                            <ul class="tree-submenu">

                            <li>
                                <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Inclinação entre 25° e 45°
                            </li>

                            </ul>
                        </li>

                        </ul>
                    </li>

                    <!-- APP / Uso Restrito - Fim -->

                    <!-- Reserva Legal - Início -->

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Reserva Legal</span>
                        <ul class="tree-submenu">

                        </ul>
                    </li>

                    <!-- Reserva Legal - Fim -->

                    <!-- Regularidade IR - Início -->

                    <li>
                        <span class="tree-toggle collapsed" onclick="toggleSubmenu(this)">Regularidade IR</span>
                        <ul class="tree-submenu">

                        </ul>
                    </li>

                    <!-- Regularidade IR - Fim -->

                    <!-- Limites Políticos - Início -->

                    <li>
                        <span class="tree-toggle expanded" onclick="toggleSubmenu(this)">Limites Políticos</span>
                        <ul class="tree-submenu show">

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Sedes Municipais
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim1" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:estado_limites1&outputFormat=text/javascript&format_options=callback:getJson150', 'getJson150', estadosLimites, map, 'estadoLim1', false, 0, limEstHtml1)"> Localidades
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="MunicLim" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:limites_municipais&outputFormat=text/javascript&format_options=callback:getJson151', 'getJson151', limitesMunic, map, 'MunicLim', false, 0, limMunHtml)" checked> Limites Municipais
                        </li>

                        <li>
                            <input class="input" type="checkbox" id="estadoLim" onclick="toggleLayer('ows?service=WFS&version=1.0.0&request=GetFeature&typeName=cite:limite_estadual&outputFormat=text/javascript&format_options=callback:getJson152', 'getJson152', estadosLimites, map, 'estadoLim', false, 0, limEstHtml)" checked> Limites Estaduais
                        </li>

                        </ul>
                    </li>

                    <!-- Limites Políticos - Fim -->


                    </ul>
                </li>

                <!-- Dados Vetores - Fim -->

                </ul>
            </li>

            <!-- CAR Analisado - Fim -->

            </ul>



        </div>

        <div class="leaflet-sidebar-pane" id="autopan">
            <h1 class="leaflet-sidebar-header">
                autopan
                <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
            </h1>
            <p>
                <code>Leaflet.control.sidebar({ autopan: true })</code>
                makes sure that the map center always stays visible.
            </p>
            <p>
                The autopan behavior is responsive as well.
                Try opening and closing the sidebar from this pane!
            </p>
        </div>

        <div class="leaflet-sidebar-pane" id="messages">
            <h1 class="leaflet-sidebar-header">
                Messages
                <span class="leaflet-sidebar-close"><i class="bi bi-chevron-left"></i></span>
            </h1>
        </div>
    </div>
</div>