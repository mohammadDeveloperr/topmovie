<!DOCTYPE html>
<html>

<body>

  <p>Select a new car from the list.</p>

  <select id="mySelect" onchange="alli()">
    <option value="Audi">Audi</option>
    <option value="BMW">BMW</option>
    <option value="Mercedes">Mercedes</option>
    <option value="Volvo">Volvo</option>
  </select>

  <p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

  <p id="demo"></p>

  <script>
      function alli() {
        var x = document.getElementById("mySelect").value;
        alert(x)
        //const xhttp = new XMLHttpRequest();
        //xhttp.open("GET", "http://localhost/top/users_controll.php?user_type="+x+"&id="+id);
        //xhttp.send();
    }
  </script>

</body>

</html>