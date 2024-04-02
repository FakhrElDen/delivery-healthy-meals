@extends('voyager::master')

@section('content')
<link rel="stylesheet" href="css/" type="text/css" media="all" />
<div class="container">

  <div class="row">
    <div class="col-sm-6">
      <!--tabs-->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
            aria-controls="profile" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu"
            aria-selected="false">Menu</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="submit-plan-tab" data-toggle="tab" href="#submit-plan" role="tab"
            aria-controls="submit-plan" aria-selected="false">Submit Plan</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="tab-content" id="myTabContent">
    <!--profile tab-->
    <div class="tab-pane fade  active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="row ">
        <div class="col-sm-6">
          <div class="card">
            <h3 class=" pl-3 my-4 ">
              <span class="text-uppercase ">personal information
              </span>
            </h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <form>
                  <div class="form-group row">
                    <label for="name-n-profile" class="col-sm-2 col-form-label">name:</label>
                    <div class="col-sm-10">
                      <input type="text" disabled placeholder="user name" class="form-control" id="name-n-admin">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="email-n-profile" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-10">
                      <input type="text" disabled placeholder="email@email.com" class="form-control" id="email-n-admin">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone-n-profile" class="col-sm-2 col-form-label">Phone:</label>
                    <div class="col-sm-10">
                      <input type="text" disabled placeholder="000000000" class="form-control" id="phone-n-admin">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email-n-profile" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                      <input type="password" value="" disbled class="form-control" id="password-n-admin">
                    </div>
                  </div>
              </li>

            </ul>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-sm-6">
          <div class="card">
            <h3 class=" pl-3 my-4 ">
              <span class="text-uppercase ">delivery information
              </span>
            </h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <label>Address</label>
                <form>
                  <div class="form-group row">
                    <label for="address-home-n-admin" class="col-sm-2 col-form-label">Home</label>
                    <div class="col-sm-10 col-form-label ">
                      <input type="text" disabled class="form-control" id="address-home-n-admin">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address-sec-n-admin" class="col-sm-2 col-form-label">Work</label>
                    <div class="col-sm-10">
                      <input type="text" disabled class="form-control" id="address-sec-n-admin">
                    </div>
                    <div class="col-sm-2">
                      <a class="promo-code orange-txt float-right" data-toggle="collapse" href="#collapseupdateaddress"
                        role="button" aria-expanded="false" aria-controls="collapseupdateaddress">
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                      </a>
                    </div>
                  </div>


                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>



      <!--test-->
      <div class="row ">
        <div class="col-sm-6">
          <div class="card">
            <h3 class=" pl-3 my-4 ">
              <span class="text-uppercase ">medical information
              </span>
            </h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">

                <h5>Do you have any medical condition:</h5><br>
                <label>medical condition:</label><br>

                <label>Anemia
                </label>
                <br>
                <label>Diabetes </label><br>

                <label>Blood Pressure (hyper or Hypo)</label> <br>

                <label>Thyroid (hyper or hypo)
                </label> <br>

                <label>Heart problems
                </label> <br>


                <label>Gastrointestinal Problems
                </label> <br>

                <label>other,please specify

                </label>
                <input class="form-control" disabled name="otherConditionadmin">
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--//test-->

      <!--test2-->
      <div class="row ">
        <div class="col-sm-6">
          <div class="card">
            <h3 class=" pl-3 my-4 ">
              <span class="text-uppercase ">Food causes Allergy:
              </span>
            </h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">

                <h5>Do you have any medical condition:</h5><br>
                <label>medical condition:</label><br>

                <label>Anemia
                </label>
                <br>
                <label>Diabetes </label><br>

                <label>Blood Pressure (hyper or Hypo)</label> <br>

                <label>Thyroid (hyper or hypo)
                </label> <br>

                <label>Heart problems
                </label> <br>


                <label>Gastrointestinal Problems
                </label> <br>

                <label>other,please specify

                </label>
                <input class="form-control" disabled name="otherConditionadmin">
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--//test2-->






    </div>
    <!--//profile tab-->
    <!--second  tab-->
    <div class="tab-pane fade" id="menu" role="tabpanel" aria-labelledby="menu-tab">
      <!--content of menu-tab-->
      <ul class="nav nav-tabs" id="myWeeksTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="week-one-tab" data-toggle="tab" href="#week-one-admin" role="tab"
            aria-controls="week-one-admin" aria-selected="true">week-one-admin</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="week-two-tab" data-toggle="tab" href="#week-two-admin" role="tab"
            aria-controls="week-two-admin" aria-selected="false">week-two-admin</a>
        </li>

      </ul>
      <div class="tab-content" id="myWeeksTabContent">
        <!--first week tab-->
        <div class="tab-pane fade active" id="week-one-admin" role="tabpanel" aria-labelledby="week-one-tab">

          <!--accordion days -->
          <div class="accordion" id="accordion-days-menu-admin">
            <div class="card">
              <div class="card-header" id="headingOne-menu-admin">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne-menu-admin-menu-admin" aria-expanded="true"
                    aria-controls="collapseOne-menu-admin-menu-admin">
                    day 1
                  </button>
                </h2>
              </div>

              <div id="collapseOne-menu-admin-menu-admin" class="collapse show" aria-labelledby="headingOne-menu-admin"
                data-parent="#accordion-days-menu-admin">
                <div class="card-body">
                  <!--content of day 1-->
                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>
                  <!--//content of day 1-->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo-menu-admin" aria-expanded="false" aria-controls="collapseTwo-menu-admin">
                    Day #2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo-menu-admin" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordion-days-menu-admin">
                <div class="card-body">
                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree-menu-admin" aria-expanded="false"
                    aria-controls="collapseThree-menu-admin">
                    Day #3
                  </button>
                </h2>
              </div>
              <div id="collapseThree-menu-admin" class="collapse" aria-labelledby="headingThree"
                data-parent="#accordion-days-menu-admin">
                <div class="card-body">

                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--//accordion days -->

        </div>
        <!--//first week tab-->
        <!--second week tab-->
        <div class="tab-pane fade" id="week-two-admin" role="tabpanel" aria-labelledby="week-two-tab">
          <!--accordion days -->
          <div class="accordion" id="accordion-days-menu-admin-2">
            <div class="card">
              <div class="card-header" id="headingOne-menu-admin-2">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne-menu-admin-menu-admin-2" aria-expanded="true"
                    aria-controls="collapseOne-menu-admin-menu-admin-2">
                    Day #1
                  </button>
                </h2>
              </div>

              <div id="collapseOne-menu-admin-menu-admin-2" class="collapse show"
                aria-labelledby="headingOne-menu-admin-2" data-parent="#accordion-days-menu-admin-2">
                <div class="card-body">
                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo-2">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo-menu-admin-2" aria-expanded="false"
                    aria-controls="collapseTwo-menu-admin-2">
                    Day #2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo-menu-admin-2" class="collapse" aria-labelledby="headingTwo-2"
                data-parent="#accordion-days-menu-admin-2">
                <div class="card-body">
                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree-2">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree-menu-admin-2" aria-expanded="false"
                    aria-controls="collapseThree-menu-admin-2">
                    Day #3
                  </button>
                </h2>
              </div>
              <div id="collapseThree-menu-admin-2" class="collapse" aria-labelledby="headingThree-2"
                data-parent="#accordion-days-menu-admin-2">
                <div class="card-body">
                  <table class="table">

                    <tbody>
                      <tr>
                        <th scope="col">Breakfast</th>
                        <td scope="col">toast</td>

                      </tr>
                      <tr class="table-primary">
                        <th scope="row">Lunch</th>
                        <td>rice</td>

                      </tr>
                      <tr>
                        <th scope="row">Snack</th>
                        <td>Jacob</td>

                      </tr>
                      <tr>
                        <th scope="row">Dinner</th>
                        <td>Larry</td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--//accordion days -->
        </div>
        <!--//second week tab-->

      </div>

      <!--//content of menu tab-->


    </div>
    <!--//second tab-->
    <!--third tab-->
    <div class="tab-pane fade" id="submit-plan" role="tabpanel" aria-labelledby="submit-plan-tab">

      <!--two weeks tabs-->
      <ul class="nav nav-tabs" id="myTab-admin-submit-plan" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="week-1-tab-admin-submit-plan" data-toggle="tab"
            href="#week-one-admin-submit-plan" role="tab" aria-controls="week-one-admin-submit-plan"
            aria-selected="true">week-one-admin-submit-plan</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="week-2-tab-admin-submit-plan" data-toggle="tab" href="#week-two-admin-submit-plan"
            role="tab" aria-controls="week-two-admin-submit-plan" aria-selected="false">week-two-admin-submit-plan</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade  active" id="week-one-admin-submit-plan" role="tabpanel"
          aria-labelledby="week-1-tab-admin-submit-plan">
          <div class="accordion" id="accordion-w1-days">
            <div class="card">
              <div class="card-header" id="headingOne-accordion-w1-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne-accordion-w1-days" aria-expanded="true"
                    aria-controls="collapseOne-accordion-w1-days">
                    Day #1
                  </button>
                </h2>
              </div>

              <div id="collapseOne-accordion-w1-days" class="collapse show"
                aria-labelledby="headingOne-accordion-w1-days" data-parent="#accordion-w1-days">
                <div class="card-body">

                  <!--w1-d1-->
                  <div class="accordion" id="accordion-w1-d1-meals">
                    <div class="card">
                      <div class="card-header" id="headingOne-accordion-w1-d1-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne-accordion-w1-d1-meals" aria-expanded="true"
                            aria-controls="collapseOne-accordion-w1-d1-meals">
                            brakfast
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne-accordion-w1-d1-meals" class="collapse show"
                        aria-labelledby="headingOne-accordion-w1-d1-meals" data-parent="#accordion-w1-d1-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d1-breakfast" class="form-check-input" type="radio"
                              name="radio-w1-d1-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d1-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-breakfast2" class="form-check-input" type="radio"
                              name="radio-w1-d1-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d1-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-breakfast3" class="form-check-input" type="radio"
                              name="radio-w1-d1-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d1-brakfast">
                              meal
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo-accordion-w1-d1-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo-accordion-w1-d1-meals"
                            aria-expanded="false" aria-controls="collapseTwo-accordion-w1-d1-meals">
                          lunch #2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo-accordion-w1-d1-meals" class="collapse"
                        aria-labelledby="headingTwo-accordion-w1-d1-meals" data-parent="#accordion-w1-d1-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d1-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d1-lunch" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d1-lunch">
                              lunch 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d1-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d1-lunch">
                              lunch2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d1-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d1-lunch">
                              lunch3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree-accordion-w1-d1-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree-accordion-w1-d1-meals"
                            aria-expanded="false" aria-controls="collapseThree-accordion-w1-d1-meals">
                           snack  #
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree-accordion-w1-d1-meals" class="collapse"
                        aria-labelledby="headingThree-accordion-w1-d1-meals" data-parent="#accordion-w1-d1-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d1-snack" class="form-check-input" type="radio"
                              name="radio-w1-d1-snack" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d1-snack">
                              snack 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-snack" class="form-check-input" type="radio"
                              name="radio-w1-d1-snack" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d1-snack">
                              snack 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d1-snack" class="form-check-input" type="radio"
                              name="radio-w1-d1-snack" value="snack 1">
                            <label class="form-check-label" for="radio-w1-d1-snack">
                              snack 3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--//w1 d1-->



                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo-accordion-w1-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo-accordion-w1-days" aria-expanded="false"
                    aria-controls="collapseTwo-accordion-w1-days">
                  Day #2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo-accordion-w1-days" class="collapse" aria-labelledby="headingTwo-accordion-w1-days"
                data-parent="#accordion-w1-days">
                <div class="card-body">
                
                  <!--w1-d2-->
                  <div class="accordion" id="accordion-w1-d2-meals">
                    <div class="card">
                      <div class="card-header" id="headingOne-accordion-w1-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne-accordion-w1-d2-meals" aria-expanded="true"
                            aria-controls="collapseOne-accordion-w1-d2-meals">
                            brakfast
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne-accordion-w1-d2-meals" class="collapse show"
                        aria-labelledby="headingOne-accordion-w1-d2-meals" data-parent="#accordion-w1-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d2-breakfast" class="form-check-input" type="radio"
                              name="radio-w1-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d2-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-breakfast2" class="form-check-input" type="radio"
                              name="radio-w1-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d2-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-breakfast3" class="form-check-input" type="radio"
                              name="radio-w1-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d2-brakfast">
                              meal
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo-accordion-w1-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo-accordion-w1-d2-meals"
                            aria-expanded="false" aria-controls="collapseTwo-accordion-w1-d2-meals">
                          lunch #2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo-accordion-w1-d2-meals" class="collapse"
                        aria-labelledby="headingTwo-accordion-w1-d2-meals" data-parent="#accordion-w1-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d2-lunch" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d2-lunch">
                              lunch 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d2-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d2-lunch">
                              lunch2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d2-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d2-lunch">
                              lunch3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree-accordion-w1-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree-accordion-w1-d2-meals"
                            aria-expanded="false" aria-controls="collapseThree-accordion-w1-d2-meals">
                           snack  #
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree-accordion-w1-d2-meals" class="collapse"
                        aria-labelledby="headingThree-accordion-w1-d2-meals" data-parent="#accordion-w1-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d2-snack" class="form-check-input" type="radio"
                              name="radio-w1-d2-snack" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d2-snack">
                              snack 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-snack" class="form-check-input" type="radio"
                              name="radio-w1-d2-snack" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d2-snack">
                              snack 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d2-snack" class="form-check-input" type="radio"
                              name="radio-w1-d2-snack" value="snack 1">
                            <label class="form-check-label" for="radio-w1-d2-snack">
                              snack 3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--//w1 d2-->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree-accordion-w1-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree-accordion-w1-days" aria-expanded="false"
                    aria-controls="collapseThree-accordion-w1-days">
                  Day #3
                  </button>
                </h2>
              </div>
              <div id="collapseThree-accordion-w1-days" class="collapse"
                aria-labelledby="headingThree-accordion-w1-days" data-parent="#accordion-w1-days">
                <div class="card-body">
                 
                  <!--w1-d3-->
                  <div class="accordion" id="accordion-w1-d3-meals">
                    <div class="card">
                      <div class="card-header" id="headingOne-accordion-w1-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne-accordion-w1-d3-meals" aria-expanded="true"
                            aria-controls="collapseOne-accordion-w1-d3-meals">
                            brakfast
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne-accordion-w1-d3-meals" class="collapse show"
                        aria-labelledby="headingOne-accordion-w1-d3-meals" data-parent="#accordion-w1-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d3-breakfast" class="form-check-input" type="radio"
                              name="radio-w1-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d3-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-breakfast2" class="form-check-input" type="radio"
                              name="radio-w1-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d3-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-breakfast3" class="form-check-input" type="radio"
                              name="radio-w1-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w1-d3-brakfast">
                              meal
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo-accordion-w1-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo-accordion-w1-d3-meals"
                            aria-expanded="false" aria-controls="collapseTwo-accordion-w1-d3-meals">
                          lunch #2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo-accordion-w1-d3-meals" class="collapse"
                        aria-labelledby="headingTwo-accordion-w1-d3-meals" data-parent="#accordion-w1-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d3-lunch" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d3-lunch">
                              lunch 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d3-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d3-lunch">
                              lunch2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w1-d3-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d3-lunch">
                              lunch3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree-accordion-w1-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree-accordion-w1-d3-meals"
                            aria-expanded="false" aria-controls="collapseThree-accordion-w1-d3-meals">
                           snack  #
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree-accordion-w1-d3-meals" class="collapse"
                        aria-labelledby="headingThree-accordion-w1-d3-meals" data-parent="#accordion-w1-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w1-d3-snack" class="form-check-input" type="radio"
                              name="radio-w1-d3-snack" value="lunch1">
                            <label class="form-check-label" for="radio-w1-d3-snack">
                              snack 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-snack" class="form-check-input" type="radio"
                              name="radio-w1-d3-snack" value="lunch 1">
                            <label class="form-check-label" for="radio-w1-d3-snack">
                              snack 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w1-d3-snack" class="form-check-input" type="radio"
                              name="radio-w1-d3-snack" value="snack 1">
                            <label class="form-check-label" for="radio-w1-d3-snack">
                              snack 3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--//w1 d3-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="week-two-admin-submit-plan" role="tabpanel"
          aria-labelledby="week-2-tab-admin-submit-plan">
          <div class="accordion" id="accordion-w2-days">
            <div class="card">
              <div class="card-header" id="headingOne-accordion-w2-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne-accordion-w2-days" aria-expanded="true"
                    aria-controls="collapseOne-accordion-w2-days">
                   Day1 #1
                  </button>
                </h2>
              </div>

              <div id="collapseOne-accordion-w2-days" class="collapse show"
                aria-labelledby="headingOne-accordion-w2-days" data-parent="#accordion-w2-days">
                <div class="card-body">
                    <!--w2-d1-->
    <div class="accordion" id="accordion-w2-d1-meals">
      <div class="card">
        <div class="card-header" id="headingOne-accordion-w2-d1-meals">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
              data-target="#collapseOne-accordion-w2-d1-meals" aria-expanded="true"
              aria-controls="collapseOne-accordion-w2-d1-meals">
              brakfast
            </button>
          </h2>
        </div>

        <div id="collapseOne-accordion-w2-d1-meals" class="collapse show"
          aria-labelledby="headingOne-accordion-w2-d1-meals" data-parent="#accordion-w2-d1-meals">
          <div class="card-body">
            <div class="form-check">

              <input id="sumit-plan-w2-d1-breakfast" class="form-check-input" type="radio"
                name="radio-w2-d1-brakfast" value="breakfast 1">
              <label class="form-check-label" for="radio-w2-d1-brakfast">
                meal
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-breakfast2" class="form-check-input" type="radio"
                name="radio-w2-d1-brakfast" value="breakfast 1">
              <label class="form-check-label" for="radio-w2-d1-brakfast">
                meal
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-breakfast3" class="form-check-input" type="radio"
                name="radio-w2-d1-brakfast" value="breakfast 1">
              <label class="form-check-label" for="radio-w2-d1-brakfast">
                meal
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo-accordion-w2-d1-meals">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button"
              data-toggle="collapse" data-target="#collapseTwo-accordion-w2-d1-meals"
              aria-expanded="false" aria-controls="collapseTwo-accordion-w2-d1-meals">
            lunch #2
            </button>
          </h2>
        </div>
        <div id="collapseTwo-accordion-w2-d1-meals" class="collapse"
          aria-labelledby="headingTwo-accordion-w2-d1-meals" data-parent="#accordion-w2-d1-meals">
          <div class="card-body">
            <div class="form-check">

              <input id="sumit-plan-w2-d1-lunch" class="form-check-input" type="radio"
                name="radio-w2-d1-lunch" value="lunch1">
              <label class="form-check-label" for="radio-w2-d1-lunch">
                lunch 
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-lunch" class="form-check-input" type="radio"
                name="radio-w2-d1-lunch" value="lunch 1">
              <label class="form-check-label" for="radio-w2-d1-lunch">
                lunch2
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-lunch" class="form-check-input" type="radio"
                name="radio-w2-d1-lunch" value="lunch 1">
              <label class="form-check-label" for="radio-w2-d1-lunch">
                lunch3
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree-accordion-w2-d1-meals">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button"
              data-toggle="collapse" data-target="#collapseThree-accordion-w2-d1-meals"
              aria-expanded="false" aria-controls="collapseThree-accordion-w2-d1-meals">
             snack  #
            </button>
          </h2>
        </div>
        <div id="collapseThree-accordion-w2-d1-meals" class="collapse"
          aria-labelledby="headingThree-accordion-w2-d1-meals" data-parent="#accordion-w2-d1-meals">
          <div class="card-body">
            <div class="form-check">

              <input id="sumit-plan-w2-d1-snack" class="form-check-input" type="radio"
                name="radio-w2-d1-snack" value="lunch1">
              <label class="form-check-label" for="radio-w2-d1-snack">
                snack 
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-snack" class="form-check-input" type="radio"
                name="radio-w2-d1-snack" value="lunch 1">
              <label class="form-check-label" for="radio-w2-d1-snack">
                snack 2
              </label>
            </div>
            <div class="form-check">
              <input id="sumit-plan-w2-d1-snack" class="form-check-input" type="radio"
                name="radio-w2-d1-snack" value="snack 1">
              <label class="form-check-label" for="radio-w2-d1-snack">
                snack 3
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--//w2 d1-->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo-accordion-w2-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo-accordion-w2-days" aria-expanded="false"
                    aria-controls="collapseTwo-accordion-w2-days">
                   Day #2
                  </button>
                </h2>
              </div>
              <div id="collapseTwo-accordion-w2-days" class="collapse" aria-labelledby="headingTwo-accordion-w2-days"
                data-parent="#accordion-w2-days">
                <div class="card-body">
                    <!--w2-d2-->
    <div class="accordion" id="accordion-w2-d2-meals">
                    <div class="card">
                      <div class="card-header" id="headingOne-accordion-w2-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne-accordion-w2-d2-meals" aria-expanded="true"
                            aria-controls="collapseOne-accordion-w2-d2-meals">
                            brakfast
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne-accordion-w2-d2-meals" class="collapse show"
                        aria-labelledby="headingOne-accordion-w2-d2-meals" data-parent="#accordion-w2-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d2-breakfast" class="form-check-input" type="radio"
                              name="radio-w2-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d2-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-breakfast2" class="form-check-input" type="radio"
                              name="radio-w2-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d2-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-breakfast3" class="form-check-input" type="radio"
                              name="radio-w2-d2-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d2-brakfast">
                              meal
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo-accordion-w2-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo-accordion-w2-d2-meals"
                            aria-expanded="false" aria-controls="collapseTwo-accordion-w2-d2-meals">
                          lunch #2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo-accordion-w2-d2-meals" class="collapse"
                        aria-labelledby="headingTwo-accordion-w2-d2-meals" data-parent="#accordion-w2-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d2-lunch" value="lunch1">
                            <label class="form-check-label" for="radio-w2-d2-lunch">
                              lunch 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d2-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d2-lunch">
                              lunch2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d2-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d2-lunch">
                              lunch3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree-accordion-w2-d2-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree-accordion-w2-d2-meals"
                            aria-expanded="false" aria-controls="collapseThree-accordion-w2-d2-meals">
                           snack  #
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree-accordion-w2-d2-meals" class="collapse"
                        aria-labelledby="headingThree-accordion-w2-d2-meals" data-parent="#accordion-w2-d2-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d2-snack" class="form-check-input" type="radio"
                              name="radio-w2-d2-snack" value="lunch1">
                            <label class="form-check-label" for="radio-w2-d2-snack">
                              snack 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-snack" class="form-check-input" type="radio"
                              name="radio-w2-d2-snack" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d2-snack">
                              snack 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d2-snack" class="form-check-input" type="radio"
                              name="radio-w2-d2-snack" value="snack 1">
                            <label class="form-check-label" for="radio-w2-d2-snack">
                              snack 3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--//w2 d2-->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree-accordion-w2-days">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree-accordion-w2-days" aria-expanded="false"
                    aria-controls="collapseThree-accordion-w2-days">
                   Day #3
                  </button>
                </h2>
              </div>
              <div id="collapseThree-accordion-w2-days" class="collapse"
                aria-labelledby="headingThree-accordion-w2-days" data-parent="#accordion-w2-days">
                <div class="card-body">
                     <!--w2-d3-->
    <div class="accordion" id="accordion-w2-d3-meals">
                    <div class="card">
                      <div class="card-header" id="headingOne-accordion-w2-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne-accordion-w2-d3-meals" aria-expanded="true"
                            aria-controls="collapseOne-accordion-w2-d3-meals">
                            brakfast
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne-accordion-w2-d3-meals" class="collapse show"
                        aria-labelledby="headingOne-accordion-w2-d3-meals" data-parent="#accordion-w2-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d3-breakfast" class="form-check-input" type="radio"
                              name="radio-w2-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d3-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-breakfast2" class="form-check-input" type="radio"
                              name="radio-w2-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d3-brakfast">
                              meal
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-breakfast3" class="form-check-input" type="radio"
                              name="radio-w2-d3-brakfast" value="breakfast 1">
                            <label class="form-check-label" for="radio-w2-d3-brakfast">
                              meal
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo-accordion-w2-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseTwo-accordion-w2-d3-meals"
                            aria-expanded="false" aria-controls="collapseTwo-accordion-w2-d3-meals">
                          lunch #2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo-accordion-w2-d3-meals" class="collapse"
                        aria-labelledby="headingTwo-accordion-w2-d3-meals" data-parent="#accordion-w2-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d3-lunch" value="lunch1">
                            <label class="form-check-label" for="radio-w2-d3-lunch">
                              lunch 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d3-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d3-lunch">
                              lunch2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-lunch" class="form-check-input" type="radio"
                              name="radio-w2-d3-lunch" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d3-lunch">
                              lunch3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree-accordion-w2-d3-meals">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseThree-accordion-w2-d3-meals"
                            aria-expanded="false" aria-controls="collapseThree-accordion-w2-d3-meals">
                           snack  #
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree-accordion-w2-d3-meals" class="collapse"
                        aria-labelledby="headingThree-accordion-w2-d3-meals" data-parent="#accordion-w2-d3-meals">
                        <div class="card-body">
                          <div class="form-check">

                            <input id="sumit-plan-w2-d3-snack" class="form-check-input" type="radio"
                              name="radio-w2-d3-snack" value="lunch1">
                            <label class="form-check-label" for="radio-w2-d3-snack">
                              snack 
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-snack" class="form-check-input" type="radio"
                              name="radio-w2-d3-snack" value="lunch 1">
                            <label class="form-check-label" for="radio-w2-d3-snack">
                              snack 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input id="sumit-plan-w2-d3-snack" class="form-check-input" type="radio"
                              name="radio-w2-d3-snack" value="snack 1">
                            <label class="form-check-label" for="radio-w2-d3-snack">
                              snack 3
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--//w2 d3-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!--//two weeks tab-->



    </div>
    <!--//third tab-->
  </div>
  <!--//tabs-->


</div>
</div>

@stop