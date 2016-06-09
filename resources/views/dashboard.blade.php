@extends('layouts.app')

@section('content')
    <section id="wrapper">
        <div class="container-fluid cont-padding">
            <div class="row cont-margin">
                <div class="col-sm-2 left-padding display-none">
                    <div class="dash-leftmenu">

                        <div class="user-avatar">

                        </div>
                        <p class="user-name">User name</p>
                        <div class="menu-global">
                            <ul>
                                <li><a href="">Website</a></li>
                                <li><a href="">Website <b>#01</b></a></li>
                                <li><a href="">Website <b>#02</b></a></li>
                            </ul>
                        </div>
						<span class="menu-box text-transform">
							<ul>
                                <li><a href="">Domain</a></li>
                                <li><a href="">StatS</a></li>
                                <li><a href="">Soe</a></li>
                            </ul>
						</span>

                    </div>
                </div>
                <div class="col-sm-10 right-padding">

                    <div class="top-box">
                        <ul class="row">
                            <li class="col-sm-3 col-xs-6">
                                <div class="single-top-box">
                                    <div class="color-box">

                                    </div>
                                    <div class="info">
                                        <h4 class="yellow">TOTAL VISITS</h4>
                                        <p>215,645</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3 col-xs-6">
                                <div class="single-top-box">
                                    <div class="color-box back-simple">

                                    </div>
                                    <div class="info color-simple">
                                        <h4 class="yellow">Sample Text</h4>
                                        <p>215,645</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3 col-xs-6" >
                                <div class="single-top-box">
                                    <div class="color-box back-sample-two ">

                                    </div>
                                    <div class="info color-sample-two">
                                        <h4>Sample Text</h4>
                                        <p>215,645</p>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-3 col-xs-6">
                                <div class="single-top-box">
                                    <div class="color-box back-sample-three">

                                    </div>
                                    <div class="info color-sample-three">
                                        <h4>Sample Text</h4>
                                        <p>215,645</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class="graph row">
                        <div class=" col-sm-9">
                            <div class="visitor-graph">
                                <div id="graph">
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="notification ">
                                <div class="notification-box">
                                    <h3>Notifications</h3>
                                    <ul>
                                        <li><a href=""><i class="fa fa-twitter"></i>
                                                Your new tweethas been posted.
                                            </a></li>
                                        <li><a href=""><i class="fa fa-facebook"></i>
                                                Your Facebook gallery has been updated.
                                            </a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i>
                                                Your Instagram feed has been updated.
                                            </a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i>
                                                Your new tweethas been posted.
                                            </a></li>
                                        <li><a href=""><i class="fa fa-facebook"></i>
                                                Your Facebook gallery has been updated.
                                            </a></li>
                                        <li><a href=""><i class="fa fa-instagram"></i>
                                                Your Instagram feed has been updated.
                                            </a></li>
                                    </ul>
                                </div>
                                <button><a href="">View all notifications</a></button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="web-traffic-area">

                            <div class=" col-xs-12 col-sm-6">
                                <div class="web-traffic">
                                    <div class="web-head">
                                        <h4>Website Traffic</h4>
                                        <i class="fa fa-refresh"></i>
                                    </div>

                                    <main>

                                        <section>
                                            <div class="pieID pie">
                                                <div class="total-visitors">
                                                    <h4> Total<br> Visitors</h4>
                                                    <p>9012</p>
                                                </div>
                                            </div>
                                            <ul class="pieID legend">
                                                <li>
                                                    <em>Visitors</em>
                                                    <span>300</span>
                                                </li>
                                                <li>
                                                    <em>Registered</em>
                                                    <span>80</span>
                                                </li>
                                                <li>
                                                    <em>Bounce</em>
                                                    <span>130</span>
                                                </li>


                                            </ul>
                                        </section>

                                    </main>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore.</p>
                                </div>
                            </div>

                            <div class=" col-xs-12 col-sm-6">
                                <div class="customer-traffic">
                                    <div class="customer-head">
                                        <h4>Ononto Jolil</h4>
                                        <h5>Joker in Dhallywood</h5>
                                        <div class="customer-traffic-img">

                                        </div>
                                    </div>

                                    <div class="traffic-info">
                                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing  elit, sed Lorem ipsum dolor sit amet, consectetur adipiscing  elit, sed Lorem ipsum dolor sit amet, consectetur adipiscing  elit, sed  </p>
                                        <ul>
                                            <li>179 <span>customers</span></li>
                                            <li>179 <span>Products</span></li>
                                            <li>179 <span>Followers</span></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="progress-box">

                                <table class="table">
                                    <tr class="trbottom">
                                        <td class="seo-over">SEO Overview</td>

                                        <td class="visitor-count">2598778 votes<i class="fa fa-refresh"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="thmediam"><span class="face-one"></span>Test Content</td>
                                        <td class="thbig">
                                            <div class="progress">
                                                <div class="progress-bar bar-one" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">

                                                </div>

                                            </div>

                                        </td>
                                        <td class="thsmall">67%</td>
                                    </tr>

                                    <tr>
                                        <td class="thmediam"><span class="face-two"></span>MetaData Completed</td>
                                        <td class="thbig">
                                            <div class="progress">
                                                <div class="progress-bar bar-two" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">

                                                </div>

                                            </div>

                                        </td>
                                        <td class="thsmall">25%</td>
                                    </tr>

                                    <tr>
                                        <td class="thmediam"><span class="face-three"></span>Inbound Link</td>
                                        <td class="thbig">
                                            <div class="progress">
                                                <div class="progress-bar bar-three" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%;">

                                                </div>

                                            </div>

                                        </td>
                                        <td class="thsmall">7%</td>
                                    </tr>

                                    <tr>
                                        <td class="thmediam"><span class="face-four"></span>Keyword analysis</td>
                                        <td class="thbig">
                                            <div class="progress">
                                                <div class="progress-bar bar-four" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">

                                                </div>

                                            </div>

                                        </td>
                                        <td class="thsmall">15%</td>
                                    </tr>

                                </table>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection