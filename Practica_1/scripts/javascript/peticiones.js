/*peticionFetch();
peticionAjax();*/

ajax2();
function peticionFetch() {
  fetch("https://jsonplaceholder.typicode.com/posts")
    .then((response) => response.json())
    .then((json) => console.log(json));
}

function peticionAjax() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      var json = JSON.parse(xhr.responseText);
      console.log(json);
    } else {
      console.error("Error:", xhr.status);
    }
  };
  xhr.onerror = function () {
    console.error("Network Error");
  };
  xhr.send();
}

function ajax2() {
  jQuery.ajax({
    url: "https://jsonplaceholder.typicode.com/posts",
    type: "GET",
    success: function (result) {
      result.forEach((element) => {
        $("#post").append(
          `<option value="${element.id}">${element.title}</option>`
        );
      });
      console.table(result);
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
}
