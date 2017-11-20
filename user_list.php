<?php
include('class/general.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PT. SERA | Market Auction Price System</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="nav-md">
  <div class="container body">
  <div class="header center">
	<div>
	<img src="images/ibid.png"><img src="images/satu.png" class="pull-right">
	</div>
	</div>
		<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-menubuilder">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/">Home</a>
						</li>
						<li><a href="#">Auction Regulation</a>
						</li>
						<li><a href="#">Auction Location</a>
						</li>
						<li><a href="#">About Us</a>
						</li>
						<li><a href="#">Contact Us</a>
						</li>
						<li><a href="#">Auction Schedule</a>
						</li>
						<li><a href="#">How to Follow the Auction</a></li>
					</ul>
					    <div class="col-sm-2 col-md-2">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
				</div>
				
			</div>
			
		</div>
	 

     
	 <!-- top navigation -->
      <div class="top_nav">
	
        <div class="nav_menu">
          <nav class="" role="navigation">
     

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Your Account
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <span class="badge bg-green">Your Account</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                      <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
		<a href="http://ibid.co.id"><label> Home </label></a> > Login 
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                  <h2>Daftar User</h2>
                
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>First name</th>
                              <th>Last name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                              <th>Extn.</th>
                              <th>E-mail</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Tiger</td>
                              <td>Nixon</td>
                              <td>System Architect</td>
                              <td>Edinburgh</td>
                              <td>61</td>
                              <td>2011/04/25</td>
                              <td>$320,800</td>
                              <td>5421</td>
                              <td>t.nixon@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Garrett</td>
                              <td>Winters</td>
                              <td>Accountant</td>
                              <td>Tokyo</td>
                              <td>63</td>
                              <td>2011/07/25</td>
                              <td>$170,750</td>
                              <td>8422</td>
                              <td>g.winters@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Ashton</td>
                              <td>Cox</td>
                              <td>Junior Technical Author</td>
                              <td>San Francisco</td>
                              <td>66</td>
                              <td>2009/01/12</td>
                              <td>$86,000</td>
                              <td>1562</td>
                              <td>a.cox@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Cedric</td>
                              <td>Kelly</td>
                              <td>Senior Javascript Developer</td>
                              <td>Edinburgh</td>
                              <td>22</td>
                              <td>2012/03/29</td>
                              <td>$433,060</td>
                              <td>6224</td>
                              <td>c.kelly@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Airi</td>
                              <td>Satou</td>
                              <td>Accountant</td>
                              <td>Tokyo</td>
                              <td>33</td>
                              <td>2008/11/28</td>
                              <td>$162,700</td>
                              <td>5407</td>
                              <td>a.satou@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Brielle</td>
                              <td>Williamson</td>
                              <td>Integration Specialist</td>
                              <td>New York</td>
                              <td>61</td>
                              <td>2012/12/02</td>
                              <td>$372,000</td>
                              <td>4804</td>
                              <td>b.williamson@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Herrod</td>
                              <td>Chandler</td>
                              <td>Sales Assistant</td>
                              <td>San Francisco</td>
                              <td>59</td>
                              <td>2012/08/06</td>
                              <td>$137,500</td>
                              <td>9608</td>
                              <td>h.chandler@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Rhona</td>
                              <td>Davidson</td>
                              <td>Integration Specialist</td>
                              <td>Tokyo</td>
                              <td>55</td>
                              <td>2010/10/14</td>
                              <td>$327,900</td>
                              <td>6200</td>
                              <td>r.davidson@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Colleen</td>
                              <td>Hurst</td>
                              <td>Javascript Developer</td>
                              <td>San Francisco</td>
                              <td>39</td>
                              <td>2009/09/15</td>
                              <td>$205,500</td>
                              <td>2360</td>
                              <td>c.hurst@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Sonya</td>
                              <td>Frost</td>
                              <td>Software Engineer</td>
                              <td>Edinburgh</td>
                              <td>23</td>
                              <td>2008/12/13</td>
                              <td>$103,600</td>
                              <td>1667</td>
                              <td>s.frost@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jena</td>
                              <td>Gaines</td>
                              <td>Office Manager</td>
                              <td>London</td>
                              <td>30</td>
                              <td>2008/12/19</td>
                              <td>$90,560</td>
                              <td>3814</td>
                              <td>j.gaines@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Quinn</td>
                              <td>Flynn</td>
                              <td>Support Lead</td>
                              <td>Edinburgh</td>
                              <td>22</td>
                              <td>2013/03/03</td>
                              <td>$342,000</td>
                              <td>9497</td>
                              <td>q.flynn@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Charde</td>
                              <td>Marshall</td>
                              <td>Regional Director</td>
                              <td>San Francisco</td>
                              <td>36</td>
                              <td>2008/10/16</td>
                              <td>$470,600</td>
                              <td>6741</td>
                              <td>c.marshall@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Haley</td>
                              <td>Kennedy</td>
                              <td>Senior Marketing Designer</td>
                              <td>London</td>
                              <td>43</td>
                              <td>2012/12/18</td>
                              <td>$313,500</td>
                              <td>3597</td>
                              <td>h.kennedy@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Tatyana</td>
                              <td>Fitzpatrick</td>
                              <td>Regional Director</td>
                              <td>London</td>
                              <td>19</td>
                              <td>2010/03/17</td>
                              <td>$385,750</td>
                              <td>1965</td>
                              <td>t.fitzpatrick@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Michael</td>
                              <td>Silva</td>
                              <td>Marketing Designer</td>
                              <td>London</td>
                              <td>66</td>
                              <td>2012/11/27</td>
                              <td>$198,500</td>
                              <td>1581</td>
                              <td>m.silva@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Paul</td>
                              <td>Byrd</td>
                              <td>Chief Financial Officer (CFO)</td>
                              <td>New York</td>
                              <td>64</td>
                              <td>2010/06/09</td>
                              <td>$725,000</td>
                              <td>3059</td>
                              <td>p.byrd@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Gloria</td>
                              <td>Little</td>
                              <td>Systems Administrator</td>
                              <td>New York</td>
                              <td>59</td>
                              <td>2009/04/10</td>
                              <td>$237,500</td>
                              <td>1721</td>
                              <td>g.little@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Bradley</td>
                              <td>Greer</td>
                              <td>Software Engineer</td>
                              <td>London</td>
                              <td>41</td>
                              <td>2012/10/13</td>
                              <td>$132,000</td>
                              <td>2558</td>
                              <td>b.greer@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Dai</td>
                              <td>Rios</td>
                              <td>Personnel Lead</td>
                              <td>Edinburgh</td>
                              <td>35</td>
                              <td>2012/09/26</td>
                              <td>$217,500</td>
                              <td>2290</td>
                              <td>d.rios@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jenette</td>
                              <td>Caldwell</td>
                              <td>Development Lead</td>
                              <td>New York</td>
                              <td>30</td>
                              <td>2011/09/03</td>
                              <td>$345,000</td>
                              <td>1937</td>
                              <td>j.caldwell@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Yuri</td>
                              <td>Berry</td>
                              <td>Chief Marketing Officer (CMO)</td>
                              <td>New York</td>
                              <td>40</td>
                              <td>2009/06/25</td>
                              <td>$675,000</td>
                              <td>6154</td>
                              <td>y.berry@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Caesar</td>
                              <td>Vance</td>
                              <td>Pre-Sales Support</td>
                              <td>New York</td>
                              <td>21</td>
                              <td>2011/12/12</td>
                              <td>$106,450</td>
                              <td>8330</td>
                              <td>c.vance@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Doris</td>
                              <td>Wilder</td>
                              <td>Sales Assistant</td>
                              <td>Sidney</td>
                              <td>23</td>
                              <td>2010/09/20</td>
                              <td>$85,600</td>
                              <td>3023</td>
                              <td>d.wilder@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Angelica</td>
                              <td>Ramos</td>
                              <td>Chief Executive Officer (CEO)</td>
                              <td>London</td>
                              <td>47</td>
                              <td>2009/10/09</td>
                              <td>$1,200,000</td>
                              <td>5797</td>
                              <td>a.ramos@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Gavin</td>
                              <td>Joyce</td>
                              <td>Developer</td>
                              <td>Edinburgh</td>
                              <td>42</td>
                              <td>2010/12/22</td>
                              <td>$92,575</td>
                              <td>8822</td>
                              <td>g.joyce@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jennifer</td>
                              <td>Chang</td>
                              <td>Regional Director</td>
                              <td>Singapore</td>
                              <td>28</td>
                              <td>2010/11/14</td>
                              <td>$357,650</td>
                              <td>9239</td>
                              <td>j.chang@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Brenden</td>
                              <td>Wagner</td>
                              <td>Software Engineer</td>
                              <td>San Francisco</td>
                              <td>28</td>
                              <td>2011/06/07</td>
                              <td>$206,850</td>
                              <td>1314</td>
                              <td>b.wagner@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Fiona</td>
                              <td>Green</td>
                              <td>Chief Operating Officer (COO)</td>
                              <td>San Francisco</td>
                              <td>48</td>
                              <td>2010/03/11</td>
                              <td>$850,000</td>
                              <td>2947</td>
                              <td>f.green@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Shou</td>
                              <td>Itou</td>
                              <td>Regional Marketing</td>
                              <td>Tokyo</td>
                              <td>20</td>
                              <td>2011/08/14</td>
                              <td>$163,000</td>
                              <td>8899</td>
                              <td>s.itou@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Michelle</td>
                              <td>House</td>
                              <td>Integration Specialist</td>
                              <td>Sidney</td>
                              <td>37</td>
                              <td>2011/06/02</td>
                              <td>$95,400</td>
                              <td>2769</td>
                              <td>m.house@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Suki</td>
                              <td>Burks</td>
                              <td>Developer</td>
                              <td>London</td>
                              <td>53</td>
                              <td>2009/10/22</td>
                              <td>$114,500</td>
                              <td>6832</td>
                              <td>s.burks@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Prescott</td>
                              <td>Bartlett</td>
                              <td>Technical Author</td>
                              <td>London</td>
                              <td>27</td>
                              <td>2011/05/07</td>
                              <td>$145,000</td>
                              <td>3606</td>
                              <td>p.bartlett@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Gavin</td>
                              <td>Cortez</td>
                              <td>Team Leader</td>
                              <td>San Francisco</td>
                              <td>22</td>
                              <td>2008/10/26</td>
                              <td>$235,500</td>
                              <td>2860</td>
                              <td>g.cortez@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Martena</td>
                              <td>Mccray</td>
                              <td>Post-Sales support</td>
                              <td>Edinburgh</td>
                              <td>46</td>
                              <td>2011/03/09</td>
                              <td>$324,050</td>
                              <td>8240</td>
                              <td>m.mccray@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Unity</td>
                              <td>Butler</td>
                              <td>Marketing Designer</td>
                              <td>San Francisco</td>
                              <td>47</td>
                              <td>2009/12/09</td>
                              <td>$85,675</td>
                              <td>5384</td>
                              <td>u.butler@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Howard</td>
                              <td>Hatfield</td>
                              <td>Office Manager</td>
                              <td>San Francisco</td>
                              <td>51</td>
                              <td>2008/12/16</td>
                              <td>$164,500</td>
                              <td>7031</td>
                              <td>h.hatfield@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Hope</td>
                              <td>Fuentes</td>
                              <td>Secretary</td>
                              <td>San Francisco</td>
                              <td>41</td>
                              <td>2010/02/12</td>
                              <td>$109,850</td>
                              <td>6318</td>
                              <td>h.fuentes@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Vivian</td>
                              <td>Harrell</td>
                              <td>Financial Controller</td>
                              <td>San Francisco</td>
                              <td>62</td>
                              <td>2009/02/14</td>
                              <td>$452,500</td>
                              <td>9422</td>
                              <td>v.harrell@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Timothy</td>
                              <td>Mooney</td>
                              <td>Office Manager</td>
                              <td>London</td>
                              <td>37</td>
                              <td>2008/12/11</td>
                              <td>$136,200</td>
                              <td>7580</td>
                              <td>t.mooney@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jackson</td>
                              <td>Bradshaw</td>
                              <td>Director</td>
                              <td>New York</td>
                              <td>65</td>
                              <td>2008/09/26</td>
                              <td>$645,750</td>
                              <td>1042</td>
                              <td>j.bradshaw@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Olivia</td>
                              <td>Liang</td>
                              <td>Support Engineer</td>
                              <td>Singapore</td>
                              <td>64</td>
                              <td>2011/02/03</td>
                              <td>$234,500</td>
                              <td>2120</td>
                              <td>o.liang@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Bruno</td>
                              <td>Nash</td>
                              <td>Software Engineer</td>
                              <td>London</td>
                              <td>38</td>
                              <td>2011/05/03</td>
                              <td>$163,500</td>
                              <td>6222</td>
                              <td>b.nash@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Sakura</td>
                              <td>Yamamoto</td>
                              <td>Support Engineer</td>
                              <td>Tokyo</td>
                              <td>37</td>
                              <td>2009/08/19</td>
                              <td>$139,575</td>
                              <td>9383</td>
                              <td>s.yamamoto@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Thor</td>
                              <td>Walton</td>
                              <td>Developer</td>
                              <td>New York</td>
                              <td>61</td>
                              <td>2013/08/11</td>
                              <td>$98,540</td>
                              <td>8327</td>
                              <td>t.walton@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Finn</td>
                              <td>Camacho</td>
                              <td>Support Engineer</td>
                              <td>San Francisco</td>
                              <td>47</td>
                              <td>2009/07/07</td>
                              <td>$87,500</td>
                              <td>2927</td>
                              <td>f.camacho@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Serge</td>
                              <td>Baldwin</td>
                              <td>Data Coordinator</td>
                              <td>Singapore</td>
                              <td>64</td>
                              <td>2012/04/09</td>
                              <td>$138,575</td>
                              <td>8352</td>
                              <td>s.baldwin@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Zenaida</td>
                              <td>Frank</td>
                              <td>Software Engineer</td>
                              <td>New York</td>
                              <td>63</td>
                              <td>2010/01/04</td>
                              <td>$125,250</td>
                              <td>7439</td>
                              <td>z.frank@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Zorita</td>
                              <td>Serrano</td>
                              <td>Software Engineer</td>
                              <td>San Francisco</td>
                              <td>56</td>
                              <td>2012/06/01</td>
                              <td>$115,000</td>
                              <td>4389</td>
                              <td>z.serrano@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jennifer</td>
                              <td>Acosta</td>
                              <td>Junior Javascript Developer</td>
                              <td>Edinburgh</td>
                              <td>43</td>
                              <td>2013/02/01</td>
                              <td>$75,650</td>
                              <td>3431</td>
                              <td>j.acosta@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Cara</td>
                              <td>Stevens</td>
                              <td>Sales Assistant</td>
                              <td>New York</td>
                              <td>46</td>
                              <td>2011/12/06</td>
                              <td>$145,600</td>
                              <td>3990</td>
                              <td>c.stevens@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Hermione</td>
                              <td>Butler</td>
                              <td>Regional Director</td>
                              <td>London</td>
                              <td>47</td>
                              <td>2011/03/21</td>
                              <td>$356,250</td>
                              <td>1016</td>
                              <td>h.butler@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Lael</td>
                              <td>Greer</td>
                              <td>Systems Administrator</td>
                              <td>London</td>
                              <td>21</td>
                              <td>2009/02/27</td>
                              <td>$103,500</td>
                              <td>6733</td>
                              <td>l.greer@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Jonas</td>
                              <td>Alexander</td>
                              <td>Developer</td>
                              <td>San Francisco</td>
                              <td>30</td>
                              <td>2010/07/14</td>
                              <td>$86,500</td>
                              <td>8196</td>
                              <td>j.alexander@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Shad</td>
                              <td>Decker</td>
                              <td>Regional Director</td>
                              <td>Edinburgh</td>
                              <td>51</td>
                              <td>2008/11/13</td>
                              <td>$183,000</td>
                              <td>6373</td>
                              <td>s.decker@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Michael</td>
                              <td>Bruce</td>
                              <td>Javascript Developer</td>
                              <td>Singapore</td>
                              <td>29</td>
                              <td>2011/06/27</td>
                              <td>$183,000</td>
                              <td>5384</td>
                              <td>m.bruce@datatables.net</td>
                            </tr>
                            <tr>
                              <td>Donna</td>
                              <td>Snider</td>
                              <td>Customer Support</td>
                              <td>New York</td>
                              <td>27</td>
                              <td>2011/01/25</td>
                              <td>$112,000</td>
                              <td>4226</td>
                              <td>d.snider@datatables.net</td>
                            </tr>
                          </tbody>
                        </table>
			
                </div>
              </div>
			  
			</div>
          <div class="row">
          
			
          </div>
	
        
        <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">PT. Serasi Auto Raya  <a href="https://ibid.co.id">2016</a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
 <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
  <!-- skycons -->



  <!-- dashbord linegraph -->
  
  <!-- /dashbord linegraph -->
  <!-- datepicker -->

  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
