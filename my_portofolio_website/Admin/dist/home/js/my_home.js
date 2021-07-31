$(document).ready(function () {
  Insert_Home();
  view_record();
});

// Insert Record in the Database
function Insert_Home() {
  $(document).on("click", "#save_home", function () {
    var homeTitle = $("#title").val();
    var homeName = $("#name").val();
    var homeDesc = $("#desc").val();
    var homeJob = $("#job").val();

    if (homeTitle == "" && homeName == "" && homeDesc == "" && homeJob == "") {
      $("#message").html("Isi Semua Inputan!");
    } else {
      $.ajax({
        url: "insert_home.php",
        method: "post",
        data: {
          HTitle: homeTitle,
          HName: homeName,
          HDesc: homeDesc,
          HJob: homeJob,
        },
        success: function (response) {
          $("#message").html(response);
          $("#data-home").trigger("reset");
          view_record();
        },
      });
    }
  });
}

function view_record() {
  $.ajax({
    url: "view_table.php",
    method: "POST",
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#showTable").html(data.html);
        // console.log(data.html);
      }
    },
  });
}
