$(document).ready(function () {
  Insert_record();
});

// Insert Record in the Database
function Insert_record() {
  $(document).on("click", "#btn_send", function () {
    // e.preventDefault();
    var mName = $("#name").val();
    var mEmail = $("#email").val();
    var mSubject = $("#subject").val();
    var mMessage = $("#message").val();

    // if (mName == "" && mEmail == "" && mSubject == "" && mMessage == "") {
    if (mName == "" || mEmail == "" || mSubject == "" || mMessage == "") {
      $("#message_input").html("Please Fill In The Blanks").css("color", "red");
    } else {
      $.ajax({
        url: "insert.php",
        method: "post",
        data: {
          MName: mName,
          MEmail: mEmail,
          MSubject: mSubject,
          MMessage: mMessage,
        },
        success: function (data) {
          $("#message_input").html(data).css("color", "#4cd137").hide(20300);
          $("#form-message").trigger("reset");
        },
      });
    }
  });
}
