    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    const tyc = document.getElementById("condiciones");
    const enviar = document.getElementById("enviar");

    const cambiarCondiciones = () => tyc.checked ? enviar.disabled = false : enviar.disabled = true

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')


    const { PDFDocument, StandardFonts, rgb, degrees } = PDFLib

    async function createPdf() {
        //hemos hecho document.getElementById con el id de c/uno de los valores 
        //hemos corregidos unos id para hacer pruebas, como veras la mayoria de ellos se repiten eln el html 
        //no he cambiado todos los id del html porque faltan cosas del formulario, 
        //del 1 al 4 estan cambiado los id
        //objeto "datos"
        datos = {
            entidad: document.getElementById("entidad").value,
            expediente: document.getElementById("expediente").value,
            acformativa: document.getElementById("acformativa").value,
            ntrabajadores: document.getElementById("ntrabajadores").value,
            nombre: document.getElementById("nombre").value,
            nif: document.getElementById("nif").value,
            fnacimiento: document.getElementById("fnacimiento").value,
            genero: document.getElementById("genero").value,
            nass: document.getElementById("nass").value,
            domicilio: document.getElementById("domicilio").value,
            cp: document.getElementById("cp").value,
            poblacion: document.getElementById("poblacion").value,
            comarca: document.getElementById("comarca").value,
            email: document.getElementById("email").value,
            telefono: document.getElementById("telefono").value,
            movil: document.getElementById("movil").value,
        }


        vals = [
            {
                key: "entidad",
                x: 80,
                y: 736,
            },
            {
                key: "expediente",
                x: 435,
                y: 736,
            },
            {
                key: "denominacion",
                x: 80,
                y: 718,
            },
            {
                key: "numero",
                x: 435,
                y: 718,
            },
            {
                key: "nombre",
                x: 150,
                y: 685,
            },
            {
                key: "nif",
                x: 350,
                y: 685,
            },
            {
                key: "fecha",
                x: 80,
                y: 665,
            },
            {
                key: "genero",
                x: 170,
                y: 665,
            },
            {
                key: "nass",
                x: 240,
                y: 665,
            },
            {
                key: "poblacion",
                x: 350,
                y: 665,
            },
            {
                key: "domicilio",
                x: 80,
                y: 645,
            },
            {
                key: "cp",
                x: 260,
                y: 645,
            },
            {
                key: "comarca",
                x: 115,
                y: 632,
            },
            {
                key: "email",
                x: 146,
                y: 622,
            },
            {
                key: "telefono",
                x: 260,
                y: 622,
            },
            {
                key: "movil",
                x: 360,
                y: 622,
            },
        ]
            //hemos hecho otro objeto para empresa
            //esto lo dejo así hasta que los del formulario rellenen bien los campos y poder coger los id 
        entidad = {
            rsocial: "nmmmmmoioojdjdndfnfnddndf",
            sector: "aqui mismo",
            convenio: "ni idea",
            cif: "00000000k",
            ss: "088880000-12",
            trabajadores: "x",
            direccion: "lejos de aqui cerca de alla",
            cp: "08860",
            poblacion: "cornella",
            comarca: "baix del llobregat",
        }
        cord = [
            {
                key: "rsocial",
                x: 80,
                y: 310,
            },
            {
                key: "sector",
                x: 80,
                y: 293,
            },
            {
                key: "convenio",
                x: 410,
                y: 293,
            },
            {
                key: "cif",
                x: 80,
                y: 273,
            },
            {
                key: "ss",
                x: 200,
                y: 273,
            },
            {
                key: "trabajadores",
                x: 410,
                y: 273,
            },
            {
                key: "direccion",
                x: 80,
                y: 253,
            },
            {
                key: "cp",
                x: 80,
                y: 235,
            },
            {
                key: "poblacion",
                x: 140,
                y: 235,
            },
            {
                key: "comarca",
                x: 400,
                y: 235,
            }
        ]

        // Fetch an existing PDF document
        const url = './documento.pdf'
        const existingPdfBytes = await fetch(url).then(res => res.arrayBuffer())

        // Load a PDFDocument from the existing PDF bytes
        const pdfDoc = await PDFDocument.load(existingPdfBytes)

        // Embed the Helvetica font
        const helveticaFont = await pdfDoc.embedFont(StandardFonts.Helvetica)

        // Get the first page of the document
        const pages = pdfDoc.getPages()
        const firstPage = pages[0]

        // Get the width and height of the first page
        const { width, height } = firstPage.getSize()

        mySize = 10;
        myFont = helveticaFont;

        for (let i = 0; i < vals.length; i++) {
            firstPage.drawText(datos[vals[i].key], {
                x: vals[i].x,
                y: vals[i].y,
                size: mySize,
                font: myFont,
            })
        }
        for (let i = 0; i < cord.length; i++) {
            firstPage.drawText(empresa[cord[i].key], {
                x: cord[i].x,
                y: cord[i].y,
                size: mySize,
                font: myFont,
            })
        }


        //ESCRIBO LAS X en el bloque de opciones 1
        //el formulario nos enviará un valor de 1 a 12 
        let sel_opt_1 = document.getElementById('floatingSelect').value;
        //Delcaro un objeto coordenadas para el bloque de opciones 1
        //al principio será vacío
        //let sel_opt_1 = 4

        let coord = {}

        switch (sel_opt_1){
                case 1: //Oficina de Trabajo (OT)
                coord = {
                    x: 84,
                    y: 602,
                }
                break;
            case 2: //Buscador de cursos del SOC
                coord = {
                    x: 245,
                    y: 602
                }
                break;
            case 3: //Twitter del Consorci @fpo_continua
                coord = {
                    x: 391,
                    y: 602
                }
                break;
            case 4: //Web del Consorci: conforcat.gencat.cat
                coord = {
                    x: 84,
                    y: 592
                }
                break;
            case 5: //Web: fp.gencat.cat
                coord = {
                    x: 245,
                    y: 592
                }
                break;
            case 6: //Twitter de Ocupación @ocupaciocat
                coord = {
                    x: 391,
                    y: 592
                }
                break;
            case 7: //Entidad de Formación LinkedIn
                coord = {
                    x: 84,
                    y: 581
                }
                break;
            case 8: //Amigos, amigas o familiares
                coord = {
                    x: 245,
                    y: 581
                }
                break;
            case 9: // Agentes económicos y sociales
                coord = {
                    x: 391,
                    y: 581
                }
                break;
            case 10: //Otros
                coord = {
                    x: 84,
                    y: 570
                }
                break;
            case 11: //Empresa
                coord = {
                    x: 245,
                    y: 570
                }
                break;
            case 12: //Prensa, radio, televisión ( medios comunicación)
                coord = {
                    x: 391,
                    y: 570
                }
            default:
                coord = {
                    x: 84,
                    y: 558
                }
        }
        firstPage.drawText("X", {
            x: coord.x,
            y: coord.y,
            size: 12,
            font: helveticaFont, 
        })
        
        //FORMACION ACADEMICA
        //SI COMENTAMOS DESDE LA 727 HASTA 792 NOS SALE TODO LO QUE TENEMOS HASTA AHORA
        //FALTA ESTA PARTE, AUN NO ESTA EL HTML DE FORMACION ACADEMICA
        /*let sel_opt_2 = document.getElementById('').value;   //falta  ID   
        let coord_2 = {}
        switch (sel_opt_2){
            case 1: //Sin titulacion
                coord_2 = {
                    x: 84,
                    y: 602,
                }
                break;
            case 2: //Titulo de graduado ESO
                coord_2 = {
                    x: 245,
                    y: 602
                }
                break;
            case 3: //Titulo bachillerato
                coord_2 = {
                    x: 391,
                    y: 602
                }
                break;
            case 4: //Titulo FP
                coord_2 = {
                    x: 84,
                    y: 592
                }
                break;
            case 5: //Titulo tecnico FP
                coord_2 = {
                    x: 245,
                    y: 592
                }
                break;
            case 6: //Titulo tecnico superior
                coord_2 = {
                    x: 391,
                    y: 592
                }
                break;
            case 7: //Estudios universitarios 1º ciclo
                coord_2 = {
                    x: 84,
                    y: 581
                }
                break;
            case 8: //Estudios universitarios 2º ciclo
                coord_2 = {
                    x: 245,
                    y: 581
                }
                break;
            case 9: // Otra titulacion
                coord_2 = {
                    x: 391,
                    y: 581
                }
                break;
            
        }
        firstPage.drawText("X", {
            x: coord_2.x,
            y: coord_2.y,
            size: 12,
            font: helveticaFont,         
        })
        //AREA FUNCIONAL
        let sel_opt_3 = document.getElementById('').value;   //falta  ID   
        let coord_3 = {}
        switch (sel_opt_3){
            case 1: //Sin titulacion
                coord_3 = {
                    x: 84,
                    y: 602,
                }
                break;
            case 2: //Titulo de graduado ESO
                coord_3 = {
                    x: 245,
                    y: 602
                }
                break;
            case 3: //Titulo bachillerato
                coord_3 = {
                    x: 391,
                    y: 602
                }
                break;
            case 4: //Titulo FP
                coord_3 = {
                    x: 84,
                    y: 592
                }
                break;
            case 5: //Titulo tecnico FP
                coord_3 = {
                    x: 245,
                    y: 592
                }
                break;
            case 6: //Titulo tecnico superior
                coord_3 = {
                    x: 391,
                    y: 592
                }
                break;
            case 7: //Estudios universitarios 1º ciclo
                coord_3 = {
                    x: 84,
                    y: 581
                }
                break;
            case 8: //Estudios universitarios 2º ciclo
                coord_3 = {
                    x: 245,
                    y: 581
                }
                break;
            case 9: // Otra titulacion
                coord_3 = {
                    x: 391,
                    y: 581
                }
                break;
            
        }
        firstPage.drawText("X", {
            x: coord_3.x,
            y: coord_3.y,
            size: 12,
            font: helveticaFont,         
        })*/


        // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save()

        // Trigger the browser to download the PDF document
        download(pdfBytes, "resultado2.pdf", "application/pdf");
    }
