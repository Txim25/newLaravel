<template>

    <div class="container">
         <div class="btn btn-primary" @click="lanzarModalCrear">Nuevo Tag</div>
        <div class="row justify-content-center">
       
            <div class="col-md-12">
                <div class="card text-light"> 
                <!-- DENTRO DEL GRID SE INSERTAN LAS ETIQUETAS RESPONSIVE QUE SE ORDENAN EN RELACIÓN AL TAMAÑO DEL CONTENEDOR PADRE MEDIANTE LA HOJA DE ESTILOS ADJUNTA, LOS ELEMENTOS DEL GRID ESTATICOS SERÁN LOS TOTEMS DE LAS CATEGORIAS Y EL ACCESO A LA BIBLIOGRAFIA-->
               
                        <div class="grid text-center">
                        
                         </div>            
                </div>
            </div>
        </div>

        <!-- Modal para editar cada una de las tag-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">{{titulo}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="nameFormInput">Tag</label>
                                    <input type="text" class="form-control mb-2" id="nameFormInput" placeholder="Nombre del Tag" v-model="datosTag.name">
                                </div>

                                <div class="col-auto">
                                    <select class="form-control" id="categoriaFormControlSelect1" placeholder="Categoria" v-model="datosTag.categoria">
                                        <option v-for="cat in categorias">{{cat}}</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <label class="sr-only" for="enlaceFormInputGroup">Dirección</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <!-- <div class="input-group-text">@</div> -->
                                        </div>
                                        <input type="text" class="form-control" id="enlaceFormInputGroup" placeholder="Dirección" v-model="datosTag.enlace">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="imagenFormInputGroup">Imagen</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <!-- <div class="input-group-text">@</div> -->
                                        </div>
                                        <input type="text" class="form-control" id="imagenFormInputGroup" placeholder="Imagen" v-model="datosTag.imagen">
                                    </div>
                                </div>
                                <!-- <div class="col-auto">
                                    <label class="sr-only" for="posicionFormInputGroup">Posición</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                         <div class="input-group-text">@</div> 
                                        </div>
                                        <input type="number" class="form-control" id="posicionFormInputGroup" placeholder="Posicion" v-model="datosTag.posicion">
                                    </div>
                                </div>  -->
                            </div>
                            
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                        <button v-if="btnEditar" type="submit" class="btn btn-primary" @click.prevent="crear">Crear</button>

                        <button v-if="btnCrear" type="submit" class="btn btn-danger" @click.prevent="eliminar">Eliminar</button>
                        <button v-if="btnCrear" type="submit" class="btn btn-primary" @click.prevent="editar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</template>
<style>
* { box-sizing: border-box; } 

body { font-family: sans-serif; }

/* ---- grid ---- */

.grid {
   /* Efectte cristal en cada un dels grid items*/
  border : 0px;
  background-color :#ffffff10;
  backdrop-filter: blur(2px);
  -webkit-backdrop-filter: blur(2px);
  max-width: 1200px;
}

/* clear fix */
.grid:after {
  content: '';
  display: block;
  background-color :#ffffff10;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}
/* Botones en los elementos del grid e imagen dentro del gridItem */
.btnGridElem{
    float:right;
    position: fixed;
    right:0;
    bottom: 0;
    width:23px;
    height:23px;
    padding:0;
    z-index:2;
}
.imageCenter{
    height:100px;
    z-index:-1;
}
.imagenTag{
    max-width:60%;
    max-height:60%;
}
/* ---- .grid-item Estilos personalizados para cada categoria "Buscadores","Educación","Juegos","Herramientas","Compras","Viajes","Videos","Musica","Personal"---- 
Colores generados en consonancia a una paleta de colores según los estandares*/
.Buscadores {
  background-color :#11111178;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Educación {
  background-color :#cb99366b;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Juegos {
  background-color :#3f69c578;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Herramientas {
  background-color :#bdb76b91;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Compras {
  background-color :#f6c4ff85;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Videos {
  background-color :#e3e38b75;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Musica {
  background-color :#39c13999;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Personal {
  background-color :#a9a9dda8;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}
.Bibliografia{
  background-color :#B0C4DE;
   backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}

/* ---- .grid-item ---- */

/*Efecto translucido en los elementos y el card*/
.grid-item {
  float: left;
  width:100px;
  height: 100px;
  /* backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px); */
  border: 2px solid hsla(0, 0%, 0%, 0.5);
  border-radius:4px;
}

.grid-item--width2 { width: 200px; }
.grid-item--height2 { height: 200px; }

/*Creo la separación entre botones para una mejor apariencia */
.gutter-sizer { width: 7%; }

/**Añado un cambio de estilo al pasar el mouse sobre el elemento, resalto el borde y cambio el cursor */
.grid-item:hover {
  border-color: hsla(0, 0%, 100%, 0.5);
  cursor: move;
}
/**Cambio en el estilo del elemento al arrastrarlo, de esta forma diferenciamos claramente que lo estamos moviendo */
.grid-item.is-dragging,
.grid-item.is-positioning-post-drag {
  /* background-color :#ffffff15;
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(30px); */
  z-index: 2;
}

.packery-drop-placeholder {
  outline: 3px dashed hsla(0, 0%, 0%, 0.5);
  outline-offset: -6px;
  -webkit-transition: -webkit-transform 0.2s;
          transition: transform 0.2s;
}
.card{
    /* La card contenedora también transparente */
    background-color :#ffffff10;
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(2px);
}

</style>

<script>
 import Packery from  'packery';
 import Draggabilly from  'draggabilly';
 import Swal from 'sweetalert2'


     export default {
        name: 'tagsComponent',
        template: 'tagsComponent',
        mounted() {
            console.log('Component mounted.');
            this.getTags();
            
             
            
        },
        data(){
            return{     
                //Array con los resultados de la consulta al backend
                tags:[],
                //Array con la colección de categorias disponibles
                categorias:["Buscadores","Educación","Juegos","Herramientas","Compras","Viajes","Videos","Musica","Personal"],
                //Array con los datos para la creación o modificación del tag
                datosTag: {id:"",name:"", enlace:"", categoria:"", imagen:"", posicion:0},
                //Variable para controlar si el grid esta cargado
                isActive : false,
                //Variables de control del modal
                btnCrear : false,
                btnEditar: false,
                titulo: "",

                //Sustituyo el contenido inicial por contenido creado integramente dinamico
                // contenidoInicial:' <div class="grid-item Buscadores" style="background-image:url('+"js/img/Buscadores.png"+');background-repeat: no-repeat;background-position: center;">Buscadores</div>'+
                //             '<div class="grid-item Viajes" style="background-image:url('+"js/img/Viajes.png"+');background-repeat: no-repeat;background-position: center;">Viajes</div>'+
                //             '<div class="grid-item Educación" style="background-image:url('+"js/img/Educacion.png"+');background-repeat: no-repeat;background-position: center;">Educación</div>'+
                //             '<div class="grid-item Juegos" style="background-image:url('+"js/img/Juegos.png"+');background-repeat: no-repeat;background-position: center;">Juegos</div>'+
                //             '<div class="grid-item Musica" style="background-image:url('+"js/img/Musica.png"+');background-repeat: no-repeat;background-position: center;">Musica</div>'+
                //             '<div class="grid-item Herramientas" style="background-image:url('+"js/img/Herramientas.png"+');background-repeat: no-repeat;background-position: center;">Herramientas</div>'+
                //             '<div class="grid-item Personal" style="background-image:url('+"js/img/Personal.png"+');background-repeat: no-repeat;background-position: center;">Personal</div>'+
                //             '<div class="grid-item Compras" style="background-image:url('+"js/img/Compras.png"+');background-repeat: no-repeat;background-position: center;">Compras</div>'+
                //             '<div class="grid-item Bibliografia" style="background-image:url('+"js/img/Bibliografia.png"+');background-repeat: no-repeat;background-position: center;">Bibliografia</div>'
               

            }
            
        },
        methods: {
            
            
            gridStart(tags){
                //console.log("gridStart");
                console.log(tags);

                var grid = document.querySelector('.grid');
                //Limpiamos el HTML del interior del grid para evitar duplicados
                grid.innerHTML="";
              
                var pckry = new Packery( grid, {
                itemSelector: '.grid-item',
                columnWidth:100
                });
                this.isActive=true;
               

                //CREAMOS LAS ITERACIONES PARA LOS ELEMENTOS A INSERTAR EN EL GRID
                let items=[];

                //Creamos los tags para las categorias
                this.categorias.forEach(cat=>{
                    var newTag = {
                       name:cat,
                       categoria:cat, 
                       imagen:"/js/img/"+cat+".png",   
                    }
                    items.push(this.generarTag(newTag));
                })

                //Creamos los tags
                tags.forEach(tag => {
                    items.push(this.generarTag(tag));
                });

                
                    
                    var fragment = document.createDocumentFragment();
                
                    items.forEach(elem =>{
                        fragment.appendChild(elem);
                        //console.log(elem);
                })
                    grid.appendChild(fragment);
                    pckry.appended( items );


                  //activamos todos los elementos como dragables
                  pckry.getItemElements().forEach( function( itemElem ) {
                  var draggie = new Draggabilly( itemElem );
                  pckry.bindDraggabillyEvents( draggie );
                draggie.enable()
                });
                //pckry.layout();

                //AGREGAMOS LOS EVENTOS PARA CADA UNA DE LAS TAG VISUALIZADAS EN EL GRID
                grid.addEventListener( 'click', function( event ) {
                // filter for grid-item clicks
                    if ( event.target.classList.contains('grid-item') ) {
                        console.log(event);
                        event.target.classList.toggle('grid-item--large');
                    }
                    //Agregamos la funcionalidad al Modal 
                    // $('#editModal').on('show.bs.modal', function (event) {
                    //     var button = $(event.relatedTarget) // Button that triggered the modal
                    //     var recipient = button.data('whatever')
                        
                    //      // Extract info from data-* attributes
                    //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    //     var modal = $(this)
                    //     modal.find('.modal-title').text('New message to ' + recipient)
                    //     modal.find('.modal-body input').val(recipient)
                    //     })
                        
                       
                pckry.layout();
                
                });
               //Evento para el botón de editar cada Tag
                    $('.btnGridElem').click((event)=>{this.lanzarModalEditar(event);});

            },
            getTags(){
                axios.get('cons_Tags').then(res=>{
                        this.tags = [];
                        this.tags = res.data;
                        
                        //   if(this.isActive){ pckry.destroy()};

                        //   this.isActive =!this.isActive;

                        this.gridStart(this.tags);
                        
                });
            },
            generarTag(tag) {
                var item = document.createElement('div');
                // Añadiremos aleatoriamente las clases de altura y anchura.
                var wRand = Math.random();
                var hRand = Math.random();
                var widthClass = wRand > 0.85 ? 'grid-item--width3' : wRand > 0.7 ? 'grid-item--width2' : '';
                var heightClass = hRand > 0.85 ? 'grid-item--height3' : hRand > 0.5 ? 'grid-item--height2' : '';
                item.innerHTML="<button @click='lanzarModalEditar(event)' class='btn btn-secondary btnGridElem'>...</button>"

                //Creamos seteamos e insertamos el titulo del tag en el grid-item
                var link = document.createElement('a');
                link.setAttribute('href',tag.enlace);
                var tituloItem = document.createElement('span');
                tituloItem.classList.add('badge');
                tituloItem.classList.add('badge-dark');
                tituloItem.innerHTML=tag.name;
                link.appendChild(tituloItem);
                item.appendChild(link);

                //Creamos un div que contendrá la imagen centrada, la imagen y lo añadimos al item-grid
                var imgDiv = document.createElement('div');
                //Creamos la imagen 
                var imgCentered = document.createElement('img');
                //Seteamos los atributos de la imagen y la agregamos al contenedor
                if(tag.imagen==""||tag.imagen==null){tag.imagen="/js/img/"+tag.categoria+".png"}
                imgCentered.setAttribute('src',tag.imagen);
                imgCentered.classList.add('imagenTag');

                imgDiv.appendChild(imgCentered);
                imgDiv.classList.add('imageCenter');
                //Agregamos el div con la imagen al item que hemos creado (el tag en si)
                item.appendChild(imgDiv);

                //creamos el elemento button para los controles del item-grid

                // var btn = document.createElement('div');
                // btn.classList.add('btn');
                // btn.classList.add('btn-secondary');
                // btn.classList.add('btnGridElem');
                // btn.innerHTML="...";
                // btn.innerHTML="<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>";
                //item.appendChild(btn);

                //Seteamos los atributos del item
                item.classList.add('grid-item');
                //item.classList.add('col');
                item.setAttribute('id',tag.id)
                item.classList.add(tag.categoria);
                if(widthClass!=""){item.classList.add( widthClass);}
                if(heightClass!=""){item.classList.add( heightClass);}

                //console.log(item);
               
                return item;

              
             

            },
            crear(){
                //Si la imagen esta vacia asignaremos al montar el tag la predefinida para la categoria
                //if(this.datosTag.imagen==""){this.datosTag.imagen=this.datosTag.categoria};
                if(this.datosTag.posicion==""){this.datosTag.posicion=0}

                axios.post('crear_Tag',this.datosTag).then(res=>{
                    this.datosTag= {name:"", enlace:"", categoria:"", imagen:"", posicion:""}
                    $('#editModal').modal('hide');
                    this.getTags();
                    Swal.fire({
                        icon: 'success',
                        title: 'Tag guardado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    $('#editarModal').modal('hide')

                }).catch(function(error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: String(error.response.data.errors),
                        footer: error.message
                        })
                });
            },
             editar(){
                axios.put('editar_Tag/'+this.datosTag.id,this.datosTag).then(res=>{
                  $('#editModal').modal('hide');
                    this.getTags();
                    Swal.fire({
                        icon: 'success',
                        title: 'Tag editada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                        })
                   

                }).catch(function(error){
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: String(error.response.data.errors),
                        footer: error.message
                        })
                });
            },
             lanzarModalEditar(data){
                console.log(data);
                this.datosTag=this.tags.filter(x=>x.id==parseInt(data.target.parentElement.id));
                this.datosTag=this.datosTag[0];
                //this.datosTag= {id:data.id,name:data.name, enlace: data.enlace, categoria:data.categoria, imagen: data.imagen, posicion:data.posicion};
                this.titulo = 'Editar Tag';
                this.btnCrear = true;
                this.btnEditar = false;
                $('#editModal').modal('show');
            },

                lanzarModalCrear(){
                this.datosTag=  this.datosTag= {name:"", enlace:"", categoria:"", imagen:"", posicion:""};
                this.titulo = 'Crear Tag';
                this.btnCrear = false;
                this.btnEditar = true;
                $('#editModal').modal('show');
            },
            eliminar(){
                Swal.fire({
                    title: "¿Deseas eleminar el Tag?",
                    text:   "Lo eliminaremos permanentement",
                    icon: "warning",
                    buttons: true,
                    dangerMode:true,
                }).then((willDelete)=>{
                    if(willDelete){
                    axios.delete('eliminar_Tag/'+this.datosTag.id).then(res=>{
                  $('#editModal').modal('hide');
                    this.getTags();
                    
                }).catch(function(error){
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: String(error.response.data.errors),
                        footer: error.message
                        })
                });
                    }
                })
                
            }
           
        },
        

    }
</script>
