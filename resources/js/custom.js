// AJAX Call for Adding Categories
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

// Edit Functionality for Categories
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

// Edit Functionality for Admin->Students
$(document).ready(function(){
  const editStudentModal = $("#edit-students-modal");
  const editStudentId = $('#edit-student-id');
  const editStudentName = $('#edit-student-name');
  const editStudentEmail = $('#edit-student-email');
  const editStudentRole = $('#edit-student-role');
  const editForm = $("#edit-students-form");

    // Flowbite's classes for showing the modal
    const blurredModalClass =
        "fixed top-0 left-0 right-0 bottom-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center items-center blurred-modal";
    const hiddenClass = "hidden";

    // Initially hide the modal
    if (!editStudentModal.hasClass(hiddenClass)) {
      editStudentModal.addClass(hiddenClass);
    }  
  $(document).on("click", `[data-modal-target="edit-students-modal"][data-modal-toggle="edit-students-modal"]`, function () {
    console.log("Edit button clicked");
    const studentsId = $(this).data("studentsId");
    const studentsName = $(this).data("studentsName");
    const studentsEmail = $(this).data("studentsEmail");
    const studentsRole = $(this).data("studentsRole");

    editStudentId.val(studentsId);
    editStudentName.val(studentsName);
    editStudentEmail.val(studentsEmail);
    editStudentRole.val(studentsRole);

    editForm.attr("action", `/students/${studentsId}`);
    editStudentModal.removeClass(hiddenClass).addClass(blurredModalClass);
  });
  // Handle form submission
  $("#edit-students-form").submit(function(event){
    event.preventDefault();
    $(".error-message").remove();
    const editStudentform = $(this); // Get the form element
    const url = editStudentform.attr("action"); // Get the form action URL
    const type = 'PUT'; // Get the form method (PUT for edit)
    const data = editStudentform.serialize();

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
            let inputField = $(`#edit-students-form input[name='${field}'], #edit-students-form select[name='${field}']`);
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
  });
    $(".close-modal, #edit-students-modal").on("click", function(event) {
        if ($(this).hasClass("close-modal") || event.target.id === "edit-students-modal") {
            editStudentModal.addClass(hiddenClass).removeClass(blurredModalClass);
        }
    });
});

// Search admin->students
$(document).ready(function() {
  const $searchInput = $('#search');
  const $studentTable = $("table tbody"); // Assuming you have an element with this ID

  $searchInput.on('input', function() {
    const searchTerm = $(this).val().trim();
    if (searchTerm.length >= 1 || searchTerm.length === 0) {
      $.ajax({
        url: "/students/search",
        type: "GET",
        dataType: "json",
        data: { query: searchTerm },
        headers: {
          "X-Requested-With": "XMLHttpRequest", // To identify AJAX requests in Laravel
        },
        success: function (data) {
          resultSearch(data);
        },
        error: function (xhr, status, error) {
          console.error("Error fetching search results:", error);
        },
      });
    } 
  });

  function resultSearch(results) {
    $studentTable.empty(); // Clear the existing table rows

    if (results.length > 0) {
      $.each(results, function (index, user) {
        const createdAt = new Date(user.created_at);
        const formattedDate = createdAt.toLocaleDateString("en-US", {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        });
        const row = `
          <tr class="bg-white border-b hover:bg-gray-100">
            <td class="py-3 px-4">${user.id}</td>
            <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">${user.name}</th>
            <td class="py-3 px-4 text-gray-500">${user.email}</td>
            <td class="py-3 px-4 text-gray-500">${user.role}</td>
            <td class="py-3 px-4 text-gray-500">${formattedDate}</td>
            <td class="py-3 px-4 whitespace-nowrap text-right text-sm font-medium flex space-x-2 items-center">
              <button data-modal-target="edit-students-modal" data-modal-toggle="edit-students-modal"
                  data-students-id="${user.id}"
                  data-students-name="${user.name}"
                  data-students-email="${user.email}"
                  data-students-role="${user.role}"
                  class="font-medium text-blue-600 hover:underline cursor-pointer">Edit</button>
              <span class="text-gray-300 mx-2">|</span>
              <form action="{{ route('super_admin.destroyStudent', ['studentsId' => '${user.id}']) }}" method="POST"
                onsubmit="return confirm('{{ __('Are you sure you want to delete this category?') }}');">
                <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr("content")}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn text-red-600 hover:text-red-900">Delete</button>
              </form>
            </td>
          </tr>
          `;
        $studentTable.append(row);
      });
    } else {
        $studentTable.html(`
          <tr class="bg-white border-b hover:bg-gray-100">
            <td colspan="6" class="py-3 px-4 text-center text-gray-500">No users found.</td>
          </tr>
        `);
    }
  }
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

