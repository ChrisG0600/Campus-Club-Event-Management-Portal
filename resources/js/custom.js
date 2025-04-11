// AJAX Call
$(document).ready(function () {
  $("#add-category-form").submit(function (event) {
    event.preventDefault();
    $(".error-message").remove();

    let formData = {
      title: $("#title").val(),
      description: $("#description").val(),
      _token: $('meta[name="csrf-token"]').attr("content"),
    };

    $.ajax({
      url: "/club/categories",
      type: "POST",
      data: formData,
      success: function (response) {
        if(response.success){
          alert(response.success);
          $('#title').val('');
          $('#description').val('');
          location.reload();
          
          // let newCategory = `
          //   <tr>
          //     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
          //       ${response.category.title}
          //     </td>
          //     <td class="px-6 py-4 text-sm text-gray-500">
          //       ${response.category.description || "No description"}
          //     </td>
          //     <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex space-x-2 items-center">
          //       <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
          //       <form method="POST" action="#"
          //           onsubmit="return confirm('{{ __('Are you sure you want to delete this category?') }}');">
          //           <input type="hidden" name="_token" value="${$(
          //               'meta[name="csrf-token"]'
          //           ).attr("content")}">
          //           <input type="hidden" name="_method" value="DELETE">
          //           <button type="submit" class="btn text-red-600 hover:text-red-900">Delete</button>
          //       </form>
          //     </td>
          //   </tr>            
          // `;
          // $("#categories-table tbody").prepend(newCategory);
        } else{
          alert(response.error);
        }     
      },
      error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-danger error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          alert("Something went wrong. Please try again.");
        }
      },
    });
  });
});

// Edit Functionalities
$(document).ready(function () {
    const editModal = $("#edit-category");
    const editTitleInput = $("#edit_title");
    const editDescriptionTextarea = $("#edit_description");
    const editCategoryIdInput = $("#edit_category_id");
    const editForm = $("#edit-category-form");

    $('[data-modal-target="edit-category"]').on("click", function () {
        const categoryId = $(this).data("categoryId");
        const categoryTitle = $(this).data("categoryTitle");
        const categoryDescription = $(this).data("categoryDescription");

        editCategoryIdInput.val(categoryId);
        editTitleInput.val(categoryTitle);
        editDescriptionTextarea.val(categoryDescription || "");

        editForm.attr("action", `/club/categories/${categoryId}`);
    });

    // Handle form submission
    $('#edit-category-form').submit(function(event){
      event.preventDefault();
      $(".error-message").remove();
      
      const form = $(this); // Get the form element
      const url = form.attr('action'); // Get the form action URL
      const type = 'PUT'; // Get the form method (PUT for edit)
      const data = form.serialize(); // Serialize the form data 

      $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if(response.success){
            alert(response.success);
            location.reload();
          } else{
            alert(response.error);
          }
        },
        error: function (xhr) {
          if (xhr.responseJSON?.errors) {
            $.each(xhr.responseJSON.errors, function (field, messages) {
              let inputField = $(`#edit-category-form input[name='${field}'], #edit-category-form textarea[name='${field}']`);
              if (!inputField.next(".error-message").length) {
                inputField.after(
                  `<span class="text-danger error-message">${messages[0]}</span>`
                );
              }
            });
          } else {
            alert("Something went wrong while updating. Please try again.");
          }
        },
      })
    })
    
});






// Custom
$(document).ready(function () {
  $("#announcement_date").datepicker({
    dateFormat: "mm/dd/yy",
    changeMonth: true,
    changeYear: true,
    minDate: new Date(), // Set the minimum date to today
  });
});

