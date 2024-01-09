<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../asset/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    
    <!-- datable js -->
    <script src="../asset/js/jquery-3.5.1.js"></script>
    <script src="../asset/js/jquery.dataTables.min.js"></script>
    <script src="../asset/js/dataTables.bootstrap4.min.js"></script>
    

    <title>Dashboard</title>
  </head>
  <body>
  <div>
      <div>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-white" href="dashboard.php">Data Transaksi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      {{-- <li class="nav-item active">
        <a class="nav-link text-white" href="page_data_user.php">Data</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="page_history.php">History User</span></a>
      </li> --}}
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
    
  </div>
  <div class="navbar-collapse collapse w-50 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        admin
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" id="logout" href="logout">Logout</a>
        </div>
      </li>
        </ul>
  </div>
</nav>
<div>
<script type="text/javascript">
  $('#logout').click(function(){
    localStorage.removeItem("status-login");
  });
</script>

<!-- <body> -->
<body>

<!-- Begin page content -->

<main role="main" class="container">
<div class="alerts-addUser"></div>
  <div class="container align-items-center">
 <div class="container">
  <div class="alerts-addUser"></div>
  <div class="card bg-light justify-content-center mt-5">
      <div class="card-header">
        <div class="row">
              <div class="col-6">
                <h3 class="card-title">Detail Transaksi</h3>
              </div>
              <div class="col-6">
                <!-- Button trigger modal -->
              {{-- <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data
              </button> --}}
              </div>
            </div>
        </div>
      <div class="card-body">
      <table id="example" class="table table-striped table-bordered">
      <thead>
                <tr>
                <th>No</th>
                <th>Total Item</th>
                <th>Total Quantity</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($data as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->item }}</td>
                    <td>{{ $transaksi->quantity }}</td>
                    {{-- button action --}}
                
                </tr>  
                @endforeach
            </tbody>    
      </table>
      </div>


    </div>
 </div>
  </div>
</div>
</main>
<script>
    function addText() {
        $('.quantity').append('<div class="form-outline mb-4"><label class="form-label" for="form3Example3cg">Item Name</label><input type="text" id="form3Example3cg" class="form-control form-control-lg" name="item[]" /></div><div class="form-outline mb-4"><label class="form-label" for="form3Example3cg">Quantity</label><input type="text" id="form3Example3cg" class="form-control form-control-lg" name="quantity[]" /></div><div>');
    }
    function fungsiEdit(data) {
                var data = data.split('|');
                console.log(data);
                $('#exampleModalCenterEdit form').attr('action', "{{ url('transaksi/edit') }}/" + data[0]);
                $('#exampleModalCenterEdit .modal-body #no_transaction').val(data[1]);
                $('#exampleModalCenterEdit .modal-body #transaction_date').val(data[2]);
            }
    
    </script>
<script>
   $(document).ready(function () {
      new DataTable('#example');
    });
</script>

</body>
<footer class="sticky-footer bg-transparent mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <section id="footer" style="bottom: 0;">
                <div class="p-1 text-white bg-transparent">
                    <div class="container">
                       
                    </div>
                </div>
            </section>
        </div>
    </div>
</footer>
