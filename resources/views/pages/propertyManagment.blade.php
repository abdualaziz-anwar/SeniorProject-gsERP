<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- bootstrap CSS connect --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Petroleum Management System</title>
    </head>

    <body>
        <div class="d-flex" id="wrapper">

            {{-- sidebar Options on the left --}}
            <div class="Sidebar" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="./images/whitelogo.png" alt="" class="img-fluid" width="80px"></i>PMS
                </div>
                <div class="list-group list-group-flush my-3">
                    {{-- TDOD LATER FOR PAGES --}}
                    <a href="/" class="list-group-item  active">PropertyManagement</a>
                    <a href="/" class="list-group-item   ">GasStationManagment</a>
                    <a href="/" class="list-group-item ">LeaseHolders</a>
                    <a href="/" class="list-group-item ">Contracts</a>
                    <a href="/" class="list-group-item   ">Report Management</a>

                </div>
            </div>
            {{-- ##sidebar Options on the left --}}

            {{-- whole page content --}}
            <div id="page-content-wrapper">

                {{-- burger sign on the left --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Property Management</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{-- ##burger sign on the left --}}

                    {{-- login&logout options --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Admin
                                </a>
                                {{-- TODO logout page --}}
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{-- ##login&logout options --}}

                <div class="container-fluid ">
                    <div class="inner-content">

                        {{-- adding new property button trigger --}}
                        <button type="button" class="btn btn-success text-uppercase mt-4 mx-4  border-0"
                            style="background-color: #1C4E80;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add New Property
                        </button>

                        {{-- modal for adding new property --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {{-- modal header --}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Property</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    {{-- ##modal header --}}
                                    {{-- modal body --}}
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
                                                        placeholder="Enter Property Id">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Property Name">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Property Description">
                                                </div>
                                            </div>


                                    </div>
                                    {{-- ##modal body --}}

                                    <div class="modal-footer">
                                        {{-- TODO FOR SUBMIT --}}
                                        <a href="/" class="btn btn-success form-control border-0"
                                            style="background-color: #1C4E80; color: white;"> Submit</a>
                                        <button type="button" class="btn btn-danger form-control border-0"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- ##modal for adding new property --}}
                        <hr>


                        {{-- table content --}}
                        <div class="table-responsive-md mt-4 mx-4">
                            <table class="table table-responsive ">

                                <thead>
                                    <tr class="text-center" style="background-color: #1C4E80; color: white; ">
                                        <th>P-ID</th>
                                        <th>P-Name</th>
                                        <th>Image</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="text-center">
                                        <td>Pro-1</td>
                                        <td>Property Number 1</td>
                                        <td><img src="./images/property.jpg" alt="" class="img-fluid" width="50px"></td>
                                        <td>
                                            {{-- view button to show property information --}}
                                            <button type="button" class="btn text-success" data-bs-toggle="modal"
                                                data-bs-target="#viewPropertyData">
                                                View
                                            </button>

                                            <div class="modal fade" id="viewPropertyData" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title " id="exampleModalLabel">Property
                                                                Name</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <table class="table table-bordered p-3">
                                                                <tr class="text-center">
                                                                    <td colspan="2"><img src="./images/property.jpg"
                                                                            alt="" class="img-fluid py-4" width="100px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Property ID</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Property Number 1</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width">
                                                                        <p><b>Property Name</b></p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Abdul Aziz</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-width" colspan="2">
                                                                        <p><b>Description</b>
                                                                            <br>
                                                                            <span>
                                                                                <p style="text-align:justify">
                                                                                    Lorem ipsum dolor sit, amet
                                                                                    consectetur adipisicing elit. Magni
                                                                                    inventore ut asperiores possimus
                                                                                    beatae nobis illo corporis nam
                                                                                    pariatur, dolore, laborum itaque
                                                                                    debitis quisquam commodi? Natus unde
                                                                                    eveniet similique fugiat?
                                                                                </p>
                                                                            </span>
                                                                        </p>
                                                                    </td>
                                                                </tr>

                                                            </table>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger form-control"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ##view button to show property information --}}

                                            {{-- TODO EDIT&VIEW --}}
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
        <!-- /#page-content-wrapper -->
        </div>

        {{-- connect to script for admin login&logout and view button for property --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>

    </body>

</html>