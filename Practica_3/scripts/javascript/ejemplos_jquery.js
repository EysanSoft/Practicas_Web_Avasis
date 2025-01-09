$(document).ready(function () {
  $(".inner").append("<p>Test</p>");

  $("#customSelector1").append("<strong>Hello</strong>");

  $("input")
    .on("change", function () {
      var $input = $(this);
      $("#customSelector2").html(
        ".attr( 'checked' ): <b>" +
          $input.attr("checked") +
          "</b><br>" +
          ".prop( 'checked' ): <b>" +
          $input.prop("checked") +
          "</b><br>" +
          ".is( ':checked' ): <b>" +
          $input.is(":checked") +
          "</b>"
      );
    })
    .trigger("change");

  $(".customSelector3").children().css("border-bottom", "3px double red");

  $("#target").on("click", function () {
    alert("Handler for `click` called.");
  });

  $("#other").on("click", function () {
    $("#target").trigger("click");
  });

  $("#customSelector4")
    .contents()
    .filter(function () {
      return this.nodeType !== 1;
    })
    .wrap("<b></b>");

  $(".customStyle1").on("click", function () {
    var color = $(this).css("background-color");
    $("#result").html(
      "That div is <span style='color:" + color + ";'>" + color + "</span>."
    );
  });

  $(".customStyle2").on("click", function () {
    var value;
    switch ($(".customStyle2").index(this)) {
      case 0:
        value = $("#customSelector5").data("blah");
        break;
      case 1:
        $("#customSelector5").data("blah", "hello");
        value = "Stored!";
        break;
      case 2:
        $("#customSelector5").data("blah", 86);
        value = "Stored!";
        break;
      case 3:
        $("#customSelector5").removeData("blah");
        value = "Removed!";
        break;
    }
    $("#customSelector5").text("" + value);
  });

  $("#customSelector6").on("click", function () {
    $(".first").slideUp(300).delay(800).fadeIn(400);
    $(".second").slideUp(300).fadeIn(400);
  });

  $(".customStyle4").on("click", function () {
    $(".customStyle4").each(function (i) {
      if (this.style.color !== "blue") {
        this.style.color = "blue";
      } else {
        this.style.color = "";
      }
    });
  });

  $("#customSelector8").on("click", function () {
    $("#customSelector7").empty();
  });

  $(".customStyle5").hover(
    function () {
      $(this).append($("<span style='color: red'> ***</span>"));
    },
    function () {
      $(this).find("span").last().remove();
    }
  );

  $(".customSelector9").prepend("<b>Hello </b>");

  $("#customSelector10").on("click", function () {
    $("#customSelector11").empty();
    $("#customSelector11").append("Started...");
    $(".customStyle6").each(function (i) {
      $(this)
        .fadeIn()
        .fadeOut(1000 * (i + 1));
    });
    $(".customStyle6")
      .promise()
      .done(function () {
        $("#customSelector11").append(" Finished! ");
      });
  });

  $(".customStyle7").on("click", function () {
    $(this).replaceWith(
      "<div class='customStyle8'>" + $(this).text() + "</div>"
    );
  });

  $(window).on("scroll", function () {
    $(".customStyle9").css("display", "inline").fadeOut("slow");
  });

  $("select").on("change", displayVals);
  displayVals();

  $(".customSelector13")
    .first()
    .on("click", function () {
      update($(".customSelector14").first());
    });
  $(".customSelector13")
    .last()
    .on("click", function () {
      $(".customSelector13").first().trigger("click");
      update($(".customSelector14").last());
    });

  $("#customSelector15")
    // Se activa cuando cambia el valor del elemento.
    .on("change", function () {
      var str = "";
      $("#customSelector15 option:selected").each(function () {
        str += $(this).text() + " ";
      });
      $("#customSelector16").text(str);
    })
    .trigger("change");
});

function displayVals() {
  var singleValues = $("#single").val();
  var multipleValues = $("#multiple").val() || [];
  // When using jQuery 3:
  // var multipleValues = $( "#multiple" ).val();
  $("#customSelector12").html(
    "<b>Single:</b> " +
      singleValues +
      " <b>Multiple:</b> " +
      multipleValues.join(", ")
  );
}

function update(j) {
  var n = parseInt(j.text(), 10);
  j.text(n + 1);
}
