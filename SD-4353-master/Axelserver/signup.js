< script type = "text/javascript" >
    $(document).on('click', '.formsubmitbutton', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(".form").attr('action'),
            data: $(".form").serialize(),
            success: function(response) {
                if (response === "success") {
                    window.reload;
                } else {
                    alert("invalid username/password.  Please try again");
                }
            }
        });
    });

<
/script>