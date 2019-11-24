   $(document).ready(function() {
       $('[data-toggle="tooltip"]').tooltip();

       var actions = $("table td:last-child").html();
       // Append table with add row form on add new button click
       $(".add-new").click(function() {
           $(this).attr("disabled", "disabled");

           var index = $("table tbody tr:last-child").index();
           var row = '<tr>' +
               '<td><input type="text" class="form-control" name="id" id="id"></td>' +
               '<td><input type="image" img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-5.jpg"class="img-fluid img-thumbnail" alt="Sheep" name="image" id="image"></td>' +
               '<td><input type="text" class="form-control" name="CodeProduct" id="CodeProduct"></td>' +
               '<td><input type="text" class="form-control" name="name" id="name"></td>' +
               '<td><input type="text" class="form-control" name="category" id="category"></td>' +
               '<td><input type="text" class="form-control" name="merk" id="merk"></td>' +
               '<td><input type="text" class="form-control" name="price" id="price"></td>' +
               '<td><input type="text" class="form-control" name="discount" id="discount"></td>' +
               '<td><input type="date" id="start" value="2019-11-22" min="2019-01-01" max="2030-12-31" name="startdate" id="startdate"></td>' +
               '<td><input type="date" id="end" value="2019-11-22" min="2019-01-01" max="2030-12-31" name="lastdate" id="lastdate"></td>' +
               '<td>' + actions + '</td>' +
               '</tr>';
           $("table").append(row);

           $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
           $('[data-toggle="tooltip"]').tooltip();
       });
       // Add row on add button click
       $(document).on("click", ".add", function() {
           var empty = false;
           var input = $(this).parents("tr").find('input[type="text"]');
           input.each(function() {
               if (!$(this).val()) {
                   $(this).addClass("error");
                   empty = true;
               } else {
                   $(this).removeClass("error");
               }
           });
           $(this).parents("tr").find(".error").first().focus();
           if (!empty) {
               input.each(function() {
                   $(this).parent("td").html($(this).val());
               });
               $(this).parents("tr").find(".add, .edit").toggle();
               $(".add-new").removeAttr("disabled");
           }
       });
       // Edit row on edit button click
       $(document).on("click", ".edit", function() {
           $(this).parents("tr").find("td:not(:last-child)").each(function() {
               $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
           });
           $(this).parents("tr").find(".add, .edit").toggle();
           $(".add-new").attr("disabled", "disabled");
       });
       // Delete row on delete button click
       $(document).on("click", ".delete", function() {
           $(this).parents("tr").remove();
           $(".add-new").removeAttr("disabled");
       });
   });