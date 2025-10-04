  // Função para ajustar a largura do campo de texto conforme o conteúdo
  function adjustInputWidth(input) {
    const span = document.createElement("span");
    span.style.visibility = "hidden";
    span.style.position = "absolute";
    span.style.whiteSpace = "pre";
    span.style.font = window.getComputedStyle(input).font;
    span.textContent = input.value || input.placeholder || "";
    document.body.appendChild(span);

    input.style.width = (span.offsetWidth + 8) + "px"; // 8px de margem extra
    document.body.removeChild(span);  
}

  function addLayerControl(layer, layerName) {

    layerName += ' ('+layer.toGeoJSON().features.length+')';


    var tipoGeometria = layer.toGeoJSON().features[0].geometry.type;


    var container = document.createElement('div');
    var targetDiv = document.getElementById('texto');
    container.className = 'flex-container';

  
    // Checkbox de visibilidade
    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.title = "Ativar e Desativar camada";
    checkbox.checked = true;
    checkbox.style.marginRight = "6px";
    checkbox.id = layerName;
    checkbox.addEventListener("change", function () {
      const current = layer;
      if (checkbox.checked) {
          map.addLayer(current);
      } else {
          map.removeLayer(current);
      }
    });


    // Botão de zoom
    const zoomBtn = document.createElement("button");
    zoomBtn.innerHTML = "🔍";
    zoomBtn.title = "Zoom na camada";
    zoomBtn.style.border = "none";
    zoomBtn.style.background = "transparent";
    zoomBtn.style.cursor = "pointer";
    zoomBtn.style.fontSize = "14px";
    zoomBtn.addEventListener("click", function () {
        const current = layer;
        if (current && current.getBounds) {
            map.fitBounds(current.getBounds());
        }
    });

    if (tipoGeometria === "Polygon" || tipoGeometria === "MultiPolygon") {


  }
  
    // Botão de exclusão
    var deleteButton = document.createElement("button");
    deleteButton.title = "Remover camada";
    deleteButton.innerHTML = "X";
    deleteButton.style.color = "red";
    deleteButton.style.border = "none";
    deleteButton.style.background = "transparent";
    deleteButton.style.cursor = "pointer";
    deleteButton.addEventListener("click", function () {
      map.removeLayer(layer);
      targetDiv.removeChild(container);
    });

    // Verifica se a layer contém linhas ou polígonos
    let hasVector = false;
    if (layer instanceof L.Polyline || layer instanceof L.Polygon) {
      hasVector = true;
    } else if (layer instanceof L.LayerGroup || layer instanceof L.FeatureGroup) {
      layer.eachLayer(function (l) {
        if (l instanceof L.Polyline || l instanceof L.Polygon) {
          hasVector = true;
        }
      });
    }

    let colorPicker;
    if (hasVector) { 

        colorPicker = document.createElement("input");
        colorPicker.type = "color";
        colorPicker.value = "#3388ff";
        colorPicker.style.minWidth = "24px";
        colorPicker.style.maxWidth = "24px";
        colorPicker.style.height = "18px";
        colorPicker.style.borderRadius = "6px";
        colorPicker.style.marginRight = "10px";
        colorPicker.style.padding = "0";
        colorPicker.style.border = "none";
        colorPicker.style.background = "none";
        colorPicker.style.cursor = "pointer";
        colorPicker.style.verticalAlign = "middle";

        colorPicker.addEventListener("input", function () {
          if (layer.setStyle) {
            layer.setStyle({ color: colorPicker.value });
          } else if (layer instanceof L.FeatureGroup || layer instanceof L.LayerGroup) {
            layer.eachLayer(function (subLayer) {
              if (subLayer.setStyle) {
                subLayer.setStyle({ color: colorPicker.value });
              }
            });
          }
        });

    }

  
    // Campo de nome
    var nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.value = layerName;
    nameInput.style.border = "none";
    nameInput.style.fontWeight = "bold";
    nameInput.style.outline = "none";
    nameInput.style.background = "transparent";
    nameInput.style.fontSize = "14px";
    nameInput.style.fontFamily = "inherit"; // importante!
    adjustInputWidth(nameInput);

    nameInput.addEventListener("input", function () {
      adjustInputWidth(nameInput);
    });
  
    // Seletor de ícones (se o layer tiver marcadores)

    let hasMarker = false;
    if (layer instanceof L.CircleMarker) {
      hasMarker = true;
    } else if (layer instanceof L.LayerGroup || layer instanceof L.FeatureGroup) {
      layer.eachLayer(function (l) {
        if (l instanceof L.CircleMarker) {
          hasMarker = true;
        }
      });
    }
  
    if (hasMarker) {
      const colorPicker = document.createElement("input");
      colorPicker.type = "color";
      colorPicker.value = "#3388ff";
      colorPicker.style.minWidth = "16px";                // largura e altura iguais
      colorPicker.style.maxWidth = "16px";
      colorPicker.style.height = "16px";
      colorPicker.style.borderRadius = "50%";           // borda completamente arredondada
      colorPicker.style.border = "none";      // borda leve para contraste
      colorPicker.style.padding = "0";
      colorPicker.style.marginRight = "14px";
      colorPicker.style.marginLeft = "4px";
      colorPicker.style.cursor = "pointer";
      colorPicker.style.background = "none";
      colorPicker.style.verticalAlign = "middle";

      colorPicker.addEventListener("input", function () {
        const novaCor = colorPicker.value;

        if (layer instanceof L.CircleMarker) {
          layer.setStyle({ color: novaCor, fillColor: novaCor });
        } else if (layer instanceof L.LayerGroup || layer instanceof L.FeatureGroup) {
          layer.eachLayer(function (l) {
            if (l instanceof L.CircleMarker) {
              l.setStyle({ color: novaCor, fillColor: novaCor });
            }
          });
        }
      });

      container.appendChild(colorPicker);
    }  
    // Adiciona tudo

    //if (hasMarker) container.appendChild(iconSelect); // Adiciona seletor de ícone se necessário
    if (colorPicker) container.appendChild(colorPicker);   
    container.appendChild(nameInput);
    //container.appendChild(totalLayer);
    container.appendChild(checkbox); 



    container.appendChild(zoomBtn);


    if(tipoGeometria === "Polygon" || tipoGeometria === "MultiPolygon"){


      
    // Cria o slider de opacidade
    const opacityInput = document.createElement("input");
    opacityInput.type = "range";
    opacityInput.min = 0;
    opacityInput.max = 1;
    opacityInput.step = 0.1;
    opacityInput.style.width = "60px";
    opacityInput.style.display = "none"; // começa escondido
    opacityInput.title = "Opacidade do preenchimento";

    // Pega a opacidade inicial da camada
    let initialOpacity = 1;
    if (layer.options && layer.options.fillOpacity !== undefined) {
        initialOpacity = layer.options.fillOpacity;
    } else if (layer.eachLayer) {
        layer.eachLayer(function (l) {
            if (l.options && l.options.fillOpacity !== undefined) {
                initialOpacity = l.options.fillOpacity;
            }
        });
    }
    opacityInput.value = initialOpacity;

    // Alterar apenas o fillOpacity
    opacityInput.addEventListener("input", function () {
        const current = layer;
        const val = parseFloat(opacityInput.value);

        if (current.setStyle) {
            current.setStyle({ fillOpacity: val });
        } else if (current.eachLayer) {
            current.eachLayer(function (sub) {
                if (sub.setStyle) {
                    sub.setStyle({ fillOpacity: val });
                }
            });
        }
    });

    // Botão para mostrar/ocultar o slider
    const opacityBtn = document.createElement("button");
    opacityBtn.innerHTML = "💧";
    opacityBtn.title = "Ajustar opacidade";
    opacityBtn.style.border = "none";
    opacityBtn.style.background = "transparent";
    opacityBtn.style.cursor = "pointer";
    opacityBtn.style.fontSize = "14px";

    opacityBtn.addEventListener("click", function () {
        opacityInput.style.display =
            opacityInput.style.display === "none" ? "inline-block" : "none";
    });


      container.appendChild(opacityBtn);
      container.appendChild(opacityInput);
    }


    targetDiv.appendChild(container);

    const editBtn = document.createElement("button");
    editBtn.innerHTML = "✏️"; // ícone de lápis
    editBtn.title = "Editar geometria";
    editBtn.style.border = "none";
    editBtn.style.background = "transparent";
    editBtn.style.cursor = "pointer";
    editBtn.style.fontSize = "14px";
    container.appendChild(editBtn);

    let editing = false; // estado do botão

    editBtn.addEventListener("click", function() {
        const current = layer;

        if (!editing) {
            // Inicia edição
            if (current.pm) current.pm.enable();
            editing = true;
            editBtn.style.color = "green"; // opcional: sinal visual
        } else {
            // Finaliza edição
            if (current.pm) current.pm.disable();
            editing = false;
            editBtn.style.color = "black"; // volta à cor original
        }
    });



    // Botão para abrir o modal com informações da geometria
    const geoInfoBtn = document.createElement("button");
    geoInfoBtn.innerHTML = "📍";
    geoInfoBtn.title = "Ver Geometria";
    geoInfoBtn.style.border = "none";
    geoInfoBtn.style.background = "transparent";
    geoInfoBtn.style.cursor = "pointer";
    geoInfoBtn.style.fontSize = "14px";

    geoInfoBtn.addEventListener("click", function () {
      // Atualiza o título do modal
      const modalTitle = document.getElementById("staticBackdropLabel");
      modalTitle.textContent = `Geometria da Camada: ${layerName}`;

      // Atualiza o corpo do modal
      const modalBody = document.getElementById("modalBody");
      modalBody.innerHTML = ""; // Limpa o conteúdo anterior

      // Cria o campo de texto com a geometria
      const geoInput = document.createElement("input");
      geoInput.readOnly = true;
      geoInput.type = "text";
      geoInput.className = "form-control";
      geoInput.name = "geom";
      // geoInput.style.fontFamily = "monospace";
      // geoInput.style.fontSize = "12px";
      // geoInput.style.resize = "none";
      // geoInput.style.border = "1px solid #ccc";
      // geoInput.style.borderRadius = "4px";
      geoInput.value = JSON.stringify(layer.toGeoJSON().features[0].geometry);

      modalBody.appendChild(geoInput);

      // Abre o modal usando Bootstrap
      const modalElement = document.getElementById("staticBackdrop");
      const bootstrapModal = new bootstrap.Modal(modalElement);
      bootstrapModal.show();
    });

    container.appendChild(geoInfoBtn);
    container.appendChild(deleteButton);

  }
  