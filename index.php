<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>It's Pizza Day</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <style>
            body
            {
                background: #eee;
            }
        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-86407807-1', 'auto');
          ga('send', 'pageview');
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row" style="padding-top:50px">
                <div class="col-sm-6 col-sm-offset-3 jumbotron">
                    <div class="text-center">
                        <small class="today"></small>
                        <p>Today's pizza is:</p>
                        <h2 class="result"></h2>
                        <small class="nextInLine">
                        
                        </small>
                        <a href="https://en.wikipedia.org/wiki/List_of_food_days" target="_blank"><small>Source wiki</small> </a>
                        <br/>
                        <br/>
                        
                        <form class="form text-center">
                            <label>Number of toppings</label>
                            <div class="form-group row">
                                
                                <div class="col-sm-2 col-sm-offset-5">
                                    <select class="form-control toppings">
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <button id="rollAgain" class="btn btn-primary" type="submit">
                                    Roll Again
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container text-center">
                </div>
            </div>
        </div>
    </body>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="js/makePizza.js"></script>
    <script>        
        $(document).ready(function(){
            var today = new Date();
            var month = today.getMonth() + 1;
            var day = today.getDate();
            var nextDate = nextPizzaDay(today);
            
            
            $('.today').append(today.toDateString());
            
            $('.result').append(isitPizzaDay(day, month));
            
            $('.nextInLine').append('Next officical pizza day is: <br/>"'+ nextDate.title + '" which is on: ' + nextDate.date.toDateString() + '');
            
            $('#rollAgain').on('click', function(e){
                e.preventDefault();
                var tops = $('.toppings').val();
                console.log(tops);
                $('.result').html(' ');
                $('.result').append(generatePizza(day, month, tops));
                
            })
            
            var toppings = getToppings();
            for(var i=0; i< (toppings.length - 2); i++)
            {   
                $('.toppings').append('<option value="'+ (i+2)  +'">'+ (i+2) +'</option>');    
            }
            
            
        });
        
    </script>
    
</html>