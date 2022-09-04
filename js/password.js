
     function comprobarContraseña(el) {
          const clave = el.value;
          const ochocaracteres = /.{8,}/.test(clave)
          console.log("contiene al menos 8 caracteres:", ochocaracteres)
          const mayymin = /(?:[A-Z])/.test(clave) && /(?:[a-z])/.test(clave)
          console.log("Mayusculas y minusculas:", mayymin)
          const numeros = /(?:\d)/.test(clave)
          console.log("números:", numeros)
          const noespecial = !/[^!?A-Za-z\d]/.test(clave)
          console.log("contiene ! o ?, pero no otro caracter especial:", noespecial)
          const valida=ochocaracteres && mayymin && numeros && noespecial
          console.log("contraseña válida:", valida, "\n\n");
        }
