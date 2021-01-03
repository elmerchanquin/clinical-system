/* Antecedentes */
var numero
function cambiarMenu(numero) {
    if (numero == 1) {
        document.getElementById("mt_1").setAttribute("class", "caja_menu active")
        document.getElementById("mt_2").setAttribute("class", "caja_menu")
        document.getElementById("mt_3").setAttribute("class", "caja_menu")
        document.getElementById("mt_4").setAttribute("class", "caja_menu")
        document.getElementById("mt_5").setAttribute("class", "caja_menu")

        document.getElementById("ct_1").setAttribute("class", "activate caja_blanca")
        document.getElementById("ct_2").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_3").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_4").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_5").setAttribute("class", "deactivate caja_blanca")

    }
    if (numero == 2) {
        document.getElementById("mt_2").setAttribute("class", "caja_menu active")
        document.getElementById("mt_1").setAttribute("class", "caja_menu")
        document.getElementById("mt_3").setAttribute("class", "caja_menu")
        document.getElementById("mt_4").setAttribute("class", "caja_menu")
        document.getElementById("mt_5").setAttribute("class", "caja_menu")

        document.getElementById("ct_2").setAttribute("class", "activate caja_blanca")
        document.getElementById("ct_1").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_3").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_4").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_5").setAttribute("class", "deactivate caja_blanca")

    }
    if (numero == 3) {
        document.getElementById("mt_3").setAttribute("class", "caja_menu active")
        document.getElementById("mt_1").setAttribute("class", "caja_menu")
        document.getElementById("mt_2").setAttribute("class", "caja_menu")
        document.getElementById("mt_4").setAttribute("class", "caja_menu")
        document.getElementById("mt_5").setAttribute("class", "caja_menu")

        document.getElementById("ct_3").setAttribute("class", "activate caja_blanca")
        document.getElementById("ct_1").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_2").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_4").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_5").setAttribute("class", "deactivate caja_blanca")

    }
    if (numero == 4) {
        document.getElementById("mt_4").setAttribute("class", "caja_menu active")
        document.getElementById("mt_1").setAttribute("class", "caja_menu")
        document.getElementById("mt_2").setAttribute("class", "caja_menu")
        document.getElementById("mt_3").setAttribute("class", "caja_menu")
        document.getElementById("mt_5").setAttribute("class", "caja_menu")

        document.getElementById("ct_4").setAttribute("class", "activate caja_blanca")
        document.getElementById("ct_1").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_3").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_2").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_5").setAttribute("class", "deactivate caja_blanca")

    }
    if (numero == 5) {
        document.getElementById("mt_5").setAttribute("class", "caja_menu active")
        document.getElementById("mt_1").setAttribute("class", "caja_menu")
        document.getElementById("mt_3").setAttribute("class", "caja_menu")
        document.getElementById("mt_4").setAttribute("class", "caja_menu")
        document.getElementById("mt_2").setAttribute("class", "caja_menu")

        document.getElementById("ct_5").setAttribute("class", "activate caja_blanca")
        document.getElementById("ct_1").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_3").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_4").setAttribute("class", "deactivate caja_blanca")
        document.getElementById("ct_2").setAttribute("class", "deactivate caja_blanca")

    }
}
/* Examen Físico */
document.addEventListener("DOMContentLoaded", iniciar, false);
            function iniciar(){
                var canvas = document.getElementById("canvas_1");
                canvas.addEventListener("mousedown", ObtenerCoords, false);
            }
            function ObtenerCoords(event){
                var URLactual = window.location;
                var x = new Number();
                var y = new Number();

                if (event.x != undefined && event.y != undefined){
                x = event.x;
                y = event.y;
                }
                var punto = document.createElement("img")
                punto.style.cssText='position: fixed; left:'.concat(x).concat('px; top:').concat(y).concat('px;')
                punto.setAttribute("src", "/esperanza/assets/img/comentario_creado.png")
                punto.setAttribute("id", "".concat(x).concat(y))
                document.getElementById('c_c').appendChild(punto)

                var newt = document.createElement("form")
                newt.setAttribute("class", "caja")
                newt.setAttribute("action", URLactual)
                newt.setAttribute("onmouseover", "mostarComentario(".concat(x).concat(y).concat(")"))
                newt.setAttribute("enctype", "multipart/form-data")
                newt.setAttribute("method", "POST")

                var ca_co = document.createElement('div')
                ca_co.setAttribute("class", "campo")
                var codigo = document.createElement('input')
                ca_co.appendChild(codigo)
                codigo.setAttribute("type", "hidden")
                codigo.setAttribute("value", code)
                codigo.setAttribute("name", "id_comentario")
                codigo.setAttribute("class", "codigo_comentario")
                newt.appendChild(ca_co)

                var c = document.createElement('div')
                c.setAttribute("class", "campo")
                var textarea = document.createElement('textarea')
                c.appendChild(textarea)
                c.setAttribute("class", "textarea_comentario")
                newt.appendChild(c)

                var d = document.createElement('div')
                d.setAttribute("class", "campo")
                var input = document.createElement('input')
                d.appendChild(input)
                input.setAttribute("type", "file")
                input.setAttribute("id", "files")
                input.setAttribute("name", "files[]")
                input.setAttribute("multiple", "true")
                input.setAttribute("accept", ".png, .jpg, .jpeg")
                input.setAttribute("class", "files_comentario")
                newt.appendChild(d)

                var c_x = document.createElement('div')
                c_x.setAttribute("class", "campo")
                var cor_x = document.createElement('input')
                c_x.appendChild(cor_x)
                cor_x.setAttribute("type", "hidden")
                cor_x.setAttribute("value", x)
                cor_x.setAttribute("readonly", "")
                cor_x.setAttribute("class", "cordenadas_x")
                newt.appendChild(c_x)

                var c_y = document.createElement('div')
                c_y.setAttribute("class", "campo")
                var cor_y = document.createElement('input')
                c_y.appendChild(cor_y)
                cor_y.setAttribute("type", "hidden")
                cor_y.setAttribute("value", y)
                cor_y.setAttribute("readonly", "")
                cor_y.setAttribute("class", "cordenadas_y")
                newt.appendChild(c_y)

                var b = document.createElement('div')
                b.setAttribute("class", "campo")
                var button = document.createElement("button")
                b.appendChild(button)
                button.setAttribute("class", "form-button")
                button.setAttribute("onclick", "ajax_post()")
                var texto_button = document.createTextNode("Guardar")
                button.appendChild(texto_button)
                newt.appendChild(b)

                document.getElementById("examen").appendChild(newt);

            }

            function mostarComentario(idComentario) {

                if (".comentario_activo") {
                    var list, index
                    list = document.getElementsByClassName("comentario_activo")

                    for (index = 0; index < list.length; ++index) {
                        list[index].setAttribute("src", "/esperanza/assets/img/comentario_creado.png")
                    }
                }
                var idComentario
                document.getElementById(idComentario).setAttribute("src", "/esperanza/assets/img/comentario_activo.png")
                document.getElementById(idComentario).setAttribute("class", "comentario_activo")

            }

            function ajax_post(){
                var xmlhttp = new XMLHttpRequest()

                var cord_x = document.getElementById('cordenada_x').value
                var cord_y = document.getElementById('cordenada_y').value
                var comentario = document.getElementById('comentario').value
                var imagen = document.getElementById('imagen').value

                var informacionComentario = "cordenada_x=" + cord_x + "&cordenada_y=" + cord_y +
                "&comentario=" + comentario + "&imagen=" + imagen

                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                        var mensaje = xmlhttp.responseText;
                        resultado.innerHTML = mensaje
                    }
                }

                xmlhttp.open("POST", "guardarComentario.php", true)
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xmlhttp.send(informacionComentario)
            }