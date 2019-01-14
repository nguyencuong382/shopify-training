<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Shiza</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="{{asset('css/welcome.css')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body data-spy="scroll" data-target=".navbar-collapse">
  <div class="culmn">
    <section id="home" class="home">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 ">
              <div class="main_home_slider text-center">
                <div class="single_home_slider">
                  <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                    <h3>Our Clients Are Our First Priority</h3>
                    <h1>WELCOME TO SHIZA</h1>
                    <div class="separator"></div>
                    <p>
                      Get our 30-day free trial and start increasing your sales today
                    </p>
                    <div class="home_btn">
                      <div class="wrapper">
                        <form action="{{route('login.shopify')}}" aria-label="{{ __('Register') }}">
                          <input type="text" value="" name="domain" class="email-field" id="email-field" placeholder="Enter your shopify's name" required autofocus>
                          <input type="submit" value="Go!" name="subscribe" id="subscribe-button" class="email-submit">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>