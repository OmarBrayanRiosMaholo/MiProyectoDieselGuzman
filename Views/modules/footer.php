 <footer>
     <div class="footer clearfix mb-0 text-muted">
         <div class="float-start">
             <p>
                 <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">
                         DIESEL GUZMAN </font>
                 </font><a href="https://github.com/zuramai/mazer" target="_blank">
                     <font style="vertical-align: inherit;">
                         <font style="vertical-align: inherit;">Lo mejor en productos</font>
                     </font>
                 </a>
             </p>
         </div>
         <div class="float-end">
             <p>
                 <font style="vertical-align: inherit;">
                     <font style="vertical-align: inherit;">Productos de Calidad
                     </font>
                 </font><a href="https://compartiendocodigos.com/" target="_blank">
                     <font style="vertical-align: inherit;">
                         <font style="vertical-align: inherit;">DIESEL GUZMAN</font>
                     </font>
                 </a>
             </p>
         </div>
     </div>
 </footer>
 </div>
 </div>
 </div>
 <!--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->

 <!-- DATATABLES -->
 <script src="assets/extensions/jquery/jquery.min.js"></script>
 <!--<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>-->
 <!--<script src="assets/js/pages/datatables.js"></script>-->
 <script src="assets/js/datatables/datatables.min.js"></script>
 <script src="assets/js/datatables/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>


 <script src="assets/js/bootstrap.js"></script>
 <script src="assets/js/app.js"></script>
 <!--<script type="text/javascript" src="assets/js/filestyle/bootstrap-filestyle.min.js"> </script>-->
 <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
 <!--<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>-->
 <!--<script src="assets/extensions/select2/dist/js/select2.full.min.js"></script>-->
 <script>
$(document).ready(function() {
    // Obtiene la URL actual
    var urlActual = window.location.href;

    // Verifica si la URL contiene la cadena "newsale"
    if (urlActual.indexOf("newsale") !== -1 || urlActual.indexOf("editsale") !== -1) {
        $("#sidebar").removeClass("active");

    }
    /*else {
           $("#sidebar").addClass("active");
       }*/
});
let choices = document.querySelectorAll('.choices');
let initChoice;
for (let i = 0; i < choices.length; i++) {
    if (choices[i].classList.contains("multiple-remove")) {
        initChoice = new Choices(choices[i], {
            delimiter: ',',
            editItems: true,
            maxItemCount: -1,
            removeItemButton: true,
        });
    } else {
        initChoice = new Choices(choices[i]);
    }
}
 </script>
 </body>

 </html>