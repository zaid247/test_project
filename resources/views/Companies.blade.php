

<html>


  <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.min.css') }}" />
  <script src=”.public_path(“js\jquery-3.3.1.slim.min.js”).”></script>
  <script src=”.public_path(“js\bootstrap.bundle.min.js”).”></script>
  <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.slim.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"></script>


  <script>
      $(function () {
          $('[data-toggle="tooltip"]').tooltip();
      });
      </script>

<head>


<style>
body {

background: #dd5e89;
background: -webkit-linear-gradient(to left, #f0f1f5, #fefefe);
background: linear-gradient(to left, #88afd4, #304874);
min-height: 100vh;
}

.content {
margin: auto;
}

table {
font-family: arial, sans-serif;
font-size: 170%;
border-collapse: collapse;
width: 90%;

}

td, th {
border: 1px solid #021827;
text-align: left;
padding: 8px;

}
td{
color: Azure;
}
th{
color: #F0F8FF;
}
tr:nth-child(even) {
background-color: #5071a1;
}
h2 {

color: Azure;
}
.login-form input[type="button"] {
height:450px;
width:150px;
background:#fff;
border:1px solid #f2f2f2;
border-radius:20px;
color: slategrey;
text-transform:uppercase;
font-family: 'Ubuntu', sans-serif;
cursor:pointer;
font-size: 170%;


@media screen and (max-width: 992px) {
table {
  width:90%;
}
}
.button_example {
position:absolute;
top: 10px;
right:0;
}
h1 {
text-align: center;
font-family: Tahoma, Arial, sans-serif;
color: #06D85F;
margin: 80px 0;
}

.box {
width: 40%;
margin: 0 auto;
background: rgba(255,255,255,0.2);
padding: 35px;
border: 2px solid #fff;
border-radius: 20px/50px;
background-clip: padding-box;
text-align: center;
}

.button1 {
font-size: 1em;
padding: 10px;
color: #fff;
border: 2px solid #101317;
border-radius: 20px/50px;
text-decoration: none;
cursor: pointer;
transition: all 0.3s ease-out;
}
.button1:hover {
background: #06D85F;
}

.overlay {
position: fixed;
top: 0;
bottom: 0;
left: 0;
right: 0;
background: rgba(0, 0, 0, 0.7);
transition: opacity 500ms;
visibility: hidden;
opacity: 0;
}
.overlay:target {
visibility: visible;
opacity: 1;
}



}


</style>


</head>
<body>

  <script>
      function myFunction() {
        alert("Your request has been sent!");
      }
      </script>


  @csrf
  {{ csrf_field() }}

  <nav class="navbar navbar-light bg-light" style=" background: -webkit-linear-gradient(to left, #172f7e,#F8F8FF);
  background: linear-gradient(to left, #F8F8FF,#e9eaed);">

          <a  href="{{ url('add_companies') }}"><button class="btn btn-primary" style="font-size: 150%" type="button" > add_company </button></a>
          <button type="button" class="btn btn-secondary" action="{{ url('add_companies') }}" disabled>Button</button>
      
    </nav>
<table style="margin-top:50px;" class="content">

<tr>
  <th>edit </th>
  <th>Name</th>
  <th>Address</th>
  <th>Logo</th>
  <th>Website</th>
  <th>Email</th>
</tr>
@foreach ($data as $cc)
<tr>
    <td>{{ $cc->Name }}</td>
    <td>{{ $cc->Address }}</td>
    <td>{{ $cc->Logo }}</td>
    <td>{{ $cc->Website }}</td>
    <td>{{ $cc->Email }}</td>
    <td>
        <a href="{{route('company.edit',['id'=>$cc->id])}}" class="btn btn-primary ">Edit</a>
    </td>
    <td>
        <a href="{{route('company.destroy',['id'=>$cc->id])}}" class="btn btn-danger btn-sm">Delete</a>
    </td>
</tr>
@endforeach
</table>


<script>
  $(function () {
      $('[data-toggle="tooltip"]').tooltip();
  });
  </script>


</body>
</html>
