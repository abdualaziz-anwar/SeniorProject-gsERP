<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- bootstrap CSS connect --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />

        <title>gasStationManagment</title>
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            {{-- SideBar Options ON the Left --}}
            <div class="Sidebar" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="./images/whitelogo.png" alt="" class="img-fluid" width="80px"></i>PMS
                </div>
                {{-- TODO FOR DIFFRENT PAGES. --}}
                <div class="list-group list-group-flush my-3">
                    <a href="/" class="list-group-item">PropertyManagement</a>
                    <a href="/" class="list-group-item active">GasStationManagment</a>
                    <a href="/" class="list-group-item ">LeaseHolders</a>
                    <a href="/" class="list-group-item ">Contracts</a>
                    <a href="/" class="list-group-item   ">Report Management</a>

                </div>
            </div>
            {{-- ##SideBar Options ON the Left --}}

            {{-- Starting page content --}}
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Gas Station Manager</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- login&logout TODO --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Admin
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- ##login&logout TODO --}}

                <div class="container-fluid ">
                    <div class="inner-content">

                        {{-- button trigger for adding a new manager --}}
                        <button type="button" class="btn btn-success  text-uppercase mt-4 mx-4  border-0"
                            style="background-color: #1C4E80;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add New Manager
                        </button>
                        {{-- ##button trigger for adding a new manager --}}

                        {{-- modal for adding a new a manager --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Manager</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col  text-center ">
                                                    <img src="images/user.png" alt="..." class="img-fluid"
                                                        width="100px">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col  text-center ">
                                                    <input type="file" class="mt-3">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Last Name">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="tel" class="form-control"
                                                        placeholder="Enter Phone No.">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="email" class="form-control" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Nation ID">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Gas Station ID">
                                                </div>
                                            </div>


                                    </div>
                                    {{-- ##modal for adding a new a manager --}}

                                    {{-- modal footer --}}
                                    <div class="modal-footer">
                                        <a href="submit" class="btn btn-success form-control border-0"
                                            style="background-color: #1C4E80; color: white;"> Submit</a>
                                        <button type="button" class="btn btn-danger form-control border-0"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                    {{-- ##modal footer --}}

                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>


                        {{-- Table Content Head --}}
                        <div class="table-responsive-md mt-4 mx-4">
                            <table class="table table-responsive ">
                                <thead>
                                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                                        <th>M-ID</th>
                                        <th>M-Name</th>
                                        <th>Image</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                {{-- ##Table Content Head --}}

                                <tbody>
                                    <tr class="text-center">
                                        <td>Manager 1-1</td>
                                        <td>Abdul Aziz</td>
                                        <td><img src="./images/user.png" alt="" class="img-fluid" width="50px"></td>
                                        <td>

                                            {{-- View Button #test --}}
                                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                                data-bs-target="#viewManagerData">
                                                View
                                            </button>

                                            <div class="modal fade" id="viewManagerData" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title " id="exampleModalLabel">Manager Name
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <table class="table table-bordered p-3">
                                                                <tr class="text-center">
                                                                    <td colspan="2"><img src="./images/user.png" alt=""
                                                                            class="img-fluid py-4" width="100px"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Manager ID:</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>MID-1</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Manager Name</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Abdul Aziz</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Email</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>abdulaziz@gmail.com</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Password</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>abdulaziz123</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Phone No</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>+52324578</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Nation ID</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>1105689200</p>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </div>
                                                        {{-- ##View Button #test --}}
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger form-control"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- TODO --}}
                                        </td>
                                        <td><a href="#" class="btn text-primary">Edit</a></td>
                                        <td><a href="#" class="btn text-danger">Delete</a></td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {{-- ##END page content --}}
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>

    </body>

</html>