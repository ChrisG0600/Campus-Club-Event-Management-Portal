// Success Alert
function successAlert(){
  Swal.fire({
    title: "Success!",
    text: "Created successfully!",
    icon: "success",
  }).then(function () {
    window.location.reload();
  });
}

function editAlert(){
  Swal.fire({
    title: "Success!",
    text: "Updated successfully!",
    icon: "success",
  }).then(function () {
    window.location.reload();
  });
}

// Delete Alert
function deleteAlert(){
  swla.file({
    type: "Success",
    title: "Success",
    text: "Deleted Successfully",
    icon: "success",
  }).then(function(){
    window.location.reload();
  })
}

// Error Alert
function errorAlert(){
  Swal.fire({
    title: "Error!",
    text: "Something went wrong!",
    icon: "error",
  })
}
// Delete Functionality dynamic
$(document).ready(function() {
  $('.delete-btn').on('click', function(event) {
    event.preventDefault();

    const button = $(this);
    const form = button.closest('form');
    const dataName = button.data('name');

    const confirmationTitle = dataName ? `Are you sure you want to delete ${dataName}?` : `Are you sure?`;
    const confirmationText = dataName ? `You will not be able to recover ${dataName}?` : `You will not be able to recover this item!`;

    Swal.fire({
      title: confirmationTitle,
      text: confirmationText,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
        if(result.success){
          deleteAlert();
        }
      }
    });
  });
});
// --------------------------------------------------------------------Admin Page--------------------------------------------------------------
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
          $('#title').val('');
          $('#description').val('');
          Swal.fire({
            title: "Success!",
            text: response.success,
            icon: "success",
          }).then(function () {
            window.location.reload();
          });
          
        } else{
          errorAlert();
        }     
      },
      error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "'], textarea[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-red-500 error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          errorAlert();
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
            Swal.fire({
              title: "Success!",
              text: response.success,
              icon: "success",
            }).then(function () {
              window.location.reload();
            });
          } else{
            errorAlert();
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
            errorAlert();
          }
        },
      })
    })
    
});

// Club Pending View Club Details
$(document).ready(function () {
  const viewClubModal = $("#view-details-modal");
  const viewClubCategory = $("#modal-club-category");
  const viewClubName = $("#modal-club-name");
  const viewClubCreator = $("#modal-creator-name");
  const viewClubEmail = $("#modal-club-email");
  const viewClubAdvisor = $("#modal-club-advisor");
  const viewClubDescription = $("#modal-description");
  const viewClubWhyJoin = $("#modal-why-join-us");
  const viewClubActivities = $("#modal-activities");

  $('[data-modal-target="view-details-modal"]').on("click", function() {
    const category = $(this).data("category");
    const clubName = $(this).data("clubName");
    const clubCreator = $(this).data("creatorName");
    const clubEmail = $(this).data("email");
    const clubAdvisor = $(this).data("clubAdvisor");
    const clubDescription = $(this).data("description");
    const clubWhyJoin = $(this).data("whyJoinUs");
    const clubActivities = $(this).data("activities");
    const clubCategory = $(this).data("category");

    viewClubCategory.text(clubCategory);
    viewClubName.text(clubName);
    viewClubCreator.text(clubCreator);
    viewClubEmail.text(clubEmail);
    viewClubAdvisor.text(clubAdvisor);
    viewClubDescription.text(clubDescription);
    viewClubWhyJoin.text(clubWhyJoin);
    viewClubActivities.text(clubActivities);

  });
});

// Approved Club Pending
$(document).on('click', '.btn-approve', function () {
  const clubId = $(this).data('id');

  Swal.fire({
    title: 'Are you sure?',
    text: "You want to approve this club?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, approve it!'
  }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `/club/registration-requests/${clubId}`,
          type: 'PUT',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
          success: function (response) {
            Swal.fire('Approved!', response.message, 'success').then(()=> window.location.reload());
          },
          error: function (xhr) {
            Swal.fire('Error!', 'Something went wrong.', 'error');
          }
        });
      }
  });
});

// Implement reject pending club with message via modal

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
          editAlert();
        } else{
          errorAlert();
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
          errorAlert();
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
  const $studentTable = $("table tbody");

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
            <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">${
                user.name
            }</th>
            <td class="py-3 px-4 text-gray-500">${user.email}</td>
            <td class="py-3 px-4 text-gray-500">${user.formatted_role}</td>
            <td class="py-3 px-4 text-gray-500">${formattedDate}</td>
            <td class="py-3 px-4 whitespace-nowrap text-right text-sm font-medium flex space-x-2 items-center">
              <button data-modal-target="edit-students-modal" data-modal-toggle="edit-students-modal"
                  data-students-id="${user.id}"
                  data-students-name="${user.name}"
                  data-students-email="${user.email}"
                  data-students-role="${user.role}"
                  class="font-medium text-blue-600 hover:underline cursor-pointer">Edit</button>
              <span class="text-gray-300 mx-2">|</span>
              <form action="{{ route('super_admin.destroyStudent', ['studentsId' => '${
                  user.id
              }']) }}" method="POST">
                <input type="hidden" name="_token" value="${$(
                    'meta[name="csrf-token"]'
                ).attr("content")}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn delete-btn text-red-600 hover:text-red-900">Delete</button>
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

// -------------------------------------------------------------------Club Page----------------------------------------------------------------
// Add Functionality for Create Club
$(document).ready(function(){
  $("#add-club-form").submit(function (event) {
    event.preventDefault();
    $(".error-message").remove();

    const form = $(this); // Get the form element
    const url = form.attr('action'); // Get the form action URL
    const type = 'POST'; // Get the form method 
    
    let formDataObject = {
      club_name: $("#club_name").val(),
      club_description: $("#club_description").val(),
      club_email: $("#club_email").val(),
      club_advisor: $("#club_advisor").val(),
      category_id: $('#category_id').val(),
      why_join: $('#why_join').val(),
      activities: $('#activities').val(),
      _token: $('meta[name="csrf-token"]').attr("content"),
    };

    // Logo Optional
    const logoFile = $("#club_logo")[0].files[0];
    if (logoFile) {
      formDataObject.club_logo = logoFile;
    }

    let formData = new FormData();
    for (const key in formDataObject) {
      formData.append(key, formDataObject[key]); // Loop to populate FormData
    }

    $.ajax({
      url:url,
      type: type,
      data: formData,
      contentType: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success:function(response){
        if(response.success){
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
          }).then(function () {
            window.location.reload();
          })
        }else{
          Swal.fire({
            title: "Error!",
            text:
              response.message || "An unexpected error occurred.",
            icon: "error",
          });
        }
      },error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "'], textarea[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-red-500 error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          Swal.fire({
            title: "Error!",
            text: xhr.responseJSON?.message || "An unexpected error occurred.",
            icon: "error",
          });
        }
      },
    })
  });
});

// Edit Functionality for Update Club
$(document).ready(function(){
  $('#edit-club-form').submit(function(event){
    event.preventDefault();
    $(".error-message").remove();

    const form = $(this); // Get the form element
    const url = form.attr('action'); // Get the form action URL
    const type = 'POST'; // Get the form method

    let formDataObject = {
      _method: 'PUT',
      id: $('#edit_club_id').val(),
      club_name: $("#edit_club_name").val(),
      club_description: $("#edit_club_description").val(),
      club_email: $("#edit_club_email").val(),
      club_advisor: $("#edit_club_advisor").val(),
      category_id: $('#edit_category_id').val(),
      why_join: $('#edit_why_join').val(),
      activities: $('#edit_activities').val(),
      _token: $('meta[name="csrf-token"]').attr("content"),
    };

    // Logo Optional
    const logoFile = $("#edit_club_logo")[0].files[0];
    if (logoFile) {
      formDataObject.club_logo = logoFile;
    }

    let formData = new FormData();
    for (const key in formDataObject) {
      formData.append(key, formDataObject[key]); // Loop to populate FormData
    }

    $.ajax({
      url:url,
      type: type,
      data: formData,
      contentType: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response){
        if(response.success){
          Swal.fire({
            title: "Awesome!",
            text: response.message,
            icon: "success",
          }).then(function () {
            window.location.reload();
          })
        }else{
          Swal.fire({
            title: "Error!",
            text:
              response.message || "An unexpected error occurred.",
            icon: "error",
          });
        }
      },error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "'], textarea[name='" + field + "'], select[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-red-500 error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          Swal.fire({
            title: "Error!",
            text: xhr.responseJSON?.message || "An unexpected error occurred.",
            icon: "error",
          });
        }
      },
    })
  })
});

// Add Functionality for Create Announcement
$(document).ready(function(){
  $('#add-announcement-form').submit(function(event){
    event.preventDefault();
    $(".error-message").remove();
    const form = $(this); // Get the form element
    const url = form.attr('action'); // Get the form action URL
    const type = 'POST'; // Get the form method
    const data = form.serialize(); // Serialize the form data

    $.ajax({
      url: url,
      type: type,
      data: data,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success:function(response){
        if(response.success){
          swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
          }).then(function () {
            window.location.reload();
          })
        }else{
          swal.fire({
            title: "Error!",
            text: response.message || "An unexpected error occurred.",
            icon: "error",
          })
        }
      },
      error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "'], textarea[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-red-500 error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          errorAlert();
        }
      },
    })
  })
});

// Edit Functionality for Update Announcement
$(document).ready(function(){
  $('#edit-announcement-form').submit(function(event){
    event.preventDefault();
    $(".error-message").remove();
    const form = $(this); // Get the form element
    const url = form.attr('action'); // Get the form action URL
    const type = 'POST'; // Get the form method
    const data = form.serialize(); // Serialize the form data

    $.ajax({
      url: url,
      type: type,
      data: data,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success:function(response){
        if(response.success){
          swal.fire({
            title: "Awesome!",
            text: response.message,
            icon: "success",
          }).then(function () {
            window.location.reload();
          })
        }else{
          swal.fire({
            title: "Error!",
            text: response.message || "An unexpected error occurred.",
            icon: "error",
          })
        }
      },
      error: function (xhr) {
        if (xhr.responseJSON?.errors) {
          $.each(xhr.responseJSON.errors, function (field, messages) {
            let inputField = $("input[name='" + field + "'], textarea[name='" + field + "'], select[name='" + field + "']");
            if (!inputField.next(".error-message").length) {
              inputField.after(
                `<span class="text-red-500 error-message">${messages[0]}</span>`
              );
            }
          });
        }else {
          errorAlert();
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

